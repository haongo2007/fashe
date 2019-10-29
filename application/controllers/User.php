<?php 
	/**
	* 
	*/
	class User extends MY_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('user_model');
		}

		function check_email(){
			$email 	 = $this->input->post('email');
			$where 		 = array('email' => $email);

			if ($this->user_model->check_exists($where)) {

				$this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
				return false;
			}
			return true;

		}

		function register(){

			$this->load->library('form_validation');
			$this->load->helper('form');
			
			// kiem tra co data post len 
			if ($this->input->post()) {
				$this->form_validation->set_rules('name','your name','required|min_length[3]');
				$this->form_validation->set_rules('email','email đăng nhập','required|min_length[6]|callback_check_email');
				$this->form_validation->set_rules('psw','password','required|min_length[6]');
				$this->form_validation->set_rules('re_psw','password','matches[psw]');
				$this->form_validation->set_rules('phone','Number Phone','required');
				$this->form_validation->set_rules('address','Address','required');

				if ($this->form_validation->run()) {
					// add database
					$password 	 = $this->input->post('psw');
					$password    = md5($password);
					$data 		 = array(
						'name'	 	 => $this->input->post('name'),
						'email'	 	 => $this->input->post('email'),
						'phone'	 	 => $this->input->post('phone'),
						'address'	 => $this->input->post('address'),
						'password'	 => $password,
						'created'	 => now(),
					);
					if ($this->user_model->create($data)) {
						$this->session->set_flashdata('message','Tạo Tài Khoản Thành Công');
					}
					else{
						$this->session->set_flashdata('message','Tạo Tài Khoản Không Thành Công');
					}
					// chuyen di 
					redirect(site_url('home'));
				}
				
			}

			$this->data['temp'] = 'site/user/register';
			$this->load->view('site/layout',$this->data);
		}

		function login(){
			$this->load->library('form_validation');
			$this->load->helper('form');
				$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('email','email','required|valid_email');
				$this->form_validation->set_rules('password','password','required|min_length[6]');
				if ($this->form_validation->run() == FALSE) {
				    echo validation_errors();
				}
				$email 	 = $this->input->post('email');
				$where 	 = array('email' => $email);

				if ($this->user_model->check_exists($where)) {
					$user = $this->_get_user_info();
					if (!$user) {
						if (!$this->input->post('password') == '') {
							echo "Wrong Password";
						}
						return false;
					}
					$this->session->set_userdata('user_id_login', $user->id);
					echo "1";
				}else{
					if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
						
					}else{
						echo $this->lang->line('form_validation_check_email');
					}
					return false;
				}

		}

		/// ham check login
		function check_login(){
			
		}

		/* ham lay thong tin thanh vien*/
		private function _get_user_info(){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$password = md5($password);
			$where = array('email' => $email , 'password' => $password);
			$user  = $this->user_model->get_info_rule($where);
			
			return $user;
			
		}

		function logout(){
			if ($this->session->userdata('user_id_login')) {
				$this->session->unset_userdata('user_id_login');
			}
			$this->session->set_flashdata('message','Đăng Xuất Thành Công');
			redirect(base_url());
		}

		function index(){
			if (!$this->session->userdata('user_id_login')) {
				redirect(base_url('user/login'));
			}
			$user_id = $this->session->userdata('user_id_login');
			$user =  $this->user_model->get_info($user_id);
			$this->data['user'] = $user;

			$this->data['temp'] = 'site/user/index';
			$this->load->view('site/layout',$this->data);
		}

		function edit(){
			if (!$this->session->userdata('user_id_login')) {
				redirect();
			}
			$id = $this->session->userdata('user_id_login');
			if ($this->input->post()) {
					// add database
				 $name = $this->input->post('n');
				 $address = $this->input->post('a');
				 $phone = $this->input->post('p');

					$data 		 = array(
						'name'	 	 => $name,
						'phone'	 	 => $phone,
						'address'	 => $address,
					);
					if ($this->input->post('m')) {
						$pass = $this->input->post('m');
				 		$pass = md5($pass);
						$data['password'] = $pass;
					}
					$this->user_model->update($id,$data);
					echo'<script>window.location="'.site_url('user').'";</script>';
			}
		}
	} 
?>