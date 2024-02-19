<!-- Course Banner Section -->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url("assets/resources/images/courses/banners/").$dataCourse->feducation_course_banner?>" class="d-block w-100" alt="...">
        </div>
    </div>
</div>
<!-- Course Banner Section -->

<!-- Course Overview Section -->
<div class="row mt-3">
    <div class="card">
        <hr/>
        <div class="row g-0">
            <div class="col-md-4 border-end js-course-view-modul-wrapper">
                <div class="card radius-10 overflow-hidden w-100">
                    <div class="card-head">
                        <a href="javascript:history.back()" class="btn btn-primary"><i class='fadeIn animated bx bx-arrow-back'></i><span class="text"></span></a>
                    </div>
                    <div class="card-body">
                        <div class="align-items-center">
                            <div class="col d-flex">						
                                <div class="product-list" style="width: -webkit-fill-available;">
                                    <div class="d-flex flex-column gap-3">
                                        <?php $first = true; foreach($dataCourse->feducation_course_moduls as $courseModul):?>
                                            <a href="javascript:;">
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
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title"><?= $dataCourse->feducation_course_headline ?></h4>
                    <div class="d-flex gap-3 py-3">
                        <div class="cursor-pointer">
                            <i class='bx bxs-star text-warning'></i>
                            <i class='bx bxs-star text-warning'></i>
                            <i class='bx bxs-star text-warning'></i>
                            <i class='bx bxs-star text-warning'></i>
                            <i class='bx bxs-star'></i>
                        </div>	
                        <div>120 views</div>
                    </div>
                    <div class="mb-3"> 
                        <span class="price h4 js-currencyFormatter" data-price="<?= $dataCourse->feducation_course_price ?>"></span> 
                    </div>
                    <p class="card-text fs-6 mb-3">
                        <?= strip_tags($dataCourse->feducation_course_description)?>
                    </p>
                    <dl class="row">
                    <dt class="col-sm-3">Total Video</dt>
                    <dd class="col-sm-9"><?= strip_tags($dataCourse->feducation_course_total_modul)?></dd>
                    
                    <dt class="col-sm-3">Total Modul</dt>
                    <dd class="col-sm-9"><?= strip_tags($dataCourse->feducation_course_total_modul)?></dd>
                    
                    <dt class="col-sm-3">Durasi Pembelajaran</dt>
                    <dd class="col-sm-9"><?= $dataCourse->feducation_course_duration?> Menit</dd>
                    </dl>
                    <hr>

                    <div class="row row-cols-auto row-cols-1 row-cols-md-12 align-items-center">
                        <div class="col">
                            <div class="d-flex gap-3 mt-3">
                                <input type="hidden" value="<?= $dataCourse->feducation_course_is_added_to_playlist ?>" name="course_btn_status">
                                <a href="<?= base_url('member/course/watch?v=').$dataCourse->feducation_course_slug ?>" class="btn btn-danger">
                                    <span class="text">Belajar Sekarang</span><i class='bx bx-play-circle ms-1'></i>
                                </a>
                                <button type="button" 
                                        class="<?= $dataCourse->feducation_course_is_added_to_playlist == "1" ? "btn btn-light" : "btn btn-warning"; ?> js-playlist-button-control" 
                                        data-course-id="<?= $dataCourse->feducation_course_id ?>"
                                        data-url="<?= base_url("member/memberAjax/playlistButtonControl")?>">
                                    <span id="js-btn-playlist-content" class="text">
                                        <?= $dataCourse->feducation_course_is_added_to_playlist == "1" ? "Hapus dari Playlist" : "Tambahkan ke Playlist"; ?>
                                    </span>
                                    <i id="js-spinner-btn-<?= $dataCourse->feducation_course_id ?>"
                                        class='<?= $dataCourse->feducation_course_is_added_to_playlist == "1" ? "bx bxs-bookmark-minus" : "bx bxs-bookmark-plus"; ?> js-spinner-btn'></i>
                                </button>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <hr/>
    </div>
</div>
<!-- Course Overview Section -->

<!-- Related Course Section -->
<div class="row mt-4">
    <h3>Related Course</h3>
    <hr>
    <div class="js-related-course" data-url="<?= base_url('member/MemberAjax/relatedCourseInit');?>" 
        data-related-type="categories"
        data-related-id="<?= $dataCourse->feducation_course_category_id ?>"
        data-except-id="<?= $dataCourse->feducation_course_id ?>">
        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4 js-courses-list-wrapper">
            <!-- Load Course List Here -->            
        </div>
    </div>
</div>