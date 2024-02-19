<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">My Accounts</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Bank Account</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="col">
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleDarkModal">Tambah Rekening Bank</button>
	<!-- Modal -->
	<hr/>
	<div class="modal fade" id="exampleDarkModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content bg-dark">
				<div class="modal-header">
					<h5 class="modal-title text-white">Bank Account Registration</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body text-white">
					<div class="card border-top border-0 border-4 border-white">
						<div class="card-body p-5">
							<form role="form" class="row g-3"
								  method="post"
								  action="<?=base_url('member/bank/account/save')?>">
								<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">Nama Bank</label>
									<input class="form-control" id="inputLastName" name="nama_bank" value="<?= set_value('nama_bank')?>">
									<small><?= form_error('nama_bank')?></small>
								</div>
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">Nama Pemilik Rekening</label>
									<input class="form-control" id="inputLastName" name="pemilik_rekening" value="<?= set_value('pemilik_rekening') ?: $this->session->userdata("member_full_name")?>">
									<small><?= form_error('pemilik_rekening')?></small>
								</div>

								<div class="col-12">
									<label for="inputAddress" class="form-label">Nomor Rekening</label>
									<input type="number" class="form-control" id="inputNumber" value="<?= set_value('nomor_rekening')?>" name="nomor_rekening">
									<small><?= form_error('nomor_rekening')?></small>
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-light px-5">Tambahkan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main-body">
	<div class="row">
		<?php foreach ($dataMemberAccount as $dataAccount){?>
		<div class="col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="row mb-3">
						<div class="col-sm-4">
							<h6 class="mb-0">Bank</h6>
						</div>
						<div class="col-sm-8">
							<input type="text" class="form-control" disabled value="<?= $dataAccount->nama_bank?>">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-4">
							<h6 class="mb-0">Nomor Rekening </h6>
						</div>
						<div class="col-sm-8">
							<input type="text" class="form-control" disabled value="<?= $dataAccount->nomor_rekening?>">
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-4">
							<h6 class="mb-0">Nama Pemilik Rekening </h6>
						</div>
						<div class="col-sm-8">
							<input type="text" class="form-control" disabled value="<?= $dataAccount->pemilik_rekening?>">
						</div>
					</div>
				</div>
				<div class="card-footer d-flex flex-coloumn" style="justify-content: end;">
					<div class="row row-cols-auto g-2">
						<div class="col">
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editMemberBankAccountModal" data-id="<?= $dataAccount->id ?>"><i class="bx bx bx-message-square-edit"></i></button>
						</div>
						<div class="col">
							<a href="<?= base_url("member/bank/account/delete/").$dataAccount->id ?>" type="button" class="btn btn-danger"><i class="bx bx-trash-alt"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="editMemberBankAccountModal" 
		tabindex="-1" aria-hidden="true" data-url="<?= base_url("member/memberAjax/getMemberBankAccountDetail") ?>">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content bg-dark">
				<div class="modal-header">
					<h5 class="modal-title text-white">Edit Bank Account Detail</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body text-white">
					<div class="card border-top border-0 border-4 border-white">
						<div class="card-body p-5">
							<form role="form" class="row g-3 js-form-edit-bank-info"
								  method="post"
								  action="<?=base_url('member/bank/account/update')?>">
								<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
								<input type="hidden" name="member_bank_account_id" value="" class="form-control">
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">Nama Bank</label>
									<input class="form-control" id="inputLastName" name="nama_bank" value="<?= set_value('nama_bank')?>">
									<small><?= form_error('nama_bank')?></small>
								</div>
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">Nama Pemilik Rekening</label>
									<input class="form-control" id="inputLastName" name="pemilik_rekening" value="<?= set_value('pemilik_rekening')?>">
									<small><?= form_error('pemilik_rekening')?></small>
								</div>

								<div class="col-12">
									<label for="inputAddress" class="form-label">Nomor Rekening</label>
									<input type="number" class="form-control" id="inputNumber" value="<?= set_value('nomor_rekening')?>" name="nomor_rekening">
									<small><?= form_error('nomor_rekening')?></small>
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-light px-5">Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
