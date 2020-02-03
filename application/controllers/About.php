<?php
class About extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
		$this->load->model('m_testimoni');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['tot_guru']=$this->db->get('tbl_guru')->num_rows();
		$x['tot_siswa']=$this->db->get('tbl_siswa')->num_rows();
		$x['tot_files']=$this->db->get('tbl_files')->num_rows();
		$x['tot_agenda']=$this->db->get('tbl_agenda')->num_rows();
		$x['all_testimoni']=$this->m_testimoni->get_all_testimoni();
		$this->load->view('depan/v_about',$x);
	}
}
