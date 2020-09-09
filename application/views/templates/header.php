<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/uploader_bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Nov 2019 15:23:52 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin - SIMAS</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/bootstrap_limitless.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/layout.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/custom.css')?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/components.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/colors.min.css')?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<!-- /global stylesheets -->


	<!-- Theme JS files -->
	<script src="<?=base_url('assets/js/uniform.min.js')?>"></script>
	<script src="<?=base_url('assets/js/switchery.min.js')?>"></script>
	<script src="<?=base_url('assets/js/switch.min.js')?>"></script>
	<script src="<?=base_url('assets/js/form_checkboxes_radios.js')?>"></script>


	<!-- <script src="../../../../global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="../../../../global_assets/js/plugins/forms/styling/switch.min.js"></script>

	<script src="../../../../global_assets/js/demo_pages/form_checkboxes_radios.js"></script> -->
	<!-- /theme JS files -->

	<!-- Core JS files -->
	<script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
	<script src="<?= base_url('assets/js/blockui.min.js')?>"></script>
	<script src="<?= base_url('assets/js/datatables_advanced.js')?>"></script>
	<script src="<?= base_url('assets/js/datatables.min.js')?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>


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
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="	fa fa-navicon"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="fa fa-navicon"></i>
					</a>
				</li>
			</ul>

			<span class="badge bg-success ml-md-3 mr-md-auto">Admin Panel | <?=$this->session->userdata('nama')?></span>

			<ul class="navbar-nav">
			
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<span>e-survei</span>
					</a>
				</li>
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<span>System <i class="ml-2 fa fa-angle-down"></i></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="<?= base_url()?>" target="_blank" class="dropdown-item"><i class="fa fa-grav"></i> Your Page</a>
						<a href="<?= base_url('login/logout')?>/<?=$this->session->userdata('username')?>" class="dropdown-item"><i class="fa fa-external-link"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">
				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Menu</div> <i class="icon-menu" title="Main"></i></li>
						<?php 
							$rl=array('1','4');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>
								<li class="nav-item">
									<a href="<?= base_url('admin')?>" class="nav-link <?php if($page=='dashboard'){echo 'active';};?>">
										<i class="fa fa-plus-circle"></i>
										<span>Dashboard</span>
									</a>
								</li>
						<?php }?>

						<?php 
							$rl=array('1');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>
								<li class="nav-item">
									<a href="<?= base_url('admin/kelas')?>" class="nav-link <?php if($page=='kelas'){echo 'active';};?>">
										<i class="fa fa-plus-circle"></i>
										<span>Kelas</span>
									</a>
								</li>
						<?php }?>

						<!-- Kegiatan EL -->
						<?php 
							$rl=array('5','8','4');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>
								<li class="nav-item">
									<a href="<?= base_url('document/proposal')?>" class="nav-link <?php if($page=='daftar_proposal'){echo 'active';};?>">
										<i class="fa fa-plus-circle"></i>
										<span>Proposal Kegiatan</span>
									</a>
								</li>
						<?php }?>

						<?php 
							$rl=array('5','8','4');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>
								<li class="nav-item">
									<a href="<?= base_url('document/laporan')?>" class="nav-link <?php if($page=='daftar_laporan'){echo 'active';};?>">
										<i class="fa fa-plus-circle"></i>
										<span>Laporan Kegiatan</span>
									</a>
								</li>
						<?php }?>
						
						<?php 
							$rl=array('2');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>
								<li class="nav-item nav-item-submenu <?php if($page=='tambahOsis'||$page=='daftarOsis'){echo 'nav-item-expanded nav-item-open';};?>">
									<a href="#" class="nav-link <?php if($page=='tambahOsis'||$page=='daftarOsis'){echo 'active';};?>"><i class="fa fa-gear"></i> <span>OSIS</span></a>

									<ul class="nav nav-group-sub" data-submenu-title="Layouts">
										<li class="nav-item"><a href="<?= base_url('admin/osis')?>" class="nav-link <?php if($page=='tambahOsis'){echo 'active';};?>">Tambah OSIS</a></li>
										<li class="nav-item"><a href="<?= base_url('admin/daftarOsis')?>" class="nav-link <?php if($page=='daftarOsis'){echo 'active';};?>">Daftar OSIS</a></li>
									</ul>
								</li>
						<?php }?>

						<?php 
							$rl=array('2');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>
								<li class="nav-item nav-item-submenu <?php if($page=='tambahSiswa'||$page=='daftarSiswa'){echo 'nav-item-expanded nav-item-open';};?>">
									<a href="#" class="nav-link <?php if($page=='tambahSiswa'||$page=='daftarSiswa'){echo 'active';};?>"><i class="fa fa-gear"></i> <span>Tim Sekolah</span></a>

									<ul class="nav nav-group-sub" data-submenu-title="Layouts">
										<li class="nav-item"><a href="<?= base_url('admin/siswa')?>" class="nav-link <?php if($page=='tambahSiswa'){echo 'active';};?>">Tambah Tim</a></li>
										<li class="nav-item"><a href="<?= base_url('admin/daftarSiswa')?>" class="nav-link <?php if($page=='daftarSiswa'){echo 'active';};?>">Daftar Tim Sekolah</a></li>
									</ul>
								</li>
						<?php }?>

						<?php 
							$rl=array('2');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>
								<li class="nav-item nav-item-submenu <?php if($page=='tambahSiswa'||$page=='daftarSiswa'){echo 'nav-item-expanded nav-item-open';};?>">
									<a href="#" class="nav-link <?php if($page=='tambahSiswa'||$page=='daftarSiswa'){echo 'active';};?>"><i class="fa fa-gear"></i> <span>Berkas OSIS</span></a>

									<ul class="nav nav-group-sub" data-submenu-title="Layouts">
										<li class="nav-item"><a href="<?= base_url('admin/siswa')?>" class="nav-link <?php if($page=='tambahSiswa'){echo 'active';};?>">Daftar Proposal Kegiatan</a></li>
										<li class="nav-item"><a href="<?= base_url('admin/daftarSiswa')?>" class="nav-link <?php if($page=='daftarSiswa'){echo 'active';};?>">Daftar Laporan Kegiatan</a></li>
									</ul>
								</li>
						<?php }?>
						
						<?php 
							$rl=array('2');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>
								<li class="nav-item nav-item-submenu <?php if($page=='tambahSiswa'||$page=='daftarSiswa'){echo 'nav-item-expanded nav-item-open';};?>">
									<a href="#" class="nav-link <?php if($page=='tambahSiswa'||$page=='daftarSiswa'){echo 'active';};?>"><i class="fa fa-gear"></i> <span>Berkas Tim Sekolah</span></a>

									<ul class="nav nav-group-sub" data-submenu-title="Layouts">
										<li class="nav-item"><a href="<?= base_url('admin/siswa')?>" class="nav-link <?php if($page=='tambahSiswa'){echo 'active';};?>">Daftar Proposal Kegiatan</a></li>
										<li class="nav-item"><a href="<?= base_url('admin/daftarSiswa')?>" class="nav-link <?php if($page=='daftarSiswa'){echo 'active';};?>">Daftar Laporan Kegiatan</a></li>
									</ul>
								</li>
						<?php }?>

						<!-- End Kegiatan El -->
						<?php 
							$rl=array('6');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>		
								<li class="nav-item">
									<a href="<?= base_url('admin/mutu')?>" class="nav-link <?php if($page=='mutu'){echo 'active';};?>">
										<i class="fa fa-plus-circle"></i>
										<span>Data Mutu</span>
									</a>
								</li>
						<?php }?>

						<?php 
							$rl=array('3');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>		
								<li class="nav-item">
									<a href="<?= base_url('admin/mapel')?>" class="nav-link <?php if($page=='mapel'){echo 'active';};?>">
										<i class="fa fa-plus-circle"></i>
										<span>Mata Pelajaran</span>
									</a>
								</li>
						<?php }?>

						<?php 
							$rl=array('2');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>
								<li class="nav-item nav-item-submenu <?php if($page=='tambahSiswa'||$page=='daftarSiswa'){echo 'nav-item-expanded nav-item-open';};?>">
									<a href="#" class="nav-link <?php if($page=='tambahSiswa'||$page=='daftarSiswa'){echo 'active';};?>"><i class="fa fa-gear"></i> <span>Siswa</span></a>
									<ul class="nav nav-group-sub" data-submenu-title="Layouts">
										<li class="nav-item"><a href="<?= base_url('admin/siswa')?>" class="nav-link <?php if($page=='tambahSiswa'){echo 'active';};?>">Tambah Siswa</a></li>
										<li class="nav-item"><a href="<?= base_url('admin/daftarSiswa')?>" class="nav-link <?php if($page=='daftarSiswa'){echo 'active';};?>">Daftar Siswa</a></li>
									</ul>
								</li>
						<?php }?>

						<?php 
							$rl=array('3');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>
								<li class="nav-item nav-item-submenu <?php if($page=='addGuru'||$page=='daftarGuru'||$page=='jadwalGuru'){echo 'nav-item-expanded nav-item-open';};?>">
									<a href="#" class="nav-link <?php if($page=='admin'||$page=='config'){echo 'active';};?>"><i class="fa fa-gear"></i> <span>Guru</span></a>

									<ul class="nav nav-group-sub" data-submenu-title="Layouts">
										<li class="nav-item"><a href="<?= base_url('admin/guru')?>" class="nav-link <?php if($page=='addGuru'){echo 'active';};?>">Tambah Guru</a></li>
										<li class="nav-item"><a href="<?= base_url('admin/daftarGuru')?>" class="nav-link <?php if($page=='daftarGuru'){echo 'active';};?>">Daftar Guru</a></li>
									</ul>
								</li>
						<?php }?>

						<?php 
							$rl=array('3','4');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>
								<li class="nav-item nav-item-submenu <?php if($page=='presensi'||$page=='presensi'){echo 'nav-item-expanded nav-item-open';};?>">
									<a href="#" class="nav-link <?php if($page=='presensi'||$page=='presensi'){echo 'active';};?>"><i class="fa fa-plus-circle"></i> <span>Kinerja Guru</span></a>
									<ul class="nav nav-group-sub" data-submenu-title="Layouts">
										<li class="nav-item"><a href="<?= base_url('admin/daftarPresensi')?>" class="nav-link <?php if($page=='presensi'){echo 'active';};?>">Guru</a></li>
									</ul>
								</li>
						<?php }?>

						
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Lainnya</div> <i class="icon-menu" title="Main"></i></li>
						<?php 
							$rl=array('1');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>
								<li class="nav-item">
									<a href="<?=base_url('admin/informasi')?>" class="nav-link <?php if($page=='informasi'){echo 'active';};?>">
										<i class="fa fa-plus-circle"></i>
										<span>Informasi</span>
									</a>
								</li>
						<?php }?>

						<?php 
							$rl=array('1');
							$role=$this->session->userdata('role');
							if(in_array($role,$rl)){ ?>
								<li class="nav-item nav-item-submenu <?php if($page=='pengguna'||$page=='libur'){echo 'nav-item-expanded nav-item-open';};?>">
									<a href="#" class="nav-link <?php if($page=='pengguna'){echo 'active';};?>"><i class="fa fa-gear"></i> <span>Pengaturan</span></a>

									<ul class="nav nav-group-sub" data-submenu-title="Layouts">
										<li class="nav-item"><a href="<?= base_url('admin/pengguna')?>" class="nav-link <?php if($page=='pengguna'){echo 'active';};?>">Pengguna</a></li>
										<li class="nav-item"><a href="<?= base_url('admin/libur')?>" class="nav-link <?php if($page=='libur'){echo 'active';};?>">Tanggal Libur</a></li>
										<li class="nav-item"><a href="<?= base_url('admin/akademik')?>" class="nav-link <?php if($page=='libur'){echo 'active';};?>">Tahun Akademik</a></li>
									</ul>
								</li>
						<?php }?>

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper mt-2">

			<!-- Page header -->
			<!-- <div class="page-header page-header-light mt-2">

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Admin</a>
							<a href="#" class="breadcrumb-item">Content Management</a>
							<span class="breadcrumb-item active">Add File</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

				
				</div>
			</div> -->
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Bootstrap file input -->