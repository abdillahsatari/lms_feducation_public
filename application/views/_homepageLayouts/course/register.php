<style rel="stylesheet">
	@media only screen and (max-width: 440px) {
		#btn-sent {
			margin: 2rem;
		}
	}
</style>

<div class="padding-sect-1 screen-height" style="background-image: url('<?= base_url('assets/images/resources/')?>bg-layer8.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
	<div class="container-fluid text-center center-div-testimoni">
		<div class="container">
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a class="black-text" href="<?= base_url('homepage')?>">Home</a><i
							class="fas fa-angle-double-right mx-2" aria-hidden="true"></i></li>
					<li class="breadcrumb-item active">Course</li>
					<li class="breadcrumb-item active">Register Course</li>
					<li class="breadcrumb-item active"><?= $dataCourse['courseHeadline'] ?></li>
				</ol>
			</nav>

			<section style="background-repeat: no-repeat; background-size: cover; background-position: center center;">
				<div class="row no-gutters mb-4">
					<!-- web -->
					<div class="col-12 pt-5 d-none d-sm-block">
						<h3 class="text-uppercase font-weight-bold text-center">Daftar Kelas <br> <span class="text-danger"><?= $dataCourse['courseHeadline']?></span></h3>
					</div>
					<!-- mobile -->
					<div class="col-12 col-sm-6 col-md-6 pt-5 d-block d-sm-none">
						<h3 class="text-uppercase font-weight-bold text-center">Daftar Kelas <br> <span class="text-danger"> <?= $dataCourse['courseHeadline']?></span></h3>
					</div>
				</div>
				<div class="col-lg-12 col-md-12">
					<div class="row justify-content-center text-center">
						<div class="col-lg-6 col-md-12 col-sm-12 my-4">
							<div class="justify-content-center">
								<div class="card justify-content-center">
									<div class="col-md-12 col-xs-12 mt-4" style=" min-height:250px;">
										<form method="POST"
											  action="<?= base_url('course/register-save'); ?>">
											<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
											<input type="hidden" name="courseCategory" value="<?= $dataCourse['courseCategory'] ?>">
											<input type="hidden" name="courseHeadline" value="<?= $dataCourse['courseHeadline'] ?>">
											<div class="row">
												<label>Nama Lengkap <span class="text-danger">*</span></label>
												<input type="text" id="member_full_name" name="member_full_name" class="form-control mb-4" placeholder="Nama Lengkap"
													   pattern=".{3,}" required>
												<span class="text-danger"><?= form_error('member_full_name')?></span>
												<label>Email <span class="text-danger">*</span></label>
												<input type="email" id="email" name="member_email" class="form-control mb-4" placeholder="E-Mail"
													   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
												<span class="text-danger"><?= form_error('member_email')?></span>
												<label>No. Hp <span class="text-danger">*</span></label>
												<input type="number" id="name" name="member_phone_number" class="form-control mb-4" placeholder="No. Hp" required>
												<span class="text-danger"><?= form_error('member_phone_number')?></span>
												<?php
//												if ($this->input->get('r') || set_value('referal_link')) {
//													$kode = $this->input->get('r');?>
													<label>Kode Referal</label>
													<input type="text" id="referal_code" name="referal_code" class="form-control mb-4" placeholder="Referal Code"
														   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
													<span class="text-danger"><?= form_error('referal_code')?></span>
<!--												--><?php //} ?>
<!--												<label>Sumber Informasi <span class="text-danger">*</span></label>-->
<!--												<select name="member_info_source" class="form-control mb-4" required>-->
<!--													<option value="" disabled selected>--Pilih Sumber Informasi--</option>-->
<!--													<option value="website">Website</option>-->
<!--													<option value="sosialisasi">Sosialisasi</option>-->
<!--													<option value="marketing">Marketing</option>-->
<!--													<option value="instagram">Instagram</option>-->
<!--													<option value="facebook">Facebook</option>-->
<!--													<option value="twitter">Twitter</option>-->
<!--													<option value="youtube">Youtube</option>-->
<!--													<option value="whatsapp">Whatsapp</option>-->
<!--												</select>-->
<!--												<span class="text-danger">--><?//= form_error('member_info_source')?><!--</span>-->
											</div>
											<div class="d-block d-sm-none">
												<button id="btn-sent" class="btn btn-danger btn-rounded mb-5">Daftar</button>
<!--												<a href="--><?//= base_url('courses')?><!--" class="btn btn-light btn-rounded mb-5">Pilih Kelas Lain</a>-->
											</div>
											<div class="d-none d-sm-block">
												<button id="btn-sent" class="btn btn-danger btn-rounded mb-5">Daftar</button>
<!--												<a href="--><?//= base_url('courses')?><!--" class="btn btn-light btn-rounded mb-5">Pilih Kelas Lain</a>-->
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<hr class="thin m-4">
		</div>
	</div>
</div>
