<?php 
/**
 * 
 */
class M_slide extends CI_model{
	
		function get_all_slide(){
            $hsl=$this->db->query("SELECT * FROM tbl_slide");
        return $hsl;
        }

	function simpan_slide($table,$data){
		$this->db->insert($table,$data);
        // if($this->db->trans_status()==true)
        // return true;
        // else
        // return false;
	}
 function update_slide($slide_id,$slide_judul,$slide_caption,$slide_gambar){
        $hsl=$this->db->query("update tbl_slide set slide_judul='$slide_judul',slide_caption='$slide_caption',slide_gambar='$slide_gambar' where slide_id='$slide_id'");
        return $hsl;
    }

    // function update_slide($table,$data){
    //     $hsl=$this->db->query("update tbl_slide set slide_judul='$slide_judul',slide_caption='$slide_caption',slide_gambar='$slide_gambar' where slide_id='$slide_id'");
    //     return $hsl;
    // }
function update_slide_tanpa_img($slide_id,$slide_judul,$slide_caption){
        $hsl=$this->db->query("update tbl_slide set slide_judul='$slide_judul',slide_caption='$slide_caption' where slide_id='$slide_id'");
        return $hsl;
    }

    // function update_slide_tanpa_img($slide_id,$slide_judul,$slide_caption){
    //     $hsl=$this->db->query("update tbl_slide set slide_judul='$slide_judul',slide_caption='$slide_caption', where slide_id='$slide_id'");
    //     return $hsl;
    // }
    function hapus_slide($kode){
        $hsl=$this->db->query("DELETE FROM tbl_slide WHERE slide_id='$kode'");
        return $hsl;
        // $this->db->trans_start();
        //     $this->db->query("delete from tbl_testimoni where testimoni_id='$kode'");
        // $this->db->trans_complete();
        // if($this->db->trans_status()==true)
        // return true;
        // else
        // return false;
    }


}


