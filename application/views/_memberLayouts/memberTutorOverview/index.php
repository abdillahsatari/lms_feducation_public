<style>
    .tutorOverviewWrapper p{
        text-align: justify!important;
        color: oldlace;
    }
</style>

<div class="row">
    <div class="col-12 col-lg-4 col-xl-4 d-flex">
		<div class="card radius-10 overflow-hidden w-100">
			<div class="card-body">
				<div class="align-items-center text-center mb-3">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="<?= base_url("assets/resources/images/tutors/").$dataTutor->tutor_image?>" class="card-img image-preview" alt="Feducation Course">
                    </div>
                    <hr/>
                    <div class="align-items-center text-center">
                        <h5 class="card-title"><?= $dataTutor->tutor_name?></h5>
                        <p class="card-text"><?= $dataTutor->tutor_achievement?></p>
                    </div>
                    <div class="list-inline contacts-social mt-3 mb-3">
                        <a href="<?= $dataTutor->tutor_facebook?>" class="list-inline-item bg-light text-white border-0" target="_blank"><i class="bx bxl-facebook"></i></a>
                        <a href="<?= $dataTutor->tutor_instagram?>" class="list-inline-item bg-light text-white border-0" target="_blank"><i class="bx bxl-instagram"></i></a>
                        <a href="<?= $dataTutor->tutor_linkedin?>" class="list-inline-item bg-light text-white border-0" target="_blank"><i class="bx bxl-linkedin"></i></a>
                    </div>
				</div>
			</div>
		</div>
	</div>
    <div class="col-12 col-lg-8 col-xl-8">
		<div class="card radius-10 w-100">
            <div class="card-body tutorOverviewWrapper">
                <div class="d-flex align-items-center mb-3">
                    <h3 class="mb-0">Tutor Overview</h3>
                </div>
                <hr>
                <?= $dataTutor->tutor_overview?>
            </div>
            <div class="card-footer">
                <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-primary">Kembali</a>
            </div>
		</div>
	</div>
</div>

<div class="row mt-5">
    <h3>Tutor Courses</h3>
    <hr>
    <div class="js-related-course" data-url="<?= base_url('member/MemberAjax/relatedCourseInit');?>"
        data-related-type="tutors"
        data-related-id="<?= $dataTutor->id ?>"> 
        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4 js-courses-list-wrapper">
            <!-- Load Course List Here -->            
        </div>
    </div>
</div>
