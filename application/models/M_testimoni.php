<?php 
/**
 * 
 */
class M_testimoni extends CI_model{
	
		function get_all_testimoni(){
            $hsl=$this->db->query("SELECT * FROM tbl_testimoni");
        return $hsl;
        }

	function simpan_testimoni($testimoni_nama,$testimoni_isi,$testimoni_gambar){
		$this->db->trans_start();
            $this->db->query("insert into tbl_testimoni(testimoni_nama,testimoni_isi,testimoni_gambar) values ('$testimoni_nama','$testimoni_isi','$testimoni_gambar')");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}


    function update_testimoni($testimoni_id,$testimoni_nama,$testimoni_isi,$testimoni_gambar){
        $hsl=$this->db->query("update tbl_testimoni set testimoni_nama='$testimoni_nama',testimoni_isi='$testimoni_isi',testimoni_gambar='$testimoni_gambar' where testimoni_id='$testimoni_id'");
        return $hsl;
    }
    function update_testimoni_tanpa_img($testimoni_id,$testimoni_nama,$testimoni_isi){
        $hsl=$this->db->query("update tbl_testimoni set testimoni_nama='$testimoni_nama',testimoni_isi='$testimoni_isi' where testimoni_id='$testimoni_id'");
        return $hsl;
    }
    function hapus_testimoni($kode){
        $hsl=$this->db->query("DELETE FROM tbl_testimoni WHERE testimoni_id='$kode'");
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



 ?>