<?php 
	/**
	* 
	*/
	class Upload_library 
	{
		var $CI = '';
		function __construct()
		{
			$this->CI = & get_instance();
		}
// duong dan luu file & ten the input upload
		function upload($upload_path = '',$file_name = '',$name = ''){
			$config = $this->config($upload_path,$name);
			$this->CI->load->library('upload',$config);
			$this->CI->upload->initialize($config);
			if ($this->CI->upload->do_upload($file_name)) {
				$data = $this->CI->upload->data();
				return $data;
			}
			else{
				
			}
		}

		function upload_directory($path = '')
		{
			if(!empty($_FILES['file']['name'])){ 
			// Set preference 
			$config['upload_path'] = $path; 
			$config['allowed_types'] = 'zip'; 
			$config['max_size'] = '5120'; // max_size in kb (5 MB) 
			$config['file_name'] = $_FILES['file']['name'];

			// Load upload library 
			$this->CI->load->library('upload',$config);

			// File upload
				if($this->CI->upload->do_upload('file')){ 
				// Get data about the file
				$uploadData = $this->CI->upload->data();
				$filename = $uploadData['file_name'];

					$zip = new ZipArchive;
					$res = $zip->open($path.'/'.$filename);
					if ($res === TRUE) {

						// Unzip path
						$extractpath = $path;

						// Extract file
						$zip->extractTo($extractpath);
						$zip->close();
						$link = $path.'/'.$filename;
						if (file_exists($link)) {
							unlink($link);
						}
					}
				}
			}
		}
		function upload_more($upload_path = '',$file = '',$name = ''){
			// lay tt cau hinh 
			$config = $this->config($upload_path,$name);
			//lưu biến môi trường khi thực hiện upload
	        $file  = $file;
	        $count = count($file['name']);
	        //lấy tổng số file được upload
	        $image_list = array();// luu cac file anh up load
	        for($i=0; $i<=$count-1; $i++) {
              
	          $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
	          $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
	          $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
	          $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
	          $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
	          //load thư viện upload và cấu hình
	        	$this->CI->load->library('upload', $config);
				$this->CI->upload->initialize($config);
	          //thực hiện upload từng file 
         		if($this->CI->upload->do_upload()){
	            //nếu upload thành công thì lưu toàn bộ dữ liệu
	            $data = $this->CI->upload->data();
	            //in cấu trúc dữ liệu của các file
	            $image_list[] = $data['file_name'];
	          	}
         	}
         	return $image_list;
		}

//Khai bao bien cau hinh
		function config($upload_path = '',$name = ''){

         $config = array();
         //thuc mục chứa file
         $config['upload_path']   = $upload_path;
         //Định dạng file được phép tải
         $config['allowed_types'] = 'jpg|png|gif|mp4';
         //Dung lượng tối đa
         $config['max_size']      = '';
         //Chiều rộng tối đa
         $config['max_width']     = '2056';
         //Chiều cao tối đa
         $config['max_height']    = '2056';
         //load thư viện upload
         $config['file_name']    = $name;
         //load thư viện upload
         return $config;
		}
	}
?>