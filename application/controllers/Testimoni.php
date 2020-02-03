<?php
class Testimoni extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_testimoni');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['all_testimoni']=$this->m_testimoni->get_all_testimoni();
		$this->load->view('depan/v_about',$x);
	}
	
}