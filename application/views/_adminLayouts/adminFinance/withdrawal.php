<h6 class="mb-0 text-uppercase">List Withdrawal</h6>
<hr />

<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table id="example2" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>No.</th>
					<th>Member</th>
					<th>Jumlah Yang Diajukan</th>
					<th>Jumlah Yang Ditransfer</th>
					<th>Deskripsi</th>
					<th>Tanggal Transaksi</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php $no = 1; foreach($dataWithdrawal as $withdrawal) {?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $withdrawal->member_request_wd?></td>
						<td class="js-currencyFormatter" data-price="<?= $withdrawal->withdrawal_requested_ammount?>"></td>
						<td class="js-currencyFormatter" data-price="<?= $withdrawal->withdrawal_ammount?>"></td>
						<td>Withdraw Ke <?= $withdrawal->withdrawal_bank_name ?> - <?= $withdrawal->withdrawal_bank_number ?> </td>
						<td><?= date('d M Y h:i A', strtotime($withdrawal->withdrawal_created_at)) ?></td>
						<td><?= $statusWithdrawal ?></td>
						<td>
							<a href="<?= base_url("admin/withdrawal/edit/".$withdrawal->withdrawal_id) ?>" class="btn btn-primary btn-sm"><i class="fadeIn animated bx bx-message-square-edit"></i></a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
