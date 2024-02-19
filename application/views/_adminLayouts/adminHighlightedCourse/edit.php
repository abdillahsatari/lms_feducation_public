<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Courses</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Edit Highlighed Course</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="card border-top border-0 border-4 border-white">
	<form role="form" action="<?= base_url('admin/course/highlight/update')?>" method="POST" class="js_admin-featured-article"
		  data-url="<?= base_url('admin/adminAjax/adminHighlightedcourseValidation');?>">
		<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
		<input type="hidden" name="course_id" value="<?= $courseList->id ?>">
		<div class="card-body">
			<div class="border p-4 rounded">
				<div class="card-title d-flex align-items-center">
					<div><i class="bx bx-message-square-error me-1 font-22 text-white"></i>
					</div>
					<h5 class="mb-0 text-white">Edit Highlighted Course</h5>
				</div>
				<hr/>
				<div class="row mb-3">
					<label class="col-sm-3 col-form-label">Selected Course</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="course_headline" value="<?= set_value('course_headline') ?: $courseList->course_headline ?>" readonly>
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputPhoneNo2" class="col-sm-3 col-form-label">Course Order Number</label>
					<div class="col-sm-9">
						<input type="number" class="form-control" name="course_order_number" value="<?= set_value('course_order_number') ?: $courseList->course_order_number ?>" id="js_course-order-number">
						<small><?= form_error('course_order_number')?></small>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 col-form-label"></label>
					<div class="col-sm-9">
						<a href="javascript:window.history.go(-1);" class="btn btn-light btn-sm">Cancel</a>
						<button type="button" class="btn btn-primary btn-sm js-form_action_btn">Update</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
