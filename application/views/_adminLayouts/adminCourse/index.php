<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Courses</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">List</li>
				<li class="breadcrumb-item active" aria-current="page"><?= $dataCourseActiveType->course_type_headline ?></li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->

<div class="row">
	<div class="col-12">
	<div class="d-flex flex-column mb-3">
		<div class="row row-cols-auto g-3 mt-2" style="justify-content: end;">
			<div class="col">
				<a href="<?= base_url('admin/course/create')?>" class="btn btn-outline-warning">Tambah Kursus</a>
			</div>
			<div class="col">
				<!-- <a href="<?= base_url('admin/course/create')?>" class="btn btn-outline-info">Tambah Modul Kursus</a> -->
				<button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#createCourseModulModal">Tambah Modul Kelas</button>
			</div>
			<!-- Add Course Modul Modal  -->
			<div class="modal fade js-create_course_category_modal" id="createCourseModulModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Tambah Modul Kelas</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body js-create-course-modul">
							<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
							<label>Kategori Kelas</label>
							<select name="course_category_id" id="selectCourseCategories" class="modal-select js-input-with-plugin" data-url="<?= base_url('admin/adminAjax/createCourseModulFilter');?>">
								<option value="" disabled selected>--Pilih Kategori Kelas--</option>
								<?php foreach($dataCourseCategories as $courseCategory):?>
									<option value="<?= $courseCategory->id?>"><?= $courseCategory->course_category_headline?></option>
								<?php endforeach?>
							</select>
							<small class="text-danger js_input-error-placement"><?= form_error('course_category_id')?></small>
							<br>
							<label>Pilih Kelas</label>
							<select name="feducation_course_id" id="selectTargetedCourse" class="modal-select js-input-with-plugin js-dynamicCoursesList">
								<option value="" disabled selected>--Pilih Kelas--</option>
							</select>
							<small class="text-danger js_input-error-placement"><?= form_error('feducation_course_id')?></small>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
							<a href="#" id="js-proceed-btn" type="button" class="btn btn-primary isDisabled" data-url="<?= base_url("admin/course/")?>">Proceed</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
<hr />
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="d-flex flex-column">
				<h6 class="mb-0 text-uppercase">Program Kursus</h6>
					<div class="row row-cols-auto g-3 js-course_type_content mt-2" data-type-id="<?= $dataActiveTypeId?>">
						<?php foreach($dataTypeContent as $typeContent):?>
							<div class="col">
								<a type="button" href="<?= base_url('admin/courses?type=').$typeContent->id?>" 
									class="btn btn-light px-5 js-course-type-content-child" data-child-id="<?= $typeContent->id?>">	
									<?= $typeContent->course_type_headline?>
								</a>
							</div>
						<?php endforeach?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr/>
<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table id="example2" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>No.</th>
					<th>Judul Kursus</th>
					<th>Harga</th>
					<th>Kategory Kursus</th>
					<?php if($dataCourseActiveType->course_type_has_schedule):?>
						<th>Jadwal Kursus</th>
						<th>Pelaksanaan</th>
					<?php endif; ?>
					<th>Status Kursus</th>
					<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php
				 $no = 1;
				 foreach($dataCourse as $course) {?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $course->course_headline ?></td>
						<td class="js-currencyFormatter" data-price="<?= $course->course_price?>"></td>
						<td class="mb-0"><?= $course->fcc_headline ?></td>
						<?php if($dataCourseActiveType->course_type_has_schedule):?>
							<td>
								<?php
									if (date('d', strtotime($course->course_start_date)) != date('d', strtotime($course->course_end_date))){
										echo date('d M', strtotime($course->course_start_date))." - ".date('d M', strtotime($course->course_end_date))." ".date('Y', strtotime($course->course_start_date));
									} else {
										echo date('d M', strtotime($course->course_start_date))." ".date('H:s a', strtotime($course->course_start_date))." - ".date('H:s a', strtotime($course->course_end_date)) ;
									}
								?>
							</td>
							<td><?= $course->is_online_course ? "Online" : "Offline"; ?></td>
						<?php endif; ?>
						<td><?= $course->course_status ? "Active" : "Archieved"; ?></td>
						<td>
							<a href="<?= base_url("admin/course/edit/".$course->id) ?>" class="btn btn-primary btn-sm"><i class="fadeIn animated bx bx-message-square-edit"></i></a>
							<a href="<?= base_url("admin/course/delete/".$course->id) ?>" class="btn btn-danger btn-sm"><i class="fadeIn animated bx bx-trash-alt"></i></a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
