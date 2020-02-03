<?php
class Slide extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('admin');
            redirect($url);
        };
		$this->load->model('m_slide');
		$this->load->library('upload');
	}


	function index(){
		
		$x['slide']=$this->m_slide->get_all_slide();
		$this->load->view('admin/v_slide',$x);
	}
	
	function simpan_slide(){
				$config['upload_path'] = './theme/images/'; //path folder
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
	                        $config['source_image']='./theme/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 500;
	                        $config['height']= 400;
	                        $config['new_image']= './theme/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();

	                        $slide_gambar=$gbr['file_name'];
	                        $slide_id=$this->input->post('kode');
	                        $slide_judul=strip_tags($this->input->post('xslide_judul'));
	                        $slide_caption=strip_tags($this->input->post('xslide_caption'));
	                        // $slide_status=strip_tags($this->post('slide_status'));
							// $slide_isi=strip_tags($this->input->post('xtestimoni_isi'));
							// $kode=$this->session->userdata('idadmin');
							// $user=$this->m_pengguna->get_pengguna_login($kode);
							// $p=$user->row_array();
							// $user_id=$p['pengguna_id'];
							// $user_nama=$p['pengguna_nama'];
							// return 'die';
							$data = array(
								'slide_caption' => $slide_caption,
								'slide_judul' => $slide_judul,
								'slide_gambar' => $slide_gambar
							);
							$this->m_slide->simpan_slide('tbl_slide',$data);
							echo $this->session->set_flashdata('msg','success');
							redirect('admin/slide');
					}else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/slide');
	                }
	                 
	            }else{
					redirect('admin/dashboard');
				}
				
	}
	
	function update_slide(){
				
	            $config['upload_path'] = './theme/images/'; //path folder
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
	                        $config['source_image']='./theme/images/'.$gbr['file_name'];
	                        $config['create_thumb']= FALSE;
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 500;
	                        $config['height']= 400;
	                        $config['new_image']= './theme/images/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
	                        $this->image_lib->resize();
	                        $slide_id=$this->input->post('kode');
	                         $slide_gambar=$gbr['file_name'];
	                        $slide_judul=strip_tags($this->input->post('xslide_judul'));
	                        $slide_caption=strip_tags($this->input->post('xslide_caption'));
	            
							
							// $data = array(
							// 	'slide_caption' => $slide_caption,
							// 	'slide_judul' => $slide_judul,
							// 	'slide_gambar' => $slide_gambar);

							$this->m_slide->update_slide($slide_id,$slide_judul,$slide_caption,$slide_gambar);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/slide');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','warning');
	                    redirect('admin/slide');
	                }
	                
	            }else{
							$slide_id=$this->input->post('kode');
	                        $slide_judul=strip_tags($this->input->post('xslide_judul'));
							$slide_caption=strip_tags($this->input->post('xslide_caption'));
							$this->m_slide->update_slide_tanpa_img($slide_id,$slide_judul,$slide_caption);
							echo $this->session->set_flashdata('msg','info');
							redirect('admin/slide');
	            } 

	}

	function hapus_slide(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./theme/images/'.$gambar;
		unlink($path);
		$this->m_slide->hapus_slide($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('admin/slide');
	}

}