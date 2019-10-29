<?php 
	/**
	* 
	*/
	class Catalog extends MY_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('catalog_model');
		}
		// lay danh sach //

		public function index(){
			
			$list = $this->catalog_model->get_list();
			$this->data['list'] = $list;
			foreach ($list as $key) {
				$name_cat_par = $this->catalog_model->get_info($key->parent_id);
				$key->name_cat_par = $name_cat_par;
			}

			//lay noi dung message
			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;

			// load view
			$this->data['temp'] = 'admin/catalog/index';
			$this->load->view('admin/main',$this->data);
		}

		// them du lieu

		public function add(){
			// load thu vien
			$this->load->library('form_validation');
			$this->load->helper('form');
			
			// kiem tra co data post len 
			if ($this->input->post()) {
				$this->form_validation->set_rules('name','name','required');


				if ($this->form_validation->run()) {
					// add database
					$name		 = $this->input->post('name');
					$parent_id   = $this->input->post('parent_id');
					$sort_order  = $this->input->post('sort_order');
					/// lưu du lieu can them
					$data 		 = array(
						'name'	 	 => $name,
						'parent_id'  => $parent_id,
						'sort_order' => intval($sort_order)
					);
					if ($this->catalog_model->create($data)) {

						$this->session->set_flashdata('message','Thêm mới dữ liệu Thành Công');
					}
					else{
						$this->session->set_flashdata('message','Tạo mới dữ liệu Thất Bại');
					}
					// chuyen di 
					redirect(admin_url('catalog'));
				}
				
			}
			// lay danh muc cha
			$input = array();
			$input['where'] = array('parent_id' => 0);
			$list = $this->catalog_model->get_list($input);
			$this->data['list'] = $list;

			$this->data['temp'] = 'admin/catalog/add';
			$this->load->view('admin/main',$this->data);
		}
		/// cap nhat data///
		public function edit(){
			// load thu vien
			$this->load->library('form_validation');
			$this->load->helper('form');
			// lay id //
			$id = $this->uri->rsegment(3);
			$info = $this->catalog_model->get_info($id);

			if (!$info) {
				$this->session->set_flashdata('message','Không tồn tại danh mục này');
				redirect(admin_url('catalog'));
			}
			$this->data['info'] = $info;
			// kiem tra co data post len 
			if ($this->input->post()) {
				$this->form_validation->set_rules('name','name','required');


				if ($this->form_validation->run()) {
					// add database
					$name		 = $this->input->post('name');
					$parent_id   = $this->input->post('parent_id');
					$sort_order  = $this->input->post('sort_order');
					/// lưu du lieu can them
					$data 		 = array(
						'name'	 	 => $name,
						'parent_id'  => $parent_id,
						'sort_order' => intval($sort_order)
					);
					if ($this->catalog_model->update($id,$data)) {

						$this->session->set_flashdata('message','Cập nhật dữ liệu Thành Công');
					}
					else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu Thất Bại');
					}
					// chuyen di 
					redirect(admin_url('catalog'));
				}
				
			}
			// lay danh muc cha
			$input = array();
			$input['where'] = array('parent_id' => 0);
			$list = $this->catalog_model->get_list($input);
			$this->data['list'] = $list;

			$this->data['temp'] = 'admin/catalog/edit';
			$this->load->view('admin/main',$this->data);
		}

		// xoa data //

		public function delete(){
			// lay id //
			$id = $this->uri->rsegment(3);
			$this->_del($id);
			/// thong bao
			$this->session->set_flashdata('message','Xóa Dữ Liệu Thành Công');
			redirect(admin_url('catalog'));
		}

		// xoa nhieu data //

		public function delete_all(){
			$ids = $this->input->post('ids');
			foreach ($ids as $id) {
				$this->_del($id,false);	
			}
		}

		// ham` xoa goi vao

		private function _del($id ,$redirect = true){
			$info = $this->catalog_model->get_info($id);

			if (!$info) {
				$this->session->set_flashdata('message','Không tồn tại danh mục này');
				if ($redirect) {
					redirect(admin_url('catalog'));
				}else{
					return false;
				}
			}
			// kiem tra danh muc co san pham khong
			$this->load->model('product_model');
			$product = $this->product_model->get_info_rule(array('catalog_id' => $id),'id');
			if ($product) {
				$this->session->set_flashdata('message','Danh mục ' .$info->name. ' có chứa sản phẩm, bạn cần phải xóa hết sản phẩm trong danh mục này!');
				if ($redirect) {
					redirect(admin_url('catalog'));
				}else{
					return false;
				}
			}

			$catalog_child = $this->catalog_model->get_info_rule(array('parent_id' => $id),'parent_id');
			if ($catalog_child) {
				$this->session->set_flashdata('message','Danh mục ' .$info->name. ' còn chứa danh mục con, bạn cần phải xóa hết danh mục con trong danh mục này!');
				if ($redirect) {
					redirect(admin_url('catalog'));
				}else{
					return false;
				}
			}
			// xoa du lieu
			$this->catalog_model->delete($id);
		}

		////////////////////////////////////////////////



	}
?>