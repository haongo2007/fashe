<?php
class Home extends MY_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('catalog_model');
        $this->load->model('slide_model');
    }
    function index(){
        // slide
        $input['order'] = array('sort_order','ASC');
        $list = $this->slide_model->get_list($input);
        $this->data['list_sli'] = $list;
        // load product categories
            $where['where'] = array('parent_id' => 0);
            $where['limit'] = array('4','0');
            $catalog = $this->catalog_model->get_list($where);
            foreach ($catalog as $key) {
                $where_pr['where'] = array('type_id' => $key->id);
                $where_pr['limit'] = array('1','0');
                $product = $this->product_model->get_list($where_pr);
                $key->product = $product;
                foreach ($product as $val) {                   
                    $where_attr = array('id_product' => $val->id);
                    $attr = $this->atribute_model->get_info_rule($where_attr);
                    $val->attr = $attr;
                }
            }
            $this->data['catalog'] = $catalog;
        // load product new
            $output['limit'] = array('8','0');
            $product_new = $this->product_model->get_list($output);
            foreach ($product_new as $key) {
                $where = array('id_product' => $key->id);
                $attr = $this->atribute_model->get_info_rule($where);
                $key->attr = $attr;
            }
            $this->data['product_new'] = $product_new;
            /* SEO */
            $this->data['page_title'] = trim('Home').' | '.site_name();
            $this->data['meta_desc']  = trim('Fashe Shop Bán Hàng Thời Trang Nam Nữ Trẻ Em');
            
        // load view send datas
        $notify = $this->session->flashdata('notify');
        $this->data['notify'] = $notify;
       	$this->data['temp'] = 'site/home/index';
       	$this->load->view('site/layout',$this->data);
    }
}
?>