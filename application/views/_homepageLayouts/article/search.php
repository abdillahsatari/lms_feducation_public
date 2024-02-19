<div fss-anchor="view-1" class="fss-mainview fss-active">
	<div class="fss-subview">
		<div fss-anchor="subview-a" class="screen-height fss-subview-item subview-a" style="background-image: url('<?= base_url('assets/images/resources/')?>bg-layer8.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
			<div class="center-div container padding-sect-1">
				<nav>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a class="black-text" href="<?= base_url('homepage')?>">Home</a><i
								class="fas fa-angle-double-right mx-2" aria-hidden="true"></i></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('article')?>">Article</a></li>
						<li class="breadcrumb-item active">Search</li>
					</ol>
				</nav>
				<div class="col-md-12 mb-4" style=" border-radius: 25px;">
					<!--Section: search-->
					<div class="row">
						<!-- desktop -->
						<div class="col-lg-8 d-none d-sm-block">
							<h3>Hasil Pencarian Untuk Kata Kunci:</h3>
							<p class="dark-grey-text"><i>"<?= $keywords != "" ? $keywords : " " ?>"</i></p>
							<br>
						</div>
						<div class="col-lg-4 d-none d-sm-block">
							<form id="search_form_mobile" class="js-article_search_form" name="search_form" method="post" action="<?= base_url('article/search')?>">
								<div class='hiddenFields'>
									<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
								</div>
								<label>Search:</label>
								<input class="form-control mb-3" type="text" placeholder="Title" aria-label="Search" name="keywords" id="keywords_mobile">
							</form>
						</div>
						<!-- !desktop -->

						<!-- mobile -->
						<div class="col-lg-4 d-block d-sm-none">
							<form id="search_form_mobile" class="js-article_search_form" name="search_form" method="post" action="<?= base_url('article/search')?>">
								<div class='hiddenFields'>
									<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
								</div>
								<label>Search:</label>
								<input class="form-control mb-3" type="text" placeholder="Title" aria-label="Search" name="keywords" id="keywords_mobile">
							</form>
						</div>
						<div class="col-lg-8 d-block d-sm-none">
							<h5><strong>Hasil Pencarian Untuk Kata Kunci:</strong></h5>
							<p><i>"<?= $keywords != "" ? $keywords : " " ?>"</i></p>
						</div>
						<!-- !mobile -->
					</div>
					<!-- !Section: search -->

					<!-- Section: search result -->
					<div class="row my-5">
						<?php if ($result == []) { ?>
							<div class="col-12">
								<h3>Tidak Ditemukan.</h3>
							</div>
						<?php  } else { ?>
							<?php foreach ($result as $dataNews) { ?>

								<div class="col-lg-3 col-md-12 my-3">
									<!--Card Regular-->
									<div class="card card-cascade">
										<!--Card image-->
										<div class="view view-cascade overlay zoom" style="border-bottom: #ee3343 5px solid;">
											<img src="<?= base_url('assets/resources/articles/'  . $dataNews->article_thumbnail) ?>" class="card-img-top"
												 alt="normal" style="height: 150px;">
											<a href="<?= base_url('/article/read/' . $dataNews->article_slug); ?>">
												<div class="mask rgba-white-slight"></div>
											</a>
										</div>


										<div class="col-md-12 col-xs-12 mt-4" style=" min-height:280px;">

											<!--/.Card image-->
											<p class="h6-responsive font-weight-bolder my-2"><?= $dataNews->article_headline ?></p>
											<!-- Excerpt -->
											<p>
											<p>
												<?php

												$string = strip_tags($dataNews->article_content);
												if (strlen($string) > 200) {
													$stringCut = substr($string, 0, 200);
													$string = substr($stringCut, 0, strrpos($stringCut, ' '))." ...";
												}

												echo $string;
												?>
											</p>
										</div>
										<div class="col-md-12 mb-3">
											<a href="<?= base_url('/article/read/' . $dataNews->article_slug); ?>">
												<button type="button" class="btn btn-danger">Learn More</button>
											</a>
										</div>

									</div>
									<!--/.Card Regular-->
								</div>
							<?php } ?>
						<?php } ?>
					</div>
					<br>
					<? if ($result != []):?>

					<!-- pagination desktop -->
					<nav aria-label="Blog Pagination mt-5 my-5" class="d-none d-sm-block">
						<?= $pagination ?>
					</nav>
					<!-- pagination desktop -->
					<!-- pagination mobile -->
					<nav aria-label="Blog Pagination mt-5 my-5" class="d-block d-sm-none justify-content-center">
						<?= $pagination ?>
					</nav>
					<!-- pagination mobile -->
					<? endif;?>
					<!-- !Section: search result -->

					<hr class="thin m-4">

					<!-- Section Latest Post -->
					<div class="row">
						<div class="col-lg-12">
							<h2>Baca Juga</h2>
						</div>
						<div class="row my-5">
							<?php if ($latestPost == []) { ?>
								<h2>Coming Soon In Short Time </h2>
							<?php  } else { ?>
								<?php foreach ($latestPost as $dataNews) { ?>

									<div class="col-lg-3 col-md-12 my-3">
										<!--Card Regular-->
										<div class="card card-cascade">
											<!--Card image-->
											<div class="view view-cascade overlay zoom" style="border-bottom: #ee3343 5px solid;">
												<img src="<?= base_url('assets/resources/articles/'  . $dataNews->article_thumbnail) ?>" class="card-img-top"
													 alt="normal" style="height: 150px;">
												<a href="<?= base_url('/article/read/' . $dataNews->article_slug); ?>">
													<div class="mask rgba-white-slight"></div>
												</a>
											</div>


											<div class="col-md-12 col-xs-12 mt-4" style=" min-height:280px;">

												<!--/.Card image-->
												<p class="h6-responsive font-weight-bolder my-2"><?= $dataNews->article_headline ?></p>
												<!-- Excerpt -->
												<p>
												<p>
													<?php

													$string = strip_tags($dataNews->article_content);
													if (strlen($string) > 200) {
														$stringCut = substr($string, 0, 200);
														$string = substr($stringCut, 0, strrpos($stringCut, ' '))." ...";
													}

													echo $string;
													?>
												</p>
											</div>
											<div class="col-md-12 mb-3">
												<a href="<?= base_url('/article/read/' . $dataNews->article_slug); ?>">
													<button type="button" class="btn btn-danger">Learn More</button>
												</a>
											</div>

										</div>
										<!--/.Card Regular-->
									</div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
					<!-- !Section Latest Post -->

					<hr class="thin m-4">

					<!-- Section Popular Post -->
					<div class="row">
						<div class="col-lg-12">
							<h2>Popular Post</h2>
						</div>
						<div class="row my-5">
							<?php if ($popularPost == []) { ?>
								<h2>Coming Soon In Short Time </h2>
							<?php  } else { ?>
								<?php foreach ($popularPost as $dataNews) { ?>

									<div class="col-lg-3 col-md-12 my-3">
										<!--Card Regular-->
										<div class="card card-cascade">
											<!--Card image-->
											<div class="view view-cascade overlay zoom" style="border-bottom: #ee3343 5px solid;">
												<img src="<?= base_url('assets/resources/articles/'  . $dataNews->article_thumbnail) ?>" class="card-img-top"
													 alt="normal" style="height: 150px;">
												<a href="<?= base_url('/article/read/' . $dataNews->article_slug); ?>">
													<div class="mask rgba-white-slight"></div>
												</a>
											</div>


											<div class="col-md-12 col-xs-12 mt-4" style=" min-height:80px;">

												<!--/.Card image-->
												<p class="h6-responsive font-weight-bolder my-2"><strong><?= $dataNews->article_headline ?></strong></p>
												<!-- Excerpt -->
												<p>
											</div>
											<div class="col-md-12 mb-3">
												<a href="<?= base_url('/article/read/' . $dataNews->article_slug); ?>">
													<button type="button" class="btn btn-danger">Learn More</button>
												</a>
											</div>

										</div>
										<!--/.Card Regular-->
									</div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
					<!-- !Section Popular Post -->
					<hr class="thin m-4">
				</div>
			</div>
		</div>
	</div>
</div>
