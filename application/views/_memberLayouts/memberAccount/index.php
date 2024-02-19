<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
<div class="breadcrumb-title pe-3">Profile</div>
<div class="ps-3">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb mb-0 p-0">
			<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">User Profile</li>
		</ol>
	</nav>
</div>
</div>
<!--end breadcrumb-->
<div class="container">
	<form role="form"
		  method="post"
		  class="js-form-user-account"
		  action="<?= base_url('member/profile/update')?>"
		  data-url="<?=base_url('member/MemberAjax/postMemberImageProfile')?>">
		<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
		<div class="main-body">
			<div class="row">
			<?php foreach($dataMember as $member){

				$memberImage = "";

				if ($this->session->userdata("member_image")){
					$fileName	= $this->session->userdata("member_image");
					$memberImage = base_url("assets/resources/images/accounts/memberImageProfiles/").$fileName;
				} elseif ($member->member_image) {
					$memberImage = base_url("assets/resources/images/accounts/memberImageProfiles/").$member->member_image;
				} else {
					$memberImage = base_url("assets/resources/images/accounts/memberImageProfiles/default_profil_image.png");
				}

				?>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="<?= $memberImage ?>" alt="Admin" class="rounded-circle p-1 js-profil-picture" width="110">
								<div class="mt-3">
									<h4><?= $member->member_full_name?></h4>
									<p class="font-size-sm"> <?= $member->member_is_activated ? "Member Active" : "Please Take Our Course".'<br/>'."To Activated Your Account"?> </p>
									<span class="btn btn-light js-member-profile-edit-btn">Edit Off</span>
									<span class="btn btn-light js-member-profile-upload">Profile Image</span>
									<input type="file" name="inputFileUpload" class="js-upload-profile" id="inputFileUpload" accept=".png, .jpg, .jpeg, .webp" hidden data-member-id="<?= $member->id?>">
								</div>
							</div>
							<hr class="my-4">
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">kode Referal</h6>
								</div>
								<div class="col-sm-9">
								<div class="input-group">
									<input type="text" class="form-control js-targeted_copy_value" value="<?= base_url('member/register?r=')?><?= $dataMember[0]->member_referal_code?>" placeholder="Kode Referal Member" aria-label="Kode Referal Member" aria-describedby="button-addon2" disabled readonly>
									<button class="btn btn-light js-copy_btn" type="button" id="button-addon2">Copy</button>
								</div>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Nama Lengkap</h6>
								</div>
								<div class="col-sm-9">
									<input type="text" class="form-control js-member-input-profile" name="member_full_name" value="<?= $member->member_full_name?>" disabled readonly>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9">
									<input type="text" class="form-control" value="<?= $member->member_email?>" disabled readonly>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">No. Hp</h6>
								</div>
								<div class="col-sm-9">
									<input type="text" class="form-control js-member-input-profile" name="member_phone_number" value="<?= $member->member_phone_number ?: "-"; ?>" disabled readonly>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Alamat</h6>
								</div>
								<div class="col-sm-9">
									<textarea class="form-control js-member-input-profile" id="inputAddress2" name="member_address" placeholder="Address 2..." rows="3" disabled> <?= $member->member_address ?: "-" ;?> </textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9">
									<input type="submit" class="btn btn-light px-4 js_member-profile-btn-save" value="Save Changes" hidden disabled>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php }?>
			</div>
		</div>
	</form>
</div>
