<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Courses</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Course</li>
				<li class="breadcrumb-item active" aria-current="page">Modul Kursus</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body" style="padding: 35px;">
				<div class="d-flex flex-column">
					<div class="row row-cols-auto g-3" style="justify-content: center;">
						<div class="col">
							<a type="button" href="<?= base_url("admin/course/edit/").$activeCourseId?>" 
								class="btn btn-light px-5">	
								Kelas
							</a>
						</div>
						<div class="col">
							<a type="button" href="<?= base_url("admin/course/").$activeCourseId."/moduls"?>" 
								class="btn btn-light px-5 active">	
								Modul
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
	<div class="d-flex flex-column mb-3">
		<div class="row row-cols-auto g-3" style="justify-content: end;">
			<div class="col">
				<a href="<?= base_url("admin/course/").$activeCourseId."/modul/add"?>" class="btn btn-outline-light">Tambah Modul</a>
			</div>
		</div>
	</div>
	</div>
</div>
<hr />
<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table id="example2" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>No.</th>
					<th>Judul Materi</th>
					<th>Judul Kurus</th>
					<th>Durasi Materi</th>
					<th>Tutor</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php
				 $no = 1;
				 foreach($dataCourseModuls as $courseModul) {?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $courseModul->course_modul_headline?></td>
						<td><?= $courseModul->fc_headline?></td>
						<td><?= $courseModul->course_modul_duration?> Menit</td>
						<td><?= $courseModul->ft_name?></td>
						<td><?= $courseModul->course_modul_status ? "Active" : "Archieved"; ?></td>
						<td>
							<a href="<?= base_url("admin/course/").$activeCourseId."/modul"."/".$courseModul->id."/edit"; ?>" class="btn btn-primary btn-sm"><i class="fadeIn animated bx bx-message-square-edit"></i></a>
							<a href="<?= base_url("admin/course/").$activeCourseId."/modul"."/".$courseModul->id."/delete"; ?>" class="btn btn-danger btn-sm"><i class="fadeIn animated bx bx-trash-alt"></i></a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

