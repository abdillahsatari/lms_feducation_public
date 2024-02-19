<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
		<meta name="google-site-verification" content="28n6mrPzLLc5V-qq9jPMxGKOCyP-ajk7eRY2RNA_yL4" />

		<meta name="description" content="<?= isset($metaData->ogDescription) ? $metaData->ogDescription : "Feducation adalah Lembaga Pendidikan non-formal yang berkonsentrasi pada pelatihan Trading Forex, Digital Marketing, Web Programming, dan Multimedia guna membantu masyarakat umum dalam mewujudkan Amanah UUD 1945, yaitu Mencerdaskan Kehidupan Bangsa serta membantu pemerintah untuk menekan angka pengangguran"?>">
		<meta name="author" content="Abdillah Satari Rahim">
		<meta name="keyword" content="<?= isset($metaData->ogKeyword) ? $metaData->ogKeyword : "prakerja, pelatihan prakerja, digital marketing, pelatihan digital marketing, magang, loker, kursus komputer, komunitas online"?>">
		
		<meta property="og:url" content="<?= isset($metaData->ogUrl) ? $metaData->ogUrl : "https://www.feducation.id"?>" />
		<meta property="og:title" content="<?= isset($metaData->ogTitle) ? $metaData->ogTitle : "Feducation | Pelatihan digital marketing | Magang Online | Loker | Kursus komputer | Komunitas online"?>" />
		<meta property="og:description" content="<?= isset($metaData->ogDescription) ? $metaData->ogDescription : "Feducation adalah Lembaga Pendidikan non-formal yang berkonsentrasi pada pelatihan Trading Forex, Digital Marketing, Web Programming, dan Multimedia guna membantu masyarakat umum dalam mewujudkan Amanah UUD 1945, yaitu Mencerdaskan Kehidupan Bangsa serta membantu pemerintah untuk menekan angka pengangguran"?>" />
		<meta property="og:image" content="<?= isset($metaData->ogImage) ? base_url('/assets/resources/images/articles/thumbnails/'.$metaData->ogImage) : base_url('/assets/resources/apps/logo-1.png')?>" />

		<!-- favicons Icons -->
		<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/')?>resources/apps/favicons/apple-touch-icon.png" />
		<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/')?>resources/apps/favicons/favicon-32x32.png" />
		<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/')?>resources/apps/favicons/favicon-16x16.png" />
		<link rel="manifest" href="<?=base_url('assets/')?>resources/apps/favicons/site.webmanifest" />

		<!--plugins-->
		<link rel="stylesheet" href="<?= base_url('assets/') ?>admin/plugins/notifications/css/lobibox.min.css" />
		<link href="<?= base_url('assets/') ?>admin/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
		<link href="<?= base_url('assets/') ?>admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
		<link href="<?= base_url('assets/') ?>admin/plugins/select2/css/select2.min.css" rel="stylesheet" />
		<link href="<?= base_url('assets/') ?>admin/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
		<link href="<?= base_url('assets/') ?>admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
		<link href="<?= base_url('assets/') ?>admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
		<link href="<?= base_url('assets/') ?>admin/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

		<!-- loader-->
		<link href="<?= base_url('assets/') ?>admin/css/pace.min.css" rel="stylesheet" />
		<script src="<?= base_url('assets/') ?>admin/js/pace.min.js"></script>

		<!-- Bootstrap CSS -->
		<link href="<?= base_url('assets/') ?>admin/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= base_url('assets/') ?>admin/css/bootstrap-extended.css" rel="stylesheet">
		<link href="<?= base_url('assets/') ?>admin/css/bootstrap-extended.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
		<link href="<?= base_url('assets/') ?>admin/css/app.css" rel="stylesheet">
		<link href="<?= base_url('assets/') ?>admin/css/icons.css" rel="stylesheet">
		<link href="<?= base_url('assets/') ?>admin/css/application_admin.css?v=2.0.0" rel="stylesheet" type="text/css"></link>

		<title> <?= $session ?> | Feducation Id </title>
	</head>
	<?php $controller = $this->uri->segment(1); $modul = $this->uri->segment(2); $params = $this->uri->segment(3); ?>
	<body class="bg-theme bg-theme2">
		<!--wrapper-->
		<div class="wrapper">
			<!--sidebar wrapper -->
			<div class="sidebar-wrapper" data-simplebar="true">
				<div class="sidebar-header">
					<div>
						<img src="<?= base_url('assets/') ?>admin/images/logo-icon.png" class="logo-icon" alt="logo icon">
					</div>
					<div>
						<h4 class="logo-text">FeducationID</h4>
					</div>
					<div class="toggle-icon ms-auto">
						<i class='bx bx-arrow-to-left'></i>
					</div>
				</div>
				<!--navigation-->
				<ul class="metismenu" id="menu">
					<?php if ($this->session->userdata("user_role_type") == UserRoleType::ADMIN) {?>
						<li class="menu-label">MAIN</li>
						<li>
							<a href="<?= base_url("admin") ?>">
								<div class="parent-icon"><i class="bx bx-home-circle"></i>
								</div>
								<div class="menu-title">Dashboard</div>
							</a>
						</li>
						<li>
							<a href="javascript:;" class="has-arrow">
								<div class="parent-icon"><i class="fadeIn animated bx bx-news"></i>
								</div>
								<div class="menu-title">Courses</div>
							</a>
							<ul>
								<li> <a href="<?= base_url('admin/courses')?>"><i class="bx bx-right-arrow-alt"></i>List Courses</a>
								</li>
								<li> <a href="<?= base_url('admin/course/types')?>"><i class="bx bx-right-arrow-alt"></i>Course Program</a>
								</li>
								<li> <a href="<?= base_url('admin/course/category')?>"><i class="bx bx-right-arrow-alt"></i>Course Categories</a>
								</li>
								<li> <a href="<?= base_url('admin/course/tutor')?>"><i class="bx bx-right-arrow-alt"></i>Course Tutors</a>
								</li>
								<li> <a href="<?= base_url('admin/course/highlight')?>"><i class="bx bx-right-arrow-alt"></i>Highlighted Course</a>
								</li>
								<li> <a href="<?= base_url("admin/course/registration") ?>"><i class="bx bx-right-arrow-alt"></i>Course Registration</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?= base_url("admin/member") ?>">
								<div class="parent-icon"><i class="fadeIn animated bx bx-user-pin"></i>
								</div>
								<div class="menu-title">Member LMS</div>
							</a>
						</li>
						<li class="menu-label">PUBLIC RELATION</li>
						<li>
							<a href="javascript:;" class="has-arrow">
								<div class="parent-icon"><i class="fadeIn animated bx bx-user-circle"></i>
								</div>
								<div class="menu-title">Intern</div>
							</a>
							<ul>
								<li> <a href="<?= base_url("admin/pr/intern/list") ?>"><i class="bx bx-right-arrow-alt"></i>List Intern</a>
								</li>
								<li> <a href="<?= base_url("admin/pr/intern/presensi") ?>"><i class="bx bx-right-arrow-alt"></i>Presensi Intern</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?= base_url("visitors-feedback") ?>">
								<div class="parent-icon"><i class="fadeIn animated bx bx-chat"></i>
								</div>
								<div class="menu-title">Fast Respond</div>
							</a>
						</li>
						<li>
							<a href="<?= base_url("admin/pr/mitra/bisnis") ?>">
								<div class="parent-icon"><i class="fadeIn animated bx bx-sitemap"></i>
								</div>
								<div class="menu-title">Mitra</div>
							</a>
						</li>
					<?php } ?>
					<li class="menu-label">Homepage</li>
					<li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon"><i class="fadeIn animated bx bx-news"></i>
							</div>
							<div class="menu-title">Article</div>
						</a>
						<ul>
							<li> <a href="<?= base_url("admin/article") ?>"><i class="bx bx-right-arrow-alt"></i>List Article</a>
							</li>
							<?php if ($this->session->userdata("user_role_type") == UserRoleType::ADMIN) {?>
							<li> <a href="<?= base_url("admin/article/category") ?>"><i class="bx bx-right-arrow-alt"></i>Article Categories</a>
							</li>
							<li> <a href="<?= base_url("admin/featuredArticle") ?>"><i class="bx bx-right-arrow-alt"></i>Featured Article</a>
							</li>
							<?php } ?>
						</ul>
					</li>
					<?php if ($this->session->userdata("user_role_type") == UserRoleType::ADMIN) {?>
						<li class="menu-label">SETTING</li>
						<li>
							<a href="javascript:;" class="has-arrow">
								<div class="parent-icon"><i class="fadeIn animated bx bx-slider-alt"></i>
								</div>
								<div class="menu-title">Settings</div>
							</a>
							<ul>
<!--								<li> <a href="--><?//= base_url('admin/benefits')?><!--"><i class="bx bx-right-arrow-alt"></i>Setting Khusus</a>-->
<!--								</li>-->
								<li> <a href="<?= base_url('admin/bankAccount')?>"><i class="bx bx-right-arrow-alt"></i>Rekening</a>
								</li>
							</ul>
						</li>
					<?php }?>
				</ul>
				<!--end navigation-->
			</div>
			<!--end sidebar wrapper -->
			<!--start header -->
			<header>
				<div class="topbar d-flex align-items-center">
					<nav class="navbar navbar-expand">
						<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
						</div>
						<!-- SEARCH BAR -->
						<!-- ./SEARCH BAR-->
						<div class="top-menu ms-auto">
							<ul class="navbar-nav align-items-center">
								<li class="nav-item mobile-search-icon">
									<a class="nav-link" href="#">	<i class='bx bx-search'></i>
									</a>
								</li>
								<li class="nav-item dropdown dropdown-large">
									<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
									<!--<span class="alert-count">7</span>-->
										<i class='bx bx-bell'></i>
									</a>
									<div class="dropdown-menu dropdown-menu-end">
										<a href="javascript:;">
											<div class="msg-header">
												<p class="msg-header-title">Notifications</p>
												<p class="msg-header-clear ms-auto">Marks all as read</p>
											</div>
										</a>
										<div class="header-notifications-list">
											<!--<a class="dropdown-item" href="javascript:;">-->
											<!--	<div class="d-flex align-items-center">-->
											<!--		<div class="notify"><i class="bx bx-group"></i>-->
											<!--		</div>-->
											<!--		<div class="flex-grow-1">-->
											<!--			<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec-->
											<!--			ago</span></h6>-->
											<!--			<p class="msg-info">5 new user registered</p>-->
											<!--		</div>-->
											<!--	</div>-->
											<!--</a>-->
										</div>
										<a href="javascript:;">
											<div class="text-center msg-footer">View All Notifications</div>
										</a>
									</div>
								</li>
								<li class="nav-item dropdown dropdown-large">
		<!--							<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>-->
		<!--								<i class='bx bx-comment'></i>-->
		<!--							</a>-->
									<div class="dropdown-menu dropdown-menu-end">
										<a href="javascript:;">
											<div class="msg-header">
												<p class="msg-header-title">Messages</p>
												<p class="msg-header-clear ms-auto">Marks all as read</p>
											</div>
										</a>
										<div class="header-message-list">
											<a class="dropdown-item" href="javascript:;">
												<div class="d-flex align-items-center">
													<div class="user-online">
														<img src="<?= base_url('assets/') ?>admin/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
													</div>
													<div class="flex-grow-1">
														<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
														ago</span></h6>
														<p class="msg-info">The standard chunk of lorem</p>
													</div>
												</div>
											</a>
											<a class="dropdown-item" href="javascript:;">
												<div class="d-flex align-items-center">
													<div class="user-online">
														<img src="<?= base_url('assets/') ?>admin/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
													</div>
													<div class="flex-grow-1">
														<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
														sec ago</span></h6>
														<p class="msg-info">Many desktop publishing packages</p>
													</div>
												</div>
											</a>
											<a class="dropdown-item" href="javascript:;">
												<div class="d-flex align-items-center">
													<div class="user-online">
														<img src="<?= base_url('assets/') ?>admin/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar">
													</div>
													<div class="flex-grow-1">
														<h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
														ago</span></h6>
														<p class="msg-info">Various versions have evolved over</p>
													</div>
												</div>
											</a>
											<a class="dropdown-item" href="javascript:;">
												<div class="d-flex align-items-center">
													<div class="user-online">
														<img src="<?= base_url('assets/') ?>admin/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
													</div>
													<div class="flex-grow-1">
														<h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
														min ago</span></h6>
														<p class="msg-info">Making this the first true generator</p>
													</div>
												</div>
											</a>
											<a class="dropdown-item" href="javascript:;">
												<div class="d-flex align-items-center">
													<div class="user-online">
														<img src="<?= base_url('assets/') ?>admin/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar">
													</div>
													<div class="flex-grow-1">
														<h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
														ago</span></h6>
														<p class="msg-info">Duis aute irure dolor in reprehenderit</p>
													</div>
												</div>
											</a>
											<a class="dropdown-item" href="javascript:;">
												<div class="d-flex align-items-center">
													<div class="user-online">
														<img src="<?= base_url('assets/') ?>admin/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar">
													</div>
													<div class="flex-grow-1">
														<h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
														ago</span></h6>
														<p class="msg-info">The passage is attributed to an unknown</p>
													</div>
												</div>
											</a>
											<a class="dropdown-item" href="javascript:;">
												<div class="d-flex align-items-center">
													<div class="user-online">
														<img src="<?= base_url('assets/') ?>admin/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar">
													</div>
													<div class="flex-grow-1">
														<h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
														ago</span></h6>
														<p class="msg-info">The point of using Lorem</p>
													</div>
												</div>
											</a>
											<a class="dropdown-item" href="javascript:;">
												<div class="d-flex align-items-center">
													<div class="user-online">
														<img src="<?= base_url('assets/') ?>admin/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
													</div>
													<div class="flex-grow-1">
														<h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
														ago</span></h6>
														<p class="msg-info">It was popularised in the 1960s</p>
													</div>
												</div>
											</a>
											<a class="dropdown-item" href="javascript:;">
												<div class="d-flex align-items-center">
													<div class="user-online">
														<img src="<?= base_url('assets/') ?>admin/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar">
													</div>
													<div class="flex-grow-1">
														<h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
														ago</span></h6>
														<p class="msg-info">Various versions have evolved over</p>
													</div>
												</div>
											</a>
											<a class="dropdown-item" href="javascript:;">
												<div class="d-flex align-items-center">
													<div class="user-online">
														<img src="<?= base_url('assets/') ?>admin/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar">
													</div>
													<div class="flex-grow-1">
														<h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
														ago</span></h6>
														<p class="msg-info">If you are going to use a passage</p>
													</div>
												</div>
											</a>
											<a class="dropdown-item" href="javascript:;">
												<div class="d-flex align-items-center">
													<div class="user-online">
														<img src="<?= base_url('assets/') ?>admin/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar">
													</div>
													<div class="flex-grow-1">
														<h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
														ago</span></h6>
														<p class="msg-info">All the Lorem Ipsum generators</p>
													</div>
												</div>
											</a>
										</div>
										<a href="javascript:;">
											<div class="text-center msg-footer">View All Messages</div>
										</a>
									</div>
								</li>
							</ul>
						</div>
						<div class="user-box dropdown">
							<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<img data-name="<?= $this->session->userdata("user_full_name")?>" class="user-img js-profile_image" alt="user avatar">
								<div class="user-info ps-3">
									<p class="user-name mb-0"><?= $this->session->userdata('user_full_name');?></p>
								</div>
							</a>
							<ul class="dropdown-menu dropdown-menu-end">
								<!--<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>-->
								<!--</li>-->
								<li>
									<div class="dropdown-divider mb-0"></div>
								</li>
								<li><a class="dropdown-item" href="<?php echo base_url(); ?>admin/adminLogout"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</header>
			<!--end header -->
			<!--start page wrapper -->
			<div class="page-wrapper mb-5">
				<div class="page-content">
					<!-- Main content -->
					<?php ($content == 'under_constructions') ? $this->load->view('errors/html/kabinetUnderConstructions', $session): $this->load->view($content) ; ?>
					<!-- /.content -->
				</div>
			</div>
			<!--end page wrapper -->
			<!--start overlay-->
			<!--end overlay-->
			<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
			<!--End Back To Top Button-->
			<footer class="page-footer">
				<p class="mb-0">Feducation ID Copyright © 2022. All right reserved.</p>
			</footer>
		</div>
		<!--end wrapper-->
		<!--start switcher-->
		<!--end switcher-->

		<!-- Bootstrap JS -->
		<script src="<?= base_url('assets/') ?>admin/js/bootstrap.bundle.min.js"></script>
		<!--plugins-->
		<script src="<?= base_url('assets/') ?>admin/plugins/jquery.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/jquery-validate.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/additional-methods.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/simplebar/js/simplebar.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/metismenu/js/metisMenu.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
		<script src="<?= base_url('assets/') ?>admin/js/imageuploadify.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/jquery-knob/excanvas.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/jquery-knob/jquery.knob.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/select2/js/select2.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/initial.js?v=0.0.1"></script>
		
		<?php if($modul == "course" || ($modul == "course" && ($params == "tutor" || ($modul == "course" && $params == "create")) || ($modul == "course" && $params == "edit"))):?>
			<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
			<script>
				tinymce.init({
				selector: '#tinyMceTextArea',
				height: 250,
				menubar: false,
				plugins: [
					"advlist", "anchor", "autolink", "charmap", "code", "fullscreen", 
					"help", "image", "insertdatetime", "link", "lists", "media", 
					"preview", "searchreplace", "table", "visualblocks", 
				],
				toolbar: "undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent"
				});
			</script>
		<?php endif;?>

		<!--notification js -->
		<script src="<?= base_url('assets/') ?>admin/plugins/notifications/js/lobibox.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/notifications/js/notifications.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/notifications/js/notification-custom-script.js"></script>

		<!--app JS-->
		<script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
		<script src="<?= base_url('assets/') ?>admin/js/app.js"></script>
		<script src="<?= base_url('assets/') ?>admin/plugins/chartjs/js/Chart.min.js"></script>
		<script src="<?= base_url('assets/') ?>admin/js/application_admin.js?v=4.0.0"></script>

		<script>
			$(function () {
				"use strict";


				if ($('.js-dashboard_chart').length > 0){
					// chart 1
					var ctx = document.getElementById('chart1').getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'line',
						data: {
							labels: ['2022-01', '2022-02', '2022-03', '2022-04', '2022-04', '2022-05', '2022-06'],
							datasets: [{
								label: 'Basic',
								data: [0, 5, 10],
								backgroundColor: "transparent",
								borderColor: "#fff",
								pointRadius: "0",
								borderWidth: 4
							}, {
								label: 'Advance',
								data: [0, 30, 6],
								backgroundColor: "transparent",
								borderColor: "#fff",
								pointRadius: "0",
								borderWidth: 4
							}]
						},
						options: {
							maintainAspectRatio: false,
							legend: {
								display: true,
								labels: {
									fontColor: '#fff',
									boxWidth: 40
								}
							},
							tooltips: {
								enabled: false
							},
							scales: {
								xAxes: [{
									ticks: {
										beginAtZero: true,
										fontColor: '#fff'
									},
									gridLines: {
										display: true,
										color: "rgba(255, 255, 255, 0.24)"
									},
								}],
								yAxes: [{
									ticks: {
										beginAtZero: true,
										fontColor: 'rgba(255, 255, 255, 0.64)'
									},
									gridLines: {
										display: true,
										color: "rgba(255, 255, 255, 0.24)"
									},
								}]
							}
						}
					});
				}
			});
		</script>

	</body>

</html>
