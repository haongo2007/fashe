<?php 
	/**
	* 
	*/
	class brand extends MY_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('brand_model');
			$this->load->model('catalog_model');
		}
		// lay danh sach //

		public function index(){
			
			$list = $this->brand_model->get_list();
			$this->data['list'] = $list;
			//lay noi dung message
			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;

			// load view
			$this->data['temp'] = 'admin/brand/index';
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
					$sort_order  = $this->input->post('sort_order');

					// lay ten file anh upload len
					$this->load->library('upload_library');
					$upload_path = './public/upload/brand';
					$upload_data = $this->upload_library->upload($upload_path,'logo');
					$image_link = '';
					if (isset($upload_data['file_name'])) {
						$image_link = $upload_data['file_name'];
					}
					/// lưu du lieu can them
					$data 		 = array(
						'name'	 	 => $name,
						'sort_order' => intval($sort_order),
						'logo'		 => $image_link

					);
					if ($this->brand_model->create($data)) {

						$this->session->set_flashdata('message','Thêm mới dữ liệu Thành Công');
					}
					else{
						$this->session->set_flashdata('message','Tạo mới dữ liệu Thất Bại');
					}
					// chuyen di 
					redirect(admin_url('brand'));
				}
				
			}
			// lay danh muc cha
			$list = $this->catalog_model->get_list();
			foreach ($list as $key) {
				$input['where'] = array('parent_id' => $key->id);
				$name_par = $this->catalog_model->get_list($input);
				$key->subs = $name_par;
			}
			$this->data['list'] = $list;

			$this->data['temp'] = 'admin/brand/add';
			$this->load->view('admin/main',$this->data);
		}
		/// cap nhat data///
		public function edit(){
			// load thu vien
			$this->load->library('form_validation');
			$this->load->helper('form');
			// lay id //
			$id = $this->uri->rsegment(3);
			$info = $this->brand_model->get_info($id);

			if (!$info) {
				$this->session->set_flashdata('message','Không tồn tại danh mục này');
				redirect(admin_url('brand'));
			}
			$this->data['info'] = $info;
			// kiem tra co data post len 
			if ($this->input->post()) {
				$this->form_validation->set_rules('name','name','required');


				if ($this->form_validation->run()) {
					// add database
					$name		 = $this->input->post('name');
					$sort_order  = $this->input->post('sort_order');

					// lay ten file anh upload len
					$this->load->library('upload_library');
					$upload_path = './public/upload/brand';
					$upload_data = $this->upload_library->upload($upload_path,'image');
					$image_link = '';
					if (isset($upload_data['file_name'])) {

						$image_link = './public/upload/brand/'.$info->logo;
						if (file_exists($image_link)) {
							unlink($image_link);
						}
						$image_link = $upload_data['file_name'];
					}

					/// lưu du lieu can them
					$data 		 = array(
						'name'	 	 => $name,
						'sort_order' => intval($sort_order),
					);
					if ($image_link != '') {
						$data['logo'] = $image_link;
					}

					if ($this->brand_model->update($id,$data)) {

						$this->session->set_flashdata('message','Cập nhật dữ liệu Thành Công');
					}
					else{
						$this->session->set_flashdata('message','Cập nhật dữ liệu Thất Bại');
					}
					// chuyen di 
					redirect(admin_url('brand'));
				}
				
			}
			// lay danh muc cha
			$list = $this->catalog_model->get_list();
			foreach ($list as $key) {
				$input['where'] = array('parent_id' => $key->id);
				$name_par = $this->catalog_model->get_list($input);
				$key->subs = $name_par;
			}
			$this->data['list'] = $list;

			$this->data['temp'] = 'admin/brand/edit';
			$this->load->view('admin/main',$this->data);
		}

		// xoa data //

		public function delete(){
			// lay id //
			$id = $this->uri->rsegment(3);
			$this->_del($id);
			/// thong bao
			$this->session->set_flashdata('message','Xóa Dữ Liệu Thành Công');
			redirect(admin_url('brand'));
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
			$info = $this->brand_model->get_info($id);

			if (!$info) {
				$this->session->set_flashdata('message','Không tồn tại danh mục này');
				if ($redirect) {
					redirect(admin_url('brand'));
				}else{
					return false;
				}
			}
			// kiem tra danh muc co san pham khong
			$this->load->model('product_model');
			$product = $this->product_model->get_info_rule(array('brand_id' => $id),'id');
			if ($product) {
				$this->session->set_flashdata('message','Danh mục ' .$info->name. ' có chứa sản phẩm, bạn cần phải xóa hết sản phẩm trong danh mục này!');
				if ($redirect) {
					redirect(admin_url('brand'));
				}else{
					return false;
				}
			}
			// xoa du lieu
			$this->brand_model->delete($id);
		}

		////////////////////////////////////////////////



	}
?>