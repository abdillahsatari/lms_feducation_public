<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Rekening</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">List Rekening</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="col">
	<div class="col-lg-12 d-flex flex-column">
		<div class="">
			<div style="float: right;">
				<a href="<?= base_url('admin/bankAccount/create')?>" type="button" class="btn btn-dark">ADD Bank Account</a>
			</div>
		</div>
	</div>
	<hr/>
</div>
<div class="main-body">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example2" class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>No.</th>
						<th>Nama pemilik Akun</th>
						<th>Gateway</th>
						<th>Nomor Rekening</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php $no = 1; foreach($dataBankAccount as $data) {?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $data->nama_pemilik_account?></td>
							<td><?= $data->nama_bank?></td>
							<td><?= $data->nomor_rekening?></td>
							<td><?= $data->status_is_active == TRUE ? "active" : "inactive" ?></td>
							<td>
								<a href="<?= base_url("admin/bankAccount/edit/".$data->id) ?>" class="btn btn-primary btn-sm"><i class="fadeIn animated bx bx-message-square-edit"></i></a>
								<a href="<?= base_url("admin/bankAccount/delete/".$data->id) ?>" class="btn btn-danger btn-sm"><i class="fadeIn animated bx bx-trash-alt"></i></a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
