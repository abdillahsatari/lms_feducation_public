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
	<!--plugins-->
	<link href="<?= base_url('assets/') ?>admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?= base_url('assets/') ?>admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?= base_url('assets/') ?>admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<!-- loader-->
	<link href="<?= base_url('assets/') ?>admin/css/pace.min.css" rel="stylesheet" />
	<script src="<?= base_url('assets/') ?>admin/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?= base_url('assets/') ?>admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>admin/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>admin/css/app.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>admin/css/icons.css" rel="stylesheet">
	<title>Halaman Login <?= $session ?> | Feducation Id</title>
</head>

<body class="bg-theme bg-theme2">
<!--wrapper-->
<div class="wrapper">
	<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
		<div class="container-fluid">
			<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
				<div class="col mx-auto">
					<div class="card">
						<div class="card-body">
							<div class="border p-4 rounded">
								<div class="card-title text-center">
									<img src="<?= base_url('assets/') ?>resources/apps/logo-1.png" width="150" alt="" />
									<h5 class="mb-5 mt-2 text-white"><?= $session ?> Login</h5>
								</div>
								<?= $this->session->flashdata('message') ?>
								<hr>
								<div class="form-body">
									<form class="row g-3"
										  action="<?php
										  $postURL="";
										  switch ($session) {
											  case SessionType::ADMIN:
											  	$postURL = 'admin/AdminLogin/authentication';
											  	break;
											  case SessionType::MEMBER:
											  	$postURL = 'member/authentication';
											  	break;
										  }

										  echo base_url($postURL);

										  ?>" method="post">
										<input type="hidden" name="<?= $this->security->get_csrf_token_name()?>" value="<?= $this->security->get_csrf_hash()?>">
										<div class="col-12">
											<label for="inputEmailAddress" class="form-label">Email Address</label>
											<input type="email" class="form-control" name="uid" id="inputEmailAddress" placeholder="Email Address" value="<?= set_value('email')?>">
											<small><?= form_error('email')?></small>
										</div>
										<div class="col-12">
											<label for="inputChoosePassword" class="form-label">Enter Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" value="<?= set_value('password')?>" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												<small><?= form_error('password')?></small>
											</div>
										</div>
										<?php if ($session == SessionType::MEMBER) {?>
										<div class="col-md-6">
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
												<label class="form-check-label" for="flexSwitchCheckChecked">I Agree With Terms & Conditions</label>
											</div>
										</div>
										<div class="col-md-6 text-end">	<a href="<?= base_url('member/password/reset')?>">Lupa Password ?</a>
										</div>
										<?php }?>
										<div class="col-12">
											<div class="d-grid">
												<button type="submit" class="btn btn-light"><i class="bx bxs-lock-open"></i>Sign in</button>
											</div>
										</div>
									</form>
									<hr>
									<?php if ($session == SessionType::MEMBER) {?>
									<div class="text-center">
										<p>Belum Memiliki Akun? <a href="<?= base_url('member/register')?>">Daftar Disini</a>
										</p>
									</div>
									<?php }?>
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
<!-- Bootstrap JS -->
<script src="<?= base_url('assets/') ?>admin/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="<?= base_url('assets/') ?>admin/js/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>admin/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?= base_url('assets/') ?>admin/plugins/metismenu/js/metisMenu.min.js"></script>

<!--Password show & hide js -->
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
</script>

</body>

</html>
