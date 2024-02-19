<?php

/*library init*/
$base_url = load_class('Config')->config['base_url'];
$security = load_class('Security');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="google-site-verification" content="28n6mrPzLLc5V-qq9jPMxGKOCyP-ajk7eRY2RNA_yL4" />
	<meta name="description" content="<?= isset($metaData->ogDescription) ? $metaData->ogDescription : "Feducation adalah Lembaga Pendidikan non formal bagi mereka yang ingin berlajar trading pemula, belajar forex, trading forex, dan trading saham. Didirikan pada 2 Februari 2022"?>">
	<meta name="author" content="Feducation Id">
	<meta name="keyword" content="<?= isset($metaData->ogKeyword) ? $metaData->ogKeyword : "belajar trading pemula, trading forex, trading saham, apa itu forex"?>">
	<meta property="og:url" content="<?= isset($metaData->ogUrl) ? $metaData->ogUrl : "https://www.feducation.id"?>" />
	<meta property="og:title" content="<?= isset($metaData->ogTitle) ? $metaData->ogTitle : "Feducation | belajar trading pemula | trading forex | trading saham"?>" />
	<meta property="og:description" content="<?= isset($metaData->ogDescription) ? $metaData->ogDescription : "Feducation adalah Lembaga Pendidikan non formal bagi mereka yang ingin berlajar trading pemula, belajar forex, trading forex, dan trading saham. Didirikan pada 2 Februari 2022"?>" />

	<title><?= isset($metaData->ogTitle) ? $metaData->ogTitle : "Feducation | belajar trading pemula | trading forex | trading saham"?></title>

	<!-- favicons Icons -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?=$base_url?>/assets/images/favicons/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="<?=$base_url?>/assets/images/favicons/favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?=$base_url?>/assets/images/favicons/favicon-16x16.png" />
	<link rel="manifest" href="<?=$base_url?>/assets/images/favicons/site.webmanifest" />
	<meta name="description" content="Sekolah forex terbaik|sekolah trader terbaik | sekolah online |" />

	<!-- template styles -->
	<!--    <meta property="fb:app_id" content="1460398574180890">-->
	<!-- Font Awesome -->
	<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans&display=swap" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="<?=$base_url?>/assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="<?=$base_url?>/assets/vendors/mdb/css/mdb.min.css" rel="stylesheet">
	<!-- - Plugin styles -->
	<script type="text/javascript" src="<?=$base_url?>/assets/vendors/mdb/css/addons/fsscroller.min.css"></script>
	<!-- Filter styles -->
	<script type="text/javascript" src="<?=$base_url?>/assets/vendors/mdb/css/addons/mdb-filter.min.css"></script>

	<!-- custom styles (optional) -->
	<link href="<?=$base_url?>/assets/css/app_homepage.css" rel="stylesheet">
	<link href="<?=$base_url?>/assets/vendors/mdb/css/addons/flag.min.css" rel="stylesheet">

	<?php if (isset($appHome)):?>
	<link href="<?=$base_url?>/assets/css/home.css" rel="stylesheet">
	<?php else:?>
	<link href="<?=$base_url?>/assets/css/contents.css" rel="stylesheet">
	<?php endif;?>

	<link href="<?=$base_url?>/assets/css/custom.css" rel="stylesheet">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
</head>

<body>
<!--Main Navigation-->
<header>
	<!--Navbar-->
	<nav id="navbarActive" class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar d-none d-sm-block">
		<div class="container">
			<div class="row col-xl-12">
				<div class="col-xs-6 col-sm-4 col-xl-4 mt-2">
					<button class="navbar-toggler" type="button" data-toggle="collapse"
							data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
							aria-expanded="false" aria-label="Toggle navigation" style="display:block;">
						<div id="menutext" style="color:#696969;"><i class="fas fa-align-justify"></i>
							<strong>MENU</strong></div>
					</button>
				</div>
				<div class="col-xs-6 col-sm-4 col-xl-4 text-center">
					<a href="<?= $base_url ?>" class="pl-0">
						<img class="img-fluid m-2 logo">
					</a>
				</div>
				<div class="col-xs-12 col-sm-4 col-xl-4 text-right">
					<div class="btn-group ">
						<ul class="navbar-nav ml-auto nav-flex-icons m-2">
							<li class="nav-item nav-item-scroll">
								<a target="_blank" href="https://www.facebook.com/feducationid"
								   class="nav-link waves-effect waves-light"><i class="fab fa-facebook-f fa-lg"
																				style="color:#696969;"></i></a>
							</li>
							<li class="nav-item nav-item-scroll">
								<a target="_blank" href="https://www.instagram.com/feducationid/"
								   class="nav-link waves-effect waves-light"><i class="fab fa-instagram fa-lg"
																				style="color:#696969;"></i></a>
							</li>
							<li class="nav-item nav-item-scroll">
								<a target="_blank" href="https://youtube.com/channel/UCn3I6Z0I5ErW-TIbvFUhVgw"
								   class="nav-link waves-effect waves-light"><i class="fab fa-youtube fa-lg"
																				style="color:#696969;"></i></a>
							</li>
							<li class="nav-item nav-item-scroll">
								<a target="_blank" href="https://t.me/FeducationOfficial"
								   class="nav-link waves-effect waves-light"><i class="fab fa-telegram-plane fa-lg"
																				style="color:#696969;"></i></a>
							</li>
							<li class="nav-item nav-item-scroll">
								<a target="_blank" href="<?= $base_url?>/member/login"
								   class="nav-link waves-effect waves-light"><i class="fas fa-user fa-md"
																				style="color:#696969;"></i></a>
						</ul>
					</div>
				</div>
				<div class="collapse col-xl-12" id="navbarToggleExternalContent">
					<hr style="background:#a0a0a0;">
					<div class="row text-center">
						<ul class="navbar-nav mt-xl-0 col-xl-12 justify-content-center">
							<li class="nav-item col-xl-1 col-xs-12 ml-0 nav-item-scroll" style="font-size:2rem;">
								<a style="color:#696969;" href="<?= $base_url ?>/homepage" class="py-3">
									<i class="fas fa-home"></i>
								</a>
							</li>
							<li class="nav-item col-xl-2 col-xs-12 nav-item-scroll">
								<a style="color:#696969" href="<?= $base_url ?>/homepage#eyeOfFuture">
									<h4><strong>SOLUSI</strong></h4>
								</a>
								<p style="color:#696969">Untuk Anda</p>
							</li>
							<li class="nav-item col-xl-2 col-xs-12 nav-item-scroll">
								<a style="color:#696969" href="<?= $base_url ?>/courses">
									<h4><strong>KURSUS</strong></h4>
								</a>
								<p style="color:#696969">Pilihan Kelas</p>
							</li>
							<li class="nav-item col-xl-2 col-xs-12 nav-item-scroll">
								<a style="color:#696969" href="<?= $base_url ?>/about">
									<h4><strong>TENTANG</strong></h4>
								</a>
								<p style="color:#696969">Siapa Kami</p>
							</li>
							<li class="nav-item col-xl-2 col-xs-12 nav-item-scroll">
								<a style="color:#696969" href="<?= $base_url ?>/article">
									<h4><strong>BLOG</strong></h4>
								</a>
								<p style="color:#696969">Edukasi Gratis</p>
							</li>
							<li class="nav-item col-xl-2 col-xs-12 mb-2">
								<a class="text-body white-text waves-effect waves-light"
								   href="<?= $base_url ?>/mitra" style="color: #bdbdbd !important;">
									<h4>MITRA</h4>
								</a>
								<p>Mita Kami</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<style>
		.row {
			margin-right: 0px !important;
			margin-left: 0px !important;
		}
	</style>
	<nav id="navbarActiveMobile"
		 class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar d-block d-md-none"
		 style="background-color: #4c4c4c !important;">
		<div class="row">
			<div class="col-6 mt-2">
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
						data-target="#navbarToggleExternalContentMobile"
						aria-controls="navbarToggleExternalContentMobile" aria-expanded="false"
						aria-label="Toggle navigation" style="display:block;">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<div class="col-6">
				<a href="https://www.astronacci.com" class="pl-0">
					<img class="img-fluid m-2 logo-mobile"
						 src="<?= $base_url?>/assets/resources/apps/feducation-logo-nav.png">
				</a>
			</div>
			<div class="p-2 m-2 white-text col-xl-12 collapse" id="navbarToggleExternalContentMobile">
				<hr style="background:#fff;">
				<div class="row text-center ">
					<ul class="navbar-nav mt-xl-0 col-xl-12 justify-content-center">
						<li class="nav-item col-xl-1 col-xs-12 mb-2">
							<a class="text-body white-text waves-effect waves-light" href="<?= $base_url ?>/homepage"
							   style="color: #bdbdbd !important;">
								<h4>BERANDA</h4>
							</a>
						</li>
						<li class="nav-item col-xl-2 col-xs-12 mb-2">
							<a class="text-body white-text waves-effect waves-light"
							   href="<?= $base_url ?>/homepage#eyeOfFutureMobile" style="color: #bdbdbd !important;">
								<h4>SOLUSI</h4>
							</a>
							<p>Untuk Anda</p>
						</li>
						<li class="nav-item col-xl-2 col-xs-12 mb-2">
							<a class="text-body white-text waves-effect waves-light"
							   href="<?= $base_url ?>/courses" style="color: #bdbdbd !important;">
								<h4>KURSUS</h4>
							</a>
							<p>Pilihan Kelas</p>
						</li>
						<li class="nav-item col-xl-2 col-xs-12 mb-2">
							<a class="text-body white-text waves-effect waves-light"
							   href="<?= $base_url ?>/about" style="color: #bdbdbd !important;">
								<h4>TENTANG FEDUCATION</h4>
							</a>
							<p>Siapa Kami</p>
						</li>
						<li class="nav-item col-xl-2 col-xs-12 mb-2">
							<a class="text-body white-text waves-effect waves-light"
							   href="<?= $base_url ?>/article" style="color: #bdbdbd !important;">
								<h4>BLOG</h4>
							</a>
							<p>Edukasi Gratis</p>
						</li>
						<li class="nav-item col-xl-2 col-xs-12 mb-2">
							<a class="text-body white-text waves-effect waves-light"
							   href="<?= $base_url ?>/mitra" style="color: #bdbdbd !important;">
								<h4>Mitra</h4>
							</a>
							<p>Mita Kami</p>
						</li>
						<li class="nav-item col-xl-2 col-xs-12 mb-2">
							<a class="text-body white-text waves-effect waves-light"
							   href="<?= $base_url ?>/member/login" style="color: #bdbdbd !important;">
								<h4>INTERN</h4>
							</a>
							<p>Absen Magang</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

	<?php if (isset($appHome)):?>
		<!-- Intro Section desktop -->
		<div class="view jarallax d-none d-sm-block" data-jarallax='{"speed": 0.2}'
			 style="background-image: url('<?= $base_url?>/assets/images/resources/banner.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center; height:100vh;">
			<div class="mask">
				<div class="h-100 d-flex  align-items-center justify-content-sm-end">
					<div class="row pt-5 mt-3">
						<div class="col-md-12 wow fadeIn mb-3">
							<div class="text-right pr-5">
								<h2 class="display-1 font-weight-bold mt-5 mr-5 wow fadeInUp odin-rounded">SEKOLAH<br>
									TRADER</h2>
								</li>
								<h2 class="mr-5 wow fadeInUp red-text" data-wow-delay="0.2s">BELAJAR TRADING
									SAHAM<br>FOREX, DAN GOLD</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Intro Section mobile -->
		<div class="view jarallax d-block d-sm-none" data-jarallax='{"speed": 0.2}'
			 style=" background-image: url('https://astronacci.com/images/2019/section01-mobile.png'); background-repeat: no-repeat; background-size: cover; background-position: center center; height:100vh;">
			<div class="mask">
				<div class="align-items-center ">
					<div class="center-div-mobile">
						<div class="col-md-12 wow fadeIn pt-5" style="visibility: visible; animation-name: fadeIn;">
							<div class="text-center">
								<h1 class=" font-weight-bold wow fadeInUp odin-rounded"
									style="visibility: visible; animation-name: fadeInUp; font-size:60px;">SEKOLAH<br>
									TRADER</h1>
								<h6 class="wow fadeInUp red-text" data-wow-delay="0.2s"
									style="visibility: visible; animation-name: fadeInUp; animation-delay: 0.2s;"><strong>BELAJAR
										TRADING SAHAM<br> FOREX, DAN GOLD</strong></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="jarallax-container-1"
				 style="background-image: url('https://astronacci.com/images/2019/section-1.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;"></div>
		</div>
	<?php endif;?>
</header>
<!--Main Navigation-->

<!--Main Layout-->

<style rel="stylesheet">
	.custom-separator {
		width: 5rem;
		height: 6px;
		border-radius: 1rem;
		background: #423f3f;

	}
	.services-one__title{
		min-height: 70px;
	}
</style>

<div class="padding-sect-1 screen-height" style="background-image: url('https://astronacci.com/images/website/bg-layer8.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
	<div class="container-fluid text-center center-div-testimoni">
		<div class="container">

			<section style="background-repeat: no-repeat; background-size: cover; background-position: center center;">
				<div class="row no-gutters">
					<div class="card py-5">
						<div class="row g-0">
							<div class="col col-xl-5">
								<div class="card-body">
									<h1 class="display-1"><span class="text-dark">4</span><span class="text-dark">0</span><span class="text-dark">4</span></h1>
									<h2 class="font-weight-bold display-4">Ooops !</h2>
									<p>Sepertinya anda mencari terlalu jauh.
										<br>Halaman yang anda cari tidak dapat kami temukan
										<br>Silahkan kembali ke halaman sebelumnya.</p>
									<div class="mt-5"> <a href="<?= $base_url?>/homepage" class="btn btn-light btn-lg px-md-5 radius-30">Homepage</a>
										<a href="javascript:window.history.go(-1);" class="btn btn-light btn-lg ms-3 px-md-5 radius-30">Kembali</a>
									</div>
								</div>
							</div>
							<div class="col-xl-7">
								<img src="https://cdn.searchenginejournal.com/wp-content/uploads/2019/03/shutterstock_1338315902.png" class="img-fluid" alt="">
							</div>
						</div>
						<!--end row-->
					</div>


				</div>
			</section>
			<hr class="thin m-4">
		</div>
	</div>
</div>

<!--Main Layout-->

<!-- Start of LiveChat (www.livechatinc.com) code -->
<!--	<script src="//code.tidio.co/hhgayqlbdmmns99ciypjv6creipzpckw.js" async></script>-->
<!-- End of LiveChat code -->

<section class="morpheus-den-gradient py-5">
	<div class="container">
		<h1 class="text-center white-text">Butuh Konsultasi?</h1>
		<h3 class="text-center white-text">Hubungi Kami</h3>
		<div class="row justify-content-center">
			<div class="col-5 text-right">
				<a target="_blank" href="https://www.instagram.com/feducationid/"
				   class="btn-floating btn-lg pink accent-3 waves-effect waves-light" type="button"
				   role="button"><i class="fab fa-instagram"></i></a>
			</div>
			<div class="col-5 text-left">
				<a target="_blank" href="https://t.me/FeducationOfficial"
				   class="btn-floating btn-lg primary-color waves-effect waves-light" type="button" role="button"><i
						class="fab fa-telegram"></i></a>
			</div>
		</div>
	</div>
</section>

<!--Footer-->
<footer class="page-footer text-center text-md-left blue-grey lighten-5 pt-0" style="margin-top:-50px;">
	<div class="mt-5 p-4 text-center text-md-left">
		<div class="row mt-3">
			<div class="col-xs-12 col-sm-3 col-xl-3 mb-4 dark-grey-text p-3">
				<a href="<?= $base_url ?>"><img class="text-center img-fluid m-2"
												 src="<?= $base_url?>/assets/images/resources/feducation-logo-footer.png"></a>
				<p class="text-justify">Feducation Id memberikan layanan Edukasi Trading,
					Investasi, Konsultasi dan Private Coaching bagi klien – kliennya yang ingin
					meningkatkan kemampuan trading. Tujuannya adalah menyebarluaskan Edukasi Trading dan
					membantu trader Indonesia untuk bisa menghasilkan profit secara konsisten, tidak peduli
					saat market naik ataupun turun</p>
			</div>
			<div class="col-xs-12 col-sm-3 col-xl-3 dark-grey-text p-3">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2828418087265!2d106.80657751432348!3d-6.226389795492873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1505affffff%3A0x301b8a0f5d2c33ed!2sEquity%20Tower!5e0!3m2!1sen!2sid!4v1641890174695!5m2!1sen!2sid"
						width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			</div>
			<div class="col-xs-12 col-sm-3 col-xl-3 mb-4 dark-grey-text p-3">
				<h6 class="text-uppercase font-weight-bold"><strong>Alamat</strong></h6>
				<hr class="red mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
				<!--Grid row-->
				<div class="row mb-2">
					<div class="col-11 text-left">
						<h5 class="font-weight-bold"><i class="fas fa-2x fa-building deep-red-text"></i> Feducation Id
						</h5>
						<p>Equity Tower, Sudirman Central Busines District Lot<br>9 JRT.5, Jalan Jendral Sudirman, RT.5/RW.3,<br>Senayan, Kota Jakarta Pusat <br> DKI Jakarta,
							Indonesia</p>
					</div>
				</div>
				<!--Grid row-->
				<!--Grid row-->
				<div class="row mb-2">
					<div class="col-10 text-left">
						<a href="https://api.whatsapp.com/send?phone=+628385940008&amp;text=Hello%20Astronacci,%20saya%20baru%20lihat%20info%20mengenai%20Astronacci%20dan%20saat%20ini%20ingin%20berkonsultasi"
						   target="_blank">
								<span style="font-size:15px;" class="font-weight-bold dark-grey-text "><i
										class="fab fa-whatsapp fa-lg text-success pr-1"></i>+62-8212-983-0614</span>
						</a>
					</div>
				</div>
				<!--Grid row-->
			</div>
			<div class="col-xs-12 col-sm-3 col-xl-3 dark-grey-text p-3">
				<h6 class="text-uppercase font-weight-bold"><strong>Respon Cepat</strong></h6>
				<hr class="red mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
				<form method="POST"
					  action="<?= $base_url?>/submit-email-fed">
					<input type="hidden" name="<?= $security->get_csrf_token_name() ?>" value="<?= $security->get_csrf_hash() ?>">
					<input type="text" id="name" name="name" class="form-control mb-4" placeholder="Nama Lengkap"
						   pattern=".{3,}" required><br>
					<input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-Mail Anda"
						   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br>
					<input type="number" id="phone" name="phone" class="form-control mb-4"
						   placeholder="Nomor Telepon" pattern="[0-9]{6,}" required><br>
					<button type="submit" class="btn btn-danger btn-rounded">Kirim</button>
				</form>
			</div>
		</div>
		<div class="row pr-4 pl-4 " style=" background-color:#505050;">
			<div class="col-md-12 text-center" style=" padding:10px; background:#4f4f4f;">
				<a href="<?= $base_url ?>" style="font-size:15px; color:#fff;">Terms &amp;
					Condition</a> <strong style="color:#f4d32e;">|</strong>
				<a href="<?= $base_url ?>" style="font-size:15px; color:#fff;">Privacy
					Policy</a> <strong style="color:#f4d32e;">|</strong>
				<a href="<?= $base_url ?>" style="font-size:15px; color:#fff;">Disclaimer</a>
				<h6 style="font-size:15px; color:#fff;">Copyright © 2022 Feducation Id | All rights
					reserved.</h6>
			</div>
		</div>
</footer>
<!--/.Footer-->

<!--  SCRIPTS  -->
<!-- JQuery -->
<!-- JQuery -->
<script type="text/javascript" src="<?=$base_url?>/assets/vendors/jquery/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?=$base_url?>/assets/vendors/popper/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?=$base_url?>/assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?=$base_url?>/assets/vendors/mdb/js/mdb.min.js"></script>
<!-- Plugin JavaScript -->
<script type="text/javascript" src="<?=$base_url?>/assets/vendors/mdb/js/addons/mdb-fsscroller.min.js"></script>
<!-- MDB filter JavaScript -->
<script type="text/javascript" src="<?=$base_url?>/assets/vendors/mdb/js/addons/mdb-filter.min.js"></script>

<?php if (isset($appHome)):?>
	<script type="text/javascript" src="<?=$base_url?>/assets/js/popupbox.js"></script>
<?php endif;?>

<script>
	(function ($) {
		if($("#navbarToggleExternalContent").hasClass("show")){
			$('.logo').attr('src','<?= $base_url?>/assets/resources/apps/feducation-logo-nav.png');
			$('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
			$('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
			$('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
			$('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
			$('#menutext').css("cssText", "color: #bdbdbd !important;");
		} else {
			$('.logo').attr('src','<?= $base_url?>/assets/resources/apps/feducation-logo-nav.png');
			$('#navbarActive').css("cssText", "background-color: transparent !important;");
			$('#navbarActive .nav-item a').css("cssText", "color: #696969 !important;");
			$('#navbarActive .nav-item p').css("cssText", "color: #696969 !important;");
			$('#navbarActive .nav-item i').css("cssText", "color: #696969 !important;");
			$('#menutext').css("cssText", "color: #696969 !important;");
		}
		$("#menutext").click(function() {
			if($("#navbarToggleExternalContent").hasClass("show")){
				$('.logo').attr('src','<?= $base_url?>/assets/resources/apps/feducation-logo-nav.png');
				$('#navbarActive').css("cssText", "background-color: transparent !important;");
				$('#navbarActive .nav-item a').css("cssText", "color: #696969 !important;");
				$('#navbarActive .nav-item p').css("cssText", "color: #696969 !important;");
				$('#navbarActive .nav-item i').css("cssText", "color: #696969 !important;");
				$('#menutext').css("cssText", "color: #696969 !important;");
			} else {
				$('.logo').attr('src','<?= $base_url?>/assets/resources/apps/feducation-logo-nav.png');
				$('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
				$('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
				$('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
				$('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
				$('#menutext').css("cssText", "color: #bdbdbd !important;");
			}
		});
		$(window).scroll(function () {
			if ($(this).scrollTop() > 30) {
				if($("#navbarToggleExternalContent").hasClass("show")){
					$('.logo').attr('src','<?= $base_url?>/assets/resources/apps/feducation-logo-nav.png');
					$('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
					$('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
					$('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
					$('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
					$('#menutext').css("cssText", "color: #bdbdbd !important;");
				} else {
					$('.logo').attr('src','<?= $base_url?>/assets/resources/apps/feducation-logo-nav.png');
					$('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
					$('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
					$('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
					$('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
					$('#menutext').css("cssText", "color: #bdbdbd !important;");
				}
				$("#menutext").click(function() {
					if($("#navbarToggleExternalContent").hasClass("show")){
						$('.logo').attr('src','<?= $base_url?>/assets/resources/apps/feducation-logo-nav.png');
						$('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
						$('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
						$('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
						$('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
						$('#menutext').css("cssText", "color: #bdbdbd !important;");
					} else {
						$('.logo').attr('src','<?= $base_url?>/assets/resources/apps/feducation-logo-nav.png');
						$('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
						$('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
						$('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
						$('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
						$('#menutext').css("cssText", "color: #bdbdbd !important;");
					}
				});
			} else {
				if($("#navbarToggleExternalContent").hasClass("show")){
					$('.logo').attr('src','<?= $base_url?>/assets/resources/apps/feducation-logo-nav.png');
					$('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
					$('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
					$('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
					$('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
					$('#menutext').css("cssText", "color: #bdbdbd !important;");
				} else {
					$('.logo').attr('src','<?= $base_url?>/assets/resources/apps/feducation-logo-nav.png');
					$('#navbarActive').css("cssText", "background-color: transparent !important;");
					$('#navbarActive .nav-item a').css("cssText", "color: #696969 !important;");
					$('#navbarActive .nav-item p').css("cssText", "color: #696969 !important;");
					$('#navbarActive .nav-item i').css("cssText", "color: #696969 !important;");
					$('#menutext').css("cssText", "color: #696969 !important;");
				}
				$("#menutext").click(function() {
					if($("#navbarToggleExternalContent").hasClass("show")){
						$('.logo').attr('src','<?= $base_url?>/assets/resources/apps/feducation-logo-nav.png');
						$('#navbarActive').css("cssText", "background-color: transparent !important;");
						$('#navbarActive .nav-item a').css("cssText", "color: #696969 !important;");
						$('#navbarActive .nav-item p').css("cssText", "color: #696969 !important;");
						$('#navbarActive .nav-item i').css("cssText", "color: #696969 !important;");
						$('#menutext').css("cssText", "color: #696969 !important;");
					} else {
						$('.logo').attr('src','<?= $base_url?>/assets/resources/apps/feducation-logo-nav.png');
						$('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
						$('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
						$('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
						$('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
						$('#menutext').css("cssText", "color: #bdbdbd !important;");
					}
				});
			}
		});
	}(jQuery));
</script>
<script src="<?= $base_url?>/assets/js/application_homepage.js"></script>
</body>
</html>


