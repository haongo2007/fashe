<?php 
	/**
	* 
	*/
	class Contact extends MY_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('contact_model');
		}

		function index(){
			// load product categories

			$contact = $this->contact_model->get_info(16);
			$this->data['contact'] = $contact;
			$this->data['page_title'] = $contact->title.' | '.site_name();
			$this->data['temp'] = 'site/contact/index';
       		$this->load->view('site/layout',$this->data);
		}
		
	} 
?>