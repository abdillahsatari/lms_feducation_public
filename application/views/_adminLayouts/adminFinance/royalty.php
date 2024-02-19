<h6 class="mb-0 text-uppercase">List Royalti</h6>
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
				<?php $no = 1; foreach($dataRoyalty as $royalty) {?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $royalty->member_get_royalty_name?></td>
						<td class="js-currencyFormatter" data-price="<?= $royalty->royalty_ammount?>"></td>
						<td>Penambahan Royalti dari Pendaftaran Kelas <?= ucfirst($royalty->royalty_course_category) ?> <?= $royalty->royalty_came_from ?></td>
						<td><?= date('d M Y h:i A', strtotime($royalty->royalty_created_at)) ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
