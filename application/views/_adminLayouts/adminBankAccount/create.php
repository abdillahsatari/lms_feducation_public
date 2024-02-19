<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Rekening</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Tambah Rekning</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="card border-top border-0 border-4 border-white">
	<form role="form" action="<?= base_url('admin/bankAccount/save')?>" method="POST">
		<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
		<div class="card-body">
			<div class="border p-4 rounded">
				<div class="card-title d-flex align-items-center">
					<div><i class="bx bx-message-square-error me-1 font-22 text-white"></i>
					</div>
					<h5 class="mb-0 text-white">Informasi Rekening</h5>
				</div>
				<hr/>
				<div class="row mb-3">
					<label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama Pemilik Rekning</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="nama_pemilik_account" value="<?= set_value('nama_pemilik_account')?>" id="inputEnterYourName">
						<small><?= form_error('nama_pemilik_account')?></small>
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nama Bank</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="nama_bank" value="<?= set_value('nama_bank')?>" id="inputPhoneNo2">
						<small><?= form_error('nama_bank')?></small>
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Nomor Rekening</label>
					<div class="col-sm-9">
						<input type="number" class="form-control" name="nomor_rekening" value="<?= set_value('nomor_rekening')?>" id="inputEmailAddress2">
						<small><?= form_error('nomor_rekening')?></small>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-3 col-form-label">Status</label>
					<div class="col-sm-9">
						<select name="status_is_active" class="single-select">
							<option value="" disabled selected>--Select Status--</option>
							<option value="<?= 1 ?>">Active</option>
							<option value="<?= 0 ?>">inactive</option>
						</select>
						<small><?= form_error('status_is_active')?></small>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 col-form-label"></label>
					<div class="col-sm-9">
						<a href="<?= base_url("admin/bankAccount") ?>" class="btn btn-light btn-sm">Cancel</a>
						<button type="submit" class="btn btn-primary btn-sm">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
