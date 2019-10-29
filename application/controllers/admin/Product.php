<?php 
	/**
	* 
	*/
	class Product extends MY_Controller
	{
		
		function __construct(){
			parent::__construct();
			$this->load->model('product_model');
			$this->load->model('atribute_model');
		}
		public function index(){
			// lay ra tong so luong san pham trong web
			/*$total_rows = $this->product_model->get_total();
			$this->data['total_rows'] = $total_rows;

			// lay danh sach sp
			$link = admin_url('product/index');
			$per_page = 15;
			$uri = 3;
			$params = '';
			$this->load->library('paginate_library');
			$this->paginate_library->paginat($total_rows,$link,$params,$per_page,$uri);
			
			$id = $this->input->get('p');
			if (!$id) {
				$id = 0;
			}
			$input['limit'] = array($per_page,$id);

			$list = $this->product_model->get_list($input);

			$this->data['list'] = $list;
			foreach ($list as $key) {
				$mak = $key->maker_id;
				$where = array('id' => $mak);
				$maker = $this->admin_model->get_info_rule($where,'name');
				$key->maker = $maker;

				$id_p = $key->id;
				$where = array('id_product' => $id_p);
				$attr = $this->atribute_model->get_info_rule($where);
				$key->attr = $attr;
			}*/

			//lay noi dung message
			$message = $this->session->flashdata('message');
			$this->data['message'] = $message;

			// load view
			$this->data['temp'] = 'admin/product/index';
			$this->load->view('admin/main',$this->data);
		}
		public function get_list()
		{
			$totalData = $this->product_model->get_total();
           	$start = $this->input->post('start');
           	$limit = $this->input->post('length');
           	$dir = $this->input->post('order')['0']['dir'];
           	if ($this->input->post('search')["value"]) {
           		$search = $this->input->post('search')["value"];
           		$input['like'] = array('name' , $search);
           		$input['or_like'] = array('price' , $search);
           	}
           	if($this->input->post("order")){  
                $input['order'] = array('id',$dir);
           	}
           	else{  
                $input['order'] = array('id','DESC');  
           	}        	
           	$recordsFiltered = $this->product_model->get_total($input);
           	$input['limit'] = array($limit,$start);
           	$table = $this->product_model->get_list($input);
		    if (count($table) > 0) {	    	
			    foreach ($table as $row) 
			    {
			        $tab = array();
			    	$mak = $row->maker_id;
					$where = array('id' => $mak);
					$maker = $this->admin_model->get_info_rule($where,'name');
					
					$where = array('id_product' => $row->id);
					$attr = $this->atribute_model->get_info_rule($where);

					$image = array_filter(explode('|', $attr->image_list));
					$img = json_decode($image[0]);
					$color = array_filter( explode('|', $attr->name) );
					$link = base_url($attr->path.'300x300/'.$row->title.'/'.$color[0].'/'.$img[0]);

			        $action = '<td><a href="'.admin_url('product/edit/'.$row->id).'" class="tipS " original-title="Chỉnh sửa">
									    <button class="btn bg-olive btn-flat margin"><i class="fa fa-legal"></i></button>
									</a>
									<a href="'.admin_url('product/delete/'.$row->id).'" class="tipS verify_action" original-title="Xóa">
									    <button class="btn bg-red btn-flat margin"><i class="fa fa-close"></i></button>
									</a>
								</td>';
			        $tab["id"] 		= $row->id;
			        $tab['ten_sp']  = $row->name;
			        $tab["img"]		= '<img width="80" class="ima-res" src="'.$link.'">';
			        $tab["color"] 	= $this->get_code_color($row,$attr);
			        $tab["gia"] 	= number_format($row->price).'.đ';
			        $tab["date_created"] 	= get_date($row->updated);
			        $tab["date_update"] 	= get_date($row->created);
			        $tab["user_created"] 	= $maker->name;
			        $tab["hanhdong"] 		= $action;
			        $r_tab[] = $tab; 
			    }        
		    }else{
		    	$tab = array();
		        $tab["id"] 		= '';
		        $tab['ten_sp']  = '';
		        $tab["img"]		= '';
		        $tab["color"] 	= '';
		        $tab["gia"] 	= '';
		        $tab["date_created"] 	= '';
		        $tab["date_update"] 	= '';
		        $tab["user_created"] 	= '';
		        $tab["hanhdong"] 		= '';
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
		private function get_code_color($row='',$attr='')
		{
			$output = '';
			$output .= '<div style="display: flex;flex-wrap: wrap;">';
			$count  = 0;
			$arr_code = array_filter( explode('|', $attr->code));
			$color = array_filter( explode('|', $attr->name));
			$image = array_filter( explode('|', $attr->image_list));
			foreach ($arr_code as $key => $value) {
				$img_list = json_decode($image[$count]);
				$link_list = base_url($attr->path.'300x300/'.$row->title.'/'.$color[$count].'/'.$img_list[0]);
				$output .= '<div class="code" data-img="'.$link_list.'" style="width: 40%;height: 20px;background:'.$value.'"></div>';

				$count ++;
			}
			$output .= '</div>';
			return $output;
		}
// THEM SUA XOA XEM CHI TIET SP
		public function check_name_product(){
			$name 	 = $this->input->post('name');
			$where 		 = array('name' => $name);

			if ($this->product_model->check_exists($where)) {

				$this->form_validation->set_message(__FUNCTION__, 'Sản phẩm đã tồn tại');
				return false;
			}
			return true;
		}
		public function fill_str($value='')
		{
			return trim(str_replace('|', '', $value));
		}
	// them sp
		function add(){
			// lay danh sach danh muc sp //
			$this->load->model('catalog_model');
			$input = array();
			$input['where'] = array('parent_id' => 0);
			$catalogs = $this->catalog_model->get_list($input);
			foreach ($catalogs as $row ) {
				$input['where'] = array('parent_id' => $row->id);
				$subs = $this->catalog_model->get_list($input);
				$row->subs = $subs;
			}
			$this->data['catalogs'] = $catalogs;

			// load tat ca hieu sp
			$this->load->model('brand_model');
			$this->data['brand'] = $this->brand_model->get_list();

			// load thu vien
			$this->load->library('form_validation');
			$this->load->helper('form');
			// kiem tra co data post len 
			if ($this->input->post()) {
				$this->form_validation->set_rules('name','Tên','required|min_length[5]|callback_check_name_product');
				$this->form_validation->set_rules('catalog','Thể loại','required');
				$this->form_validation->set_rules('infomation','Thông Tin','required');
				$this->form_validation->set_rules('content','Mô Tả','required');
				$this->form_validation->set_rules('price','Giá','required');

				if ($this->form_validation->run()) {
					// add database
					$name		= $this->input->post('name');
					$maker 		= $this->session->userdata('admin_id');
					$str 		= $this->input->post('catalog');
					$str 		= explode(',', $str);
					$type_id 	= $str[0];
					$catalog_id	= $str[1];
					$price   	= $this->input->post('price');
					$price 		= str_replace(',','', $price);
					$discount   = $this->input->post('discount');
					$discount 	= str_replace(',','', $discount);
				
					
					$this->load->library('upload_library');

					$name = $this->input->post('name');
					$name_strip = stripUnicode($name);
					$count = intval($this->input->post('count'));
					/* LIST ẢNH */
					$i=1;
					if ($count == 1) {
						$image_list_ = '';
						$size_ = '';
						$color_ = '';
						$code_ = '';
					}
					while ($i <= $count) {
						if ($i == 1) {
							if(is_array($_FILES['image_attr_1']['name']) && strlen($_FILES['image_attr_1']['name'][0]) > 0) {
								if ($this->input->post('color_1') && $this->input->post('size_1')) {						
									// lấy tên sp và màu sắc sp để tạo thư mục
									$color_1 = $this->input->post('color_1');
									$size_1 = $this->input->post('size_1');
									$code_1 = $this->input->post('code_1');
									$path_product =	$this->check_mkdir($name_strip,$color_1);
									$file_name = get_date(now()).'_'.$name_strip.'_'.RandomString();
									$file = $_FILES['image_attr_1'];
									$upload_img_1 = $this->upload_library->upload_more($path_product['original'],$file,$file_name);
									foreach ($upload_img_1 as $img) {
										$this->resize_img($color_1,$name_strip,$img);
									}
									$image_list_1 = json_encode($upload_img_1);
									$size_1 = $this->fill_str($size_1);
									$color_1 = $this->fill_str($color_1);
									$code_1 = $this->fill_str($code_1);
								}else{
									$this->session->set_flashdata('notif','Lỗi Thuộc Tính Sản Phẩm Không Có Giá Trị');
									redirect(admin_url('product/add'));
								}
							}else{
								$this->session->set_flashdata('notif','Lỗi Hình Ảnh Sản Phẩm Là Bắt Buộc');
								redirect(admin_url('product/add'));
							}
						}else{
							if ($this->input->post('color_'.$i) && $this->input->post('size_'.$i)) {
								if(is_array($_FILES['image_attr_'.$i]['name']) && strlen($_FILES['image_attr_'.$i]['name'][0]) > 0) {
									$color_[$i] = $this->input->post('color_'.$i);
									$size_[$i] = $this->input->post('size_'.$i);
									$code_[$i] = $this->input->post('code_'.$i);

									$path_product = $this->check_mkdir($name_strip,$color_[$i]);
									$file = $_FILES['image_attr_'.$i];
									$file_name = get_date(now()).'_'.$name_strip.'_'.RandomString();
									$upload_img_[$i] = $this->upload_library->upload_more($path_product['original'],$file,$file_name);
									foreach ($upload_img_[$i] as $img) {
										$this->resize_img($color_[$i],$name_strip,$img);
									}
									$image_list_[$i] = json_encode($upload_img_[$i]);
									$size_[$i] = $this->fill_str($size_[$i]);
									$color_[$i] = $this->fill_str($color_[$i]);
									$code_[$i] = $this->fill_str($code_[$i]);
								}else{	
									$image_list_[$i] = '|';
									$size_[$i] = '|';
									$color_[$i] = '|';
									$code_[$i] = '|';
								}
							}else{	
									$image_list_[$i] = '|';
									$size_[$i] = '|';
									$color_[$i] = '|';
									$code_[$i] = '|';
							}
						}
						$i++;
					}
					// upload video mota
					$path_product['video'] = $this->check_mkdir($name_strip);
					$upload_vid_data = $this->upload_library->upload($path_product['video']['video'],'video');
					if (isset($upload_vid_data['file_name'])) {
						$video = $upload_vid_data['file_name'];
					}
					else{
						$video = $this->input->post('video');
					}
					/*$image_list = array();
					$image_list = $this->upload_library->upload_more($path_product['mota'],'image_list');
					$image_list = json_encode($image_list);*/

					/// lưu du lieu can them
					$data 		 = array(
						'name'	 	 => $name,
						'title'	 	 => $name_strip,
						/*'image_list' => $image_list,*/
						'maker_id'	 => $maker,
						'catalog_id' => $catalog_id,
						'type_id'	 => $type_id,
						'brand_id'	 => $this->input->post('brand'),
						'price' 	 => $price,
						'video'		 => $video,
						'discount' 	 => $discount,
						'in_stock'	 => $this->input->post('stock'),
						'site_title' => $this->input->post('site_title'),
						'meta_desc'	 => $this->input->post('meta_desc'),
						'meta_key'	 => json_encode($this->input->post('meta_key')),
						'content'	 => $this->input->post('content'),
						'infomation' => $this->input->post('infomation'),
						'updated'	 => 0,
						'created'	 => now(),
					);
					$image_list = $image_list_1.'|'.implode('|', $image_list_);
					$size = $size_1.'|'.implode('|', $size_);
					$color = $color_1.'|'.implode('|', $color_);
					$code = $code_1.'|'.implode('|', $code_);
					if ($this->product_model->create($data)) {
						$id = $this->db->insert_id();
						
 						$data 		 = array(
							'id_product'	=> $id,
							'path'			=> $path_product['pure'],
							'image_list'	=> $image_list,
							'code'			=> $code,
							'name'			=> $color,
							'size'			=> $size,
						);
						$this->atribute_model->create($data);
						$this->session->set_flashdata('message','Thêm mới dữ liệu Thành Công');
					}
					else{
						$this->session->set_flashdata('message','Tạo mới dữ liệu Thất Bại');
					}
					// chuyen di
					redirect(admin_url('product')); 
				}	
			}
			$this->data['temp'] = 'admin/product/add';
			$this->load->view('admin/main',$this->data);

		}

		public function edit(){
			$id = $this->uri->rsegment('3');
			$product = $this->product_model->get_info($id);
			if (!$product) {
				$this->session->set_flashdata('message','Sản Phẩm không tồn tại');
				redirect(admin_url('product'));
			}
			$this->data['product'] = $product;

			$where = array('id_product' => $product->id);
			$attr = $this->atribute_model->get_info_rule($where);
			$this->data['attr'] = $attr;
			
			// lay danh sach danh muc sp //
			$this->load->model('catalog_model');
			$input['where'] = array('parent_id' => 0);
			$catalogs = $this->catalog_model->get_list($input);
			foreach ($catalogs as $row ) {
				$input['where'] = array('parent_id' => $row->id);
				$subs = $this->catalog_model->get_list($input);
				$row->subs = $subs;
			}
			$this->data['catalogs'] = $catalogs;

			// load name brand
			$this->load->model('brand_model');
			$this->data['brand'] = $this->brand_model->get_list();

			// load thu vien validation
			$this->load->library('form_validation');
			$this->load->helper('form');			
			// kiem tra submit  
			if ($this->input->post()) {
				$this->form_validation->set_rules('name','Tên','required|min_length[5]');
				$this->form_validation->set_rules('catalog','Thể loại','required');
				$this->form_validation->set_rules('infomation','Thông Tin','required');
				$this->form_validation->set_rules('content','Mô Tả','required');
				$this->form_validation->set_rules('price','Giá','required');

				$this->load->library('upload_library');
				$name = $this->input->post('name');
				$name_strip = stripUnicode($name);
				$count = intval($this->input->post('count'));

				$old_size = explode('|', $attr->size);
				$old_color = explode('|', $attr->name);
				$old_code = explode('|', $attr->code);
				$old_img = explode('|', $attr->image_list);
				/* UPDATE LIST ẢNH */
				
				if(!empty($_FILES['image_attr_1']['name']) && strlen($_FILES['image_attr_1']['name'][0]) > 0) {
					if ($this->input->post('color_1') && $this->input->post('size_1')) {						
						// lấy tên sp và màu sắc sp để tạo thư mục		
						$size_1 = $this->input->post('size_1');
						$color_1 = $this->input->post('color_1');
						$code_1 = $this->input->post('code_1');
						// progress delete old image						
						$dir = $attr->path.'original/'.$product->title.'/'.$old_color[0].'/';
						$dir_sm = $attr->path.'300x300/'.$product->title.'/'.$old_color[0].'/';
						foreach (json_decode($old_img[0]) as $key => $value) {
							$path_find = $dir.$value;
							if (file_exists($path_find)) {
							    unlink($path_find);
							}
							$path_find_sm = $dir_sm.$value;
							if (file_exists($path_find_sm)) {
							    unlink($path_find_sm);
							}
						}
						if (is_dir($dir)) {
							rmdir($dir);
						}
						if (is_dir($dir_sm)) {
							rmdir($dir_sm);
						}
						if ($product->title != $name_strip) {
							rename($attr->path.'original/'.$product->title, $attr->path.'original/'.$name_strip);
							rename($attr->path.'300x300/'.$product->title, $attr->path.'300x300/'.$name_strip);
							rename($attr->path.'video/'.$product->title, $attr->path.'video/'.$name_strip);
						}
						// progress up new image
						mkdir($attr->path.'original/'.$name_strip.'/'.$color_1, 0777, TRUE);
						mkdir($attr->path.'300x300/'.$name_strip.'/'.$color_1, 0777, TRUE);
						$path_product = $attr->path.'original/'.$name_strip.'/'.$color_1;
						$file_name = get_date(now()).'_'.$name_strip.'_'.RandomString();
						$file = $_FILES['image_attr_1'];
						$upload_img_1 = $this->upload_library->upload_more($path_product,$file,$file_name);
						foreach ($upload_img_1 as $img) {
							$this->resize_img($color_1,$name_strip,$img);
						}
						$image_list_1 = json_encode($upload_img_1);
						$size_1 = $size_1;
						$color_1 = $color_1;
						$code_1 = $code_1;
					}else{
						$this->session->set_flashdata('notif','Lỗi Thuộc Tính Sản Phẩm Không Có Giá Trị');
						redirect(admin_url('product/edit/'.$id));
					}
				}else{				
					// case do not exits file
					if ($this->input->post('color_1') && $this->input->post('size_1')) {
						if ($product->title != $name_strip) {
							rename($attr->path.'original/'.$product->title, $attr->path.'original/'.$name_strip);
							rename($attr->path.'300x300/'.$product->title, $attr->path.'300x300/'.$name_strip);
							rename($attr->path.'video/'.$product->title, $attr->path.'video/'.$name_strip);
						}
						if ($old_img[0] == '') {					
							$this->session->set_flashdata('notif','Lỗi Hình Ảnh Sản Phẩm Là Bắt Buộc');
							redirect(admin_url('product/edit'.$id));
						}else{
							$color_1 = $this->input->post('color_1');
							if ($color_1 != $old_color[0]) {
							rename($attr->path.'original/'.$product->title.'/'.$old_color[0], $attr->path.'original/'.$name_strip.'/'.$color_1);
							rename($attr->path.'300x300/'.$product->title.'/'.$old_color[0], $attr->path.'300x300/'.$name_strip.'/'.$color_1);
							}
							$image_list_1 = $old_img[0];
							$size_1 = $this->input->post('size_1');
							$color_1 = $color_1;
							$code_1 = $this->input->post('code_1');
						}
					}else{
						$this->session->set_flashdata('notif','Lỗi Thuộc Tính Sản Phẩm Không Có Giá Trị');
						redirect(admin_url('product/edit/'.$id));
					}
				}
				// UPDATE LIST IMAGE 2 + 
				$i = 2;
				while ($i <= $count) {
					$k = $i - 1;
					if ($this->input->post('color_'.$i) && $this->input->post('size_'.$i)) {
						if(is_array($_FILES['image_attr_'.$i]['name']) && strlen($_FILES['image_attr_'.$i]['name'][0]) > 0) {
							// lấy tên sp và màu sắc sp để tạo thư mục		
							$size_[$i] = $this->input->post('size_'.$i);
							$color_[$i] = $this->input->post('color_'.$i);
							$code_[$i] = $this->input->post('code_'.$i);
							// progress delete old image
							if ($i > intval(count($old_color))) {
								mkdir($attr->path.'original/'.$name_strip.'/'.$color_[$i], 0777, TRUE);
								mkdir($attr->path.'300x300/'.$name_strip.'/'.$color_[$i], 0777, TRUE);
							}else{
								$dir = $attr->path.'original/'.$product->title.'/'.$old_color[$k].'/';
								$dir_sm = $attr->path.'300x300/'.$product->title.'/'.$old_color[$k].'/';
								foreach (json_decode($old_img[$k]) as $key => $value) {
									$path_find = $dir.$value;
									if (file_exists($path_find)) {
									    unlink($path_find);
									}
									$path_find_sm = $dir_sm.$value;
									if (file_exists($path_find_sm)) {
									    unlink($path_find_sm);
									}
								}
								if (is_dir($dir)) {
									rmdir($dir);
								}
								if (is_dir($dir_sm)) {
									rmdir($dir_sm);
								}
								if ($color_[$id] != $old_color[$k]) {
									rename($attr->path.'original/'.$product->title.'/'.$old_color[$k], $attr->path.'original/'.$name_strip.'/'.$color_[$i]);
									rename($attr->path.'300x300/'.$product->title.'/'.$old_color[$k], $attr->path.'300x300/'.$name_strip.'/'.$color_[$i]);
								}
								// progress up new image
								mkdir($attr->path.'original/'.$name_strip.'/'.$color_[$i], 0777, TRUE);
								mkdir($attr->path.'300x300/'.$name_strip.'/'.$color_[$i], 0777, TRUE);
							}
							$path_product = $attr->path.'original/'.$name_strip.'/'.$color_[$i];
							$file_name = get_date(now()).'_'.$name_strip.'_'.RandomString();
							$file = $_FILES['image_attr_'.$i];
							$upload_img_[$i] = $this->upload_library->upload_more($path_product,$file,$file_name);
							foreach ($upload_img_[$i] as $img) {
								$this->resize_img($color_[$i],$name_strip,$img);
							}

							$image_list_[$i] = json_encode($upload_img_[$i]);
							$size_[$i] = $size_[$i];
							$color_[$i] = $color_[$i];
							$code_[$i] = $code_[$i];
						}else{
							$size_[$i] = $this->input->post('size_'.$i);
							$color_[$i] = $this->input->post('color_'.$i);
							$code_[$i] = $this->input->post('code_'.$i);
							if ($old_img[$k] == '') {
								$image_list_[$i] = '';
								$size_[$i] = '';
								$color_[$i] = '';
								$code_[$i] = '';
							}else{
								if ($old_size[$k] != $size_[$i]) {
									$size_[$i] = $size_[$i];
								}else{
									$size_[$i] = $old_size[$k];
								}
								if ($old_color[$k] != $color_[$i]) {
								rename($attr->path.'original/'.$product->title.'/'.$old_color[$k], $attr->path.'original/'.$name_strip.'/'.$color_[$i]);
								rename($attr->path.'300x300/'.$product->title.'/'.$old_color[$k], $attr->path.'300x300/'.$name_strip.'/'.$color_[$i]);
									$color_[$i] = $color_[$i];
								}else{
									$color_[$i] = $old_color[$k];
								}
								if ($old_code[$k] != $code_[$i]) {
									$code_[$i] = $code_[$i];
								}else{
									$code_[$i] = $old_code[$k];
								}
								$image_list_[$i] = $old_img[$k];
							}
						}
					}else{
						// case do not exits file
						if ($old_img[$k] == '') {					
							$image_list_[$i] = '';
							$size_[$i] = '';
							$color_[$i] = '';
							$code_[$i] = '';
						}else{
							$color_[$i] = $old_color[$k];
							$image_list_[$i] = $old_img[$k];
							$size_[$i] = $old_size[$k];
							$code_[$i] = $old_code[$k];
						}
					}
					$i++;
				}
				// upload video mota
				$path_vd = $attr->path.'video/'.$name_strip;
				$upload_vid_data = $this->upload_library->upload($path_vd,'video');
				if (empty($upload_vid_data['file_name'])) {
					if ($this->input->post('video') == '') {

					}else{
						$video = $this->input->post('video');
						$str = strstr($product->video,'mp4');
						if ($str = 'mp4') {
							$vid_link = $path_vd.'/'.$product->video;
							if (file_exists($vid_link)) {
								unlink($vid_link);
							}
						}
					}
										
				}else{
					$video = $upload_vid_data['file_name'];
					$vid_link = $path_vd.'/'.$product->video;
					if (file_exists($vid_link)) {
						unlink($vid_link);
					}
				}
				if ($this->form_validation->run()) {
					// add database
					$str 		= explode(',', $this->input->post('catalog'));
					$type_id 	= $str[0];
					$catalog_id	= $str[1];
					$price 		= str_replace(',','', $this->input->post('price'));
					$discount 	= str_replace(',','', $this->input->post('discount'));
					/// lưu du lieu can them
					$data 		 = array(
						'name'	 	 => $name,
						'title'	 	 => $name_strip,
						'maker_id'	 => $this->session->userdata('admin_id'),
						'catalog_id' => $catalog_id,
						'type_id' 	 => $type_id,
						'brand_id' 	 => $this->input->post('brand'),
						'price' 	 => $price,
						'discount' 	 => $discount,
						'in_stock'	 => $this->input->post('stock'),
						'infomation' => $this->input->post('infomation'),
						'site_title' => $this->input->post('site_title'),
						'meta_desc'	 => $this->input->post('meta_desc'),
						'meta_key'	 => json_encode($this->input->post('meta_key')),
						'content'	 => $this->input->post('content'),
						'updated'    => now()
					);
					if ($video != '') {
						$data['video'] = $video;
					}
					$image_list = $image_list_1.'|'.implode('|', $image_list_);
					$code = $code_1.'|'.implode('|', $code_);
					$size = $size_1.'|'.implode('|', $size_);
					$color = $color_1.'|'.implode('|', $color_);
					$data_attr 		 = array(
						'image_list'	=> $image_list,
						'code'			=> $code,
						'name'			=> $color,
						'size'		=> $size,
					);
					$this->atribute_model->update($attr->id,$data_attr);

					if ($this->product_model->update($product->id,$data)) {

						$this->session->set_flashdata('message','Thay đổi dữ liệu Thành Công');
					}
					else{
						$this->session->set_flashdata('message','Thay đổi dữ liệu Thất Bại');
					}
					// chuyen di 
					redirect(admin_url('product'));
				}
				
			}

			$this->data['temp'] = 'admin/product/edit';
			$this->load->view('admin/main',$this->data);

		}

		function delete(){
			$id = $this->uri->rsegment('3');
			$this->_del($id);
			$this->session->set_flashdata('message','Xóa Dữ Liệu Thành Công');
			redirect(admin_url('product'));
		}

		private function _del($id){
			$product = $this->product_model->get_info($id);
			if (!$product) {
				$this->session->set_flashdata('message','Sản Phẩm không tồn tại');
				redirect(admin_url('product'));
			}
			$where = array('id_product' => $id);
			$attr = $this->atribute_model->get_info_rule($where);
			$arr_img = explode('|', $attr->image_list);
			$color_1r = explode('|', $attr->name);
			// xoa cac anh kem theo sp
			$dir_pro = $attr->path.'original/'.$product->title;
			$dir_pro_sm = $attr->path.'300x300/'.$product->title;
			$i = 0;
			foreach ($color_1r as $key => $value) {
				$decod = json_decode($arr_img[$i]);

				$dir = $attr->path.'original/'.$product->title.'/'.$value;
				$dir_img_sm = $attr->path.'300x300/'.$product->title.'/'.$value;

				foreach ($decod as $key => $res) {
					$res = rtrim($res);
					$file = $dir.'/'.$res;
					if (file_exists($file)) {
					    unlink($file);
					}
					$file_sm = $dir_img_sm.'/'.$res;
					if (file_exists($file_sm)) {
					    unlink($file_sm);
					}
				}
				if (is_dir($dir)) {
					rmdir($dir);
				}
				if (is_dir($dir_img_sm)) {
					rmdir($dir_img_sm);
				}
			$i++;}
			if (is_dir($dir_pro)) {
				rmdir($dir_pro);
			}
			if (is_dir($dir_pro_sm)) {
				rmdir($dir_pro_sm);
			}
			// xoa video mota
			if (strstr($product->video, '.mp4')) {
				$dir_vd = $attr->path.'video/'.$product->title;
				$video_link = $dir_vd.'/'.$product->video;
				if (file_exists($video_link)) {
					unlink($video_link);
					rmdir($dir_vd);
				}
			}
			
			$this->product_model->delete($id);
			$this->atribute_model->del_rule($where);
		}

		public function del_img(){
			$id = $this->input->post('id');
			$po = $this->input->post('po');
			$name = $this->input->post('nam');
			$mau = $this->input->post('mau');
			$attr = $this->atribute_model->get_info($id);


			$arr_img = explode('|', $attr->image_list);
			$decod = json_decode($arr_img[$po]);
			/* change data img */
			$dir = $attr->path.'original/'.$name.'/'.$mau;
			$dir_img_sm = $attr->path.'300x300/'.$name.'/'.$mau;

			foreach ($decod as $key => $value) {
				$value = rtrim($value);
				$file = $dir.'/'.$value;
				if (file_exists($file)) {
				    unlink($file);
				}
				$file_sm = $dir_img_sm.'/'.$value;
				if (file_exists($file_sm)) {
				    unlink($file_sm);
				}
			}
			if (is_dir($dir)) {
				rmdir($dir);
			}
			if (is_dir($dir_img_sm)) {
				rmdir($dir_img_sm);
			}			
			unset($arr_img[$po]);
			ksort($arr_img);
			$arr_img = array_values($arr_img);
			$str_img = implode('|', $arr_img).'|';

			/* change data name */
			$ar_name = $attr->name;
			$arr_name = explode('|', $ar_name);
			unset($arr_name[$po]);
			ksort($arr_name);
			$arr_name = array_values($arr_name);
			$str_name = implode('|', $arr_name).'|';

			/* change data code */
			$ar_code = $attr->code;
			$arr_code = explode('|', $ar_code);
			unset($arr_code[$po]);
			ksort($arr_code);
			$arr_code = array_values($arr_code);
			$str_code = implode('|', $arr_code).'|';

			/* change data code */
			$ar_size = $attr->size;
			$arr_size = explode('|', $ar_size);
			unset($arr_size[$po]);
			ksort($arr_size);
			$arr_size = array_values($arr_size);
			$str_size = implode('|', $arr_size).'|';

			$data_attr	= array(
				'image_list'	=> $str_img,
				'code'			=> $str_code,
				'name'			=> $str_name,
				'size'			=> $str_size,
			);
			if ($this->atribute_model->update($attr->id,$data_attr)) {
				echo '1';
			}else{
				echo '2';
			}
			
			
		}
		public function search_ajax(){
			if ($this->input->post('key')) {
				$val = $this->input->post('key');
				$input['like'] = array('name',$val);
				$input['limit'] = array('10','0');
				$list = $this->product_model->get_list($input);
				foreach ($list as $key) {
					$mak = $key->maker_id;
					$where = array('id' => $mak);
					$maker = $this->admin_model->get_info_rule($where,'name');
					$key->maker = $maker;

					$id_p = $key->id;
					$where = array('id_product' => $id_p);
					$attr = $this->atribute_model->get_info_rule($where);
					$key->attr = $attr;
				}
				$val =  $this->ajax_content($list);
				echo $val;
			}
			if ($this->input->post('all')) {
				$input['limit'] = array('15','0');
				$list = $this->product_model->get_list($input);
				foreach ($list as $key) {
					$mak = $key->maker_id;
					$where = array('id' => $mak);
					$maker = $this->admin_model->get_info_rule($where,'name');
					$key->maker = $maker;

					$id_p = $key->id;
					$where = array('id_product' => $id_p);
					$attr = $this->atribute_model->get_info_rule($where);
					$key->attr = $attr;
				}
				$val =  $this->ajax_content($list);
				echo $val;
			}
			
		}

		private function resize_img($mau = '',$folder_name = '',$f_name = '',$path_pro = ''){
			$name_path_img_small = '300x300/'.$folder_name.'/'.$mau;
			$original = 'original/'.$folder_name.'/'.$mau.'/';
			if ($path_pro !== '') {
				$path_small_img = $path_pro.$name_path_img_small;
				$path = $path_pro.$original.$f_name;
			}else{
				$f_path = './public/upload/product/';
				$year = date('Y').'/';
		        $month = date('m').'/';
				$path_small_img = $f_path.$year.$month.$name_path_img_small;
	        	$path = $f_path.$year.$month.$original.$f_name;
			}
        	$this->load->library('image_lib');
	        
	        $configrez2['image_library'] = 'gd2';
	        $configrez2['new_image'] = $path_small_img;
	        $configrez2['source_image'] = $path;
	        $configrez2['create_thumb'] = FALSE;
	        $configrez2['maintain_ratio'] = TRUE;
	        $configrez2['width'] = "300";
	        $configrez2['height'] = "300";
	        $this->image_lib->initialize($configrez2);
	        $this->image_lib->resize();
		}

		private function check_mkdir($name = '',$mau = ''){
			$original = 'original/'.$name.'/'.$mau;
        	$name_path_img_small = '300x300/'.$name.'/'.$mau;
			$year = date('Y').'/';
	        $month = date('m').'/';
	        $f_path = './public/upload/product/';
	        $name_path_video = 'video/'.$name;
			if (!is_dir($f_path.$year)) {
	            mkdir($f_path . $year, 0777, TRUE);
	            if (!is_dir($f_path.$year.$month)) {
	                mkdir($f_path.$year.$month.$original, 0777, TRUE);
	                mkdir($f_path.$year.$month.$name_path_img_small, 0777, TRUE);
	                mkdir($f_path.$year.$month.$name_path_video, 0777, TRUE);
	                $pure_path = $f_path.$year.$month;
	                $video_path = $f_path.$year.$month.$name_path_video;
	                $ori_path = $f_path.$year.$month.$original;
	                $arr_path = array('original' => $ori_path,'pure' => $pure_path, 'video' => $video_path);
	            }else{
	                $pure_path = $f_path.$year.$month;
	                $video_path = $f_path.$year.$month.$name_path_video;
	                $ori_path = $f_path.$year.$month.$original;
	                $arr_path = array('original' => $ori_path,'pure' => $pure_path, 'video' => $video_path);
	            }
	            return $arr_path;
	        }else{
	            if (!is_dir($f_path.$year.$month)) {
	                mkdir($f_path.$year.$month.$original, 0777, TRUE);
	                mkdir($f_path.$year.$month.$name_path_img_small, 0777, TRUE);
	                mkdir($f_path.$year.$month.$name_path_video, 0777, TRUE);
	                $pure_path = $f_path.$year.$month;
	                $video_path = $f_path.$year.$month.$name_path_video;
	                $ori_path = $f_path.$year.$month.$original;
	                $arr_path = array('original' => $ori_path,'pure' => $pure_path, 'video' => $video_path);
	            }else{
	                $pure_path = $f_path.$year.$month;
	                $video_path = $f_path.$year.$month.$name_path_video;
	                $ori_path = $f_path.$year.$month.$original;
	                if (!is_dir($video_path)) {
	                	mkdir($video_path, 0777, TRUE);
	                }
	                if (!is_dir($f_path.$year.$month.$original)) {
	                	mkdir($ori_path, 0777, TRUE);
	                	mkdir($f_path.$year.$month.$name_path_img_small, 0777, TRUE);
	                	$arr_path = array('color' => $ori_path);
	                }
	                $arr_path = array('original' => $ori_path,'pure' => $pure_path, 'video' => $video_path);
	            }
	            return $arr_path;
	        }
		}

		private function ajax_content($list){
			$res = '';
			foreach ($list as $row) {
				$img = $row->attr->image;
				$img = array_filter (explode(',', $img));

				$code = $row->attr->code;
				$code = array_filter( explode(',', $code) );
				$i = 0;
				$data['row'] = $row;
				$this->load->view('admin/ajax/product_search',$data);
			}
		}
	}
?>