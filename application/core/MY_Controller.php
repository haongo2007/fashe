<?php 

	class MY_Controller extends CI_Controller
	{
		/// send data -> view 
		public $data = array();

		function __construct()
		{
			parent::__construct();
			$controller = $this->uri->segment(1);
			switch ($controller) {
				case 'admin':
				{
					$this->load->helper('admin');
					$this->_check_login();
					
					$this->load->model('admin_model');
					$admin_id = $this->session->userdata('admin_id');
					$admin =  $this->admin_model->get_info($admin_id);

					// lay ra tong so giao dich chua thanh toan
					$this->load->model('transaction_model');
					$input_stt = array();
					$input_stt['where'] = array('status'=>'0');
					$total_stt = $this->transaction_model->get_total($input_stt);
					$this->data['total_stt'] = $total_stt;

					$this->data['admin'] = $admin;
					break;
				}	
					
				default:
				{					
					$this->load->model('product_model');
			        $this->load->model('atribute_model');
			        
					// load contact
        			$this->load->model('contact_model');
			        $contact = $this->contact_model->get_info(16);
			        $this->data['contact'] = $contact;
			        // user
			        if ($this->session->userdata('user_id_login')) {
			        	$this->load->model('user_model');
						$user_id = $this->session->userdata('user_id_login');
						$user =  $this->user_model->get_info($user_id);
						$this->data['user'] = $user;
					}
					// load thu vien gio hang
					$this->load->library('cart');
        			$cart = $this->cart->contents();
        			$total_items = $this->cart->total_items();
					// tong sp trong gio hang
					
					$this->data['cart'] = $cart;
					$this->data['total_items'] = $total_items;
					
					// load menu
					$this->load->model('list_menu_model');
					$this->load->model('menu_model');
					$this->load->model('brand_model');
					$where = array('trangthai' => 1);
					$field = 'id';
					$id_list =  $this->list_menu_model->get_info_rule($where,$field);
					if (!$id_list) {
						
					}else{
						$id_list = $id_list->id;
						
						$input['where'] = array('id_list' => $id_list ,'parent_id' => 0);
						$menu = $this->menu_model->get_list($input);
						foreach ($menu as $row) {

							$input['where'] = array('id_list' => $id_list,'parent_id' => $row->id);
							$result = $this->menu_model->get_list($input);
							$row->result = $result;
							foreach ($result as $key) {
								$id = $key->id;
								$input['where'] = array('id_catalog' => $id);
								$brand = $this->brand_model->get_list($input);
								$key->brand = $brand;
							}
						}
						$this->data['menu'] = $menu;
					}

					// hot deal
		            $where = array('status' => 2);
        			$this->load->model('hotdeal_model');
		            $hotdeal =  $this->hotdeal_model->get_info_rule($where);
		            if ($hotdeal) {
		                $today = date('Y-m-d');

		                $time = explode('-', $hotdeal->time);
						$time = str_replace('/', '-', $time[1]);
						$time = trim($time);
						$time = date("Y-m-d", strtotime($time));
		                if($today == $time || $time < $today) {
		                    $data        = array(
		                        'status'     => 0
		                    );
		                    $this->hotdeal_model->update($hotdeal->id,$data);
		                }else{
		                    $this->data['hotdeal'] = $hotdeal;     
		                }
		            }
		            // load categories for footer
        			$this->load->model('catalog_model');
			        $input['where'] = array('parent_id' => 0);
			        $catalog = $this->catalog_model->get_list($input);
			        $this->data['foot_cate'] = $catalog;

			        //kiem tra user dang nhap chua
			        $user_id_login = $this->session->userdata('user_id_login');
			        $this->data['user_id_login'] = $user_id_login;
			        if ($user_id_login) {
			        	$this->load->model('user_model');
			        	$user_info = $this->user_model->get_info($user_id_login);
			        	$this->data['user_info'] = $user_info;
			        }
			        if ($this->input->post('lang')) {
						$this->config->set_item('language',$this->input->post('lang'));
			        	$this->load_lang();
			    	}else{
			    		$lang = $this->session->userdata('lang');
			    		if (!$lang) {
			    			$lang = $this->config->item('language');
			    			$this->session->set_userdata('lang',$lang);
			    		}
			    		$this->config->set_item('language', $lang);
						$this->lang->load(array('header','footer'),$lang);
			    	}
				}		
			}
		}

		protected function load_lang(){
			$this->session->set_userdata('lang',$this->input->post('lang'));	
			$lang = $this->session->userdata('lang');
			$lang_config = $this->config->item('language');
			$this->lang->load(array('header','footer'),$lang);
		}
		/// check status admin
		private function _check_login(){
			$controller = $this->uri->rsegment('1');
			$controller = strtolower($controller);

			$login = $this->session->userdata('login');
			if (!$login && $controller != 'login') {
				redirect(admin_url('login'));
			}
			if ($login && $controller == 'login') {
				
				redirect(admin_url('home'));
			}
			elseif (!in_array($controller,array('login','home'))) {
				$admin_id = $this->session->userdata('admin_id');
				$admin_root = $this->session->userdata('root_admin');
				$admin_root = $this->config->item('root_admin');
				if ($admin_id != $admin_root) {

					$permissions_admin = $this->session->userdata('permissions');
					$controller = $this->uri->rsegment('1');
					$action 	= $this->uri->rsegment('2');
					$check 		= true;
					if (!isset($permissions_admin->{$controller})) {
						$check  = false;
					}
					$permissions_actions = $permissions_admin->{$controller};
					if (!in_array($action, $permissions_actions)) {
						$check  = false;
					}
					if (!$check) {
						$this->session->set_flashdata('message','Bạn Không Có Quyền Sử Dụng Chức Năng Này');
						redirect(base_url('admin'));
					}

				}
				
			}
		}
	}
?>