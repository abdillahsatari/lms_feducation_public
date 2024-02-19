<?= $this->session->flashdata('notification') ?>
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
	<!-- <ol class="carousel-indicators">
		<?php foreach($dataHighlightedCourses as $hc):?>
			<li data-bs-target="#carouselExampleDark" data-bs-slide-to="<?= $hc->course_order_number?>" class="<?= $hc->course_order_number == "1" ? "active" : "";?>"></li>
		<?php endforeach;?>
	</ol> -->
	<div class="carousel-inner">
		<?php foreach($dataHighlightedCourses as $hc):?>
			<div class="carousel-item <?= $hc->course_order_number == "1" ? "active" : "";?>" data-bs-interval="3000">
				<img src="assets/resources/images/courses/banners/<?= $hc->course_banner?>" class="d-block w-100" alt="...">
			</div>
		<?php endforeach;?>
	</div>
	<!-- <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">	<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</a> -->
</div>
<br>
<div class="row">
	<div class="col-12 col-lg-8 col-xl-8 d-flex">
		<div class="card radius-10 w-100">
			<div class="js-form-filter-course" data-url="<?= base_url('member/MemberAjax/filterCoursesInit');?>">
				<div class="card-body">
					<div class="d-flex align-items-center mb-3">
						<h5 class="mb-0">Filter</h5>
					</div><hr>
					<div class="row mb-5">
						<div class="col-12">
							<div class="search-bar flex-grow-1">
								<div class="position-relative">
									<input type="text" name="filterByHeadline" class="form-control search-control" placeholder="Cari Topik Pembelajaran"> <span class="position-absolute top-50 search-show translate-middle-y"><i class="bx bx-search"></i></span>
									<span class="position-absolute top-50 search-close translate-middle-y"><i class="bx bx-x"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<div class="mb-3">
								<label class="mb-3">Kategori</label>
								<?php $i=1; foreach($dataCourseCategory as $cc):?>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="<?= $cc->id?>" id="filterByCategory<?= $i++?>" name="filterByCategory">
										<label class="form-check-label" for="course_filter_course_category"><?= $cc->course_category_headline?></label>
									</div>
								<?php endforeach;?>
							</div>
						</div>
						<div class="col-3">
							<div class="mb-3">
								<label class="mb-3">Urut Berdasarkan</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="filterByOrder" id="flexRadioDefault1" value="DESC">
									<label class="form-check-label" for="flexRadioDefault1">Kursus Terbaru</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="filterByOrder" id="flexRadioDefault2" value="ASC">
									<label class="form-check-label" for="flexRadioDefault2">Kursus Lama</label>
								</div>
							</div>
						</div>
						<div class="col-3">
							<div class="mb-3">
								<label class="mb-3">Durasi Pembelajaran</label>
								<input type="number" name="filterByMinDuration" placeholder="Durasi Minimal" class="form-control">
								<br>
								<input type="number" name="filterByMaxDuration" placeholder="Durasi Maksimal" class="form-control">
							</div>
						</div>
						<div class="col-3">
							<div class="mb-3">
								<label class="mb-3">Harga</label>
								<input type="number" name="filterByMinPrice" placeholder="Harga Minimal" class="form-control">
								<br>
								<input type="number" name="filterByMaxPrice" placeholder="Harga Maksimal" class="form-control">
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-sm btn-primary js-form-filter-course-submit">Filter</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12 col-lg-4 col-xl-4 d-flex">
		<div class="card radius-10 overflow-hidden w-100">
			<div class="card-body">
				<div class=" align-items-center mb-3">
					<!-- <h5 class="mb-0">Top Categories</h5> -->
					<h6 class="mb-0 text-uppercase">Kode Referal</h6>
					<hr/>
					<div class="row">
						<div class="input-group mb-3">
							<input type="text" class="form-control js-targeted_copy_value" value="<?= base_url('member/register?r=')?><?= $dataMember[0]->member_referal_code?>" placeholder="Kode Referal Member" aria-label="Kode Referal Member" aria-describedby="button-addon2" disabled readonly>
							<button class="btn btn-light js-copy_btn" type="button" id="button-addon2">Copy</button>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Afiliasi Saya</p>
										<h4 class="my-1"><?= $memberAfiliation ?></h4>
									</div>
									<a href="<?= base_url("member/referal") ?>" type="button" class="widgets-icons ms-auto btn btn-outline-primary">
										<i class='bx bxs-group'></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Komisi Referal</p>
										<h4 class="my-1 js-currencyFormatter" data-price="<?= $dataBalance ?>"></h4>
									</div>
									<a href="<?= base_url("member/withdrawal") ?>" class="widgets-icons ms-auto btn btn-outline-primary"><i class='bx bxs-wallet'></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<hr>
<h3>E-Course</h3>
<hr>
<div class="js-display-courses-wrapper" data-url="<?= base_url('member/MemberAjax/coursesInit');?>">
	<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
	<div class="js-accordion-init">
	<div class="spinner-grow" role="status" style="margin-left: 50%; margin-top: 5%; margin-bottom: 5%;"></div>
		<!-- Load Course Lists Here -->
	</div>
</div>
<br><br>
<hr class="mt-5">
<h3>Tutor Fedu</h3>
<hr>
<div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
	<?php foreach($dataCourseTutor as $ct):?>
	<div class="col">
		<div class="card">
			<div class="row g-0">
				<div class="col-md-4">
					<img src="<?= base_url('assets/resources/images/tutors/'). $ct->tutor_image?>" alt="feducation tutor" class="card-img">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title"><?= $ct->tutor_name?></h5>
						<p class="card-text">
							<?= $ct->tutor_achievement ?>
						</p>
						<p class="card-text">
							<?php

							$string = strip_tags($ct->tutor_overview);
							if (strlen($string) > 50) {
								$stringCut = substr($string, 0, 100);
								$string = substr($stringCut, 0, strrpos($stringCut, ' '))." ...";
							}

							echo $string;
							?>
							<a href="<?= base_url('member/tutor/view?t=').$ct->id?>">view more</a>
							<!-- <?= $ct->tutor_achievement ?> -->
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
<!--end row-->

