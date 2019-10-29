<?php 
	/**
	* 
	*/
	class Contact extends MY_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('contact_model');
		}

		public function index(){

			$list = $this->contact_model->get_list();
			$this->data['list'] = $list;

			//lay noi dung message
			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;
			
			$this->data['temp'] = 'admin/contact/index';
			$this->load->view('admin/main',$this->data);
		}
		public function edit(){
			$id = $this->uri->rsegment('3');

			// load thu vien
			$this->load->library('form_validation');
			$this->load->helper('form');

			if ($this->input->post()) {
				$this->form_validation->set_rules('name','Tên','required');
				$this->form_validation->set_rules('email','Thể loại','required');
				$this->form_validation->set_rules('phone','Giá','required');
				if ($this->form_validation->run()) {
					$name		= $this->input->post('name');
					$email 		= $this->input->post('email');
					$phone   	= $this->input->post('phone');
					$map 		= $this->input->post('map');
					$this->load->library('upload_library');

					$upload_path = './public/upload/logo';
					$upload_data = $this->upload_library->upload($upload_path,'logo');
					if (isset($upload_data['file_name'])) {
						$logo_link = $upload_data['file_name'];
					}
					$data 		 = array(
						'name'	 	 => $name,
						'email' 	 => $email,
						'phone' 	 => $phone,
						'map'		 => $map,
						'address'	 => $this->input->post('address'),
					);
					if ($logo_link != '') {
						$data['logo'] = $logo_link;
					}
					if ($this->contact_model->update($id,$data)) {

						$this->session->set_flashdata('message','Thay đổi dữ liệu Thành Công');
					}else{
						$this->session->set_flashdata('message','Thay đổi dữ liệu Thất Bại');
					}
					// chuyen di 
					redirect(admin_url('contact'));
				}
			}

		}

	}
?>