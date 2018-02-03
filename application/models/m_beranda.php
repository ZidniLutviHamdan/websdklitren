<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class M_beranda extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->database();
	}

	function getSidebar(){
		$data = array(
			'informasi' => $this->db->query('SELECT * FROM informasi GROUP BY id DESC LIMIT 3'),
			'berita' 	=> $this->db->query('SELECT * FROM content WHERE kategori = "berita" GROUP BY id DESC LIMIT 7'),
			'gallery' 	=> $this->db->query('SELECT * FROM gallery GROUP BY id DESC LIMIT 1')->row_array(),
			'sambutan' 	=> $this->db->get_where('halaman',array('url'=>'sambutan'))->row_array(),
			'banner' 	=> $this->db->get('banner'),
		);
		return $this->load->view('main/v_sidebar',$data,true);
	}

	function getDirektori(){
		$data = array(
			'title'		=>'FORUM',
			'sidebar' 	=> $this->sidebar(),
			'record'	=> $this->db->query('SELECT * FROM forum GROUP BY id DESC'));
	}

	function getSiswa(){
		$data = array(
			'title'		=>'Akademik',
			'sidebar' 	=> $this->sidebar(),
			'record'	=> $this->db->get('dir_siswa'),
		);
	}
}