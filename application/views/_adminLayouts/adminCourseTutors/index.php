<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Course Tutors</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Courses</li>
				<li class="breadcrumb-item active" aria-current="page">Course Tutor</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="col">
	<div class="col-lg-12 d-flex flex-column">
		<div class="">
			<div style="float: right;">
				<a href="<?= base_url('admin/course/tutor/create')?>" type="button" class="btn btn-dark">Tambah Tutor</a>
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
						<th>Kategori Kelas</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php $no = 1; foreach($dataTutors as $tutor) {?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $tutor->tutor_name ?></td>
							<td><?= $tutor->tutor_email ?></td>
							<td><?= $tutor->tutor_phone_number ?></td>
							<td><?= $tutor->course_category_headline ?></td>
							<td>
								<div class="d-flex order-actions">
									<a href="<?= base_url("admin/course/tutor/edit/".$tutor->id) ?>" class=""><i class="bx bxs-edit"></i></a>
									<a href="<?= base_url("admin/course/tutor/delete/".$tutor->id) ?>" class="ms-3"><i class="bx bxs-trash"></i></a>
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

