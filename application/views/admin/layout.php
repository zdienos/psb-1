<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Administrator | Sistem Penerimaan Siswa Baru</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/bootstrap.css')?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/AdminLTE.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/skin-purple.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/dataTables.bootstrap.min.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker.min.css')?>">
    <link rel="shortcut icon" href="<?=base_url('uploads/favicon.ico')?>" type="image/x-icon">
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<script src="<?php echo base_url('assets/backend/js/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('assets/backend/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/backend/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/backend/js/dataTables.bootstrap.min.js')?>"></script>
	<script>var base_url = "<?php echo base_url(); ?>"; </script>
</head>

<body class="hold-transition skin-purple sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<a href="javascript:void(0)" onclick="render('dashboard')" class="logo">
				<span class="logo-mini">
					<b>S</b>PSB</span>
				<span class="logo-lg">
					<b>Sistem PSB</b></span>
			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li>
							<a href="javascript:void(0)" id="sekarang"></a>
						</li>
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url('assets/backend/img/user-icon.png')?>" class="user-image" alt="User Image">
								<span class="hidden-xs"><?=$this->session->real_name;?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<img src="<?php echo base_url('assets/backend/img/user-icon.png')?>" class="img-circle" alt="User Image">
									<p> Administrator PSB </p>
								</li>
								<li class="user-footer">
									<div class="pull-left">
										<a href="#" class="btn btn-primary btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="<?php echo base_url('logout') ?>" class="btn btn-danger btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>


		<aside class="main-sidebar">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo base_url('assets/backend/img/user-icon.png')?>" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p><?=$this->session->real_name;?></p>
						<a href="#">
							<i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>
					<li>
						<a href="dashboard" class="nav-link">
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
						</a>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-group"></i>
							<span>Data Pendaftar</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="data_pendaftar/1" class="nav-link"><i class="fa fa-circle-o"></i> MTs</a>
							</li>
							<li>
								<a href="data_pendaftar/2" class="nav-link"><i class="fa fa-circle-o"></i> MA</a>
							</li>
							<li>
								<a href="data_pendaftar/3" class="nav-link"><i class="fa fa-circle-o"></i> Pondok</a>
							</li>
						</ul>
					</li>
				</ul>
			</section>
		</aside>


		<div class="content-wrapper" id="main-container">

		</div>

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 1.1.0
			</div>
			<strong>Copyright &copy; 2018-<?php echo date('Y') ?>
				<a href="https://kangzulfa.com">Kangzulfa.com</a>.</strong> All rights reserved.
		</footer>
	</div>
	<script src="<?php echo base_url('assets/backend/js/jquery.slimscroll.min.js')?>"></script>
	<script src="<?php echo base_url('assets/backend/js/fastclick.js')?>"></script>
	<script src="<?php echo base_url('assets/backend/js/adminlte.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.min.js')?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="<?php echo base_url('assets/backend/js/app.js')?>"></script>
    <script>
        $(document).ready(function () {
            $('.sidebar-menu').tree()
            render('dashboard');
        })
    </script>
</body>

</html>