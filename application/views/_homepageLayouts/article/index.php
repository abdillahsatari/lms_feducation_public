<div fss-anchor="view-1" class="fss-mainview fss-active">
	<div class="fss-subview">
		<div fss-anchor="subview-a" class="screen-height fss-subview-item subview-a" style="background-image: url('<?= base_url('assets/resources/images/homepages/')?>bg-layer8.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
			<div class="center-div container padding-sect-1">
				<nav>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a class="black-text" href="<?= base_url('homepage')?>">Home</a><i
									class="fas fa-angle-double-right mx-2" aria-hidden="true"></i></li>
						<li class="breadcrumb-item active">Article Blog</li>
					</ol>
				</nav>
				<div class="col-md-12 mb-4" style=" border-radius: 25px;">
					<!-- search mobile -->
					<form id="search_form_mobile" class="d-block d-sm-none js-article_search_form" name="search_form" method="post" action="<?= base_url('artilce/search')?>">
						<div class='hiddenFields'>
							<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
						</div>
						<input class="form-control mb-3" type="text" placeholder="Search" aria-label="Search" name="keywords" id="keywords_mobile">
					</form>


					<div class="tab-content p-0">
						<div class="tab-pane fade show active">
							<div class="row">
								<!-- article list -->
								<div class="col-xl-9 col-sm-12 card mb-3 d-none d-sm-block">
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active">

											<?php foreach ($articles as $article): ?>
											<div class="row">
												<div class="col-xl-12">
													<div class="media px-1">
														<div class="container">
															<div class="row no-gutters">
																<div class="col-12 col-sm-6 col-md-2 pr-3 pb-2 text-center">
																	<img src="<?= base_url('assets/')?>resources/apps/user_ava.png" class="w-100 rounded-circle z-depth-1 img-fluid d-none d-sm-block">
																	<img src="<?= base_url('assets/')?>resources/apps/user_ava.png" class="w-50 rounded-circle z-depth-1 img-fluid d-block d-sm-none">
																</div>
																<div class="col-12 col-md-9">
																	<h6 class="p-0 m-0" style="color: #636161;">
																		Story by : <a class="text-danger" href="#"><?= $article->article_author ?></a>
																	</h6>
																	<h6 class="p-0 m-0" style="color: #636161;">
																		Published : <?= date("M d, Y", strtotime($article->created_at)) ?>
																	</h6>
<!--																	<h6 class="p-0 m-0" style="color: #636161;">-->
<!--																		Viewed 1152 times-->
<!--																	</h6>-->
																</div>
															</div>
														</div>

														<hr>
													</div>
													<a href="<?= base_url('/article/read/'.$article->article_slug); ?>"><img src="<?= $article->article_thumbnail ? base_url('/assets/resources/images/articles/thumbnails/'.$article->article_thumbnail) : base_url('/assets/resources/images/articles/thumbnails/default_article_image.webp'); ?>" class="img-fluid w-100"
																																					  style="border: 4px solid #ee3343;" alt="<?=$article->article_headline?>"></a>
													<h3 class="my-2">
														<a class="text-body text-danger text-uppercase" href="<?= base_url('/article/read/'.$article->article_slug); ?>" ><?= $article->article_headline ?></a>
													</h3>
													<p class="my-2">
														<p style="text-align: justify;">
														<?php

														$string = strip_tags($article->article_content);
														if (strlen($string) > 500) {
															$stringCut = substr($string, 0, 500);
															$string = substr($stringCut, 0, strrpos($stringCut, ' '))." ...";
														}

														echo $string;
														?>
														</p>
													</p>
													<a href="<?= base_url('/article/read/'.$article->article_slug); ?>" class="btn btn-danger m-0"><strong>Read More</strong></a>
												</div>
											</div>
											<hr class="my-5">
											<?php endforeach; ?>

											<nav aria-label="Blog Pagination">
												<hr/>
												<?= $pagination ?>
											</nav>
										</div>
									</div>
								</div>
								<!-- end of article list -->

								<!-- side nav -->
								<div class="col-sm-12 col-xl-3">
									<form class="d-none d-sm-block js-article_search_form" method="post" action="<?= base_url('article/search')?>">
										<div class='hiddenFields'>
											<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
										</div>
										<input class="form-control mb-1" type="text" placeholder="Search" aria-label="Search" name="keywords" id="keywords">
									</form>
									<h6 class="pl-2 py-3 mb-2 mt-3 white-text" style="background-image: url('<?= base_url('assets/images/resources/')?>bg-breadcrumb.jpeg'); background-size: 100% 100%;"><b>TOPICS</b></h6>
									<div class="list-group mb-5">
										<?php foreach ($dataArticleCat as $articleCat):?>
											<a href="#" class="list-group-item list-group-item-action">#<?= $articleCat->article_category_headline ?></a>
										<?php endforeach;?>
									</div>
									<h6 class="pl-2 py-3 mb-2 white-text" style="background-image: url('<?= base_url('assets/images/resources/')?>bg-breadcrumb.jpeg'); background-size: 100% 100%;"><b>POPULAR POSTS</b></h6>
									<ul class="list-group list-group-flush">
										<?php foreach($popularPost as $popularList){?>
											<li class="list-group-item border-0 pt-0">
												<a class="text-body" href='<?= base_url('/article/read/'.$popularList->article_slug); ?>'><i class="fas fa-angle-double-right"></i><?= $popularList->article_headline?></a>
												<hr>
											</li>
										<?php } ?>
									</ul>
								</div>
								<!-- end of side nav -->

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
