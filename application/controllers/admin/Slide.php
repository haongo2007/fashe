
<?php 
	/**
	* 
	*/
	class Slide extends MY_Controller
	{
		
		function __construct(){
			parent::__construct();
			$this->load->model('slide_model');
		}

		public function index(){
			$input = array();

			// lay danh sach slide
			$input['order'] = array('sort_order','ASC');
			$list = $this->slide_model->get_list($input);
			$this->data['list'] = $list;

			//lay noi dung message
			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;

			// load view
			$this->data['temp'] = 'admin/slide/index';
			$this->load->view('admin/main',$this->data);
		}

// THEM SUA XOA XEM CHI TIET bai viet
	// them sp
		public function add(){

			// load thu vien
			$this->load->library('form_validation');
			$this->load->helper('form');
			
			// kiem tra co data post len 
			if ($this->input->post()) {
				$this->form_validation->set_rules('name','tên slide','required');

				if ($this->form_validation->run()) {
					
					// lay ten file anh upload len
					$this->load->library('upload_library');
					$upload_path = './public/upload/slide';
					$upload_data = $this->upload_library->upload($upload_path,'image');
					$image_link = '';
					if (isset($upload_data['file_name'])) {
						$image_link = $upload_data['file_name'];
					}

					/// lưu du lieu can them
					$data 		 = array(
						'name'	 	 => $this->input->post('name'),
						'image_link' => $image_link,
						'link'	 => $this->input->post('link'),
						'info'	 => $this->input->post('info'),
						'sort_order'	 => $this->input->post('sort_order'),
					);
					if ($this->slide_model->create($data)) {

						$this->session->set_flashdata('message','Thêm Dữ Liệu Thành Công');
					}
					else{
						$this->session->set_flashdata('message','Thêm Dữ Liệu Thất Bại');
					}
					// chuyen di 
					redirect(admin_url('slide'));
				}
				
			}

			$this->data['temp'] = 'admin/slide/add';
			$this->load->view('admin/main',$this->data);

		}

		public function edit(){
			$id = $this->uri->rsegment('3');
			$slide = $this->slide_model->get_info($id);
			if (!$slide) {
				$this->session->set_flashdata('message','slide không tồn tại');
				redirect(admin_url('slide'));
			}
			$this->data['slide'] = $slide;

			// load thu vien
			$this->load->library('form_validation');
			$this->load->helper('form');
			
			// kiem tra co data post len 
			if ($this->input->post()) {
				$this->form_validation->set_rules('name','Tên slide','required');

				if ($this->form_validation->run()) {
					// lay ten file anh upload len
					$this->load->library('upload_library');
					$upload_path = './public/upload/slide';
					$upload_data = $this->upload_library->upload($upload_path,'image');
					$image_link = '';
					if (isset($upload_data['file_name'])) {
						$image_link = $upload_data['file_name'];
					}
					/// lưu du lieu can them
					$data 		 = array(
						'name'	 	 => $this->input->post('name'),
						'link'	 => $this->input->post('link'),
						'info'	 => $this->input->post('info'),
						'sort_order'	 => $this->input->post('sort_order'),
					);
					if ($image_link != '') {
						$data['image_link'] = $image_link;
					}
					if ($this->slide_model->update($slide->id,$data)) {

						$this->session->set_flashdata('message','Thay Đổi Dữ Liệu Thành Công');
					}
					else{
						$this->session->set_flashdata('message','Thay Đổi Dữ Liệu Thất Bại');
					}
					// chuyen di 
					redirect(admin_url('slide'));
				}
				
			}

			$this->data['temp'] = 'admin/slide/edit';
			$this->load->view('admin/main',$this->data);

		}

		public function delete(){
			$id = $this->uri->rsegment('3');
			$this->_del($id);
			$this->session->set_flashdata('message','Xóa Dữ Liệu Thành Công');
			redirect(admin_url('slide'));
		}

		public function delete_all(){
			$ids = $this->input->post('ids');
			foreach ($ids as $id) {
				$this->_del($id);
			}
		}

		private function _del($id){
			$slide = $this->slide_model->get_info($id);

			if (!$slide) {
				$this->session->set_flashdata('message','slide không tồn tại');
				redirect(admin_url('slide'));
			}
			$this->slide_model->delete($id);
			$image_link = './public/upload/slide/'.$slide->image_link;
			if (file_exists($image_link)) {
				unlink($image_link);
			}
		}

	}
?>