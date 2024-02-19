<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Presensi Intern</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Public Relation</li>
				<li class="breadcrumb-item active" aria-current="page">Presensi Intern</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->

<div class="main-body">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table id="interPresensi" class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th>Email</th>
						<th>No. Hp</th>
						<th>Institusi</th>
						<th>Presensi</th>
						<th>Ip Address</th>
						<th>Waktu</th>
					</tr>
					</thead>
					<tbody>
					<?php $no = 1; foreach($dataPresensi as $presensi) {?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $presensi->intern_name ?></td>
							<td><?= $presensi->intern_email ?></td>
							<td><?= $presensi->intern_phone ?></td>
							<td><?= $presensi->intern_institution ?></td>
							<td><?= $presensi->presensi_type ?></td>
							<td><?= $presensi->ip_address ?></td>
							<td><?= date('d M Y H:i', strtotime($presensi->created_at)) ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

