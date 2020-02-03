<?php
class Guru extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
			$url=base_url('admin');
			redirect($url);
		};
		$this->load->model('m_guru');
		$this->load->model('m_pengguna');
		$this->load->library('upload');
	}


	function index(){
		$x['data']=$this->m_guru->get_all_guru();
		$this->load->view('admin/v_guru',$x);
	}
	


	    }