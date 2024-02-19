<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Fast Respond</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Public Relation</li>
				<li class="breadcrumb-item active" aria-current="page">Fast Respond</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table id="example2" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Status</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php $no = 1; foreach($dataFeedbacks as $feedback) {?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $feedback->visitors_name ?></td>
						<td><?= $feedback->visitors_email ?></td>
						<td><?= $feedback->visitors_phone ?></td>
						<td><?= $feedback->status ?></td>
						<td><?= date('d M Y ', strtotime($feedback->created_at)) ?></td>
						<td>
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $feedback->id ?>">
								<i class="fadeIn animated bx bx-message-square-edit"></i>
							</button>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>

			<!-- Modal -->
			<div class="modal fade js_fast_response_modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Update Fast Response Status</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="<?= base_url('admin/operasional/AdminFeedbacks/update')?>" method="POST" class="js-form_fast_response_update">
							<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
							<input type="hidden" name="feedback_id" value="" class="form-control">
							<div class="modal-body">
								<label>Ubah status</label>
								<select name="fast_response_status" class="modal-select">
									<option value="" disabled selected>--Select Status--</option>
									<option value="<?= FastResponseStatus::INCOMING ?>">New</option>
									<option value="<?= FastResponseStatus::PROCESSED ?>">Processed</option>
								</select>
								<small class="text-danger"><?= form_error('fast_response_status')?></small>
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


