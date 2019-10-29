<?php 
	/**
	* 
	*/
	class Admin extends MY_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('admin_model');
		}

		public function index(){
			$input = array();
			
			$list = $this->admin_model->get_list($input);
			$this->data['list'] = $list;

			$total = $this->admin_model->get_total();
			$this->data['total'] = $total;

			//lay noi dung message
			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;

			$this->data['temp'] = 'admin/admin/index';
			$this->load->view('admin/main',$this->data);
		}
		// function callback check username db
		public function check_username(){
			$action 	 = $this->uri->rsegment(2);
			$username 	 = $this->input->post('username');
			$where 		 = array('username' => $username);
			$check 		 = true;
			if ($action == 'edit') {
				$info = $this->data['info'];// lay tt qtv muon edit
				if ($info->username == $username) {
					$check = false;
				}
			}
			
			

			if ($check && $this->admin_model->check_exists($where)) {

				$this->form_validation->set_message(__FUNCTION__, 'Tài Khoản đã tồn tại');
				return false;
			}
			return true;
		}

		public function add(){
			$this->load->library('form_validation');
			$this->load->helper('form');
			
			// kiem tra co data post len 
			if ($this->input->post()) {
				$this->form_validation->set_rules('name','your name','required|min_length[3]');
				$this->form_validation->set_rules('username','username','required|min_length[6]|callback_check_username');
				$this->form_validation->set_rules('password','password','required|min_length[6]');
				$this->form_validation->set_rules('repassword','repassword','required|matches[password]');
				$this->form_validation->set_rules('email','Email','required|valid_email');
				$this->form_validation->set_rules('phone','Number Phone','required|min_length[8]|numeric');
				$this->form_validation->set_rules('address','Address','required|max_length[20]');
				$this->form_validation->set_rules('position','position','required|max_length[20]');

				if ($this->form_validation->run()) {
					// add database
					$name		 = $this->input->post('name');
					$username 	 = $this->input->post('username');
					$password 	 = $this->input->post('password');
					$email 		 = $this->input->post('email');
					$phone 		 = $this->input->post('phone');
					$address 	 = $this->input->post('address');
					$position 	 = $this->input->post('position');
					$avatar		 = 'avatar5.png';
					$data 		 = array(
						'name'	 	 => $name,
						'username'	 => $username,
						'password'	 => md5($password),
						'email'		 => $email,
						'phone'	 	 => $phone,
						'address'	 => $address,
						'chucvu'	 => $position,
						'avatar'	 => $avatar,
						'created'	 => now()
					);
					$permissions = $this->input->post('permissions');
					$data['permissions'] = json_encode($permissions);
					if ($this->admin_model->create($data)) {
						$this->session->set_flashdata('message','Thêm Tài Khoản Thành Công');
					}
					else{
						$this->session->set_flashdata('message','Thêm Tài Khoản Thất Bại');
					}
					// chuyen di 
					redirect(admin_url('admin'));
				}
				
			}
			$this->config->load('permissions',true);
			$config_pm = $this->config->item('permissions');
			$this->data['config_pm'] = $config_pm;

			$this->data['temp'] = 'admin/admin/add';
			$this->load->view('admin/main',$this->data);
		}

		// ham chinh sua quan tri 

		public function edit(){
			$id = $this->uri->rsegment('3');
			$id = intval($id);

			$this->load->library('form_validation');
			$this->load->helper('form');

			$info = $this->admin_model->get_info($id);
			if (!$info) {
				$this->session->set_flashdata('message','Admin này không tồn tại');
				redirect(admin_url('admin'));
			}
			$info->permissions = json_decode($info->permissions);

			$this->data['info'] = $info;
			if ($this->input->post()) {

				$this->form_validation->set_rules('name','your name','required|min_length[3]');
				$this->form_validation->set_rules('username','username','required|min_length[6]|callback_check_username');
				$password = $this->input->post('password');
				if ($password) {				
					$this->form_validation->set_rules('password','password','required|min_length[6]');
					$this->form_validation->set_rules('repassword','repassword','required|matches[password]');
				}

				$this->form_validation->set_rules('email','Email','required|valid_email');
				$this->form_validation->set_rules('phone','Number Phone','required|min_length[8]|numeric');
				$this->form_validation->set_rules('address','Address','required|max_length[20]');	

				if ($this->form_validation->run()) {
					$name		 = $this->input->post('name');
					$username 	 = $this->input->post('username');
					$email 		 = $this->input->post('email');
					$phone 		 = $this->input->post('phone');
					$address 	 = $this->input->post('address');

					$data 		 = array(
						'name'	 	 => $name,
						'username'	 => $username,
						'email'		 => $email,
						'phone'	 	 => $phone,
						'address'	 => $address
					);
					if ($password) {
						$data['password'] = md5($password);
					}
					$permissions = $this->input->post('permissions');
					$data['permissions'] = json_encode($permissions);

					if ($this->admin_model->update($id,$data)) {
						$this->session->set_flashdata('message','Cập Nhật Tài Khoản Thành Công');
					}
					else{
						$this->session->set_flashdata('message','Cập Nhật Tài Khoản Thất Bại');
					}
					// chuyen di 
					redirect(admin_url('admin'));
				}
			}
			$this->config->load('permissions',true);
			$config_pm = $this->config->item('permissions');
			$this->data['config_pm'] = $config_pm;

			$this->data['temp'] = 'admin/admin/edit';
			$this->load->view('admin/main',$this->data);
		}

		// xoa data

		public function delete(){
			$id = $this->uri->rsegment('3');
			$id = intval($id);

			$info = $this->admin_model->get_info($id);
			if (!$info) {
				$this->session->set_flashdata('message','Admin này không tồn tại');
				redirect(admin_url('admin'));
			}
			// thuc hien
			$this->admin_model->delete($id);
			$this->session->set_flashdata('message','Xóa Tài Khoản Thành Công');
			redirect(admin_url('admin'));
		}

	}
?>