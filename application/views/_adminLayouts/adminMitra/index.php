<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Mitra</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Public Relation</li>
				<li class="breadcrumb-item active" aria-current="page">Mitra Feducation</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="col">
	<div class="col-lg-12 d-flex flex-column">
		<div class="">
			<div style="float: right;">
				<a href="<?= base_url('admin/pr/mitra/bisnis/create')?>" type="button" class="btn btn-dark">Add Mitra</a>
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
						<th>Logo</th>
						<th>Nama Perusahaan</th>
						<th>Link</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody class="justify-content-center">
					<?php $no = 1; foreach($dataMitra as $mitra) {?>
						<tr>
							<td><?= $no++ ?></td>
							<td><img src="<?= $mitra->mitra_logo ? base_url('assets/resources/images/mitras/').$mitra->mitra_logo : "https://via.placeholder.com/370x282.png?text=Preview"; ?>" alt="Feducation Mitra Thumbnail"
									 class="image-preview" width="150" height="50">
							</td>
							<td><?= $mitra->mitra_name ?></td>
							<td><?= $mitra->mitra_link ?></td>
							<td><?= $mitra->mitra_status == TRUE ? "active" : "disabled" ?></td>
							<td>
								<div class="d-flex order-actions">
									<a href="<?= base_url("admin/pr/mitra/bisnis/edit/".$mitra->id) ?>" class=""><i class="bx bxs-edit"></i></a>
								</div>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

