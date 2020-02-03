<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ponpes Ash-Sholihah - Selamat Datang di Ponpes Ash-Sholihah</title>
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/bootstrap.min.css'?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/font-awesome.min.css'?>">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/simple-line-icons.css'?>">
    <!-- Slider / Carousel -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/slick.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/slick-theme.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/owl.carousel.min.css'?>">
    <!-- Main CSS -->
    <link href="<?php echo base_url().'theme/css/style.css'?>" rel="stylesheet">
    <?php
    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }
    ?>
</head>

<body>
    <?php
    $this->load->view('depan/v_header');
    ?>


    
    <section>
        <div class="slider_img layout_two">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <?php $j = 1;foreach($all_slide->result_array() as $i):

                    $slide_id=$i['slide_id'];
                    $slide_judul=$i['slide_judul'];
                    $slide_caption=$i['slide_caption'];
                    $slide_gambar=$i['slide_gambar'];
                    $slide_status=$i['slide_status'];     
                    ?>
                    <li data-target="#myCarousel" data-slide-to="<?= $j; ?>"></li>

                <?php $j++;endforeach; ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php $k = 0;foreach ($all_slide->result_array() as $i):

                    $slide_id=$i['slide_id'];
                    $slide_judul=$i['slide_judul'];
                    $slide_caption=$i['slide_caption'];
                    $slide_gambar=$i['slide_gambar'];
                    $slide_status=$i['slide_status'];    
                    if($k == 0){ 
                    ?>

                    <div class="carousel-item active">
                        <img class="d-block" src="<?php echo base_url().'theme/images/'. $slide_gambar?>" alt="First slide" >
                        <div class="carousel-caption d-md-block">
                            <div class="slider_title">
                                <h1><?php echo $slide_judul; ?></h1>
                                <h4><?php echo $slide_caption; ?></h4>
                            <!-- div class="slider-btn">
                                <a href="<?php echo site_url('artikel');?>" class="btn btn-default">Learn more</a>
                            </div> -->
                        </div>
                    </div>
            </div>
        <?php }else{ ?>
<div class="carousel-item">
                        <img class="d-block" src="<?php echo base_url().'theme/images/'. $slide_gambar?>" alt="First slide" >
                        <div class="carousel-caption d-md-block">
                            <div class="slider_title">
                                <h1><?php echo $slide_judul; ?></h1>
                                <h4><?php echo $slide_caption; ?></h4>
                            <!-- div class="slider-btn">
                                <a href="<?php echo site_url('artikel');?>" class="btn btn-default">Learn more</a>
                            </div> -->
                        </div>
                    </div>
            </div>
        <?php } ?>
                <?php $k++;endforeach;  ?>
                <!-- <div class="carousel-item">
                    <img class="d-block" src="<?php echo base_url().'theme/images/slide2.jpg'?>" alt="Second slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>Guru Bekualitas Tinggi</h1>
                            <h4>Guru merupakan faktor penting dalam proses belajar-mengajar.<br> Itulah kenapa kami mendatangkan guru-guru <br>terbaik dari berbagai penjuru.</h4>
                            <div class="slider-btn">
                                <a href="<?php echo site_url('guru');?>" class="btn btn-default">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="<?php echo base_url().'theme/images/slide3.jpg'?>" alt="Third slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>Proses Belajar Interatif</h1>
                            <h4>Kami membuat proses belajar mengajar menjadi lebih interatif.<br> dengan demikian siswa lebih menyukai <br>proses belajar.</h4>
                            <div class="slider-btn">
                                <a href="<?php echo site_url('galeri');?>" class="btn btn-default">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <i class="icon-arrow-left fa-slider" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <i class="icon-arrow-right fa-slider" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<!--//END HEADER -->
<!--============================= ABOUT =============================-->
<section class="clearfix about about-style2">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
               <h2>Selamat Datang</h2>
               <p>Bismillah </p>

           </div>
           <div class="col-md-4">
            <img src="<?php echo base_url().'theme/images/welcome.jpeg'?>" class="img-fluid about-img" alt="#">
        </div>
    </div>
</div>
</section>
<!--//END ABOUT -->
<!--============================= OUR COURSES =============================-->
<section class="our_courses">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Artikel Terbaru</h2>
            </div>
        </div>
        <div class="row">
          <?php foreach ($berita->result() as $row) :?>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="courses_box mb-4">
                    <div class="course-img-wrap">
                        <img src="<?php echo base_url().'assets/images/'.$row->tulisan_gambar;?>" class="img-fluid" alt="courses-img">
                    </div>
                    <!-- // end .course-img-wrap -->
                    <a href="<?php echo site_url('artikel/'.$row->tulisan_slug);?>" class="course-box-content">
                        <h3 style="text-align:center;"><?php echo $row->tulisan_judul;?></h3>
                    </a>
                </div>
            </div>
        <?php endforeach;?>
    </div> <br>
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="<?php echo site_url('artikel');?>" class="btn btn-default btn-courses">View More</a>
        </div>
    </div>
</div>
</section>
<!--//END OUR COURSES -->
<!--============================= EVENTS =============================-->
<section class="event">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="event-img2">
                    <?php foreach ($pengumuman->result() as $row) :?>
                        <div class="row">
                            <div class="col-sm-3"> <img src="<?php echo base_url().'theme/images/announcement-icon.png'?>" class="img-fluid" alt="event-img"></div><!-- // end .col-sm-3 -->
                            <div class="col-sm-9"> <h3><a href="<?php echo site_url('pengumuman');?>"><?php echo $row->pengumuman_judul;?></a></h3>
                              <span><?php echo $row->tanggal;?></span>
                              <p><?php echo limit_words($row->pengumuman_deskripsi,10).'...';?></p>

                          </div><!-- // end .col-sm-7 -->
                      </div><!-- // end .row -->
                  <?php endforeach;?>
              </div>
          </div>
          <div class="col-lg-6">
            <div class="row">
                <div class="col-md-12">
                  <?php foreach ($agenda->result() as $row):?>
                    <div class="event_date">
                        <div class="event-date-wrap">
                            <p><?php echo date("d", strtotime($row->agenda_tanggal));?></p>
                            <span><?php echo date("M. y", strtotime($row->agenda_tanggal));?></span>
                        </div>
                    </div>
                    <div class="date-description">
                        <h3><a href="<?php echo site_url('agenda');?>"><?php echo $row->agenda_nama;?></a></h3>
                        <p><?php echo limit_words($row->agenda_deskripsi,10).'...';?></p>
                        <hr class="event_line">
                    </div>
                <?php endforeach;?>

            </div>
        </div>

    </div>
</div>
</div>
</section>
<!--//END EVENTS -->
<!--============================= DETAILED CHART =============================-->
<div class="detailed_chart">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom">
                <div class="chart-img">
                    <img src="<?php echo base_url().'theme/images/chart-icon_1.png'?>" class="img-fluid" alt="chart_icon">
                </div>
                <div class="chart-text">
                    <p><span class="counter"><?php echo $tot_guru;?></span> Guru
                    </p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom chart_top">
                <div class="chart-img">
                    <img src="<?php echo base_url().'theme/images/chart-icon_2.png'?>" class="img-fluid" alt="chart_icon">
                </div>
                <div class="chart-text">
                    <p><span class="counter"><?php echo $tot_siswa;?></span> Siswa
                    </p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 chart_top">
                <div class="chart-img">
                    <img src="<?php echo base_url().'theme/images/chart-icon_3.png'?>" class="img-fluid" alt="chart_icon">
                </div>
                <div class="chart-text">
                    <p><span class="counter"><?php echo $tot_files;?></span> Download
                    </p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="chart-img">
                    <img src="<?php echo base_url().'theme/images/chart-icon_4.png'?>" class="img-fluid" alt="chart_icon">
                </div>
                <div class="chart-text">
                    <p><span class="counter"><?php echo $tot_agenda;?></span> Agenda</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//END DETAILED CHART -->
<!--============================= FOOTER =============================-->
<?php
$this->load->view('depan/v_footer');
?>
<!--//END FOOTER -->
<!-- jQuery, Bootstrap JS. -->
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
