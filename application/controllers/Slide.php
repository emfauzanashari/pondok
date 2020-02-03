<?php
class Slide extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_slide');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['all_slide']=$this->m_slide->get_all_slide();
		$this->load->view('depan/v_home',$x);
	}
	
}