<h6 class="mb-0 text-uppercase">List Member LMS Course</h6>
<hr />

<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table id="example2" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Email</th>
					<th>No. Hp</th>
					<th>Status Email</th>
					<th>Status Pendaftaran</th>
					<th>Tgl Pendaftaran</th>
					<th>Ubah Status</th>
				</tr>
				</thead>
				<tbody>
				<?php
				$no = 1;
				foreach($dataMember as $member) {
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $member->member_full_name ?></td>
						<td><?= $member->member_email ?></td>
						<td><?= $member->member_phone_number ?: "-" ?></td>
						<td><?= $member->member_is_email_regist_sent ? "Terkirim" : "Gagal Terkirim" ?></td>
						<td><?= $member->member_is_verified ? "Selesai" : "Menunggu Pembayaran" ?></td>
						<td><?= date('d M Y ', strtotime($member->created_at)) ?></td>
						<td>
							<div class="d-flex order-actions">
								<a href="<?= base_url("admin/member/edit/".$member->id) ?>" style="background: none; border: none;" class="m-auto">
									<button class="btn btn-md <?= $member->member_is_email_regist_sent == FALSE ? "btn-danger" : "btn-light" ?> bx bxs-edit"></button>
								</a>
							</div>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>=
	</div>
</div>
