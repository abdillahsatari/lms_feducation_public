<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Courses</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Highlighted Courses Lists</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="col">
	<div class="col-lg-12 d-flex flex-column">
		<div class="">
			<div style="float: right;">
				<a href="<?= base_url('admin/course/highlight/create')?>" type="button" class="btn btn-dark">Add Highlighted Courses</a>
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
						<th>Course Headline</th>
						<th>Tutor</th>
						<th>Order Number</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php $no = 1; foreach($dataCourse as $data) {?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $data->course_headline?></td>
							<td><?= $data->tutor_name?></td>
							<td><?= $data->course_order_number?></td>
							<td>
								<a href="<?= base_url("admin/course/highlight/edit/".$data->id) ?>" class="btn btn-primary btn-sm"><i class="fadeIn animated bx bx-message-square-edit"></i></a>
								<a href="<?= base_url("admin/course/highlight/delete/".$data->id) ?>" class="btn btn-danger btn-sm"><i class="fadeIn animated bx bx-trash-alt"></i></a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
