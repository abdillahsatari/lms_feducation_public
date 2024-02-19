<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">My Team</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Struktur Jaringan</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="card">
	<div class="card-body">
		<h5 class="card-title">Jaringan Saya</h5>
		<hr/>
		<div class="row">
			<div class="col-12">
				<div class="card-box">
					<div class="table-responsive">
						<div>
							<code><?= $memberFullName ?></code>
						</div>
						<?= $memberTree; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
