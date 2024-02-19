<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Finance</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Commission</li>
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
					<th>Jumlah</th>
					<th>Deskripsi</th>
					<th>Tanggal Penerimaan</th>
				</tr>
				</thead>
				<tbody>
				<?php $no = 1; foreach($dataCommission as $commission) {?>
					<tr>
						<td><?= $no++ ?></td>
						<td class="js-currencyFormatter" data-price="<?= $commission->commission_ammount?>"></td>
						<td>Penambahan Komisi dari Pendaftaran Kelas <?= ucfirst($commission->commission_course_category) ?> <?= $commission->commission_came_from ?></td>
						<td><?= date('d M Y h:i A', strtotime($commission->commission_created_at)) ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
