<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Penerimaan Siswa <?=$data[0]->nilai?> Tahun <?php echo date('Y') ?>">
    <meta name="author" content="kangzulfa.com">

    <title>Sistem Penerimaan Santri <?=$data[0]->nilai?></title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/plugins/cubeportfolio/css/cubeportfolio.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/nivo-lightbox.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/nivo-lightbox-theme/default/default.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/css/owl.carousel.css')?>" rel="stylesheet" media="screen" />
    <link href="<?php echo base_url('assets/css/owl.theme.css')?>" rel="stylesheet" media="screen" />
    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/bootstrap-datepicker.min.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/style.css?v=').$version?>" rel="stylesheet">
    <link rel="shortcut icon" href="<?=base_url('uploads/favicon.ico')?>" type="image/x-icon">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <div class="btn-wa">
        <i class="fa fa-whatsapp icon-wa"></i>
    </div>
    <div id="wrapper">
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="top-area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <p class="bold text-left">Senin - Minggu, Pukul 08:00 - 14:00 </p>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <p class="bold text-right"> <i class="fa fa-whatsapp"></i> Whatsapp +<?=$data[4]->nilai?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container navigation">

                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="./">
                        <img src="<?php echo base_url('assets/img/logo.png')?>" alt="" height="40"/>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#intro">Beranda</a></li>
                        <li><a href="#service">Cara Daftar</a></li>
                        <li><a href="<?=base_url('data-pendaftar')?>">Data Pendaftar</a></li>
                        <li><a href="#pengajar">Pengajar</a></li>
                        <li><a href="#facilities">Fasilitas</a></li>
                        <li><a href="#testimonial">Testimoni</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>


        <!-- Section: intro -->
        <section id="intro" class="intro">
            <div class="intro-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="well well-trans">
                                <div class="wow fadeInRight" data-wow-delay="0.1s">
                                    <h6>Mengapa Harus Minthol..??</h6>
                                    <ol class="lead-list">
                                        <li>
                                            <span class="list"><a href="https://ypi-minthol.org/read/2/profil-yayasan" target="_blank">Sanad Keilmuan pendirinya tersambung kepada Rosululloh SAW.</a></span>
                                        </li>
                                        <li>
                                            <span class="list"><a href="https://youtu.be/TRWLLyYFsSc" target="_blank">Ponpes yang paling direkomendasikan.</a></span>
                                        </li>
                                        <li> 
                                            <span class="list"><a href="https://ypi-minthol.org/read/14/standar-kompetensi-lulusan" target="_blank">Kurikulumnya simpel, terintegrasi dan model.</a></span>
                                        </li>
                                        <li> 
                                            <span class="list"><a href="http://https://ypi-minthol.org/read/13/struktur-organisasi" target="_blank">Kelembagaannya terstruktur kuat, mandiri dan modern.</a></span>
                                        </li>
                                        <li> 
                                            <span class="list">Pengasuh dan asatidznya kompeten, professional, mendidik setulus hati dan sepenuh jiwa dengan pola asuh one companion for twenty student.</span>
                                        </li>
                                        <li> 
                                            <span class="list">Sarprasnya representative, keren dan lengkap.</span>
                                        </li>
                                        <li> 
                                            <span class="list">Pembiayaannya terjangkau, transparan, accountable dengan menerapkan one door system.</span>
                                        </li>
                                        <li> 
                                            <span class="list">Lulusan santrinya beraqidah beramaliah dan berakhlaq pesantren, beridiologi pancasila, terbekali oleh kecakapan hidup dan mendapat beasiswa kuliah di perguruan tinggi ternama.</span>
                                        </li>
                                        <li> 
                                            <span class="list">Evaluasi penyelenggaraan pendidikannya melibatkan konsultan pendidikan dan penilaiannya berbasis online.</span>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-wrapper">
                                <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                                    <div class="panel panel-skin">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Daftar Sekarang </h3>
                                        </div>
                                        <div class="panel-body">
                                            <form id="formDaftar" role="form" class="contactForm lead">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <select name="pilihan" class="form-control input-md" required>
                                                                <option value="" disabled selected> -- Pilih Tempat Mendaftar -- </option>
                                                                <option value="1">MTs</option>
                                                                <option value="2">MA</option>
                                                                <option value="3">Pondok</option>
                                                                <option value="4">MTs & Pondok</option>
                                                                <option value="5">MA & Pondok</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" id="nama_siswa" name="nama_siswa" class="form-control input-md" required placeholder="Nama Lengkap Anda" autocomplete="off" title="Nama Lengkap Siswa">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="tempat_lahir" class="form-control input-md" required placeholder="Tempat Lahir Anda" autocomplete="off" title="Kota Tempat Lahir">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" id="datepicker" name="tgl_lahir" class="form-control input-md" required placeholder="Tanggal Lahir Anda" autocomplete="off" title="Tanggal Lahir">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <select name="gender" class="form-control input-md" required>
                                                                <option value="" disabled selected> -- Jenis Kelamin -- </option>
                                                                <option value="0">Perempuan</option>
                                                                <option value="1">Laki-laki</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="asal_sekolah" class="form-control input-md" required placeholder="Asal Sekolah Anda" autocomplete="off" title="Asal Sekolah Siswa">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <textarea name="alamat" class="form-control input-md" rows="3"required placeholder="Alamat Rumah Anda" title="Alamat Rumah Anda"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="orang_tua" class="form-control input-md" required placeholder="Nama Orang Tua" autocomplete="off" title="Nama Orang Tua">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" name="pekerjaan" class="form-control input-md" required placeholder="Pekerjaan Orang Tua" autocomplete="off" title="Pekerjaan Orang Tua">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="no_telp" class="form-control input-md" required placeholder="No Telp Orang Tua" autocomplete="off" title="No Telp Orang Tua">
                                                        </div>
                                                        <div class="form-group">
                                                            <select name="penghasilan" class="form-control input-md" required>
                                                                <option value="" disabled selected> -- Penghasilan Orang Tua -- </option>
                                                                <?php foreach ($penghasilan as $i) {
                                                                    echo "<option value='$i->id_penghasilan'> $i->gaji </option>";
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-skin btn-block btn-lg">Daftar</button>
                                                <p class="lead-footer">* Perhatikan Kolom Sebelum Mengisi</p>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Section: intro -->

        <!-- Section: boxes -->
        <!-- <section id="boxes" class="home-section paddingtop-80">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="box text-center">

                                <i class="fa fa-check fa-3x circled bg-skin"></i>
                                <h4 class="h-bold">Pilihan Tepat</h4>
                                <p>Minthol adalah pilihan tepat untuk mendidik putra/putri anda menjadi lulusan yang berguna karena dibekali dengan ilmu umum dan ilmu agama</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="box text-center">

                                <i class="fa fa-dollar fa-3x circled bg-skin"></i>
                                <h4 class="h-bold">Biaya Terjangkau</h4>
                                <p>Biaya sangat terjangkau untuk semua kalangan, dan tersedia juga <b>Beasiswa</b> bagi siswa berprestasi / kurang mampu</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="box text-center">
                                <i class="fa fa-clock-o fa-3x circled bg-skin"></i>
                                <h4 class="h-bold">Up to date</h4>
                                <p>Kami selalu berusaha untuk memberikan pembelajaran yang up to date sehingga tidak ketinggalan dengan sekolah di kota-kota besar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <div class="box text-center">

                                <i class="fa fa-graduation-cap fa-3x circled bg-skin"></i>
                                <h4 class="h-bold">Beasiswa Kuliah</h4>
                                <p>Setiap tahun lulusan kami mendapatkan <b>Beasiswa</b> di berbagai kampus baik dalam maupun luar negeri</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section> -->
        <!-- /Section: boxes -->

        <!-- Section: gelombang -->
        <section id="gelombang" class="home-section nopadding paddingtop-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <img src="<?=base_url('uploads/jadwal_pendaftaran_.jpg')?>" class="img-responsive" style="margin:0 auto" alt="Jadwal Pendaftaran">
                    </div>
                </div>
            </div>

        </section>
        <!-- /Section: gelombang -->

        <!-- Section: services -->
        <section id="service" class="home-section nopadding paddingtop-150">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <img src="<?php echo base_url('assets/img/hello.png')?>" class="img-responsive" alt="" />
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">

                        <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-check fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Isi Formulir</h5>
                                    <p>Datang langsung / isi formulir online.</p>
                                </div>
                            </div>
                        </div>

                        <div class="wow fadeInRight" data-wow-delay="0.2s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-check fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Persyaratan</h5>
                                    <p>Kumpulkan persyaratan jika sudah tersedia </p>
                                </div>
                            </div>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.3s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-check fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">No Daftar</h5>
                                    <p>Simpan No Daftar anda untuk cek hasil seleksi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <div class="wow fadeInRight" data-wow-delay="0.1s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-check fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Seleksi</h5>
                                    <p>Ikuti seleksi sesuai dengan arahan panitia</p>
                                </div>
                            </div>
                        </div>

                        <div class="wow fadeInRight" data-wow-delay="0.2s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-check fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Daftar Ulang</h5>
                                    <p>Jika diterima segeralah melakukan daftar ulang</p>
                                </div>
                            </div>
                        </div>
                        <div class="wow fadeInRight" data-wow-delay="0.3s">
                            <div class="service-box">
                                <div class="service-icon">
                                    <span class="fa fa-check fa-3x"></span>
                                </div>
                                <div class="service-desc">
                                    <h5 class="h-light">Selamat Belajar</h5>
                                    <p>Proses belajar mengajar secara efektif dimulai</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- /Section: services -->

        <!-- Section: team -->
        <section id="pengajar" class="home-section bg-gray paddingbot-40">
            <div class="container marginbot-50">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="section-heading text-center">
                                <h2 class="h-bold">Pengajar</h2>
                                <p>Pengajar kami adalah pengajar yang memiliki kompetensi di bidangnya</p>
                            </div>
                        </div>
                        <div class="divider-short"></div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div id="filters-container" class="cbp-l-filters-alignLeft">
                            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                                Semua (<div class="cbp-filter-counter"></div>)
                            </div>
                            <div data-filter=".mts" class="cbp-filter-item">
                                MTs (<div class="cbp-filter-counter"></div>)
                            </div>
                            <div data-filter=".ma" class="cbp-filter-item">
                                MA (<div class="cbp-filter-counter"></div>)
                            </div>
                            <div data-filter=".yayasan" class="cbp-filter-item">
                                Yayasan (<div class="cbp-filter-counter"></div>)
                            </div>
                        </div>

                        <div id="grid-container" class="cbp-l-grid-team">
                            <ul>
                                <?php foreach ($pengajar as $item) {
                                    $lembaga = $item->lembaga==1?"mts":($item->lembaga==2?"ma":($item->lembaga==3?"yayasan":""));
                                ?>
                                <li class="cbp-item <?=$lembaga?>">
                                    <a href="profil-pengajar/<?php echo $item->id_pengajar?>" class="cbp-caption cbp-singlePage">
                                        <div class="cbp-caption-defaultWrap">
                                            <img src="<?php echo base_url().$item->foto_pengajar ?>" alt="" width="100%">
                                        </div>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body">
                                                    <div class="cbp-l-caption-text">Lihat Profil</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="profil-pengajar/<?php echo $item->id_pengajar?>" class="cbp-singlePage cbp-l-grid-team-name"><?=$item->nama_pengajar?></a>
                                    <div class="cbp-l-grid-team-position"><?=$item->profesi?></div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /Section: team -->

        <!-- Section: works -->
        <section id="facilities" class="home-section paddingbot-40">
            <div class="container marginbot-50">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="section-heading text-center">
                                <h2 class="h-bold">Fasilitas</h2>
                                <p>Fasilitas yang digunakan oleh kami untuk menunjang proses belajar mengajar</p>
                            </div>
                        </div>
                        <div class="divider-short"></div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <div class="wow bounceInUp" data-wow-delay="0.2s">
                            <div id="owl-works" class="owl-carousel">
                                <?php foreach ($fasilitas as $f) { ?>
                                <div class="item">
                                    <a href="<?php echo base_url().$f->foto_fasilitas?>" title="<?=$f->judul_foto?>" data-lightbox-gallery="gallery1" data-lightbox-hidpi="<?php echo base_url().$f->foto_fasilitas?>">
                                        <img src="<?php echo base_url().$f->foto_fasilitas?>" class="img-responsive" alt="img">
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Section: works -->

        <!-- Section: testimonial -->
        <section id="testimonial" class="home-section paddingbot-40 parallax" data-stellar-background-ratio="0.5">

            <div class="carousel-reviews broun-block">
                <div class="container">
                    <div class="row">
                        <div id="carousel-reviews" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">
                                <div class="item active">
                                    <?php $no=1; foreach ($testimoni as $item) { 
                                    if ($no < 4) { ?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="block-text rel zmin">
                                            <p><?=substr($item->testimoni,0,150)?>...</p>
                                            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                        </div>
                                        <div class="person-text rel text-light">
                                            <img src="<?php echo base_url().$item->foto?>" alt="<?=$item->nama?>" class="person img-circle" />
                                            <a title="" href="#"><?=$item->nama?></a>
                                            <span><?=$item->tempat?></span>
                                        </div>
                                    </div>
                                    <?php } $no++; } ?>
                                </div>
                                <div class="item">
                                <?php $no=4; foreach ($testimoni as $item) { 
                                    if ($no < 7) { ?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="block-text rel zmin">
                                            <p><?=substr($item->testimoni,0,150)?>...</p>
                                            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                        </div>
                                        <div class="person-text rel text-light">
                                            <img src="<?php echo base_url().$item->foto?>" alt="<?=$item->nama?>" class="person img-circle" />
                                            <a title="" href="#"><?=$item->nama?></a>
                                            <span><?=$item->tempat?></span>
                                        </div>
                                    </div>
                                    <?php } $no++; } ?>
                                </div>
                            </div>

                            <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Section: testimonial -->

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Tentang Kami</h5>
                                <p>Kami adalah salah satu Lembaga Pendidikan Islam di wilayah Purbalingga Jawa Tengah yang memiliki tujuan untuk mencerdaskan anak bangsa dengan penguasaan disiplin ilmu. Sehingga dengan demikian produk-produk pesantren dapat terjun di masyarakat di lingkungannya tidak canggung karena dibekali kecakapan hidup (life skill) serta dapat menyebarkan berbagai disiplin ilmu yang ia dapat ketika di pesantren.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Kontak Bantuan</h5>
                                <p>Jika anda membutuhkan bantuan / informasi, jangan sungkan hubungi kami melalui kontak dibawah ini</p>
                                <ul>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-calendar-o fa-stack-1x color-grey"></i>
                                        </span> Senin - Minggu, Pukul 08:00 - 14:00
                                    </li>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-phone fa-stack-1x color-grey"></i>
                                        </span> +<?=$data[4]->nilai?>
                                    </li>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-envelope-o fa-stack-1x color-grey"></i>
                                        </span> <?=$data[3]->nilai?>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Lokasi Kami</h5>
                                <p>Jl. Al-Ikhlas Kembangan 02/10 Kec. Bukateja Kab. Purbalingga 53382</p>
                            </div>
                        </div>
                        <div class="wow fadeInDown" data-wow-delay="0.1s">
                            <div class="widget">
                                <h5>Ikuti Kami</h5>
                                <ul class="company-social">
                                    <li class="social-facebook"><a href="<?=$data[5]->nilai?>"><i class="fa fa-facebook"></i></a></li>
                                    <li class="social-instagram"><a href="<?=$data[6]->nilai?>"><i class="fa fa-instagram"></i></a></li>
                                    <li class="social-youtube"><a href="<?=$data[7]->nilai?>"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="wow fadeInLeft" data-wow-delay="0.1s">
                                <div class="text-left">
                                    <p>&copy; Copyright - Sistem Penerimaan Santri <?=$data[0]->nilai?>. All rights reserved. - Developed by <a href="https://kangzulfa.com">Kangzulfa</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <a href="javascript:void(0)" class="scrollup"><i class="fa fa-angle-up active"></i></a>

    <!-- Core JavaScript Files -->
    <script>var wa_number = '<?=$data[4]->nilai?>';</script>
    <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.easing.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/wow.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.scrollTo.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.appear.js')?>"></script>
    <script src="<?php echo base_url('assets/js/stellar.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/owl.carousel.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/nivo-lightbox.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js?v=').$version?>"></script>
    <script>
        var base_url = '<?=base_url()?>';
        $("#formDaftar").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: base_url + "registrasi",
                data: $(this).serialize(),
                type: "post",
                dataType: "json",
                success: function (data) {
                    alert(data.message);
                    if (data.success == true) {
                        location.reload();
                    } else {
                        $("#nama_siswa").focus();
                    }
                },
                error: function (data) {
                    alert("Kesalahan Saat Posting Data");
                }
            })
        })
        $("#datepicker").datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
            orientation: "bottom right"
        })
    </script>
</body>

</html>
