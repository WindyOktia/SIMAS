<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/uploader_bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Nov 2019 15:23:52 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Welcome To BOSA School Mangement System</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/bootstrap_limitless.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/layout.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/custom.css')?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/components.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/colors.min.css')?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
	<script src="<?= base_url('assets/js/blockui.min.js')?>"></script>
	<script src="<?= base_url('assets/js/datatables_advanced.js')?>"></script>
	<script src="<?= base_url('assets/js/datatables.min.js')?>"></script>


	<!-- <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script> -->
	

	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?= base_url('assets/js/purify.min.js')?>"></script>
	<script src="<?= base_url('assets/js/sortable.min.js')?>"></script>
	<script src="<?= base_url('assets/js/fileinput.min.js')?>"></script>

	<script src="<?= base_url('assets/js/app.js')?>"></script>
	<script src="<?= base_url('assets/js/uploader_bootstrap.js')?>"></script>

	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="#" class="d-inline-block text-white">
                <i class="fa fa-leaf mr-3 mr-md-auto"></i> BOSA School Management
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="fa fa-code-fork"></i>
			</button>
			
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<!-- <i class="fa fa-navicon"></i> -->
					</a>
				</li>
			</ul>

			<span class=" mr-md-auto"></span>

			<ul class="navbar-nav">
			
				<li class="nav-item dropdown dropdown-user">
					<a href="<?=base_url('presensi')?>" target="_blank" class="navbar-nav-link d-flex align-items-center">
						<span>Presensi Harian</span>
					</a>
				</li>
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<span>Login <i class="ml-2 fa fa-angle-down"></i></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<div class="container">
							<form action="<?= base_url('login/do_login')?>" method="post">
								<input type="text" name="user" class="form-control mb-1" autocomplete='off' placeholder="username">
								<input type="password" name="pass" class="form-control mb-1" autocomplete='off' placeholder="password">
								<button type="submit" class="btn btn-sm btn-primary btn-block">Login</button>
							</form>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
	
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper mt-2">



			<!-- Content area -->
			<div class="content">

				<!-- Bootstrap file input -->