<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?= base_url('assets/') ?>admin/images/favicon-32x32.png" type="image/png" />
	<!-- loader-->
	<link href="<?= base_url('assets/') ?>admin/css/pace.min.css" rel="stylesheet" />
	<script src="<?= base_url('assets/') ?>admin/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?= base_url('assets/') ?>admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>admin/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>admin/css/app.css" rel="stylesheet">
	<link href="<?= base_url('assets/') ?>admin/css/icons.css" rel="stylesheet">
	<title>Dashtreme - Multipurpose Bootstrap5 Admin Template</title>
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
									<img src="<?= base_url('assets/') ?>images/resources/logo-1.png" width="150" alt="" />
									<h5 class="mb-5 mt-2 text-white">Admin Login</h5>
								</div>
								<hr>
								<div class="form-body">
									<form class="row g-3" action="<?php echo base_url('admin/AdminLogin/authentication'); ?>" method="post">
										<input type="hidden" name="<?= $this->security->get_csrf_token_name()?>" value="<?= $this->security->get_csrf_hash()?>">
										<div class="col-12">
											<label for="inputEmailAddress" class="form-label">Email Address</label>
											<input type="email" class="form-control" name="username" id="inputEmailAddress" placeholder="Email Address">
										</div>
										<div class="col-12">
											<label for="inputChoosePassword" class="form-label">Enter Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" value="" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
												<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
											</div>
										</div>
										<div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
										</div>
										<div class="col-12">
											<div class="d-grid">
												<button type="submit" class="btn btn-light"><i class="bx bxs-lock-open"></i>Sign in</button>
											</div>
										</div>
									</form>
									<hr>
									<div class="text-center">
										<p>Don't have an account yet? <a href="authentication-signup.html">Sign up here</a>
										</p>
									</div>
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

<!--plugins-->
<script src="<?= base_url('assets/') ?>admin/js/jquery.min.js"></script>
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
