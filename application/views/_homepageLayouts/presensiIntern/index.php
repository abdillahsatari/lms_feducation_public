<style rel="stylesheet">
	@media only screen and (max-width: 440px) {
		#btn-sent {
			margin: 2rem;
		}
		.mb-4{
			margin-bottom: 0rem !important;
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
					<li class="breadcrumb-item active">intern</li>
					<li class="breadcrumb-item active">presensi</li>
				</ol>
			</nav>

			<section style="background-repeat: no-repeat; background-size: cover; background-position: center center;">
				<div class="row no-gutters">
					<div class="col-12 col-sm-6 col-md-6 p-2 d-none d-sm-block">
						<h1 class="text-right"><strong class=" text-danger">Halo Sobat Intern</strong> <br> Feducation</h1>
					</div>
					<div class="col-12 col-sm-6 col-md-6 p-2 d-block d-sm-none">
						<h3 class="text-left"><strong class=" text-danger">Halo</strong> <br> Sobat Intern</h3>
					</div>
					<div class="col-12 col-md-6 p-2 d-none d-sm-block">
						<p class="text-left mb-3" data-wow-delay="0.3s">Sudah laporkan kehadiran mu belum ? kalau belum yuk lengkapi data di bawah biar tutor kamu tau kalau kamu sudah melakukan yang terbaik hari ini. tetap semangat dan terus lakukan yang terbaik di masa new normal ini yah.</p>
					</div>
					<div class="col-12 col-md-6 p-2 d-block d-sm-none">
						<p class="text-left mb-3" data-wow-delay="0.3s"><i class="fas fa-quote-left"></i> Sudah laporkan kehadiran mu belum ? kalau belum yuk lengkapi data di bawah biar tutor kamu tau kalau kamu sudah melakukan yang terbaik hari ini. tetap semangat dan terus lakukan yang terbaik di masa new normal ini yah.<i class="fas fa-quote-right"></i></p>
					</div>
				</div>
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="col-md-12 col-xs-12 mt-4" style=" min-height:250px;">
							<form method="POST"
								  action="<?= base_url('presensi/save'); ?>">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
								<div class="row">
									<div class="col-12 col-md-6 col-sm-6">
										<input type="text" id="name" name="intern_name" class="form-control mb-4" placeholder="Nama Lengkap"
											   pattern=".{3,}" required><br>
										<input type="email" id="email" name="intern_email" class="form-control mb-4" placeholder="E-Mail"
											   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br>
									</div>
									<div class="col-12 col-md-6 col-sm-6">
										<input type="text" id="name" name="intern_phone" class="form-control mb-4" placeholder="No. Hp"
											   pattern=".{3,}" required><br>
										<input type="text" id="name" name="intern_institution" class="form-control mb-4" placeholder="Institusi"
											   pattern=".{3,}" required><br>
									</div>
								</div>

								<select name="presensi_type" class="form-control mb-4" required>
									<option value="" disabled selected>--Select Presensi Type--</option>
									<option value="clock_in">Clock in</option>
									<option value="clock_out">Clock Out</option>
								</select>

								<!-- Desktop -->
								<div class="d-none d-sm-block">
									<button id="btn-sent" class="btn btn-danger btn-rounded mb-4">Kirim</button>
								</div>

								<!-- Mobile -->
								<div class="d-block d-sm-none">
									<button id="btn-sent" class="btn btn-danger btn-rounded mb-5">Kirim</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<hr class="thin m-4">
		</div>
	</div>
</div>
