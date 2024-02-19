<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Course</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Course Category</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="col">
	<div class="col-lg-12 d-flex flex-column">
		<div class="">
			<div style="float: right;">
				<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#createCourseCategoriModal">Tambah Kategori Kursus</button>
			</div>
			<!-- Modal -->
			<div class="modal fade js-create_course_category_modal" id="createCourseCategoriModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Kursus</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="<?= base_url('admin/course/category/save')?>" method="POST" class="js-form_course_category">
							<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
							<div class="modal-body">
								<label>Category Headline</label>
								<input type="text" name="course_category_headline" class="form-control" data-rule-required="true" data-msg="Judul Kategori Tidak Boleh Kosong">
								<small class="text-danger"><?= form_error('course_category_headline')?></small>
								<br>
								<label>Category Status</label>
								<select name="course_category_status" class="modal-select js-input-with-plugin" data-rule-required="true" data-msg="Status Kategori Tidak Boleh Kosong">
									<option value="" disabled selected>--Select Status--</option>
									<option value="<?= 1 ?>">Active</option>
									<option value="<?= 0 ?>">Inactive</option>
								</select>
								<small class="text-danger js_input-error-placement"><?= form_error('course_category_status')?></small>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary js-form_action_btn">Save</button>
							</div>
						</form>
					</div>
				</div>
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
						<th>Judul Kategori Kursus</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php $no = 1; foreach($dataCourseCategories as $dataCourseCategory) {?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $dataCourseCategory->course_category_headline?></td>
							<td><?= $dataCourseCategory->course_category_status == TRUE ? "Active" : "inactive" ?></td>
							<td>
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCourseCategoriModal" data-id="<?= $dataCourseCategory->id ?>">
									<i class="fadeIn animated bx bx-message-square-edit"></i>
								</button>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>

				<!-- Modal -->
				<div class="modal fade js-edit_course_category_modal" id="editCourseCategoriModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
					 data-url="<?= base_url('admin/adminAjax/showAdminCourseCategoryDetail');?>">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Edit Article Category</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<form action="<?= base_url('admin/course/category/update')?>" method="POST" class="js-form_course_category">
								<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
								<input type="hidden" name="course_category_id" value="" class="form-control">
								<div class="modal-body">
									<label>Category Headline</label>
									<input type="text" name="course_category_headline" class="form-control" data-rule-required="true" data-msg="Judul Kategori Tidak Boleh Kosong">
									<small class="text-danger"><?= form_error('course_category_headline')?></small>
									<br>
									<label>Category Status</label>
									<select name="course_category_status" class="modal-select js-input-with-plugin" id="select-edit" data-rule-required="true" data-msg="Status Kategori Tidak Boleh Kosong">
										<option value="" disabled selected>--Select Status--</option>
										<option value="<?= 1 ?>">Active</option>
										<option value="<?= 0 ?>">Inactive</option>
									</select>
									<small class="text-danger js_input-error-placement"><?= form_error('course_category_status')?></small>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary js-form_action_btn">Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
