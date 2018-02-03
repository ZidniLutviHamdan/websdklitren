<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		 parent::__construct();
		 $this->load->model('m_beranda');
       	 $this->load->helper("url");
        
	}

	function index(){
		$data = array(
			'title'		=>'Home',
			'sidebar' 	=> $this->sidebar());
		$this->template->load('main/v_template','main/v_home',$data);
	}

	function sidebar(){
		$data['sidebar'] =$this->m_beranda->getSidebar();
	}

	function detail_berita($id){
		$data['sidebar'] = $this->sidebar();
		$data['record'] = $this->db->get_where('content',array('id'=>$id))->row_array();
		$this->template->load('main/v_template','main/v_berita_detail',$data);
	}
}