<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	
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
	<link href="<?= base_url('assets/') ?>admin/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
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
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>admin/css/app.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>admin/css/icons.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>admin/css/application_member.css?v=2.0.0" rel="stylesheet" type="text/css"></link>

	<title> <?= $session ?> | FeducationID </title>
</head>
<?php $controller = $this->uri->segment(1);
$modul = $this->uri->segment(2);
$params = $this->uri->segment(3); ?>

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
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li class="menu-label">MAIN NAVIGATION</li>
				<li>
					<a href="<?= base_url("member") ?>">
						<div class="parent-icon"><i class="bx bx-home-circle"></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-book'></i>
						</div>
						<div class="menu-title">Kelas Saya</div>
					</a>
					<ul>
						<li> <a href="<?= base_url("member/course/playlists") ?>"><i class="bx bx-right-arrow-alt"></i>Playlist</a>
						</li>
						<!-- <li> <a href="<?= base_url("trading-education-ebook") ?>"><i class="bx bx-right-arrow-alt"></i>Invoice</a> -->
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bxl-microsoft-teams'></i>
						</div>
						<div class="menu-title">Afiliasi</div>
					</a>
					<ul>
						<li> <a href="<?= base_url("member/referal") ?>"><i class="bx bx-right-arrow-alt"></i>Akun Afiliasi</a>
						</li>
						<!-- <li> <a href="<?= base_url("member/referal/structure")?>"><i class="bx bx-right-arrow-alt"></i>Struktur Afiliasi</a>
						</li>
						<li> <a href="<?= base_url("member/referal/comission") ?> "><i class="bx bx-right-arrow-alt"></i>Komisi Afiliasi</a>
						</li> -->
						<li> <a href="<?= base_url("member/withdrawal") ?>"><i class="bx bx-right-arrow-alt"></i>Withdrawal</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">Akun</div>
					</a>
					<ul>
						<li> <a href="<?= base_url("member/profile") ?>"><i class="bx bx-right-arrow-alt"></i>Profile</a>
						</li>
						<li> <a href="<?= base_url("member/bank/account") ?>"><i class="bx bx-right-arrow-alt"></i>Rekening</a>
						</li>
						<li> <a href="<?= base_url("member/password") ?>"><i class="bx bx-right-arrow-alt"></i>Password</a>
						</li>
						<li> <a href="<?php echo base_url(); ?>member/logout"><i class=" bx bx-right-arrow-alt"></i>Logout</a>
						</li>
					</ul>
				</li>
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
								<a class="nav-link" href="#"> <i class='bx bx-search'></i>
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
										<!--					ago</span></h6>-->
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
<!--								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>-->
<!--									<i class='bx bx-comment'></i>-->
<!--								</a>-->
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
							<?php

							$memberImage = "";
							if ($this->session->userdata("member_image")){
								$fileName	= $this->session->userdata("member_image");
								$memberImage = base_url("assets/resources/images/accounts/memberImageProfiles/").$fileName;
							} else {
								$memberImage = base_url("assets/resources/images/accounts/memberImageProfiles/default_profil_image.png");
							}?>

							<img src="<?= $memberImage ?>" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?= $this->session->userdata('member_full_name'); ?></p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="<?= base_url("member/profile") ?>"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="<?php echo base_url(); ?>member/logout"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<!--end header -->
	<!--start page wrapper -->
	<div class=" page-wrapper mb-5">
			<div class="page-content">
				<!-- Main content -->
				<?php ($content == 'under_constructions') ? $this->load->view('errors/html/kabinetUnderConstructions', $session) : $this->load->view($content); ?>
				<!-- /.content -->
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">PT. Feducation Digital Indonesia Copyright © <?= date("Y"); ?>. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
	<script src="<?= base_url('assets/') ?>admin/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?= base_url('assets/') ?>admin/plugins/jquery.min.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/jquery-validate.min.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/additional-methods.min.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/chartjs/js/Chart.min.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/jquery-knob/excanvas.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/jquery-knob/jquery.knob.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/select2/js/select2.min.js"></script>
	<!--notification js -->
	<script src="<?= base_url('assets/') ?>admin/plugins/notifications/js/lobibox.min.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/notifications/js/notifications.min.js"></script>
	<script src="<?= base_url('assets/') ?>admin/plugins/notifications/js/notification-custom-script.js"></script>
	<!-- <script src="<?= base_url('assets/') ?>admin/js/index.js"></script> -->

	<!--app JS-->
	<script src="<?= base_url('assets/') ?>admin/js/app.js"></script>
	<script src="<?= base_url('assets/') ?>admin/js/application_member.js?v=4.0.0"></script>

	<!-- custom script -->
	<?php if($params == "watch"):?>
		<script>
		
		// new PerfectScrollbar('.product-list');
			
		</script>
	<?php endif;?>
</body>

</html>
