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
<!--<div class="container">-->
	<div class="col">
		<div class="col-lg-12 d-flex flex-column">
			<div class="">
				<div style="float: right;">
					<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#memberCreateWithdrawalModal">Withdraw</button>
				</div>
			</div>
		</div>
		<hr/>
		<!-- Modal -->
		<div class="modal fade" id="memberCreateWithdrawalModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content bg-dark">
					<div class="modal-header">
						<h5 class="modal-title text-white">Withdrawal Detail</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body text-white">
						<div class="card border-top border-0 border-4 border-white">
							<div class="card-body p-5">
								<form role="form" class="row g-3 js-form_register-withdrawal"
									  method="post"
									  data-url="<?= base_url('member/MemberAjax/validateMemberWdAmmount');?>"
									  action="<?=base_url('member/withdrawal/save')?>">
									<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
									<div class="col-12">
										<label for="inputAddress" class="form-label">Jumlah WD</label>
										<input type="number" class="form-control" id="wd_amount_input" value="<?= set_value('wd_amount_input')?>" name="wd_amount_input">
										<small><?= form_error('wd_amount_input')?></small>
									</div>
									<div class="col-12 border p-3 rounded">
										<div class="mb-lg-0">
											<label class="form-label">Pilih Payment Gateway</label>
											<select name="wd_member_bank_id" class="modal-select js-select-member-account js-input-with-plugin" data-url="<?= base_url('member/MemberAjax/getMemberBankAccount');?>">
												<option value="" disabled selected>--- Pilih Payment Gateway ----</option>
												<?php foreach ($dataBankTransfer as $bank){?>
													<option value="<?= $bank->id?>"><?= $bank->nama_bank?></option>
												<?php }?>
											</select>
											<small class="text-danger js_input-error-placement"><?= form_error('wd_member_bank_id')?></small>
											<hr/>
											<dl class="row">
												<dt class="col-sm-4">Bank</dt>
												<dd class="col-sm-6 js-payment-bank-name">: </dd>
												<dd class="col-sm-2"></dd>
												<dt class="col-sm-4">Rekening Tujuan</dt>
												<dd class="col-sm-6 js-payment-bank-number">: </dd>
												<dd class="col-sm-2"></dd>
												<dt class="col-sm-4">Atas Nama</dt>
												<dd class="col-sm-6 js-payment-bank-recipient">: </dd>
												<dd class="col-sm-2"></dd>
											</dl>
										</div>
									</div>
									<div class="col-12">
										<button type="submit" class="btn btn-light px-5 js-form_action_btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ./Modal -->
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
						<tr class="align-items-center">
							<th>No.</th>
							<th>Member</th>
							<th>Jumlah Yang Diajukan</th>
							<th>Deskripsi</th>
							<th>Tanggal Pengajuan</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
						<?php $no = 1; foreach($dataWithdrawal as $withdrawal) {
						
							switch ($withdrawal->withdrawal_status){
								case MemberWdStatus::WD_NEW:
									$wdStatus = "Menunggu Persetujuan";
									break;
								case MemberWdStatus::WD_PROCESSED:
									$wdStatus = "On Progress";
									break;
								case MemberWdStatus::WD_FINISHED:
									$wdStatus = "Pengajuan Selesai";
									break;
								case MemberWdStatus::WD_REJECTED;
									$wdStatus = "Pengajuan Ditolak";
									break;
							}
							
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $withdrawal->member_request_wd?></td>
								<td class="js-currencyFormatter" data-price="<?= $withdrawal->withdrawal_requested_ammount?>"></td>
								<td>Withdraw Ke <?= $withdrawal->withdrawal_bank_name ?> - <?= $withdrawal->withdrawal_bank_number ?> </td>
								<td><?= date('d M Y h:i A', strtotime($withdrawal->withdrawal_created_at)) ?></td>
								<td><?= $wdStatus ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<!--</div>-->
