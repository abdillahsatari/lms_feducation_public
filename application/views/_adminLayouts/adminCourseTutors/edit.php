<div class="page-content">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Edit Tutors</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Courses</li>
					<li class="breadcrumb-item active" aria-current="page">Tutor</li>
					<li class="breadcrumb-item active" aria-current="page">Edit Tutors</li>
				</ol>
			</nav>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="container">
		<div class="main-body">
			<div class="card">
				<form role="form" action="<?= base_url('admin/course/tutor/update')?>" method="POST" class="js-form_add-course_tutor">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
					<input type="hidden" name="tutor_id" value="<?= $dataTutor->id ?>">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-4 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-body">
										<h4>Profil</h4>
										<hr>
										<div class="d-flex flex-column align-items-center text-center">
											<img src="<?= $dataTutor->tutor_image ? base_url('assets/resources/images/tutors/').$dataTutor->tutor_image: base_url('assets/images/interns/default_intern_ava.png')?>"
												 class="card-img image-preview" alt="Feducation Course">
											<div class="mt-3">
												<!--												<button type="button" class="btn btn-light">Upload</button>-->
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-8 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-body">
										<h4>Tutor Info</h4>
										<hr>
										<div class="row">
											<div class="col-6">
												<div class="mb-3">
													<label class="mb-1">Nama</label>
													<input type="text" name="tutor_name" placeholder="Nama" class="form-control" data-rule-required="true" data-msg="Nama Tutor Tidak Boleh Kosong" value="<?= $dataTutor->tutor_name?>">
													<small class="text-danger"><?= form_error('tutor_name')?></small>
												</div>
												<div class="mb-3">
													<label class="mb-1">No. Hp</label>
													<input type="number" name="tutor_phone_number" placeholder="No. Hp" class="form-control" data-rule-required="true" data-msg="No.Hp Tutor Tidak Boleh Kosong" value="<?= $dataTutor->tutor_phone_number?>">
													<small class="text-danger"><?= form_error('tutor_phone_number')?></small>
												</div>
												<div class="mb-3">
													<label class="mb-1">Gambar Profil</label>
													<input type="file" class="form-control js-image_upload" id="tutor_image" accept=".png, .jpg, .jpeg" data-url-upload="<?= base_url('admin/AdminAjax/postCourseTutorImage');?>">
													<input type="hidden" name="tutor_image" id="tutor_image" value="<?= $dataTutor->tutor_image?>">
												</div>
											</div>
											<div class="col-6">
												<div class="mb-3">
													<label class="mb-1">Email</label>
													<input type="email" name="tutor_email" placeholder="Email" class="form-control" data-rule-required="true" data-msg="Email Tutor Tidak Boleh Kosong" data-msg-email="Format Email salah" value="<?= $dataTutor->tutor_email?>">
													<small class="text-danger"><?= form_error('tutor_email')?></small>
												</div>
												<div class="mb-3">
													<label class="mb-1">Achievement Highlight</label>
													<input type="text" name="tutor_achievement" placeholder="Achievement" class="form-control" data-rule-required="true" data-msg="Achievement Tutor Tidak Boleh Kosong" value="<?= $dataTutor->tutor_achievement?>">
													<small class="text-danger"><?= form_error('tutor_achievement')?></small>
												</div>
												<div class="mb-3">
													<label class="mb-1">Kategori Kelas</label>
													<select name="tutor_course_category_id" class="single-select js-input-with-plugin form-control" id="js_article-id" data-rule-required="true" data-msg="Kategori Kursus Tidak Boleh Kosong">
														<option value="" disabled selected>--Pilih Kategori Kelas--</option>
														<?php foreach ($dataCourseCategories as $courseCategory){?>
														<option value="<?= $courseCategory->id ?>" <?= $courseCategory->id == $dataTutor->tutor_course_category_id ? "selected" : ""; ?>><?= $courseCategory->course_category_headline ?></option>
														<?php } ?>
													</select>
													<small class="js_input-error-placement"><?= form_error('tutor_course_category_id')?></small>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<div class="mb-3">
													<label class="mb-1">Tutor Overview</label>
													<textarea id="tinyMceTextArea" name="tutor_overview"><?= $dataTutor->tutor_overview?></textarea>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="col-12">
									<div class="card">
										<div class="card-body">
											<h4>Sosial Media</h4>
											<hr>
											<div class="row">
												<div class="col-4">
													<div class="mb-3">
														<label class="mb-1">Facebook</label>
														<input type="text" name="tutor_facebook" placeholder="url Facebook" class="form-control" data-rule-required="true" data-msg="url Facebook Tidak Boleh Kosong" value="<?= $dataTutor->tutor_facebook?>">
														<small class="text-danger"><?= form_error('tutor_facebook')?></small>
													</div>
												</div>
												<div class="col-4">
													<div class="mb-3">
														<label class="mb-1">Instagram</label>
														<input type="text" name="tutor_instagram" placeholder="url Instagram" class="form-control" data-rule-required="true" data-msg="url Instagram Tidak Boleh Kosong" value="<?= $dataTutor->tutor_instagram?>">
														<small class="text-danger"><?= form_error('tutor_instagram')?></small>
													</div>
												</div>
												<div class="col-4">
													<div class="mb-3">
														<label class="mb-1">Linkedin</label>
														<input type="text" name="tutor_linkedin" placeholder="url Linkedin" class="form-control" data-rule-required="true" data-msg="url Linkedin Tidak Boleh Kosong" value="<?= $dataTutor->tutor_linkedin?>">
														<small class="text-danger"><?= form_error('tutor_linkedin')?></small>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<a href="<?= base_url('admin/course/tutor')?>" type="button" class="btn btn-light">Kembali</a>
						<button type="button" class="btn btn-primary js-form_action_btn">Update</button>
					</div>
					<form>
			</div>
		</div>
	</div>
</div>
