<style>
	.view img, .view video {
		display: initial !important;
	}
</style>
<div class="padding-sect-1 screen-height" style="background-image: url('<?= base_url('assets/resources/images/homepages/')?>bg-layer8.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
	<div class="container-fluid text-center center-div-testimoni">
		<div class="container">
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a class="black-text" href="<?= base_url('homepage')?>">Home</a><i
							class="fas fa-angle-double-right mx-2" aria-hidden="true"></i></li>
					<li class="breadcrumb-item active">Mitra</li>
				</ol>
			</nav>

			<section style="background-repeat: no-repeat; background-size: cover; background-position: center center;">
				<div class="row no-gutters">
					<div class="col-12 col-sm-6 col-md-6 p-2 d-none d-sm-block">
						<h1 class="text-right">MITRA<br> <strong class=" text-danger">FEDUCATION </strong></h1>
					</div>
					<div class="col-12 col-sm-6 col-md-6 p-2 d-block d-sm-none">
						<h3 class="text-center">MITRA <br> <strong class=" text-danger">FEDUCATION </strong></h3>
					</div>
					<div class="col-12 col-md-6 p-2 d-none d-sm-block">
						<p class="text-left mb-3" data-wow-delay="0.3s">Feducation menjalin kerjasama dengan kurang lebih 100 perusahaan di dalam dan luar negeri
							untuk membantu para alumninya menyalurkan pengetahuan bisnis digital yang telah dimiliki selama menempuh pendidikan feducation melalui program magang di perusahaan mitra feducation.</p>
					</div>
					<div class="col-12 col-md-6 p-2 d-block d-sm-none">
						<p class="text-left mb-3" data-wow-delay="0.3s">Feducation menjalin kerjasama dengan kurang lebih 100 perusahaan di dalam dan luar negeri
							untuk membantu para alumninya menyalurkan pengetahuan bisnis digital yang telah dimiliki selama menempuh pendidikan feducation melalui program magang di perusahaan mitra feducation.</p>
					</div>
					<div class="col-12 mt-5">
						<!-- Card Wider -->
						<div class="row justify-content-center text-center">
							<?php foreach ($dataMitra as $mitra):?>
								<div class="col-lg-3 col-md-3 col-sm-12 my-4">
									<div class="view overlay justify-content-center">
										<img src="<?= base_url('assets/resources/images/mitras/').$mitra->mitra_logo ?>" class="img-fluid" alt="pelatihan digital marketing">
										<a target="_blank" href="<?= $mitra->mitra_link?>" class="justify-content-center">
											<div class="mask waves-effect waves-light rgba-white-slight justify-content-center"></div>
										</a>
									</div>
								</div>
							<?php endforeach;?>
						</div>
					</div>
				</div>
			</section>

			<hr class="thin m-4">
		</div>
	</div>
</div>
<!--Google Map Start-->
<section class="contact-page-google-map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d693.2862040167295!2d106.85498399862391!3d-6.23211060097501!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f37806fac8df%3A0x3f6e9291b35d36b3!2sFeducation%20Id!5e0!3m2!1sen!2sid!4v1662306698817!5m2!1sen!2sid" class="contact-page-google-map__one" allowfullscreen></iframe>
</section>
<!--Google Map End-->
