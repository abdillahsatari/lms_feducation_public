<div class="page-content">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Intern</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Edit Biodata Intern</li>
				</ol>
			</nav>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="container">
		<div class="main-body">
			<div class="card">
				<form role="form" action="<?= base_url('admin/pr/intern/update')?>" method="POST" class="js-form_add-intern">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
					<input type="hidden" name="intern_id" value="<?= $dataIntern->id ?>">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-4 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-body">
										<h4>Profil</h4>
										<hr>
										<div class="d-flex flex-column align-items-center text-center">
											<img src="<?= $dataIntern->intern_image ? base_url('assets/resources/images/interns/').$dataIntern->intern_image: base_url('assets/resources/images/interns/default_intern_ava.png')?>"
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
										<h4>Info</h4>
										<hr>
										<div class="row">
											<div class="col-6">
												<div class="mb-3">
													<label>Nama</label>
													<input type="text" name="intern_name" placeholder="Nama" class="form-control" data-rule-required="true" data-msg="Kolom Nama Tidak Boleh Kosong" value="<?= $dataIntern->intern_name ?>">
													<small class="text-danger"><?= form_error('intern_name')?></small>
												</div>
												<div class="mb-3">
													<label>No. Hp</label>
													<input type="number" name="intern_phone" placeholder="No. Hp" class="form-control" data-rule-required="true" data-msg="Kolom No.Hp Tidak Boleh Kosong" value="<?= $dataIntern->intern_phone ?>">
													<small class="text-danger"><?= form_error('intern_phone')?></small>
												</div>
												<div class="mb-3">
													<label>Tgl Mulai</label>
													<input type="datetime-local" class="form-control" name="program_start_date" data-rule-required="true" data-msg="Kolom Tgl Mulai Tidak Boleh Kosong" value="<?= $dataIntern->program_start_date ?>">
													<small class="text-danger"><?= form_error('program_start_date')?></small>
												</div>
												<div class="mb-3">
													<label>Mentor</label>
													<input type="text" name="intern_tutor" placeholder="Mentor" class="form-control" data-rule-required="true" data-msg="Kolom Mentor Tidak Boleh Kosong" value="<?= $dataIntern->intern_tutor ?>">
													<small class="text-danger"><?= form_error('intern_tutor')?></small>
												</div>
											</div>
											<div class="col-6">
												<div class="mb-3">
													<label>Email</label>
													<input type="email" name="intern_email" placeholder="Email" class="form-control" data-rule-required="true" data-msg="Kolom Email Tidak Boleh Kosong" value="<?= $dataIntern->intern_email ?>">
													<small class="text-danger"><?= form_error('intern_email')?></small>
												</div>
												<div class="mb-3">
													<label>Instansi</label>
													<input type="text" name="intern_institution" placeholder="Instansi" class="form-control" data-rule-required="true" data-msg="Kolom institusi Tidak Boleh Kosong" value="<?= $dataIntern->intern_institution ?>">
													<small class="text-danger"><?= form_error('intern_institution')?></small>
												</div>
												<div class="mb-3">
													<label>Tgl Selesai</label>
													<input type="datetime-local" class="form-control" name="program_end_date" data-rule-required="true" data-msg="Kolom Tgl Selesai Tidak Boleh Kosong" value="<?= $dataIntern->program_end_date ?>">
													<small class="text-danger"><?= form_error('program_end_date')?></small>
												</div>
												<div class="mb-3">
													<label>Gambar Profil</label>
													<input type="file" class="form-control js-image_upload" id="intern_image" accept=".png, .jpg, .jpeg" data-url-upload="<?= base_url('admin/AdminAjax/postInternImage');?>">
													<input type="hidden" name="intern_image" id="intern_image" value="<?= $dataIntern->intern_image ?>">
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
														<label>Facebook</label>
														<input type="text" name="intern_facebook" placeholder="Link Facebook" class="form-control" data-rule-required="true" data-msg="Kolom Link Facebook Tidak Boleh Kosong" value="<?= $dataIntern->intern_facebook ?>">
														<small class="text-danger"><?= form_error('intern_facebook')?></small>
													</div>
												</div>
												<div class="col-4">
													<div class="mb-3">
														<label>Instagram</label>
														<input type="text" name="intern_instagram" placeholder="Link Instagram" class="form-control" data-rule-required="true" data-msg="Kolom Link Instagram Tidak Boleh Kosong" value="<?= $dataIntern->intern_instagram ?>">
														<small class="text-danger"><?= form_error('intern_instagram')?></small>
													</div>
												</div>
												<div class="col-4">
													<div class="mb-3">
														<label>Twitter</label>
														<input type="text" name="intern_twitter" placeholder="Link Twitter" class="form-control" value="<?= $dataIntern->intern_twitter ?>">
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
						<a href="<?= base_url('admin/pr/intern/list')?>" type="button" class="btn btn-light">Kembali</a>
						<button type="button" class="btn btn-primary js-form_action_btn">Update</button>
					</div>
					<form>
			</div>
		</div>
	</div>
</div>
