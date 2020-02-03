<!--Counter Inbox-->
<?php
$query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
$query2=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_status='0'");
$jum_comment=$query2->num_rows();
$jum_pesan=$query->num_rows();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ponpes Ash-Sholihah | Data Guru</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>



</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

   <?php
   $this->load->view('admin/v_header');
   ?>
   <!-- Left side column. contains the logo and sidebar -->
   <?php 
   $this->load->view('admin/v_sidebar')
   ?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Guru
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Guru</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <div class="box">
              
              <div class="box-body">
                <table id="example1" class="table table-striped" style="font-size:13px;">
                  <thead>
                    <tr>
                     <th>Photo</th>
                     <th>NIP</th>
                     <th>Nama</th>
                     <th>Tempat/Tgl Lahir</th>
                     <th>Alamat</th>
                     <th>Jenis Kelamin</th>
                     <th>Mata Pelajaran</th>
                               </tr>
                 </thead>
                 <tbody>
                  <?php
                  $no=0;
                  foreach ($data->result_array() as $i) :
                    $no++;
                  $id=$i['guru_id'];
                  $nip=$i['guru_nip'];
                  $nama=$i['guru_nama'];
                  $jenkel=$i['guru_jenkel'];
                  $tmp_lahir=$i['guru_tmp_lahir'];
                  $tgl_lahir=$i['guru_tgl_lahir'];
                  $guru_alamat=$i['guru_alamat'];
                  $mapel=$i['guru_mapel'];
                  $photo=$i['guru_photo'];

                  ?>
                  <tr>
                    <?php if(empty($photo)):?>
                      <td><img width="40" height="40" class="img-circle" src="<?php echo base_url().'assets/images/user_blank.png';?>"></td>
                    <?php else:?>
                      <td><img width="40" height="40" class="img-circle" src="<?php echo base_url().'../akademikpondok/assets/images/'.$photo;?>"></td>
                    <?php endif;?>
                    <td><?php echo $nip;?></td>
                    <td><?php echo $nama;?></td>
                    <td><?php echo $tmp_lahir.', '.$tgl_lahir;?></td>
                    <td><?php echo $guru_alamat;?></td>
                    <?php if($jenkel=='L'):?>
                      <td>Laki-Laki</td>
                    <?php else:?>
                      <td>Perempuan</td>
                    <?php endif;?>
                    <td><?php echo $mapel;?></td>
                    
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php 
  $this->load->view('admin/v_footer')
 ?>


<!-- Control Sidebar -->

<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--Modal Add Pengguna-->
<!-- <!-- <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Add Guru</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url().'admin/guru/simpan_guru'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">NIP</label>
            <div class="col-sm-7">
              <input type="text" name="xnip" class="form-control" id="inputUserName" placeholder="NIP" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
            <div class="col-sm-7">
              <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
            <div class="col-sm-7">
             <div class="radio radio-info radio-inline">
              <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
              <label for="inlineRadio1"> Laki-Laki </label>
            </div>
            <div class="radio radio-info radio-inline">
              <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
              <label for="inlineRadio2"> Perempuan </label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="inputUserName" class="col-sm-4 control-label">Tempat Lahir</label>
          <div class="col-sm-7">
            <input type="text" name="xtmp_lahir" class="form-control" id="inputUserName" placeholder="Tempat Lahir" required>
          </div>
        </div>

        <div class="form-group">
          <label for="inputUserName" class="col-sm-4 control-label">Tanggal Lahir</label>
          <div class="col-sm-7">
            <input type="date" name="xtgl_lahir" class="form-control" id="inputUserName" placeholder="Contoh: 25 September 1993" required>
          </div>
        </div>

        <div class="form-group">
          <label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
          <div class="col-sm-7">
            <textarea name="xalamat"  class="form-control" id="inputUserName" placeholder="Alamat lengkap" required></textarea>

          </div>
        </div>

        <div class="form-group">
          <label for="inputUserName" class="col-sm-4 control-label">Mata Pelajaran</label>
          <div class="col-sm-7">
            <input type="text" name="xmapel" class="form-control" id="inputUserName" placeholder="Contoh: PPKN, Matematika" required>
          </div>
        </div>
        <hr>
        <div class="">
          <h3 style="font: bold; text-align: center;">Akun Media Sosial</h3>
           <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Facebook</label>
            <div class="col-sm-7">
              <input type="text" name="xfb" class="form-control" id="inputUserName" placeholder="Facebook">
            </div>
          </div>
          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Instagram</label>
            <div class="col-sm-7">
              <input type="text" name="xig" class="form-control" id="inputUserName" placeholder="Instagram">
            </div>
          </div>
          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Twitter</label>
            <div class="col-sm-7">
              <input type="text" name="xtwitter" class="form-control" id="inputUserName" placeholder="Twitter">
            </div>
          </div>
          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">WhatsApp/Phone</label>
            <div class="col-sm-7">
              <input type="text" name="xwa" class="form-control" id="inputUserName" placeholder="WhatsApp/No Hp">
            </div>
          </div>
        </div>
        <br>

        <div class="form-group">
          <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
          <div class="col-sm-7">
            <input type="file" name="filefoto"/>
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>

<!--Modal Edit Detail-->
<!-- <?php foreach ($data->result_array() as $i) :
  $id=$i['guru_id'];
  $nip=$i['guru_nip'];
  $nama=$i['guru_nama'];
  $jenkel=$i['guru_jenkel'];
  $tmp_lahir=$i['guru_tmp_lahir'];
  $tgl_lahir=$i['guru_tgl_lahir'];
  $guru_alamat=$i['guru_alamat'];
  $mapel=$i['guru_mapel'];
  $photo=$i['guru_photo'];
  $fb=$i['guru_facebook'];
  $ig=$i['guru_instagram'];
  $twitter=$i['guru_twitter'];
  $wa=$i['guru_whatsaap'];
  ?>

  <div class="modal fade" id="ModalEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Guru</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'admin/guru/update_guru'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="kode" value="<?php echo $id;?>"/>
            <input type="hidden" value="<?php echo $photo;?>" name="gambar">
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">NIP</label>
              <div class="col-sm-7">
                <input type="text" name="xnip" value="<?php echo $nip;?>" class="form-control" id="inputUserName" placeholder="NIP" required>
              </div>
            </div>

            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
              <div class="col-sm-7">
                <input type="text" name="xnama" value="<?php echo $nama;?>" class="form-control" id="inputUserName" placeholder="Nama" required>
              </div>
            </div>

            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
              <div class="col-sm-7">
                <?php if($jenkel=='L'):?>
                 <div class="radio radio-info radio-inline">
                  <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                  <label for="inlineRadio1"> Laki-Laki </label>
                </div>
                <div class="radio radio-info radio-inline">
                  <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                  <label for="inlineRadio2"> Perempuan </label>
                </div>
              <?php else:?>
                <div class="radio radio-info radio-inline">
                  <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                  <label for="inlineRadio1"> Laki-Laki </label>
                </div>
                <div class="radio radio-info radio-inline">
                  <input type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                  <label for="inlineRadio2"> Perempuan </label>
                </div>
              <?php endif;?>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Tempat Lahir</label>
            <div class="col-sm-7">
              <input type="text" name="xtmp_lahir" value="<?php echo $tmp_lahir;?>" class="form-control" id="inputUserName" placeholder="Tempat Lahir" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Tanggal Lahir</label>
            <div class="col-sm-7">
              <input type="date" name="xtgl_lahir" value="<?php echo $tgl_lahir;?>" class="form-control" id="inputUserName" placeholder="Contoh: 25 September 1993" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
            <div class="col-sm-7">
              <input name="xalamat" value="<?php echo $guru_alamat;?>" class="form-control" id="inputUserName" placeholder="Alamat lengkap" required></input>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Mata Pelajaran</label>
            <div class="col-sm-7">
              <input type="text" name="xmapel" value="<?php echo $mapel;?>" class="form-control" id="inputUserName" placeholder="Contoh: PPKN, Matematika" required>
            </div>
          </div>

          <hr>
          <div class="">
            <h3 style="font: bold; text-align: center;">Akun Media Sosial</h3>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Facebook</label>
              <div class="col-sm-7">
              <input type="text" name="xfacebook" value="<?php echo $fb; ?>" class="form-control" id="inputUserName" placeholder="facebook">
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Instagram</label>
              <div class="col-sm-7">
                <input type="text" name="xig" value="<?php echo $ig; ?>" class="form-control" id="inputUserName" placeholder="Instagram">
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Twitter</label>
              <div class="col-sm-7">
                <input type="text" name="xtwiteer" value="<?php echo $twitter; ?>" class="form-control" id="inputUserName" placeholder="Twitter">
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">WhatsApp/Phone</label>
              <div class="col-sm-7">
                <input type="text" name="xwa" value="<?php echo $wa; ?>" class="form-control" id="inputUserName" placeholder="WhatsApp/No Hp">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
            <div class="col-sm-7">
              <input type="file" name="filefoto"/>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?> -->
<!--Modal Edit detail-->

<!-- <?php foreach ($data->result_array() as $i) :
  $id=$i['guru_id'];
  $nip=$i['guru_nip'];
  $nama=$i['guru_nama'];
  $jenkel=$i['guru_jenkel'];
  $tmp_lahir=$i['guru_tmp_lahir'];
  $tgl_lahir=$i['guru_tgl_lahir'];
  $guru_alamat=$i['guru_alamat'];
  $mapel=$i['guru_mapel'];
  $photo=$i['guru_photo'];
  ?> -->
  <!--Modal Hapus Pengguna-->
 <!--  <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Guru</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'admin/guru/hapus_guru'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="kode" value="<?php echo $id;?>"/>
            <input type="hidden" value="<?php echo $photo;?>" name="gambar">
            <p>Apakah Anda yakin mau menghapus guru <b><?php echo $nama;?></b> ?</p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach;?> -->




<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php if($this->session->flashdata('msg')=='error'):?>
  <script type="text/javascript">
    $.toast({
      heading: 'Error',
      text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
      showHideTransition: 'slide',
      icon: 'error',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#FF4859'
    });
  </script>

<?php elseif($this->session->flashdata('msg')=='success'):?>
  <script type="text/javascript">
    $.toast({
      heading: 'Success',
      text: "Guru Berhasil disimpan ke database.",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#7EC857'
    });
  </script>
<?php elseif($this->session->flashdata('msg')=='info'):?>
  <script type="text/javascript">
    $.toast({
      heading: 'Info',
      text: "Guru berhasil di update",
      showHideTransition: 'slide',
      icon: 'info',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#00C9E6'
    });
  </script>
<?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
  <script type="text/javascript">
    $.toast({
      heading: 'Success',
      text: "Guru Berhasil dihapus.",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#7EC857'
    });
  </script>
<?php else:?>

<?php endif;?>
</body>
</html>
