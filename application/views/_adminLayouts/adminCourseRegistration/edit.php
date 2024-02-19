<div class="page-content">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Course</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Edit Registration Info</li>
				</ol>
			</nav>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="container">
		<div class="main-body">
			<div class="card">
				<form role="form"
					  method="POST" class="js-form-edit-course-registration"
					  action="<?= base_url('admin/course/registration/update')?>"
					  data-rer="<?= base_url('admin/AdminAjax/resendRegistrationEmail');?>"
					  data-sae="<?= base_url('admin/AdminAjax/sendAcceptanceEmail');?>"
					  data-pr="<?= base_url('admin/AdminAjax/postCoursePaymentReceipt');?>">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
					<input type="hidden" name="registrarId" value="<?= $dataRegistration->id ?>">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-4 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-body">
										<h4>Payment Receipt</h4>
										<hr>
										<div class="d-flex flex-column align-items-center text-center">
											<img src="<?= $dataRegistration->payment_receipt ? base_url('assets/resources/images/receipts/').$dataRegistration->payment_receipt : base_url('assets/resources/images/receipts/receipt.png')?>"
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
										<h4>Registration Info</h4>
										<hr>
										<div class="row">
											<div class="col-6">
												<div class="mb-3">
													<label>Nama</label>
													<input type="text" name="member_full_name" placeholder="Nama" class="form-control" value="<?= $dataRegistration->member_full_name ?>" disabled>
													<small class="text-danger"><?= form_error('intern_name')?></small>
												</div>
												<div class="mb-3">
													<label>No. Hp</label>
													<input type="number" name="member_phone_number" placeholder="No. Hp" class="form-control" value="<?= $dataRegistration->member_phone_number ?>" disabled>
													<small class="text-danger"><?= form_error('intern_phone')?></small>
												</div>
												<div class="mb-3">
													<label>Upline</label>
													<input type="text" name="upline_full_name" placeholder="-" class="form-control" value="<?= $dataParent ? $dataParent->member_full_name : "-" ?>" disabled>
													<small class="text-danger"><?= form_error('intern_phone')?></small>
												</div>
												<div class="mb-3">
													<label>Course Headline</label>
													<input type="text" name="member_full_name" placeholder="Nama" class="form-control" value="<?= $dataRegistration->course_headline ?>" disabled>
													<small class="text-danger"><?= form_error('intern_name')?></small>
												</div>
												<div class="mb-3">
													<label>Payment Receipt</label>
													<input type="file" class="form-control js-image_upload" id="intern_image" accept=".png, .jpg, .jpeg" data-url-upload="<?= base_url('admin/AdminAjax/postCoursePaymentReceipt');?>">
													<input type="hidden" name="payment_receipt" id="intern_image" value="<?= $dataRegistration->payment_receipt?>">
												</div>
											</div>
											<div class="col-6">
												<div class="mb-3">
													<label>Email</label>
													<input type="email" name="member_email" placeholder="Email" class="form-control" value="<?= $dataRegistration->member_email ?>" disabled>
													<small class="text-danger"><?= form_error('intern_email')?></small>
												</div>
												<div class="mb-3">
													<label>Referal Code</label>
													<input type="text" name="intern_institution" placeholder="-" class="form-control" value="<?= $dataRegistration->referal_code ?>" disabled>
													<small class="text-danger"><?= form_error('intern_institution')?></small>
												</div>
												<div class="mb-3">
													<label>Upline Referal Code</label>
													<input type="text" name="upline_referal_code" placeholder="-" class="form-control" value="<?= $dataParent ? $dataParent->referal_code : "-" ?>" disabled>
													<small class="text-danger"><?= form_error('intern_phone')?></small>
												</div>
												<div class="mb-3">
													<label>Course Price</label>
													<div class="input-group"><span class="input-group-text">Rp.</span>
														<input type="text" class="form-control js-input-currencyFormatter" data-price="<?= $dataRegistration->course_price?>" placeholder="Type a message" disabled>
													</div>
													<small class="text-danger"><?= form_error('intern_name')?></small>
												</div>
												<div class="mb-3">
													<label>Update Status</label>
													<select name="member_status" class="single-select js-updateRegisterStatus">
														<option value="" disabled selected>--Select Status--</option>
														<option value="<?= MemberCourseStatus::REGISTERED ?>" <?= $dataRegistration->member_status == MemberCourseStatus::REGISTERED ? "selected" : "" ?> >Menunggu Pembayaran</option>
														<option value="<?= MemberCourseStatus::ONSCHEDULED ?>" <?= $dataRegistration->member_status == MemberCourseStatus::ONSCHEDULED ? "selected" : "" ?> >Pendaftaran Selesai</option>
														<option value="<?= MemberCourseStatus::RUNNNIG ?>" <?= $dataRegistration->member_status == MemberCourseStatus::RUNNNIG ? "selected" : "" ?> >Kelas Berjalan</option>
														<option value="<?= MemberCourseStatus::FINISHED ?>" <?= $dataRegistration->member_status == MemberCourseStatus::FINISHED ? "selected" : "" ?> >Pelatihan Selesai</option>
														<option value="<?= MemberCourseStatus::EXPIRED ?>" <?= $dataRegistration->member_status == MemberCourseStatus::EXPIRED ? "selected" : "" ?> >Kelas Berakhir</option>
													</select>
													<small class="text-danger"><?= form_error('member_status')?></small>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php if (!$dataRegistration->is_email_regist_sent):?>
								<div class="card js-dynamicElement">
									<div class="card-body">
										<div class="row">
											<div class="col-8">
												<p><span class="text-danger">Oops!</span> Seems like your registrar doesn't receive their email registration due to the server email limit.
													Please Send them manualy by clicking the resend email registration button aside.</p>
											</div>
											<div class="col-4 js-rer-wrapper">
												<button type="button" class="btn btn-warning js-rer-button">Resend Registration Email</button>
											</div>
										</div>
									</div>
								</div>
								<?php endif;?>

								<div class="card js-dynamicElement-sae" style="display: none">
									<div class="card-body">
										<div class="row">
											<div class="col-8">
												<p><span class="text-danger">Attantion!</span> Please make sure the transfer amount is appropriate before agreeing and sending the email acceptance of registration.</p>
											</div>
											<div class="col-4 js-sae-wrapper">
												<a href="#" type="button" class="btn btn-primary js-sae-button">Send Acceptance Email</a>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="card-footer">
						<a href="<?= base_url('admin/course/registration')?>" type="button" class="btn btn-light">Kembali</a>
						<button type="button" class="btn btn-primary js-form_action_btn">Update</button>
					</div>
				<form>
			</div>
		</div>
	</div>
</div>
