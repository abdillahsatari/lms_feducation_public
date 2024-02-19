<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Intern</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Public Relation</li>
				<li class="breadcrumb-item active" aria-current="page">List Intern</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="col">
	<div class="col-lg-12 d-flex flex-column">
		<div class="">
			<div style="float: right;">
				<a href="<?= base_url('admin/pr/intern/create')?>" type="button" class="btn btn-dark">Add Intern</a>
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
						<th>Nama</th>
						<th>Email</th>
						<th>No. Hp</th>
						<th>Instansi</th>
						<th>Periode Intern</th>
						<th>SPV</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php $no = 1; foreach($dataIntern as $intern) {?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $intern->intern_name ?></td>
							<td><?= $intern->intern_email ?></td>
							<td><?= $intern->intern_phone ?></td>
							<td><?= $intern->intern_institution ?></td>
							<td><?php
								if (date('M', strtotime($intern->program_start_date)) != date('M', strtotime($intern->program_end_date))){
									echo date('M', strtotime($intern->program_start_date))." - ".date('M', strtotime($intern->program_end_date));
								} else {
									echo date('M', strtotime($intern->program_start_date));
								}
								?>
							</td>
							<td><?= $intern->intern_tutor ?></td>
							<td>
								<div class="d-flex order-actions">
									<a href="<?= base_url("admin/pr/intern/edit/".$intern->id) ?>" class=""><i class="bx bxs-edit"></i></a>
									<a href="<?= base_url("admin/pr/intern/delete/".$intern->id) ?>" class="ms-3"><i class="bx bxs-trash"></i></a>
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

