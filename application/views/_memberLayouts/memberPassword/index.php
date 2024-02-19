<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
	<div class="breadcrumb-title pe-3">My Accounts</div>
	<div class="ps-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Password</li>
			</ol>
		</nav>
	</div>
</div>
<!--end breadcrumb-->
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-top border-0 border-4 border-white">
                    <div class="card-body p-5">
                        <form role="form" class="row g-3"
							  method="post"
							  action="<?=base_url('member/password/update')?>">
							<input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfToken ?>">
                         
                            <div class="col-md-12">
                                <label for="inputLastName" class="form-label">Password baru</label>
                                <input  type="password" class="form-control" id="inputLastName" name="pasword">
                            </div>

                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Ulangi Password</label>
                                <input type="password" class="form-control" id="inputNumber" name="retype_password">
                            </div>

<!--                            <div class="col-md-12">-->
<!--                                <label for="inputZip" class="form-label">Masukan Password Lama akun Untuk Menyinpan Data terbaru Anda</label>-->
<!---->
<!--                                <input type="password" class="form-control" id="inputZip">-->
<!--                            </div>-->
                            <div class="col-12">
                                <button type="submit" class="btn btn-light px-5">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
