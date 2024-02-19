<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="facebook-domain-verification" content="7wemuwsvks2g7vq4rfi6bv96d2jjqt" />
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

	<link rel="stylesheet" href="<?=base_url('assets/')?>vendors/timepicker/timePicker.css" />

	<!-- template styles -->
	<!--    <meta property="fb:app_id" content="1460398574180890">-->
	<!-- Font Awesome -->
	<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans&display=swap" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="<?=base_url('assets/')?>vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="<?=base_url('assets/')?>vendors/mdb/css/mdb.min.css" rel="stylesheet">
	<!-- - Plugin styles -->
	<script type="text/javascript" src="<?=base_url('assets/')?>vendors/mdb/css/addons/fsscroller.min.css"></script>
	<!-- Filter styles -->
	<script type="text/javascript" src="<?=base_url('assets/')?>vendors/mdb/css/addons/mdb-filter.min.css"></script>

	<!-- custom styles (optional) -->
	<link href="<?=base_url('assets/')?>css/app_homepage.css" rel="stylesheet">
	<link href="<?=base_url('assets/')?>vendors/mdb/css/addons/flag.min.css" rel="stylesheet">

	<?php if (isset($appHome)):?>
		<link href="<?=base_url('assets/')?>css/home.css" rel="stylesheet">
	<?php else:?>
		<link href="<?=base_url('assets/')?>css/contents.css" rel="stylesheet">
	<?php endif;?>

	<link href="<?=base_url('assets/')?>css/custom.css" rel="stylesheet">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y2Z517WL5Q"></script>
	<script async src="google-site-verification=aToJjHXmlK1-M6ko9tjEe1uH8AIohVPDQdEFzsROHS4"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'G-Y2Z517WL5Q');
	</script>
	<!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '638077627787895');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=638077627787895&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->

	<title><?= isset($metaData->ogTitle) ? $metaData->ogTitle : "Feducation | Pelatihan digital marketing | Magang | Loker | Kursus komputer | Komunitas online"?></title>
	
</head>

<?php $modul = $this->uri->segment(1); $method = $this->uri->segment(2); $params = $this->uri->segment(3); ?>
<body>
	<!--Main Navigation-->
	<header>
		<!-- Navbar Desktop -->
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
						<a href="<?= base_url('about')?>" class="pl-0">
							<img class="img-fluid m-2 logo">
						</a>
					</div>
					<div class="col-xs-12 col-sm-4 col-xl-4 text-right">
						<div class="btn-group ">
							<ul class="navbar-nav ml-auto nav-flex-icons m-2">
								<li class="nav-item nav-item-scroll">
									<a target="_blank" href="https://www.facebook.com/FeducationOfficial"
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
									<a target="_blank" href="<?= base_url('member/login')?>"
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
									<a style="color:#696969;" href="<?= base_url('homepage'); ?>" class="py-3">
										<i class="fas fa-home"></i>
									</a>
								</li>
								<li class="nav-item col-xl-2 col-xs-12 nav-item-scroll">
									<a style="color:#696969" href="<?= base_url('homepage'); ?>#eyeOfFuture">
										<h4><strong>SOLUSI</strong></h4>
									</a>
									<p style="color:#696969">Untuk Anda</p>
								</li>
								<li class="nav-item col-xl-2 col-xs-12 nav-item-scroll">
									<a style="color:#696969" href="<?= base_url('courses'); ?>">
										<h4><strong>KURSUS</strong></h4>
									</a>
									<p style="color:#696969">Pilihan Kelas</p>
								</li>
								<li class="nav-item col-xl-2 col-xs-12 nav-item-scroll">
									<a style="color:#696969" href="<?= base_url('about'); ?>">
										<h4><strong>TENTANG</strong></h4>
									</a>
									<p style="color:#696969">Siapa Kami</p>
								</li>
								<li class="nav-item col-xl-2 col-xs-12 nav-item-scroll">
									<a style="color:#696969" href="<?= base_url('article'); ?>">
										<h4><strong>BLOG</strong></h4>
									</a>
									<p style="color:#696969">Edukasi Gratis</p>
								</li>
								<li class="nav-item col-xl-2 col-xs-12 mb-2">
									<a class="text-body white-text waves-effect waves-light"
									   href="<?= base_url('mitra'); ?>" style="color: #bdbdbd !important;">
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
		<!-- Navbar Desktop -->

		<!-- Navbar Mobile -->
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
					<a href="<?= base_url('about')?>" class="pl-0">
						<img class="img-fluid m-2 logo-mobile"
							 src="<?= base_url('assets/')?>resources/apps/feducation-logo-nav.png">
					</a>
				</div>
				<div class="p-2 m-2 white-text col-xl-12 collapse" id="navbarToggleExternalContentMobile" style="">
					<hr style="background:#fff;">
					<div class="row text-center ">
						<ul class="navbar-nav mt-xl-0 col-xl-12 justify-content-center">
							<li class="nav-item col-xl-1 col-xs-12 mb-2">
								<a class="text-body white-text waves-effect waves-light" href="<?= base_url('homepage'); ?>"
								   style="color: #bdbdbd !important;">
									<h4>BERANDA</h4>
								</a>
							</li>
							<li class="nav-item col-xl-2 col-xs-12 mb-2">
								<a class="text-body white-text waves-effect waves-light"
								   href="<?= base_url('homepage'); ?>#eyeOfFutureMobile" style="color: #bdbdbd !important;">
									<h4>SOLUSI</h4>
								</a>
								<p>Untuk Anda</p>
							</li>
							<li class="nav-item col-xl-2 col-xs-12 mb-2">
								<a class="text-body white-text waves-effect waves-light"
								   href="<?= base_url('courses'); ?>" style="color: #bdbdbd !important;">
									<h4>KURSUS</h4>
								</a>
								<p>Pilihan Kelas</p>
							</li>
							<li class="nav-item col-xl-2 col-xs-12 mb-2">
								<a class="text-body white-text waves-effect waves-light"
								   href="<?= base_url('about'); ?>" style="color: #bdbdbd !important;">
									<h4>TENTANG FEDUCATION</h4>
								</a>
								<p>Siapa Kami</p>
							</li>
							<li class="nav-item col-xl-2 col-xs-12 mb-2">
								<a class="text-body white-text waves-effect waves-light"
								   href="<?= base_url('article'); ?>" style="color: #bdbdbd !important;">
									<h4>BLOG</h4>
								</a>
								<p>Edukasi Gratis</p>
							</li>
							<li class="nav-item col-xl-2 col-xs-12 mb-2">
								<a class="text-body white-text waves-effect waves-light"
								   href="<?= base_url('mitra'); ?>" style="color: #bdbdbd !important;">
									<h4>Mitra</h4>
								</a>
								<p>Mita Kami</p>
							</li>
							<li class="nav-item col-xl-2 col-xs-12 mb-2">
								<a class="text-body white-text waves-effect waves-light"
								   href="<?= base_url('member/login'); ?>" style="color: #bdbdbd !important;">
									<h4>INTERN</h4>
								</a>
								<p>Absen Magang</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		<!-- Navbar Mobile -->

		<?php if (isset($appHome)):?>
			<!-- Intro Section desktop -->
			<div class="view jarallax d-none d-sm-block" data-jarallax='{"speed": 0.2}'
				 style="background-image: url('<?= base_url('assets/')?>resources/images/homepages/banner.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center; height:100vh;">
				<div class="mask">
					<div class="h-100 d-flex  align-items-center justify-content-sm-end">
						<div class="row pt-5 mt-3">
							<div class="col-md-12 wow fadeIn mb-3">
								<div class="text-right pr-5">
									<h2 class="display-1 font-weight-bold mt-5 mr-5 wow fadeInUp odin-rounded">SEKOLAH<br>
										DIGITAL</h2>
									</li>
									<h2 class="mr-5 wow fadeInUp red-text" data-wow-delay="0.5s">LULUS LANGSUNG
										<br>BERPENGHASILAN</h2>
									<br>
<!--									<a href="--><?//= base_url()?><!--" class="btn btn-danger btn-lg mr-5 wow fadeInUp" data-wow-delay="0.8s" style="width: 57%; border-radius: 20px;">-->
<!--										Daftar-->
<!--									</a>-->
									<div class="row" style="justify-content: end; margin-right: 40px !important;">
<!--										<a href="--><?//= base_url('member-login')?><!--" class="btn btn-danger btn-lg wow fadeInUp" data-wow-delay="0.8s" style="width: 30%; border-radius: 20px;">-->
<!--											Masuk-->
<!--										</a>-->
										<a href="<?= base_url('courses'); ?>" class="btn btn-danger btn-lg wow fadeInUp" data-wow-delay="0.8s" style="width: 30%; border-radius: 20px;">
											Daftar
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Intro Section mobile -->
			<div class="view jarallax d-block d-sm-none" data-jarallax='{"speed": 0.2}'
				 style=" background-image: url('<?= base_url('assets/images/resources/')?>section01-mobile.png'); background-repeat: no-repeat; background-size: cover; background-position: center center; height:100vh;">
				<div class="mask">
					<div class="align-items-center ">
						<div class="center-div-mobile">
							<div class="col-md-12 wow fadeIn pt-5" style="visibility: visible; animation-name: fadeIn;">
								<div class="text-center">
									<h1 class=" font-weight-bold wow fadeInUp odin-rounded"
										style="visibility: visible; animation-name: fadeInUp; font-size:60px;">SEKOLAH<br>
										DIGITAL</h1>
									<h6 class="wow fadeInUp red-text" data-wow-delay="0.2s"
										style="visibility: visible; animation-name: fadeInUp; animation-delay: 0.2s;"><strong>LULUS
											LANGSUNG<br> BERPENGHASILAN</strong></h6>
<!--									<a href="--><?//= base_url('member-login')?><!--" class="btn btn-danger btn-lg mr-5 wow fadeInUp" data-wow-delay="0.8s" style="width: 40%; border-radius: 20px; left: 20px">-->
<!--										Masuk-->
<!--									</a>-->
									<a href="<?= base_url('courses'); ?>" class="btn btn-danger btn-lg mr-5 wow fadeInUp" data-wow-delay="0.8s" style="width: 40%; border-radius: 20px; left: 20px">
										Daftar
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="jarallax-container-1"
					 style="background-image: url('<?= base_url('assets/')?>images/resources/banner.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;"></div>
			</div>
		<?php endif;?>
	</header>
	<!--Main Navigation-->

	<!--Main Layout-->
	<?php $this->load->view($content); ?>
	<!--Main Layout-->

	<!-- <div class="tradingview-widget-container">

		<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
				async>
			{
				"symbols"
			:
				[
					{
						"title": "S&P 500",
						"proName": "OANDA:SPX500USD"
					},
					{
						"title": "Nasdaq 100",
						"proName": "OANDA:NAS100USD"
					},
					{
						"title": "EUR/USD",
						"proName": "FX_IDC:EURUSD"
					},
					{
						"description": "USD/JPY",
						"proName": "OANDA:USDJPY"
					},
					{
						"description": "XAU/USD",
						"proName": "OANDA:XAUUSD"
					}
				],
					"colorTheme"
			:
				"light",
					"isTransparent"
			:
				false,
					"largeChartUrl"
			:
				"adaptive",
					"locale"
			:
				"en"
			}
		</script>
		<div class="tradingview-widget-copyright"><a href="https://id.tradingview.com" rel="noopener"
													 target="_blank"><span class="blue-text">Pita Ticker</span></a> oleh
			TradingView
		</div>
	</div> -->

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
					<a href="<?= base_url() ?>"><img class="text-center img-fluid m-2"
									 src="<?= base_url('assets/')?>resources/apps/feducation-logo-footer.png"></a>
					<p class="text-justify">
						Feducation Id memberikan layanan kursus trading forex, digital marketing, web programming, dan multimedia untuk menunjang karir dan bisnis anda melalui
						pengembangan skill di bidang digital.
						Dapatkan pengalaman belajar yang nyaman dengan fasilitas yang lengkap, kurikulum berbasis industri dan mudah dipahami, serta pengalaman bekerja pada perusahaan impian anda.
						Dengan jaringan komunitas yang luas, serta bimbingan dari pengajar profesional, anda akan merasakan manfaat dalam meningkatkan
						penghasilan anda secara konsisten melalui dunia digital.
					</p>
				</div>
				<div class="col-xs-12 col-sm-3 col-xl-3 dark-grey-text p-3">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d693.2862040167295!2d106.85498399862391!3d-6.23211060097501!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f37806fac8df%3A0x3f6e9291b35d36b3!2sFeducation%20Id!5e0!3m2!1sen!2sid!4v1662306698817!5m2!1sen!2sid"
							width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
				<div class="col-xs-12 col-sm-3 col-xl-3 mb-4 dark-grey-text p-3">
					<h6 class="text-uppercase font-weight-bold"><strong>Alamat</strong></h6>
					<hr class="red mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
					<!--Grid row-->
					<div class="row mb-2">
						<div class="col-11 text-left">
							<h5 class="font-weight-bold"><i class="fas fa-2x fa-building deep-red-text"></i> Office
							</h5>
							<p>Jl. Tebet Timur Dalam Raya<br> No. 31 A, Tebet, Jakarta Selatan,<br>DKI Jakarta Indonesia.</p>
						</div>
					</div>
					<!--Grid row-->
					<!--Grid row-->
					<div class="row mb-2">
						<div class="col-10 text-left">
							<a href="https://api.whatsapp.com/send?phone=+62811417007&amp;text=Hello%20Feducation,%20saya%20baru%20lihat%20info%20mengenai%20Feducation%20melalui%20web%20dan%20saat%20ini%20ingin%20berkonsultasi"
							   target="_blank">
								<span style="font-size:15px;" class="font-weight-bold dark-grey-text "><i
											class="fab fa-whatsapp fa-lg text-success pr-1"></i>+62 811-417-007</span>
							</a>
						</div>
					</div>
					<!--Grid row-->
					<h6 class="text-uppercase font-weight-bold" style="margin-top: 30px;"><strong>Site Map</strong></h6>
					<hr class="red mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
					<div class="row mb-1">
						<div class="col-11 text-left">
							<!-- <h5 class="font-weight-bold"><i class="fas fa-2x fa-building deep-red-text"></i> Office
							</h5>
							<p>Jl. Tebet Timur Dalam Raya<br> No. 31 A, Tebet, Jakarta Selatan,<br>DKI Jakarta Indonesia.</p> -->
							<ul class="list-group list-group-flush" style="list-style-type: none;">
								<li class="mb-2">
									<a class="text-body" href="<?= base_url()?>"><i class="fas fa-angle-double-right"></i> Home</a>
								</li>
								<li class="mb-2">
									<a class="text-body" href="<?= base_url('courses')?>"><i class="fas fa-angle-double-right"></i> Course</a>
								</li>
								<li class="mb-2">
									<a class="text-body" href="<?= base_url('about')?>"><i class="fas fa-angle-double-right"></i> About</a>
								</li>
								<li class="mb-2">
									<a class="text-body" href="<?= base_url('article')?>"><i class="fas fa-angle-double-right"></i> Blog</a>
								</li>
								<li class="mb-2">
									<a class="text-body" href="<?= base_url('mitra')?>"><i class="fas fa-angle-double-right"></i> Mitra</a>
								</li>
								<li class="mb-2">
									<a class="text-body" href="<?= base_url('presensi')?>"><i class="fas fa-angle-double-right"></i> Presensi Intern</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-3 col-xl-3 dark-grey-text p-3">
					<h6 class="text-uppercase font-weight-bold"><strong>Respon Cepat</strong></h6>
					<hr class="red mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
						<form method="POST"
							  action="<?= base_url('submit-email-fed'); ?>">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
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
					<a href="<?= base_url() ?>" style="font-size:15px; color:#fff;">Terms &amp;
						Condition</a> <strong style="color:#f4d32e;">|</strong>
					<a href="<?= base_url() ?>" style="font-size:15px; color:#fff;">Privacy
						Policy</a> <strong style="color:#f4d32e;">|</strong>
					<a href="<?= base_url() ?>" style="font-size:15px; color:#fff;">Disclaimer</a>
					<h6 style="font-size:15px; color:#fff;">Copyright © 2022  PT Feducation Digital Indonesia | All rights
						reserved.</h6>
				</div>
			</div>
	</footer>
	<!--/.Footer-->
	
	<!--  SCRIPTS  -->
	<!-- JQuery -->
	<!-- JQuery -->
	<script type="text/javascript" src="<?=base_url('assets/')?>vendors/jquery/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="<?=base_url('assets/')?>vendors/popper/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="<?=base_url('assets/')?>vendors/bootstrap/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="<?=base_url('assets/')?>vendors/mdb/js/mdb.min.js"></script>
	<!-- Plugin JavaScript -->
	<script type="text/javascript" src="<?=base_url('assets/')?>vendors/mdb/js/addons/mdb-fsscroller.min.js"></script>
	<!-- MDB filter JavaScript -->
	<script type="text/javascript" src="<?=base_url('assets/')?>vendors/mdb/js/addons/mdb-filter.min.js"></script>

	<?php if (isset($appHome)):?>
		<script type="text/javascript" src="<?=base_url('assets/')?>js/popupbox.js"></script>
	<?php endif;?>

	<script>
		(function ($) {
			if($("#navbarToggleExternalContent").hasClass("show")){
				$('.logo').attr('src','<?= base_url('assets/')?>resources/apps/feducation-logo-nav.png');
				$('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
				$('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
				$('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
				$('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
				$('#menutext').css("cssText", "color: #bdbdbd !important;");
			} else {
				$('.logo').attr('src','<?= base_url('assets/')?>resources/apps/feducation-logo-nav.png');
				$('#navbarActive').css("cssText", "background-color: transparent !important;");
				$('#navbarActive .nav-item a').css("cssText", "color: #696969 !important;");
				$('#navbarActive .nav-item p').css("cssText", "color: #696969 !important;");
				$('#navbarActive .nav-item i').css("cssText", "color: #696969 !important;");
				$('#menutext').css("cssText", "color: #696969 !important;");
			}
			$("#menutext").click(function() {
				if($("#navbarToggleExternalContent").hasClass("show")){
					$('.logo').attr('src','<?= base_url('assets/')?>resources/apps/feducation-logo-nav.png');
					$('#navbarActive').css("cssText", "background-color: transparent !important;");
					$('#navbarActive .nav-item a').css("cssText", "color: #696969 !important;");
					$('#navbarActive .nav-item p').css("cssText", "color: #696969 !important;");
					$('#navbarActive .nav-item i').css("cssText", "color: #696969 !important;");
					$('#menutext').css("cssText", "color: #696969 !important;");
				} else {
					$('.logo').attr('src','<?= base_url('assets/')?>resources/apps/feducation-logo-nav.png');
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
						$('.logo').attr('src','<?= base_url('assets/')?>resources/apps/feducation-logo-nav.png');
						$('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
						$('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
						$('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
						$('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
						$('#menutext').css("cssText", "color: #bdbdbd !important;");
					} else {
						$('.logo').attr('src','<?= base_url('assets/')?>resources/apps/feducation-logo-nav.png');
						$('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
						$('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
						$('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
						$('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
						$('#menutext').css("cssText", "color: #bdbdbd !important;");
					}
					$("#menutext").click(function() {
						if($("#navbarToggleExternalContent").hasClass("show")){
							$('.logo').attr('src','<?= base_url('assets/')?>resources/apps/feducation-logo-nav.png');
							$('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
							$('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
							$('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
							$('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
							$('#menutext').css("cssText", "color: #bdbdbd !important;");
						} else {
							$('.logo').attr('src','<?= base_url('assets/')?>resources/apps/feducation-logo-nav.png');
							$('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
							$('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
							$('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
							$('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
							$('#menutext').css("cssText", "color: #bdbdbd !important;");
						}
					});
				} else {
					if($("#navbarToggleExternalContent").hasClass("show")){
						$('.logo').attr('src','<?= base_url('assets/')?>resources/apps/feducation-logo-nav.png');
						$('#navbarActive').css("cssText", "background-color: #4c4c4c !important;");
						$('#navbarActive .nav-item a').css("cssText", "color: #bdbdbd !important;");
						$('#navbarActive .nav-item p').css("cssText", "color: #bdbdbd !important;");
						$('#navbarActive .nav-item i').css("cssText", "color: #bdbdbd !important;");
						$('#menutext').css("cssText", "color: #bdbdbd !important;");
					} else {
						$('.logo').attr('src','<?= base_url('assets/')?>resources/apps/feducation-logo-nav.png');
						$('#navbarActive').css("cssText", "background-color: transparent !important;");
						$('#navbarActive .nav-item a').css("cssText", "color: #696969 !important;");
						$('#navbarActive .nav-item p').css("cssText", "color: #696969 !important;");
						$('#navbarActive .nav-item i').css("cssText", "color: #696969 !important;");
						$('#menutext').css("cssText", "color: #696969 !important;");
					}
					$("#menutext").click(function() {
						if($("#navbarToggleExternalContent").hasClass("show")){
							$('.logo').attr('src','<?= base_url('assets/')?>resources/apps/feducation-logo-nav.png');
							$('#navbarActive').css("cssText", "background-color: transparent !important;");
							$('#navbarActive .nav-item a').css("cssText", "color: #696969 !important;");
							$('#navbarActive .nav-item p').css("cssText", "color: #696969 !important;");
							$('#navbarActive .nav-item i').css("cssText", "color: #696969 !important;");
							$('#menutext').css("cssText", "color: #696969 !important;");
						} else {
							$('.logo').attr('src','<?= base_url('assets/')?>resources/apps/feducation-logo-nav.png');
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
	<script src="<?= base_url('assets/') ?>js/application_homepage.js?v=3.0.1"></script>
</body>
</html>
