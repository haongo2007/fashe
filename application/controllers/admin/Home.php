<?php 
	
	class Home extends MY_Controller
	{
		
		public function index()
		{
			$this->load->model('transaction_model');
			$this->load->model('product_model');
			$this->load->model('news_model');
			$this->load->model('user_model');
			
// PHAN TRANG
			// load thu vien phan trang//

/*			$this->load->library('pagination');
			// cau hinh phan trang
			$config = array();
			$config['total_rows'] = $total_rows;// tong tat ca san pham trong web
			$config['base_url']	  = admin_url('transaction/index'); // link hien thi ra
			$config['per_page']	  = 4; // so luong sp hien thi 1 trang
			$config['uri_segment']= 4; // phan doan thu 4 tren url
			$config['next_link']  = 'Trang kế';
			$config['prev_link']  = 'Trang trước';
			/// khoi tao phan trang
			$this->pagination->initialize($config);

			$segment = $this->uri->segment(4);
			$segment = intval($segment);
			$input = array();
			$input['limit'] = array($config['per_page'],$segment); 
*/




			$input = array();
			$input['order'] = array('status','ASC');

			// lay danh sach sp

			$list = $this->transaction_model->get_list($input);
			$this->data['list'] = $list;

			// lay ra tong so giao dich
			$total_gi = $this->transaction_model->get_total();
			$this->data['total_gi'] = $total_gi;

			// lay tong so sp
			$total_pr = $this->product_model->get_total();
			$this->data['total_pr'] = $total_pr;

			// lay tong so bai viet
			$total_ne = $this->news_model->get_total();
			$this->data['total_ne'] = $total_ne;

			// lay tong so user
			$total_us= $this->user_model->get_total();
			$this->data['total_us'] = $total_us;

			// tinh tong doanh so	

			$total_sales = $this->transaction_model->get_sum('amount');
			$this->data['total_sales'] = $total_sales;

			// tinh tong doanh so hom nay
			$today_list = $this->transaction_model->get_list();
			$this->data['today_list'] = $today_list;
			
			
			//lay noi dung message
			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;

			// load view
			
			$this->data['temp'] = 'admin/home/index';
			$this->load->view('admin/main',$this->data);
		}
		
		// dang xuat

		public function logout(){
			if ($this->session->userdata('login')) {
				$this->session->unset_userdata('login');
			}
			redirect(base_url());
		}
	}
?>