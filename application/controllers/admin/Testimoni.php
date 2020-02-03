<?php
class Testimoni extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('admin');
            redirect($url);
        };
		$this->load->model('m_testimoni');
		$this->load->library('upload');
	}


	function index(){
		
		$x['test']=$this->m_testimoni->get_all_testimoni();
		$this->load->view('admin/v_testimoni',$x);
	}
	
	function simpan_testimoni(){
				$config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	            $config['max_size']     = 3024; // 3MB
	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 500;
	                        $config['height']= 400;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $testimoni_gambar=$gbr['file_name'];
	                        $testimoni_nama=strip_tags($this->input->post('xnama'));
							$testimoni_isi=strip_tags($this->input->post('xtestimoni_isi'));
							// $kode=$this->session->userdata('idadmin');
							// $user=$this->m_pengguna->get_pengguna_login($kode);
							// $p=$user->row_array();
							// $user_id=$p['pengguna_id'];
							// $user_nama=$p['pengguna_nama'];
							$this->m_testimoni->simpan_testimoni($testimoni_nama,$testimoni_isi,$testimoni_gambar);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/Testimoni');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/testimoni');
	                }
	                 
	            }else{
					redirect('admin/galeri');
				}
				
	}
	
	function update_testimoni(){
				
	            $config['upload_path'] = './assets/images/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	            $config['max_size']     = 3024; // 3MB
	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 500;
	                        $config['height']= 400;
	                        $config['new_image']= './assets/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $gambar=$gbr['file_name'];
	                        $testimoni_id=$this->input->post('kode');
	                        $testimoni_nama=strip_tags($this->input->post('xnama'));
							$testimoni_isi=strip_tags($this->input->post('xtestimoni_isi'));
							$images=$this->input->post('gambar');
							$path='./assets/images/'.$images;
							unlink($path);
							
							
							$this->m_testimoni->update_testimoni($testimoni_id,$testimoni_nama,$testimoni_isi,$gambar);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/testimoni');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/testimoni');
	                }
	                
	            }else{
							$testimoni_id=$this->input->post('kode');
	                        $testimoni_nama=strip_tags($this->input->post('xnama'));
							$testimoni_isi=strip_tags($this->input->post('xtestimoni_isi'));
							$this->m_testimoni->update_testimoni_tanpa_img($testimoni_id,$testimoni_nama,$testimoni_isi);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/testimoni');
	            } 

	}

	function hapus_testimoni(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/'.$gambar;
		unlink($path);
		$this->m_testimoni->hapus_testimoni($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/testimoni');
	}

}