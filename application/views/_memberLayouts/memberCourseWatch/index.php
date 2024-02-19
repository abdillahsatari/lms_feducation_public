<style>
    .morecontent span {
        display: none;
    }
    .morelink {
        display: block;
        color: #367588;
        cursor: pointer;
    }

    .activeModul{
        background: firebrick;
        border-radius: 10px;
    }
</style>

<div class="row">
	<div class="col-12 col-lg-8 col-xl-8">
        
        <!-- Video Playback Start -->
		<div class="card radius-10 w-100" style="margin-bottom: 0.5rem;">
			<form>
			<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
				<div class="card-body">
                    <iframe width="100%" height="375" 
                        src="https://www.youtube.com/embed/<?= $dataCurrentModul->course_modul_video_url ?>?autoplay=1&modestbranding=1&rel=0&showinfo=0&iv_load_policy=3$loop=1&hl=0" 
                        title="YouTube video player" 
                        frameborder="0" 
                        allowfullscreen oncontextmenu="return false"></iframe>
                    <br><br>
                    <h5 style="margin-left:15px;"><?= $dataCurrentModul->course_modul_headline?></h5>
				</div>
			</form>
		</div> 
        <!-- Video Playback End -->

        <!-- Course Module Info Start -->
        <div class="row">
            <div class="container mb-5">
                <div class="main-body">
                    <div class="card bg-dark text-white border radius-10 mt-3">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <a href="<?= base_url('member/tutor/view?t=').$dataCourseTutor->id?>">
                                        <div class="d-flex align-items-center ms-2">
                                            <img src="<?= base_url('assets/resources/images/tutors/').$dataCourseTutor->tutor_image ?>" class="rounded-circle p-1 border" width="60" alt="...">
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="mt-0" style="font-size: initial;"><?= $dataCourseTutor->tutor_name ?></h5>
                                                <p class="mb-0" style="font-size: smaller;"><?= $dataCourseTutor->tutor_achievement ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex flex-column mb-3">
                                        <div class="row row-cols-auto g-1 mt-1 me-2" style="justify-content: end;">
                                            <div class="col">
                                                <?php 
                                                    $moduleFileName = str_replace( array( '\'', '"',',' , ';', '.', '#','<', '>' ), ' ', $dataCurrentModul->course_modul_headline)                                    
                                                ?>
                                                <a href="<?= base_url('assets/resources/documents/course_modul_presentation/'.$dataCurrentModul->course_modul_presentation)?>" class="btn btn-danger" download="<?= $moduleFileName ?>">
                                                <i class="lni lni-download" style="font-size: 13px;"></i> Download Materi
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- description start -->
                            <div class="ms-3">
                                <h4 class="card-title text-white">Deskripsi Kelas</h4>
                                <span class="badge rounded-pill bg-success font-15 mb-3"><?= $dataCurrentModul->fcc_headline?></span>
                                <p class="card-text more js-course-modul-description">
                                    <?= $dataCurrentModul->course_modul_description?>
                                </p>
                            </div>
                            <!-- description end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Course Module Info End -->
        
	</div>
	<div class="col-12 col-lg-4 col-xl-4">
		<div class="card radius-10 overflow-hidden w-100">
            <div class="card-head d-flex align-items-left">
                <a href="javascript:history.back()" class="btn btn-primary me-2"><i class='fadeIn animated bx bx-arrow-back'></i><span class="text"></span></a>
                <h6 class="mb-0 mt-2"><?= $dataCurrentModul->fc_headline ?></h6>
            </div>
            <hr>
			<div class="card-body">
				<div class="align-items-center">
                    <div class="col d-flex">						
                        <div class="product-list" style="width: -webkit-fill-available;">
                            <div class="d-flex flex-column gap-3">
                                <?php $first = true; foreach($dataCourseModuls as $courseModul):?>
                                    <a href="<?= base_url('member/course/watch?v=').$dataCurrentModul->course_slug."&index=".$courseModul->id; ?>" 
                                        class="<?php $dataCourseModulIndex == $courseModul->id || !$dataCourseModulIndex && $first ? printf("activeModul") . $first = false : ""; ?>">
                                        <div class="d-flex align-items-center justify-content-between gap-3 p-2 border radius-10">
                                            <div class="">
                                                <img src="<?= base_url("assets/resources/images/courses/modul_thumbnails/").$courseModul->course_modul_thumbnail ?>" width="50" alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0" style="font-size: small;"><?= $courseModul->course_modul_headline ?></h6>
                                                <p class="mb-0" style="font-size: smaller;"><?= $courseModul->course_modul_duration ?> Menit</p>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>