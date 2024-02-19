<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Courses</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Course</li>
				<li class="breadcrumb-item active" aria-current="page">Buat Kursus</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="card">
	<div class="form-body mt-4">
		<form role="form" method="POST"
			  class="js-form_admin-course"
			  action="<?= base_url('admin/course/save') ?>">
			<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
			<div class="card-body p-4">
				<h5 class="card-title">Form Buat Kursus</h5>
				<hr/>
				<div class="row">
					<div class="col-12">
						<div class="border border-3 p-4 rounded">
							<div class="row g-3">
								<div class="col-12">
									<label for="course_banner" class="form-label">Banner Kursus</label>
									<img src="https://via.placeholder.com/1546x423.png?text=Preview" alt="feducaition Course Banner"
									class="image-preview" style="width: 100%; height:auto; object-fit: contain;" 
									data-options='{"width":"1546", "height":"423"}'>
									<br>
									<small class="text-warning">*Recommended size 1546x423 px!</small>
									<small class="text-danger"><?= form_error('course_banner')?></small>
									<hr/>
									<input type="file" class="form-control js-image_upload" accept=".png, .jpg, .jpeg" data-url-upload="<?= base_url('admin/AdminAjax/postCourseBanner');?>">
									<input type="hidden" name="course_banner" id="course_thumbnail" class="js-input-file-id">
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-8">
						<div class="border border-3 p-4 rounded">
							<div class="mb-3">
								<label for="course_headline" class="form-label">Judul Kursus</label>
								<input type="text" class="form-control js-course-create-headline" name="course_headline" id="course_headline" value="<?= set_value('course_headline')?>" data-rule-required="true" data-msg="Judul Kursus Tidak Boleh Kosong">
								<small><?= form_error('course_headline')?></small>
							</div>
							<div class="mb-3">
								<label for="courseSlug">Slug</label>
								<input name="course_slug" id="courseSlug" type="text" class="form-control js-course-create-slug" placeholder="Slug"
										data-url="<?= base_url('admin/adminAjax/adminCourseSlugValidate')?>"
										data-rule-required="true" data-msg="Kolom Slug Tidak Boleh Kosong">
								<small class="text-danger"><?= form_error('course_slug')?></small>
							</div>
							<div class="mb-3">
								<label for="course_description" class="form-label">Deskripsi Kursus</label>
								<textarea class="form-control" name="course_description" id="tinyMceTextArea" rows="3"><?= set_value('course_description')?></textarea>
								<small><?= form_error('course_description')?></small>
							</div>
							<div class="mb-3">
								<label for="course_channel" class="form-label">Telegram Channel</label>
								<input type="text" name="course_channel" class="form-control" id="course_channel" value="<?= set_value('course_channel')?>" data-rule-required="true" data-msg="Telegram Channel Tidak Boleh Kosong">
								<small><?= form_error('course_channel')?></small>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="course_price" class="form-label">Harga Kursus</label>
										<div class="input-group"><span class="input-group-text">Rp.</span>
											<input type="number" name="course_price" class="form-control js-input-group" placeholder="0" data-rule-required="true" data-msg="Harga Kursus Tidak Boleh Kosong">
										</div>
										<small class="text-danger js_input-error-placement"><?= form_error('course_price')?></small>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="course_total_duration" class="form-label">Total Durasi Pembelajaran (Menit)</label>
										<div class="input-group ">
											<input type="number" name="course_total_duration" class="js-input-group form-control" placeholder="Total Durasi Kursus" aria-describedby="basic-addon2" data-rule-required="true" data-msg="Total Durasi Pembelajaran Tidak Boleh Kosong"> 
											<span class="input-group-text" id="basic-addon2">Menit</span>
										</div>
										<small class="text-danger js_input-error-placement"><?= form_error('course_total_duration')?></small>
									</div>
								</div>
							</div>
							<div class="row js-course-date">
								<!-- rendered course schedule will be place here  -->
							</div>
							<div class="row js-course-held">
								<!-- rendered course held will be place here  -->
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="border border-3 p-4 rounded">
							<div class="row g-3">
								<div class="col-12">
									<label for="course_thumbnail" class="form-label">Thumbnail Kursus</label>
									<img src="https://via.placeholder.com/300x150.png?text=Preview" alt="feducaition Course Thumbnail"
									class="image-preview" style="width: 100%; height:auto; object-fit: contain;">
									<br>
									<small class="text-warning">*Recommended size 300x150 px!</small>
									<small class="text-danger"><?= form_error('course_thumbnail')?></small>
									<hr/>
									<input type="file" class="form-control js-image_upload" accept=".png, .jpg, .jpeg" data-url-upload="<?= base_url('admin/AdminAjax/postCourseThumbnail');?>">
									<input type="hidden" name="course_thumbnail" id="course_thumbnail" class="js-input-file-id">
								</div>
								<div class="col-12">
									<label class="mb-1">Program Kursus</label>
									<select name="course_type_id" class="single-select js-input-with-plugin form-control" id="course-type" data-rule-required="true" data-msg="Kategori Kursus Tidak Boleh Kosong">
										<option value="" disabled selected>--Pilih Program Kursus--</option>
										<?php foreach ($dataCourseTypes as $courseType){?>
										<option value="<?= $courseType->id ?>"><?= $courseType->course_type_headline ?></option>
										<?php } ?>
									</select>
									<small class="js_input-error-placement"><?= form_error('course_type_id')?></small>
								</div>
								<div class="col-12">
									<label class="mb-1">Kategori Kursus</label>
									<select name="course_category_id" class="single-select js-input-with-plugin form-control" id="course-category" data-rule-required="true" data-msg="Kategori Kursus Tidak Boleh Kosong">
										<option value="" disabled selected>--Pilih Kategori Kursus--</option>
										<?php foreach ($dataCourseCategories as $courseCategory){?>
										<option value="<?= $courseCategory->id ?>"><?= $courseCategory->course_category_headline ?></option>
										<?php } ?>
									</select>
									<small class="js_input-error-placement"><?= form_error('course_category_id')?></small>
								</div>
								<div class="col-12">
									<label class="mb-1">Tutor</label>
									<select name="course_tutor_id" class="single-select js-input-with-plugin form-control" id="course-tutor" data-rule-required="true" data-msg="Kategori Kursus Tidak Boleh Kosong">
										<option value="" disabled selected>--Pilih Tutor--</option>
										<?php foreach ($dataCourseTutor as $courseTutor){?>
										<option value="<?= $courseTutor->id ?>"><?= $courseTutor->tutor_name ?></option>
										<?php } ?>
									</select>
									<small class="js_input-error-placement"><?= form_error('course_tutor_id')?></small>
								</div>
								<div class="col-12">
									<label class="mb-1">Status Kursus</label>
									<select name="course_status" class="single-select js-input-with-plugin form-control" id="course-status" data-rule-required="true" data-msg="Status Kursus Tidak Boleh Kosong">
										<option value="" disabled selected>-- Pilih Status Kursus --</option>
										<option value="1">Aktif</option>
										<option value="0">Archieved</option>
									</select>
									<small class="js_input-error-placement"><?= form_error('course_status')?></small>
								</div>
								<div class="col-12">
									<div class="form-check form-switch" style="font-size: larger;">
										<label class="form-check-label" for="flexSwitchCheckDefault">On Schedule</label>
										<input class="form-check-input form-control js-course-schedule-switch" type="checkbox">
										<input type="hidden" name="is_on_schedule" value="0">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<a href="<?=base_url("admin/courses")?>" type="button" class="btn btn-light">Cancel</a>
				<button type="button" class="btn btn-success js-form_action_btn">Submit</button>
			</div>
		</form>
	</div>
</div>

