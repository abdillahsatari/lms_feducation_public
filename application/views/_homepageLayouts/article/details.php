<style>
	img{
		max-width: -webkit-fill-available;
	}
</style>
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
				<div class="col-md-12 mb-4">
					<div class="row">
						<div class="col-xl-9 col-sm-12" style="background-color:#fff; border-radius: 25px;">

							<!-- Card -->
							<div class="card card-cascade wider reverse">
								<!-- Card image -->
								<div class="view view-cascade overlay">
									<img class="card-img-top article-cover" src="<?= $article->article_cover ? base_url('/assets/resources/images/articles/covers/'.$article->article_cover) : base_url('/assets/resources/images/articles/covers/default_article_image.webp'); ?>" alt="belajar trading pemula | feducation">
									<a>
										<div class="mask rgba-white-slight"></div>
									</a>
								</div>
								<!-- Card content -->
								<div class="card-body card-body-cascade article-card-body-cascade text-center">
									<!-- Title -->
									<h1 class="h4 font-weight-bold text-danger"><?= $article->article_headline ?></h1>
									<!-- Data -->
									<p>Written by <a><strong><?= $article->article_author?></strong></a>, <?= date("M d Y", strtotime($article->created_at)) ?></p>
									<!-- Social shares -->
									<div class="social-counters d-inline">
										<!-- Facebook -->
										<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url('/article/details/'.$article->article_slug);?>&amp;src=sdkpreparse" class="btn btn-fb"><i class="fab fa-facebook-f pr-2"></i>
											<span class="clearfix d-none d-md-inline-block">Facebook</span></a>
										<a target="_blank" class="btn btn-tw" href="https://twitter.com/intent/tweet?url=<?= base_url('/article/details/'.$article->article_slug);?>"><i class="fab fa-twitter pr-2"></i>
											<span class="clearfix d-none d-md-inline-block">Twitter</span></a>
									</div>
									<!-- Social shares -->
								</div>
								<!-- Card content -->
							</div>
							<!-- Card -->
							<!-- Excerpt -->
							<div class="mt-5 text-justify">
								<article  style="color: #393939 !important;">
									<?= $article->article_content ?>
								</article>
							</div>

						</div>
						<div class="col-sm-12 col-xl-3">
							<form id="search_form" class="d-none d-sm-block" name="search_form" method="post" action="#" >
								<div class='hiddenFields'>
									<input type="hidden" name="ACT" value="24" />
									<input type="hidden" name="RES" value="" />
									<input type="hidden" name="meta" value="44/XD6s5JjuMmDcJIajyqHC1wK4LxVWR6rrbSrWadTxWd+5Uwf2j0W1UF/Jj4TEm11qonedqHLRJfxgJUdKWqFYO4wRyevCDQFTwDYYxFlbmzeATFnL31asPYwjsrDcCetftt+VvjXUtP76UqkZupRflbxkyC/CMbsd/Eqf5eWXPAW6bHECP8fXzyPAgVf/Hc8dA0TsR763oDeKmfgzKrxMDvSEs+n/fWIVoy5iuMVoyJBDrDxBasCEthvFwnOPmM3kMBqtyz/QKUgc8tYhaeq6mgT3ObA0MxzUgtV+1PPv9MlKWTUiqWznp8zX4fpCGSi1fYzkY8SkYBwoLVDSqrfLT64zyBFFTM/QblINtKGYMpoo35SV2V2ouLA0rbgZU465vu/KJ/TGYa8XBM4JmlA==" />
									<input type="hidden" name="site_id" value="1" />
									<input type="hidden" name="csrf_token" value="2f0320c2ddabca459d4095b7902968b37126a941" />
								</div>
								<input class="form-control mb-1" type="text" placeholder="Search" aria-label="Search" name="keywords" id="keywords">
							</form>
							<h6 class="pl-2 py-3 mb-2 mt-3 white-text" style="background-image: url('<?= base_url('assets/images/resources/')?>bg-breadcrumb.jpeg'); background-size: 100% 100%;"><b>TOPICS</b></h6>
							<div class="list-group mb-5">
								<?php foreach ($dataArticleCat as $articleCat):?>
									<a href="#" class="list-group-item list-group-item-action">#<?= $articleCat->article_category_headline?></a>
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


