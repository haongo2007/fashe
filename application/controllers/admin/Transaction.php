<?php 
		class Transaction extends MY_Controller
	{
		
		function __construct(){
			parent::__construct();
			$this->load->model('transaction_model');
			$this->load->model('order_model');
			$this->load->model('product_model');
		}
		// danh sach giao dich
		public function index(){
			// lay danh sach sp
			$list = $this->transaction_model->get_list();
			$this->data['list'] = $list;
			
			//lay noi dung message
			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;

			// load view
			$this->data['temp'] = 'admin/transaction/index';
			$this->load->view('admin/main',$this->data);
		}
		public function get_list(){
			$totalData = $this->transaction_model->get_total();
           	$start = $this->input->post('start');
           	$limit = $this->input->post('length');
           	$dir = $this->input->post('order')['0']['dir'];
           	if ($this->input->post('search')["value"]) {
           		$search = $this->input->post('search')["value"];
           		$input['like'] = array('user_name' , $search);
           		$input['or_like'] = array('user_email' , $search);
           	}
           	if($this->input->post("order")){
                $input['order'] = array('id',$dir);
           	}
           	else{  
                $input['order'] = array('status','ASC'); 
           	}        	
           	$recordsFiltered = $this->transaction_model->get_total($input);
           	$input['limit'] = array($limit,$start);
           	$table = $this->transaction_model->get_list($input);
		    if (count($table) > 0) {	    	
			    foreach ($table as $row) 
			    {
			        $tab = array();
			        if($row->status == 0){
						$status = "<strong class='text-yellow'>Chưa Thanh Toán</strong>";
					}elseif($row->status == 1){
						$status = "<strong class='text-green'>Đã Thanh Toán</strong>";
					}else{
						$status = "<strong class='text-red'>Đã Hủy Bỏ</strong>";
					}
					$action = '<button type="button" data-id="'.$row->id.'" class="get_order btn btn-default" data-toggle="modal" data-target="#modal-default" data-url="'.admin_url('transaction/get_order').'"><i class="fa fa-eye"></i></button>';
					if($row->status != 1) {
						$action .= '<a href="'.admin_url('transaction/update/'.$row->id.'/transact').'"><button type="button" class="btn btn-success"><i class="fa fa-money"></i></button></a>';
					}if($row->status == 0){
						$action .= '<a href="'.admin_url('transaction/update/'.$row->id.'/transact/destroy').'"><button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>';
					}
			        $tab["status"] 		= $status;
			        $tab['ptt']    		= $row->payment;
			        $tab["user_name"]	= $row->user_name;
			        $tab["user_mail"] 	= $row->user_email;
			        $tab["sdt"] 		= $row->user_phone;
			        if ($row->payment == 'Paypal') {
			        	$curency = '.$';
			        }else{
			        	$curency = '.đ';
			        }
			        $tab["tongtien"] 	= number_format($row->amount).$curency;
			        $tab["diachi"] 		= $row->citi.'/'.$row->user_address;
			        $tab["thoigian"] 	= get_date($row->created);
			        $tab["hanhdong"] 	= $action;
			        $r_tab[] = $tab; 
			    }        
		    }else{
		    	$tab = array();
		        $tab["id"] = '';
		        $tab["status"] = '';
		        $tab["email"] = '';
		        $tab["user"] = '';
		        $r_tab[] = $tab; 
		    }
		    $output = array(
		    	"draw"			=> intval($this->input->post('draw')),
		    	"recordsTotal"	=> intval($totalData),
		    	"recordsFiltered" => intval($recordsFiltered),
		        "data" =>  $r_tab
		    );

		    echo json_encode($output);  
			
		}
		public function update(){
			$id = $this->uri->rsegment(3);
			
			$data 	= array('status' => 1);
			if ($this->uri->rsegment(4) == 'destroy') {
				$data 	= array('status' => 2);
			}
			$where = array('transaction_id' => $id);
			$this->order_model->update_rule($where,$data);
			
			if ($this->uri->rsegment(4) == 'transact') {
				$where = array('id' => $id);
				if ($this->uri->rsegment(5) == 'destroy') {
					$data 	= array('status'	 => 2);
				}
				$this->transaction_model->update_rule($where,$data);
			}
			redirect(admin_url('transaction'));
		}
		public function get_order(){
			$id = $this->input->post('or');
			$this->load->model('atribute_model');

			$input['where'] = array('transaction_id' => $id);
			$order = $this->order_model->get_list($input);
			$this->data['order'] = $order;
			$this->load->view('admin/ajax/order_info',$this->data);
		}

		
	}
?>