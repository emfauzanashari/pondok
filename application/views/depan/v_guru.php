<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Guru</title>
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/bootstrap.min.css'?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/font-awesome.min.css'?>">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/simple-line-icons.css'?>">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/slick.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/slick-theme.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/owl.carousel.min.css'?>">
    <!-- Main CSS -->
    <link href="<?php echo base_url().'theme/css/style.css'?>" rel="stylesheet">
</head>

<body>
  <!--============================= HEADER =============================-->
  <?php
  $this->load->view('depan/v_header');
  ?>
  <!--//END HEADER -->

  <section class="our-teachers">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-5">Guru Kami</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data->result_array() as $row) : 
            $id=$row['guru_id'];
            $nama=$row['guru_nama'];
            $foto=$row['guru_photo'];
            $mapel=$row['mapel_nama']

            ?>


            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="admission_insruction">
                  <?php if(empty($foto)):?>
                    <img src="<?php echo base_url().'assets/images/blank.png';?>" class="img-fluid" alt="#">
                <?php else:?>
                    <img src="<?php echo base_url().'assets/images/'.$foto;?>" class="img-fluid" alt="#">
                <?php endif;?>
                <a  data-toggle="modal" data-target="#Modaldetail<?php echo $id; ?>" > <p class="text-center mt-3"><span><?php echo $nama;?></span>
                    <br>
                    <?php echo $mapel;?></p></a>
                </div>
                <!-- <button class="btn btn-primary" data-toggle="modal" data-taget="#myModal">detail</button> -->
            </div>
        <?php endforeach;?>
    </div>
    <!-- End row -->
    <nav><?php echo $page;?></nav>
</div>
</section>

<!--//End Style 2 -->
<!--============================= FOOTER =============================-->
<?php
$this->load->view('depan/v_footer');
?>




<!-- <div class="modal fade" id="modaldetail<?php echo $row->guru_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Guru</h4>
                    </div>
                    
                    <div class="modal-body">
                    <label class="col-md-4">NIP</label>
                    <span class="col-md-7">0807898765787655678</span>
                    <label class="col-md-4">NIP</label>
                    <span class="col-md-7">0807898765787655678</span>
                                


                                


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                
                </div>
            </div>
        </div>
    -->
    <?php foreach ($data->result_array() as $row) : 
    $id=$row['guru_id'];
    $nama=$row['guru_nama'];
    $foto=$row['guru_photo'];
    $mapel=$row['guru_mapel'];
    $nip=$row['guru_nip'];
    $jenkel=$row['guru_jenkel'];
    $tgllahir=$row['guru_tgl_lahir'];
    $tmplahir=$row['guru_tmp_lahir'];
    $alamat=$row['guru_alamat'];
    $fb=$row['guru_facebook'];
    $ig=$row['guru_instagram'];
    $twitter=$row['guru_twitter'];
    $wa=$row['guru_whatsaap'];
    ?>


    <div class="modal fade" id="Modaldetail<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail Guru</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/guru/simpan_guru'?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-5 control-label">NIP</label>
                                <span> <?php echo $nip; ?> </span>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-5 control-label">Nama</label>
                                <span> <?php echo $nama; ?> </span>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-5 control-label">Jenis Kelamin</label>
                                <?php if($jenkel=='L'):?> 
                                    <span> Laki-laki</span>
                                <?php else: ?>
                                    <span>Perempuan</span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-5 control-label">Tempat,Tgl lahir</label>
                                <span> <?php echo $tmplahir.', '.$tgllahir; ?> </span>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-5 control-label">Mapel</label>
                                <span> <?php echo $mapel; ?> </span>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-5 control-label">Alamat</label>
                                <span> <?php echo $alamat; ?> </span>
                            </div>

                            <div class="modal-footer">
                                <div class="footer-social-icons">
                                    <a href="www.instagram.com/<?php echo $ig; ?>"><i class="fa fa-instagram fa-ig" aria-hidden="true"></i></a>
                                    <a href="www.faecbook.com/<?php echo $fb; ?>"><i class="fa fa-facebook fa-fb" aria-hidden="true"></i></a>
                                    <a href="www.twitter.com/<?php echo $twitter; ?>"><i class="fa fa-twitter fa-tw" aria-hidden="true"></i></a>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!--//END FOOTER -->
    <!-- jQuery, Bootstrap JS. -->
    <script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/tether.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/bootstrap.min.js'?>"></script>
    <!-- Plugins -->
    <script src="<?php echo base_url().'theme/js/slick.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/waypoints.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/counterup.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/owl.carousel.min.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/validate.js'?>"></script>
    <script src="<?php echo base_url().'theme/js/tweetie.min.js'?>"></script>
    <!-- Subscribe -->
    <script src="<?php echo base_url().'theme/js/subscribe.js'?>"></script>
    <!-- Script JS -->
    <script src="<?php echo base_url().'theme/js/script.js'?>"></script>
</body>

</html>
