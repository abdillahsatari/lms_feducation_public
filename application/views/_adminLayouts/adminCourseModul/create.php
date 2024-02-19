<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Courses</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Course</li>
				<li class="breadcrumb-item active" aria-current="page">Tambah Modul</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="card">
	<div class="form-body mt-4">
		<form role="form" method="POST"
			  class="js-form_admin-course-modul"
			  action="<?= base_url('admin/course/modul/save') ?>">
			<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
            <input type="hidden" name="feducation_course_id" value="<?= $activeCourseId ?>">
			<div class="card-body p-4">
				<h5 class="card-title">Form Tambah Modul</h5>
				<hr/>
				<br>
				<div class="row">
					<div class="col-lg-8">
						<div class="border border-3 p-4 rounded">
							<div class="mb-3">
								<label for="course_modul_headline" class="form-label">Judul Modul</label>
								<input type="text" class="form-control" name="course_modul_headline" id="course_headline" value="<?= set_value('course_modul_headline')?>" data-rule-required="true" data-msg="Judul Modul Tidak Boleh Kosong">
								<small><?= form_error('course_modul_headline')?></small>
							</div>
							<div class="mb-3">
								<label for="course_modul_description" class="form-label">Deskripsi Modul</label>
								<textarea class="form-control" name="course_modul_description" id="tinyMceTextArea" rows="3"><?= set_value('course_modul_description')?></textarea>
								<small><?= form_error('course_modul_description')?></small>
							</div>
							<div class="mb-3">
                                <label for="course_modul_video_url" class="form-label">Video Pembelajaran</label>
                                <div class="input-group ">
                                    <span class="input-group-text" id="basic-addon2">Video url</span>
                                    <input type="text" name="course_modul_video_url" class="js-input-group form-control" placeholder="Total Durasi Kursus" aria-describedby="basic-addon2" data-rule-required="true" data-msg="Url Video Pembelajaran Tidak Boleh Kosong"> 
                                </div>
                                <small class="text-danger js_input-error-placement"><?= form_error('course_modul_video_url')?></small>
							</div>
                            <div class="col-12">
                                    <label for="course_modul_presentation" class="form-label">Slide Prsesentasi</label>
                                    <input type="file" class="form-control js-document_upload" accept=".pdf, .ppt, .pptx" data-url-upload="<?= base_url('admin/AdminAjax/postCourseModulPresentation');?>">
									<input type="hidden" name="course_modul_presentation" id="course_modul_presentation" class="js-input-file-id">
                                    <small class="text-warning">*Max File size 20 MB!</small>
                                    <small class="text-danger"><?= form_error('course_modul_presentation')?></small>
                                    <hr/>
                                </div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="border border-3 p-4 rounded">
							<div class="row g-3">
								<div class="col-12">
									<label for="course_modul_thumbnail" class="form-label">Thumbnail Modul</label>
									<img src="https://via.placeholder.com/300x150.png?text=Preview" alt="feducaition Course Modul Thumbnail"
									class="image-preview" style="width: 100%; height:auto; object-fit: contain;">
									<br>
									<small class="text-warning">*Recommended size 300x150 px!</small>
									<small class="text-danger"><?= form_error('course_modul_thumbnail')?></small>
									<hr/>
									<input type="file" class="form-control js-image_upload" accept=".png, .jpg, .jpeg" data-url-upload="<?= base_url('admin/AdminAjax/postCourseModulThumbnail');?>">
									<input type="hidden" name="course_modul_thumbnail" id="course_modul_thumbnail" class="js-input-file-id">
								</div>
								<div class="col-12">
                                    <div class="mb-1">
                                        <label for="course_modul_duration" class="form-label">Durasi Pembelajaran (Menit)</label>
                                        <div class="input-group ">
                                            <input type="number" name="course_modul_duration" class="js-input-group form-control" placeholder="Total Durasi Kursus" aria-describedby="basic-addon2" data-rule-required="true" data-msg="Durasi Pembelajaran Tidak Boleh Kosong"> 
                                            <span class="input-group-text" id="basic-addon2">Menit</span>
                                        </div>
                                        <small class="text-danger js_input-error-placement"><?= form_error('course_modul_duration')?></small>
                                    </div>
								</div>
                                <div class="col-12">
									<label for="course_modul_status" class="mb-1">Status Modul</label>
									<select name="course_modul_status" class="single-select js-input-with-plugin form-control" id="course-modul-status" data-rule-required="true" data-msg="Status Kursus Tidak Boleh Kosong">
										<option value="" disabled selected>-- Pilih Status Kursus --</option>
										<option value="1">Aktif</option>
										<option value="0">Archieved</option>
									</select>
									<small class="js_input-error-placement"><?= form_error('course_modul_status')?></small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<a href="<?= base_url("admin/course/").$activeCourseId."/moduls"?>" type="button" class="btn btn-light">Cancel</a>
				<button type="button" class="btn btn-success js-form_action_btn">Submit</button>
			</div>
		</form>
	</div>
</div>

