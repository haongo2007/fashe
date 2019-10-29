<?php 
	/**
	* 
	*/
	class Upload extends MY_Controller
	{
		
		function index()
		{
			if ($this->input->post('submit')) {
				$this->load->library('upload_library');
				$upload_path = './upload/user';
				$data = $this->upload_library->upload($upload_path,'image');
			}
			$this->data['temp'] = 'admin/upload/index';
			$this->load->view('admin/main',$this->data);
			
		}
		function upload_more()
		{	
			if($this->input->post('submit'))
	  		{
	         	$this->load->library('upload_library');
	         	$upload_path = './upload/user';
	         	$data = $this->upload_library->upload_more($upload_path,'image_list'); 
	 		}

			$this->data['temp'] = 'admin/upload/upload_more';
			$this->load->view('admin/main',$this->data);
		}
	}
?>