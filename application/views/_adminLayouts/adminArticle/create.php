<div class="page-content">

	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">Articel</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Create Article</li>
				</ol>
			</nav>
		</div>
	</div>
	<!--end breadcrumb-->

	<div class="card">
		<div class="card-body p-4">
			<h5 class="card-title">Add New Article</h5>
			<hr>
			<div class="form-body mt-4">
				<div class="row">
					<div class="col-lg-12">
						<form role="form" method="post" class="js_admin-article"
							  action="<?= base_url('admin/article/save')?>">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<label for="exampleInputEmail1">Article Headline</label>
										<input type="text" class="form-control js-article-create-headline" id="title" name="article_headline" placeholder="Enter articel headline"
											   data-rule-required="true" data-msg="Kolom Headline Tidak Boleh Kosong">
										<small class="text-danger"><?= form_error('article_headline')?></small>
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<label for="articleSlug">Article Slug</label>
										<input name="article_slug" id="articleSlug" type="text" class="form-control js-article-create-slug" placeholder="Slug"
											   data-url="<?= base_url('admin/adminAjax/adminArticleSlugValidate')?>"
											   data-rule-required="true" data-msg="Kolom Slug Tidak Boleh Kosong">
										<small class="text-danger"><?= form_error('article_slug')?></small>
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<label for="articleCategory">Article Category</label>
										<select class="form-control single-select js-input-with-plugin" name="article_category_id"
												data-rule-required="true" data-msg="Kolom Kategori Tidak Boleh Kosong">
											<option value="" disabled selected>--Select Category--</option>
											<?php foreach($dataArticleCat as $cat):?>
											<option value="<?= $cat->id?>"><?= $cat->article_category_headline?></option>
											<?php endforeach;?>
										</select>
										<small class="text-danger js_input-error-placement"><?= form_error('article_category_id')?></small>
									</div>
								</div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="Meta Description">Meta Description</label>
										<textarea name="article_meta_description" id="article_meta_description" type="text" class="form-control" placeholder="Meta Description" rows="4"
												  data-rule-required="true" data-msg="Kolom Meta Description Tidak Boleh Kosong"></textarea>
										<small class="text-danger"><?= form_error('article_meta_description')?></small>
									</div>
									<br>
									<div class="form-group">
										<label for="article_keyword">Keyword</label>
										<input name="article_keyword" id="article_keyword" type="text" class="form-control js-input-with-plugin" placeholder="Keyword"
											   data-rule-required="true" data-msg="Kolom Keyword Tidak Boleh Kosong">
										<small class="text-warning js_input-error-placement">*Separate keyword using comma (,) !</small>
										<small class="text-danger"><?= form_error('article_keyword')?></small>
									</div>
									<br>
									<div class="form-group">
										<label for="article_author">Author</label>
										<input name="article_author" id="article_author" type="text" class="form-control" placeholder="Author"
											   data-rule-required="true" data-msg="Kolom Author Tidak Boleh Kosong">
										<small class="text-danger"><?= form_error('article_author')?></small>
									</div>
									<br>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="mb-3">
											<label for="article_thumbnail" class="form-label">Article Thumbnail</label><br>
											<img src="https://via.placeholder.com/370x282.png?text=Preview" alt="Feducation Article Thumbnail"
												 class="image-preview" width="370" height="282">
											<br>
											<small class="text-warning">*Recommended size for article thumbnail is 370x282 px!</small>
											<br>
											<small class="text-danger"><?= form_error('article_thumbnail')?></small>
											<br><br>
											<input type="file" class="form-control js-image_upload" accept=".png, .jpg, .jpeg" data-url-upload="<?= base_url('admin/AdminAjax/postArticleThumbnail');?>">
											<input type="hidden" name="article_thumbnail" id="article_thumbnail">
										</div>
										<br/>
									</div>
								</div>
							</div>
							<hr/>
							<div class="col-12">
								<div class="form-group">
									<div class="mb-3">
										<label for="article_cover" class="form-label">Article Cover</label><br>
										<img src="https://via.placeholder.com/770x463.png?text=Preview" alt="Feducation Article Cover"
											 class="image-preview" width="770" height="463">
										<br>
										<small class="text-warning">*Recommended size for article cover is 770x463 px!</small>
										<br>
										<small class="text-danger"><?= form_error('article_cover')?></small>
										<br><br>
										<input type="file" class="form-control js-image_upload" id="article_cover" accept=".png, .jpg, .jpeg" data-url-upload="<?= base_url('admin/AdminAjax/postArticleCover');?>">
										<input type="hidden" name="article_cover" id="article_cover">
									</div>
								</div>
								<br/>
							</div>
							<hr>
							<div class="col-12">
								<div class="form-group">
									<label for="ckeditor">Content</label> <br>
									<textarea name="article_content" id="js-ckeditor" data-kcfinder="<?= base_url('assets/kcfinder/browse.php');?>"></textarea>
									<small class="text-danger"><?= form_error('article_content')?></small>
								</div>
							</div>
							<br>
							<a href="javascript:window.history.go(-1);" class="btn btn-danger">Back</a>
							<button type="button" class="btn btn-primary js-form_action_btn">Submit</button>
						</form>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
</div>


<!-- TinyMCE WYSIWYG -->
<script src="https://cdn.tiny.cloud/1/vf062fha86hp7o5a1btt03r24p6shp7ryt1064nqx8p0kfhh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
