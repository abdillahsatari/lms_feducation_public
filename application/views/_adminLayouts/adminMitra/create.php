<div class="page-content">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Mitra</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Tambah Mitra</li>
				</ol>
			</nav>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="container">
		<div class="main-body">
			<div class="card">
				<form role="form" action="<?= base_url('admin/pr/mitra/bisnis/save')?>" method="POST" class="js-form_add_mitra">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-4 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-body">
										<h4>Logo</h4>
										<hr>
										<div class="d-flex flex-column align-items-center text-center">
											<img src="https://via.placeholder.com/370x282.png?text=Preview" alt="Feducation Mitra Thumbnail"
												 class="image-preview" width="258" height="108">
											<div class="mt-3">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-8 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-body">
										<h4>Info Mitra</h4>
										<hr>
										<div class="row">
											<div class="col-6">
												<div class="mb-3">
													<label>Nama Perusahaan</label>
													<input type="text" name="mitra_name" value="<?=set_value('mitra_name')?>" placeholder="Nama Perusahaan" class="form-control" data-rule-required="true" data-msg="Kolom Nama PerusahaanTidak Boleh Kosong">
													<small class="text-danger"><?= form_error('mitra_name')?></small>
												</div>
												<div class="mb-3">
													<label>Alamat</label>
													<textarea type="text" name="mitra_address" placeholder="Alamat Perusahaan" class="form-control" style="height: 112px;" data-rule-required="true" data-msg="Kolom Alamat Tidak Boleh Kosong"><?=set_value('mitra_address')?>
													</textarea>
													<small class="text-danger"><?= form_error('mitra_address')?></small>
												</div>
											</div>
											<div class="col-6">
												<div class="mb-3">
													<label>Link</label>
													<input type="text" name="mitra_link" value="<?=set_value('mitra_link')?>" placeholder="Link Perusahaan" class="form-control" data-rule-required="true" data-msg="Kolom Link Perusahaan Tidak Boleh Kosong">
													<small class="text-danger"><?= form_error('mitra_link')?></small>
												</div>
												<div class="mb-3">
													<label>status</label>
													<select name="mitra_status" class="single-select">
														<option value="" disabled selected>--Select Status--</option>
														<option value="<?= 1 ?>">Active</option>
														<option value="<?= 0 ?>">Disabled</option>
													</select>
													<small class="text-danger"><?= form_error('mitra_status')?></small>
												</div>
												<div class="mb-3">
													<label>Gambar Logo</label>
													<input type="file" class="form-control js-image_upload" id="mitra_logo" accept=".png, .jpg, .jpeg" data-url-upload="<?= base_url('admin/AdminAjax/postMitraLogo');?>">
													<small class="text-warning js_input-error-placement">*Recommended size for mitra logo is 258x108 px!</small>
													<input type="hidden" name="mitra_logo" id="mitra_logo" data-rule-required="true" data-msg="Logo Perusahaan Tidak Boleh Kosong">
													<small class="text-danger"><?= form_error('mitra_logo')?></small>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<a href="<?= base_url('admin/pr/mitra/bisnis')?>" type="button" class="btn btn-light">Kembali</a>
						<button type="button" class="btn btn-primary js-form_action_btn">Submit</button>
					</div>
					<form>
			</div>
		</div>
	</div>
</div>
