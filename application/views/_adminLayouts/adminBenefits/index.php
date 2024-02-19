<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Settings</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">List Benefits</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="col">
	<div class="col-lg-12 d-flex flex-column">
		<div class="">
			<div style="float: right;">
				<a href="<?= base_url('admin/benefits/create')?>" type="button" class="btn btn-dark">Add Setting Benefits</a>
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
						<th>Commission Percentage</th>
						<th>Royalty Percentage</th>
						<th>Status</th>
						<th>Cretaed By</th>
						<th>Cretaed At</th>
						<th>Last Updated By</th>
						<th>Last Updated At</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php $no = 1; foreach($dataBenefits as $data) {?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $data->commission_percentage?></td>
							<td><?= $data->royalty_percentage?></td>
							<td><?= $data->status_is_active == TRUE ? "active" : "inactive" ?></td>
							<td><?= $data->created_by?></td>
							<td><?= date('d M Y', strtotime($data->created_at))?></td>
							<td><?= $data->updated_by ?: "-" ?></td>
							<td><?= $data->updated_at ? date('d M Y', strtotime($data->updated_at)) : "-" ?></td>
							<td>
								<a href="<?= base_url("admin/benefits/edit/".$data->id) ?>" class="btn btn-primary btn-sm"><i class="fadeIn animated bx bx-message-square-edit"></i></a>
								<a href="<?= base_url("admin/benefits/delete/".$data->id) ?>" class="btn btn-danger btn-sm"><i class="fadeIn animated bx bx-trash-alt"></i></a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
