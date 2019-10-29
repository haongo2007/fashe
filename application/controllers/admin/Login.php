<?php 
	/**
	* 
	*/
	
	class Login extends MY_controller
	{
		
		public function index()
		{	
			
			
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->load->view('admin/login/index');
			
			

		}

		public function check_ajax(){
			if ($this->input->post('n')) {
				$admin = $this->_check_name();
				if (!$admin) {
					echo "fail";
				}else{
					$username = $this->input->post('n');
					echo $username;
				}
				
			}
			if ($this->input->post('us')) {
				$admin = $this->_check_pass();
				if (!$admin) {
					echo "fail";
				}else{

					$this->load->model('admin_model');
					$admin = $this->_check_pass();

					$this->session->set_userdata('permissions',json_decode($admin->permissions));
					$this->session->set_userdata('admin_id',$admin->id);
					
					$this->session->set_userdata('login',true);
				}
				
			}
		}

		/// ham check login
		public function check_login(){
						
			$this->load->model('admin_model');
			$admin = $this->_get_admin_info();
			if ($admin) {
				$this->session->set_userdata('permissions',json_decode($admin->permissions));
				$this->session->set_userdata('admin_id',$admin->id);
				return true;
			}
			$this->form_validation->set_message(__FUNCTION__,'Đăng Nhập Thất Bại');
			return false;
		}

		/* ham lay thong tin admin*/

		private function _check_name(){
			$username = $this->input->post('n');		
			$where = array('username' => $username);
			$admin  = $this->admin_model->get_info_rule($where);
			return $admin;
		}

		private function _check_pass(){
			$name = $this->input->post('us');
			$pass = $this->input->post('pa');
			$pass = md5($pass);
			$where = array('username' => $name,'password' => $pass);
			$admin  = $this->admin_model->get_info_rule($where);
			return $admin;
		}
		
	}

?>