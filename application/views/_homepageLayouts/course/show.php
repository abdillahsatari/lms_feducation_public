<div class="fss-subview">
	<div fss-anchor="subview-a" class="screen-height fss-subview-item subview-a" style="background-image: url('https://astronacci.com/images/website/bg-layer8.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
		<div class="center-div container padding-sect-1">
			<div class="row">
				<div class="col-xl-12">
					<!-- Grid row -->
					<div class="row mb-5">

						<!-- Grid column -->
						<div class="col-xl-12">
							<!-- Featured news -->
							<div class="single-news mb-lg-0 mb-4">
								<!-- Image -->
								<div class="view overlay rounded z-depth-1-half mb-4">
									<img class="w-100 img-fluid" src="https://astronacci.com/images/thumbnail/BANNEERUPCOMING_EVENT.jpg" alt="IFTA’s 35th Annual Conference ">
									<a href="<?= base_url('course/detail/').$dataCourse["courseCategory"]?>">
										<div class="mask rgba-white-slight waves-effect waves-light"></div>
									</a>
								</div>
								<!-- Excerpt -->
								<h4 class="font-weight-bold dark-grey-text mb-3"><a class="text-danger" href="<?= base_url('courses') ?>">Kelas <?= $dataCourse['courseHeadline'] ?></a></h4>
								<h5 class="dark-grey-text mb-lg-0 mb-md-5 mb-3"><?= $dataCourse['courseTutor'] ?></h5>
								<h6 class="dark-grey-text mb-lg-0 mb-md-5 mb-3"><?= $dataCourse['courseTutorQualification'] ?></h6>
								<br>
								<p></p><?= $dataCourse["courseDescription"]?></p>

								<a href="<?= base_url('courses')?>" class="btn btn-light waves-effect waves-light">PILIH KELAS LAIN </a>
								<a href="<?= base_url('course/register/'). $dataCourse['courseCategory']?>" class="btn btn-danger waves-effect waves-light">REGISTER DISINI </a>
							</div>
							<!-- Featured news -->
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
