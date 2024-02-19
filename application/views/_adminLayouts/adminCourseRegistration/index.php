<h6 class="mb-0 text-uppercase">List Member Tentative Course</h6>
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
					<th>Kelas</th>
					<th>Status Member</th>
					<th>Tgl Pendaftaran</th>
					<th>Ubah Status</th>
				</tr>
				</thead>
				<tbody>
				<?php
				$no = 1;
				foreach($dataCourseRegistration as $member) {
					$dataStatus='';
					switch ($member->member_status){
						case MemberCourseStatus::REGISTERED:
							$dataStatus = 'Menunggu Pembayaran';
							break;
						case MemberCourseStatus::ONSCHEDULED:
							$dataStatus = 'Pendaftaran Selesai';
							break;
						case MemberCourseStatus::RUNNNIG:
							$dataStatus = 'Kelas Berjalan';
							break;
						case MemberCourseStatus::FINISHED:
							$dataStatus = 'Selesai';
							break;
						case MemberCourseStatus::EXPIRED:
							$dataStatus = 'Kadaluarsa';
					}
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $member->member_full_name ?></td>
						<td><?= $member->member_email ?></td>
						<td><?= $member->member_phone_number ?: "-" ?></td>
						<td><?= $member->course_headline ?></td>
						<td><?= $dataStatus ?></td>
						<td><?= date('d M Y ', strtotime($member->created_at)) ?></td>
						<td>
							<div class="d-flex order-actions">
								<a href="<?= base_url("admin/course/registration/edit/".$member->id) ?>" style="background: none; border: none;" class="m-auto">
									<button class="btn btn-md <?= !$member->is_email_regist_sent ? "btn-danger" : "btn-light" ?> bx bxs-edit"></button>
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
