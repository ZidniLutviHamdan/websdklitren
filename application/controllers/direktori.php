<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Direktori extends CI_Controller {


	function __construct(){
		parent::__construct();
		 $this->load->model('m_beranda');
       	 $this->load->helper("url");
		
	}

	function index(){
		$data['direktori'] =$this->m_beranda->getDirektori();
		$this->template->load('main/v_template','main/v_forum',$data);
	}

	function sidebar(){
		$data['sidebar'] =$this->m_beranda->getSidebar();
	}

	function siswa(){
		$data['siswa'] = $this->m_beranda->getSiswa();
		$this->template->load('main/v_template','main/v_siswa',$data);
	}

	function alumni(){
		$data = array(
			'title'		=>'Akademik',
			'sidebar' 	=> $this->sidebar(),
			'record'	=> $this->db->get('dir_alumni'),
		);
		$this->template->load('main/v_template','main/v_alumni',$data);
	}

	function guru(){
		$data = array(
			'title'		=>'Akademik',
			'sidebar' 	=> $this->sidebar(),
			'record'	=> $this->db->get('dir_guru'),
		);
		$this->template->load('main/v_template','main/v_guru',$data);
	}

	function halaman($url){
		$data = array(
			'title'		=>'Prestasi',
			'sidebar' 	=> $this->sidebar(),
			'record'	=> $this->db->get_where('halaman',array('url'=>$url))->row_array(),
		);
		$this->template->load('main/v_template','main/v_prestasi',$data);
	}
   
}
