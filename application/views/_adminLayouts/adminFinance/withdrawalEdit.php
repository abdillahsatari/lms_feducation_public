<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">Finance</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Withdrawal</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="card">
	<div class="card-body p-4">
		<h5 class="card-title">Detail Withdrawal</h5>
		<hr/>
		<div class="form-body mt-4">
			<form role="form" method="POST" class="js-admin-withdrawal-approval"
				  action="<?= base_url('admin/withdrawal/update')?>">
				<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
				<input type="hidden" name="wd_status" value="">
				<input type="hidden" name="wd_amount_of_wd" value="<?= $dataWithdrawal->withdrawal_requested_ammount ?>">
				<input type="hidden" name="wd_id" value="<?= $dataWithdrawal->withdrawal_id ?>">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="row g-0">
								<div class="card-body">
									<div class="row">
										<div class="col-lg-6">
											<h4 class="card-title">Permohonan Withdrawal Sebesar</h4>
											<div class="mb-3">
												<span class="price h4 js-currencyFormatter" data-price="<?= $dataWithdrawal->withdrawal_requested_ammount ?>"></span>
											</div>
											<p class="card-text fs-6"></p>
											<dl class="row">
												<dt class="col-sm-4">Tanggal Pengajuan</dt>
												<dd class="col-sm-6">: <?= date('d M Y h:i A', strtotime($dataWithdrawal->withdrawal_created_at)) ?></dd>
												<dd class="col-sm-2"></dd>
												<dt class="col-sm-4">Status</dt>
												<dd class="col-sm-6">: <?= $statusWithdrawal ?></dd>
												<dd class="col-sm-2"></dd>
											</dl>
										</div>
										<div class="col-lg-6">
											<div class="border p-3 rounded">
												<div class="mb-lg-0">
													<label class="form-label">Permohonan WD ke Rekening</label>
													<hr/>
													<dl class="row">
														<dt class="col-sm-4">Bank</dt>
														<dd class="col-sm-6">: <?= $dataWithdrawal->withdrawal_bank_name ?></dd>
														<dd class="col-sm-2"></dd>
														<dt class="col-sm-4">Rekening Tujuan</dt>
														<dd class="col-sm-6">: <?= $dataWithdrawal->withdrawal_bank_number ?></dd>
														<dd class="col-sm-2"></dd>
														<dt class="col-sm-4">Atas Nama</dt>
														<dd class="col-sm-6">: <?= $dataWithdrawal->withdrawal_bank_customer ?></dd>
														<dd class="col-sm-2"></dd>
													</dl>
												</div>
											</div>
										</div>
									</div>

									<hr>
									<div class="border p-3 rounded">
										<div class="mb-lg-0">
											<label class="form-label">Detail Pemohon</label>
											<hr/>
											<div class="row">
												<div class="col-lg-6">
													<dl class="row">
														<dt class="col-sm-4">Nama Member</dt>
														<dd class="col-sm-6">: <?= $dataWithdrawal->member_request_wd ?></dd>
														<dd class="col-sm-2"></dd>
														<dt class="col-sm-4">Email Member</dt>
														<dd class="col-sm-6">: <?= $dataWithdrawal->withdrawal_member_email ?></dd>
														<dd class="col-sm-2"></dd>
														<dt class="col-sm-4">No. Hp Member</dt>
														<dd class="col-sm-6">: <?= $dataWithdrawal->withdrawal_member_phone_number ?: "-" ?></dd>
														<dd class="col-sm-2"></dd>
													</dl>
												</div>
												<div class="col-lg-6">
													<div class="col">
														<div class="card radius-10">
															<div class="card-body">
																<div class="d-flex align-items-center">
																	<div>
																		<p class="mb-0">Total Balance</p>
																		<h4 class="my-1 js-currencyFormatter" data-price="<?= $memberBalance ?>"></h4>
																	</div>
																	<div class="widgets-icons ms-auto"><i class='bx bxs-wallet'></i>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr/>
				<div class="">
					<a href="<?=base_url("admin/withdrawal")?>" type="button" class="btn btn-light">Cancel</a>
					<div style="float: right;">
						<?php if ($dataWithdrawal->withdrawal_status == MemberWdStatus::WD_NEW){?>
							<button type="button" class="btn btn-success js-withdrawal-update" data-status="<?= MemberWdStatus::WD_FINISHED ?>">APPROVE</button>
							<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleDarkModal">DECLINE</button>

							<!-- Modal -->
							<div class="modal fade" id="exampleDarkModal" tabindex="-1" aria-hidden="true">
								<div class="modal-dialog modal-lg modal-dialog-centered">
									<div class="modal-content bg-dark">
										<div class="modal-header">
											<h5 class="modal-title text-white">Deskripsi Penolakan</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body text-white">
											<div class="card border-top border-0 border-4 border-white">
												<div class="card-body p-5">
													<div class="col-12">
														<label for="wd_description" class="form-label">Deskripsi</label>
														<input type="text" class="form-control" id="wd_description" value="<?= set_value('wd_description')?>" name="wd_description">
														<small><?= form_error('wd_description')?></small>
													</div>
													<hr/>
													<div class="col-12">
														<button type="button" class="btn btn-light px-5 js-withdrawal-update" data-status="<?= MemberWdStatus::WD_REJECTED?>">Submit</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- ./Modal -->


						<?php } elseif ($dataWithdrawal->withdrawal_status == MemberWdStatus::WD_PROCESSED) {?>
						<button type="button" class="btn btn-success js-withdrawal-update" data-status="<?= MemberWdStatus::WD_FINISHED ?>">DONE</button>
						<?php }?>
					</div>
				</div>
			</form>
			<!--end row-->
		</div>
	</div>
</div>
