<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Benefits</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Add Benefits</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="card border-top border-0 border-4 border-white">
	<form role="form" action="<?= base_url('admin/benefits/save')?>" method="POST" class="js_admin-benefits"
			data-url="<?= base_url('admin/adminAjax/adminBenefitsValidate');?>">
		<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
		<div class="card-body">
			<div class="border p-4 rounded">
				<div class="card-title d-flex align-items-center">
					<div><i class="bx bx-message-square-error me-1 font-22 text-white"></i>
					</div>
					<h5 class="mb-0 text-white">Benefits Information</h5>
				</div>
				<hr/>
				<div class="row mb-3">
					<label for="inputPhoneNo2" class="col-sm-3 col-form-label">Commission Percentage</label>
					<div class="col-sm-9">
						<input type="number" class="form-control" name="commission_percentage" value="<?= set_value('commission_percentage')?>" id="inputPhoneNo2">
						<small><?= form_error('commission_percentage')?></small>
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Royalty Percentage</label>
					<div class="col-sm-9">
						<input type="number" class="form-control js_royalty" name="royalty_percentage" value="<?= set_value('royalty_percentage')?>" id="inputEmailAddress2">
						<small><?= form_error('royalty_percentage')?></small>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-3 col-form-label">Status</label>
					<div class="col-sm-9">
						<select name="status_is_active" id="status_is_active" class="single-select js-input-with-plugin js_status">
							<option value="" disabled selected>--Select Status--</option>
							<option value="<?= 1 ?>">Active</option>
							<option value="<?= 0 ?>">inactive</option>
						</select>
						<small class="js_input-error-placement"><?= form_error('status_is_active')?></small>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3 col-form-label"></label>
					<div class="col-sm-9">
						<a href="<?= base_url("admin/benefits") ?>" class="btn btn-light btn-sm">Cancel</a>
						<button type="button" class="btn btn-primary btn-sm js-form_action_btn">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
