<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/')?>admin/images/favicons/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/')?>admin/images/favicons/favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/')?>admin/images/favicons/favicon-16x16.png" />
	<link rel="manifest" href="<?=base_url('assets/')?>admin/images/favicons/site.webmanifest" />
	<!-- loader-->
	<link href="<?= base_url('assets/') ?>admin/css/pace.min.css" rel="stylesheet" />
	<script src="<?= base_url('assets/') ?>admin/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?= base_url('assets/') ?>admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>admin/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>admin/css/app.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>admin/css/icons.css" rel="stylesheet">
	<title>Halaman Register - Feducation Id</title>
</head>

<body class="bg-theme bg-theme2">
<!--wrapper-->
<div class="wrapper">
	<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
		<div class="container">
			<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
				<div class="col mx-auto">
					<div class="my-4 text-center">
						<img src="<?= base_url('assets/') ?>resources/apps/logo-1.png" width="150" alt="" />
					</div>
					<div class="card">
						<div class="card-body">
							<div class="border p-4 rounded">
								<div class="text-center">
									<h3 class="">Sign Up</h3>
									<!-- <p>Sudah Memiliki Akun? <a href="<?= base_url('member/login')?>">Login Disini</a> -->
									</p>
								</div>
								<div class="form-body">
									<form class="row g-3" method="POST"
										  action="<?= base_url('member/register'); ?>">
										<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
										<div class="col-12">
											<label for="inputFirstName" class="form-label">Nama Lengkap</label>
											<input type="name" class="form-control" id="inputFirstName" placeholder="Enter Full Name" name="member_full_name" value="<?= set_value('member_full_name')?>">
											<small><?= form_error('member_full_name')?></small>
										</div>
										<div class="col-12">
											<label for="inputEmailAddress" class="form-label">Email</label>
											<input type="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com" name="member_email" value="<?= set_value('member_email')?>">
											<small><?= form_error('member_email')?></small>
										</div>
										<div class="col-12">
											<label for="inputPhoneNumber" class="form-label">No. Hp</label>
											<input type="number" class="form-control" id="inputPhoneNumber" placeholder="081-1832-1111" name="member_phone_number" value="<?= set_value('member_phone_number')?>">
											<small><?= form_error('member_phone_number')?></small>
										</div>
										<!-- <div class="col-6">
											<label for="show_hide_password" class="form-label">Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" id="show_hide_password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" name="member_password" value="<?= set_value('member_password')?>"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
											</div>
											<small><?= form_error('member_password')?></small>
										</div>
										<div class="col-6">
											<label for="show_hide_password_2" class="form-label">Ulangi Password</label>
											<div class="input-group" id="show_hide_password_2">
												<input type="password" id="show_hide_password_2" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" name="retype_member_password" value="<?= set_value('retype_member_password')?>"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
											</div>
											<small><?= form_error('retype_member_password')?></small>
										</div> -->
										<?php
										if ($this->input->get('r') || set_value('referal_link')) {
											$kode = $this->input->get('r');?>
										<div class="col-sm-12">
											<label for="inputFirstName" class="form-label">Referral Link</label>
											<input type="name" class="form-control" id="inputFirstName" placeholder="Enter Referral Link" name="referal_link" value="<?= (set_value('referal_link') == '' ? $kode : set_value('referal_link')) ?>" readonly>
											<small><?= form_error('referal_link')?></small>
										</div>
										<?php } ?>
										<div class="col-12">
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
												<label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
											</div>
										</div>
										<div class="col-12">
											<div class="d-grid">
												<button type="submit" class="btn btn-light"><i class='bx bx-user'></i>Sign up</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end row-->
		</div>
	</div>
</div>
<!--end wrapper-->
<!--start switcher-->
<!--end switcher-->


<!--plugins-->
<script src="<?= base_url('assets/') ?>admin/js/jquery.min.js"></script>

<script>
	$(document).ready(function () {
		$("#show_hide_password a").on('click', function (event) {
			event.preventDefault();
			if ($('#show_hide_password input').attr("type") == "text") {
				$('#show_hide_password input').attr('type', 'password');
				$('#show_hide_password i').addClass("bx-hide");
				$('#show_hide_password i').removeClass("bx-show");
			} else if ($('#show_hide_password input').attr("type") == "password") {
				$('#show_hide_password input').attr('type', 'text');
				$('#show_hide_password i').removeClass("bx-hide");
				$('#show_hide_password i').addClass("bx-show");
			}
		});
	});

	$(document).ready(function () {
		$("#show_hide_password_2 a").on('click', function (event) {
			event.preventDefault();
			if ($('#show_hide_password_2 input').attr("type") == "text") {
				$('#show_hide_password_2 input').attr('type', 'password');
				$('#show_hide_password_2 i').addClass("bx-hide");
				$('#show_hide_password_2 i').removeClass("bx-show");
			} else if ($('#show_hide_password_2 input').attr("type") == "password") {
				$('#show_hide_password_2 input').attr('type', 'text');
				$('#show_hide_password_2 i').removeClass("bx-hide");
				$('#show_hide_password_2 i').addClass("bx-show");
			}
		});
	});
</script>
</body>

</html>
