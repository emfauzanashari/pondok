<?php 
class M_guru extends CI_Model{

	function get_all_guru(){
		$hsl=$this->db->query("SELECT * FROM tbl_guru");
		return $hsl;
	}

	function simpan_guru($nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$guru_alamat,$mapel,$fb,$ig,$twitter,$wa,$photo){
		$hsl=$this->db->query("INSERT INTO tbl_guru (guru_nip,guru_nama,guru_jenkel,guru_tmp_lahir,guru_tgl_lahir,guru_alamat,guru_mapel,guru_facebook,guru_instagram,guru_twitter,guru_whatsaap,guru_photo) VALUES ('$nip','$nama','$jenkel','$tmp_lahir','$tgl_lahir','$guru_alamat','$mapel','$fb','$ig','$twitter','$wa','$photo')");
		return $hsl;
	}
	function simpan_guru_tanpa_img($nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$guru_alamat,$mapel,$fb,$ig,$twitter,$wa){
		$hsl=$this->db->query("INSERT INTO tbl_guru (guru_nip,guru_nama,guru_jenkel,guru_tmp_lahir,guru_tgl_lahir,guru_alamat,guru_mapel,guru_facebook,guru_instagram,guru_twitter,guru_whatsaap) VALUES ('$nip','$nama','$jenkel','$tmp_lahir','$tgl_lahir','$guru_alamat','$mapel','$fb','$ig','$twitter','$wa')");
		return $hsl;
	}

	function update_guru($kode,$nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$guru_alamat,$mapel,$fb,$ig,$twitter,$wa,$photo){
		$hsl=$this->db->query("UPDATE tbl_guru SET guru_nip='$nip',guru_nama='$nama',guru_jenkel='$jenkel',guru_tmp_lahir='$tmp_lahir',guru_tgl_lahir='$tgl_lahir',guru_alamat='$guru_alamat',guru_mapel='$mapel',guru_facebook='$fb',guru_instagram='$ig',guru_twitter='$twitter',guru_whatsaap='$wa',guru_photo='$photo' WHERE guru_id='$kode'");
		return $hsl;
	}
	function update_guru_tanpa_img($kode,$nip,$nama,$jenkel,$tmp_lahir,$tgl_lahir,$guru_alamat,$mapel,$fb,$ig,$twitter,$wa){
		$hsl=$this->db->query("UPDATE tbl_guru SET guru_nip='$nip',guru_nama='$nama',guru_jenkel='$jenkel',guru_tmp_lahir='$tmp_lahir',guru_tgl_lahir='$tgl_lahir',guru_alamat='$guru_alamat',guru_mapel='$mapel',guru_facebook='$fb',guru_instagram='$ig',guru_twitter='$twitter',guru_whatsaap='$wa' WHERE guru_id='$kode'");
		return $hsl;
	}
	function hapus_guru($kode){
		$hsl=$this->db->query("DELETE FROM tbl_guru WHERE guru_id='$kode'");
		return $hsl;
	}

	//front-end
	function guru(){
		$hsl=$this->db->query("SELECT * FROM tbl_guru");
		return $hsl;
	}
	function guru_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT * FROM tbl_guru join tbl_mapel on guru_mapel=mapel_id limit $offset,$limit");
		return $hsl;
	}

}