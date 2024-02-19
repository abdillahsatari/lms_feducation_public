<h6 class="mb-0 text-uppercase">List Komisi</h6>
<hr />

<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table id="example2" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>No.</th>
					<th>Member</th>
					<th>Jumlah</th>
					<th>Deskripsi</th>
					<th>Tanggal Penerimaan</th>
				</tr>
				</thead>
				<tbody>
				<?php $no = 1; foreach($dataCommission as $commission) {?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $commission->member_get_commission_name?></td>
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
