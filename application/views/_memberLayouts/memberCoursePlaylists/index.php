<div class="row mt-4">
    <h3>My Playlist</h3>
    <hr>
    <div class="js-member-course-playlists" >
        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
        <?php if(count($dataCoursePlaylits) > 0):?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4 js-courses-list-wrapper">
                <!-- Load Course List Here -->
                <?php foreach($dataCoursePlaylits as $course):?>
                    <div id="course-card-<?= $course->feducation_course_id ?>" class="col">
                        <div class="card js-display-course-card">
                            <img src="<?= base_url("assets/resources/images/courses/thumbnails/").$course->feducation_course_thumbnail?>" class="card-img-top" alt="feducation card course">
                            <div class="card-body">
                                <div class="course-card-title mb-1">
                                    <h5 class="card-title"><?= $course->feducation_course_headline?></h5>
                                </div>
                                <p class="card-text">
                                <?php

                                    $string = strip_tags($course->feducation_course_description);
                                    if (strlen($string) > 65) {
                                        $stringCut = substr($string, 0, 65);
                                        $string = substr($stringCut, 0, strrpos($stringCut, ' '))." ...";
                                    }

                                    echo $string;
                                    ?>
                                </p>  
                                <div class="d-flex align-items-center">
                                    <div class="font-15 text-white">
                                        <i class="lni lni-play"></i>
                                    </div>
                                    <div class="ms-2 me-3"><span><?= $course->feducation_course_total_modul?> Videos</span></div>

                                    <div class="font-15 text-white">
                                        <i class="lni lni-notepad"></i>
                                    </div>
                                    <div class="ms-1"><span><?= $course->feducation_course_total_modul?> Modul</span></div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="font-15 text-white">
                                        <i class="lni lni-alarm-clock"></i>
                                    </div>
                                    <div class="ms-2"><span><?= $course->feducation_course_duration?> Menit</span></div>
                                </div>
                                
                                <div class="d-flex gap-3 align-items-center">
                                    <a href="<?= $course->feducation_course_slug ?>" class="btn btn-light mt-2">Masuk Kelas</a>
                                    <button type="button" style="justify-content: end;" 
                                        class="<?= $course->feducation_course_is_added_to_playlist == "1" ? "btn btn-light" : "btn btn-warning"; ?> js-playlist-button-control mt-2 justify-content-end" 
                                        data-course-id="<?= $course->feducation_course_id ?>"
                                        data-url="<?= base_url("member/memberAjax/playlistButtonControl")?>">
                                        <i id="js-spinner-btn-<?= $course->feducation_course_id ?>"
                                            class='<?= $course->feducation_course_is_added_to_playlist == "1" ? "bx bx-trash" : "bx bx-trash"; ?> js-spinner-btn'></i>
                                </button>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        <?php else:?>
            <p>You haven't Added Any Course to Your Playlist </p>
        <?php endif;?>
    </div>
</div>