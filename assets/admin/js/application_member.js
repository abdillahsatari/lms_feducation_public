/*================================================================
						Plugin Init
=================================================================*/
$(document).ready(function() {
	(function ($) {
		$(".knob").knob();

		/**
		/ DataTable
		 **/
		if ($('#example2').length > 0){
			var table = $('#example2').DataTable( {
				lengthChange: false,
			} );

			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		}

		if ($('#interPresensi').length > 0){
			var table = $('#interPresensi').DataTable( {
				dom: 'Bfrtip',
				buttons: [
					{
						extend: "csv",
						className: "btn-sm"
					},
					{
						extend: "excel",
						className: "btn-sm"
					},
					{
						extend: "pdfHtml5",
						className: "btn-sm",
						orientation: 'landscape'
					},
				],
			} );
		}

		/**
		/ inputFile
		**/
		if ($('#image-uploadify').length > 0){
			$(function() {
				$('#image-uploadify').imageuploadify();
			});
		}

		/**
		/ select2
		**/
		if ($('.single-select').length > 0){
			$('.single-select').select2({
				theme: 'bootstrap4',
				width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
				placeholder: $(this).data('placeholder'),
				allowClear: Boolean($(this).data('allow-clear')),
			});
		}

		$(".modal-select").select2({
			theme: "bootstrap4",
			width: $(this).data("width") ? $(this).data("width") : $(this).hasClass("w-100") ? "100%" : "style",
			placeholder: $(this).data("placeholder"),
			allowClear: Boolean($(this).data("allow-clear")),
			dropdownParent: $("#exampleModal"),
		});

		/**
		/ CKEditor
		 **/
		if ($('#js-ckeditor').length > 0) {
			var _fileBrowser = $('#js-ckeditor').data("kcfinder");
			CKEDITOR.replace('js-ckeditor',{
				filebrowserImageBrowseUrl : _fileBrowser,
				height: '400px'});
		}
	})(jQuery);

});

/*================================================================
						jquery
=================================================================*/


(function($){

	/**
	 * 
	 *  Global Variabels
	 * 
	 * 	for watch Url it difference between local and production
	 *  for production use: "base_url+"course/watch?v=";" instead
	 * 
	 **/
	const base_url 		= window.location.protocol + "//" + window.location.host + "/" + window.location.pathname.split('/')[1] + "/";
	const course_url	= base_url+"member/course/view?c=";
	const watch_url		= base_url+"member/course/watch?v=";
	
	/*================================================================
						Public Function
	=================================================================*/

	$.fn._getCsrfToken = function(_newToken) {

		if (_newToken) {
			$(this).find('input[name="_token"]').val(_newToken);
			return;
		} else {
			return $(this).find('input[name="_token"]').val();
		}
	};

	$('.js-currencyFormatter').each(function (){
		var _this 		= $(this);
		if (_this.length > 0){
			var dataValue	= _this.data("price");
			var decimal		= Number(dataValue).toFixed(0);
			var returnValue = decimal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
			_this.append("<span>Rp. </span>"+returnValue);
		}
	});

	$('.js-input-currencyFormatter').each(function (){
		var _this 		= $(this);
		if (_this.length > 0){
			var dataValue	= _this.data("price");
			var decimal		= Number(dataValue).toFixed(0);
			var returnValue = decimal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
			// _this.append("<span>Rp. </span>"+returnValue);
			_this.val(returnValue);
		}
	});

	$.fn.modalClose = function(){
		// Reset the modal as default
		$('.modal').on('hidden.bs.modal', function(){
			var _form = $(this);

			_form.find('.invalid-feedback').each(function () {
				$(this).parent().find(".form-control").css("border-color", "");
				$(this).remove();
			});

			_form.find(".form-control").each(function () {
				$(this).val("");
			});

			/**
			 * TO DO
			 * Handle for select2 reset
			 * **/
			// _form.find('select.modal-select').each(function () {
			// 	$(this).select2('data', {}); // clear out values selected
			// 	$(this).select2({allowClear: true}); // re-init to show default status
			// });

		});
	};

	function imagePreview($form, _isCustomLayout){
		$form.find('.js-image_upload').each(function () {
			var _this = $(this);

			_this.on("change", function () {
				var imageObj = window.URL.createObjectURL(_this[0].files[0]);
				
				if (_isCustomLayout){
					var imgContainer = $form.parent().find(".image-preview");
				}else {
					var imgContainer = _this.parent().find(".image-preview");
				}
				
				// resizing image preview skip for later
				// look the html structure format example in course/create.php page 
				var _imageOptions = imgContainer.data("options");  
				imgContainer.attr("src", imageObj);
			});
		});
	};

	function imageUpload($form){
		$form.find('.js-image_upload').each(function () {
			var _this 		= $(this);
			var _url 		= _this.data('url-upload');
			var _fileImage 	= _this[0].files[0];
			var formData 	= new FormData();
			formData.set('file', _fileImage);
			formData.set('_token', $form._getCsrfToken());

			if (_fileImage){
				$.ajax({
					url: _url,
					data: formData,
					type: "post",
					processData: false,
					contentType: false
				}).done(function(result) {
					// console.log("image upload ke :", _url);
					var obj = $.parseJSON(result);

					if (obj.status == 'success') {
						_this.siblings('input').val(obj.data);
						// console.log("nama file nya :", obj.data);
						// console.log(obj.fileType);
					} else {
						// console.log("tidak terupload karena  :", obj.data);
						// console.log(obj.fileType);
					}

					$form._getCsrfToken(obj.csrf_token);
				});
			}
		});
	}

	function documentUpload($form){
		$form.find('.js-document_upload').each(function () {
			var _this 		= $(this);
			var _url 		= _this.data('url-upload');
			var _fileImage 	= _this[0].files[0];
			var formData 	= new FormData();
			formData.set('file', _fileImage);
			formData.set('_token', $form._getCsrfToken());

			if (_fileImage){
				$.ajax({
					url: _url,
					data: formData,
					type: "post",
					processData: false,
					contentType: false
				}).done(function(result) {
					// console.log("image upload ke :", _url);
					var obj = $.parseJSON(result);

					if (obj.status == 'success') {
						_this.siblings('input').val(obj.data);
						console.log("nama file nya :", obj.data);
						// console.log(obj.fileType);
					} else {
						console.log("tidak terupload karena  :", obj.data);
						// console.log(obj.fileType);
					}

					$form._getCsrfToken(obj.csrf_token);
				});
			}
		});
	}

	function validateForm($form) {
		$form.validate({
			onkeyup: false,
			onfocusout: false,
			ignore: '*:not([name])',
			errorClass: "invalid-feedback",
			errorElement: "p",
			highlight: function(element, errorClass) {
				$(element).removeClass(errorClass);
				$(element).css("border-color", "#dc3545");
			},
			unhighlight: function (element,errorClass) {
				$(element).css("border-color", "");
			},
			errorPlacement: function(error, element) {
				if (element.hasClass('js-input-with-plugin')){
					error.appendTo(element.parent("div").find(".js_input-error-placement"));
				} else if (element.hasClass('js-input-group')){
					error.appendTo(element.parent("div").parent("div").find(".js_input-error-placement"));
				} else {
					error.insertAfter(element);
				}
			},
		});

		$form.find('.js-form_action_btn').on('click', function (event) {
			event.preventDefault();
			var _this = $(this);

			var _imageUpload = $form.find('.js-image_upload');

			if (_imageUpload.length > 0) {
				
				var _actionType = "";

				_this.attr('disabled', true);
				switch (_this.html()) {
					case "Submit":
						_actionType = "submit";
						_this.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...');
						break;
					default:
						_actionType = "update";
						_this.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Updating...');
						break;
				}
				
				console.log("form submit with image upload");
				imageUpload($form);
				documentUpload($form)

				setTimeout(function(){
					_this.attr('disabled', false);
					
					if(_actionType == "update"){
						_this.html("Update")
					} else {
						_this.html("Submit")
					}
					
					if ($form.valid()){
						$form.submit();
					}
				}, 3000);

			} else {
				if ($form.valid()) {
					$form.submit();
				}
			}
		});
	};

	function copyToClipboard(_target) {
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val(_target).select();
		document.execCommand("copy");
		$temp.remove();
		Lobibox.notify("success", {
			pauseDelayOnHover: true,
			continueDelayOnInactiveTab: false,
			position: 'top right',
			msg: 'Kode Referal Telah Disalin',
		});
	}

	var _target	 = $('.js-targeted_copy_value').val();
	var _btnCopy = $('.js-copy_btn');
	if(_btnCopy.length > 0 ){
		_btnCopy.on("click", function () {
			 copyToClipboard(_target);
		});
	}

	/*================================================================
						Page Function
	=================================================================*/

	/**
	 * 
	 *  Member Dashboard Display Course Page
	 * 
	 **/
	var _displayCourseWrapper		= $(".js-display-courses-wrapper");
	var _memberCourseAccordionInit 	= $(".js-accordion-init");
	if(_displayCourseWrapper.length > 0){

		var formData = new FormData();
		formData.set('_token', _displayCourseWrapper._getCsrfToken());

		setTimeout(function(){
			$.ajax({
				url: _displayCourseWrapper.data("url"),
				data: formData,
				type: "post",
				processData: false,
				contentType: false,
				success: function(result) {
					$(".spinner-grow").hide(200);
					var obj = $.parseJSON(result);
					$.each(obj.response, function(key, value){
						var _isShow = "";
						if(value.course_category_id == "1"){
							_isShow = "show";
						}
						_memberCourseAccordionInit.append(`<div class="accordion js-course-card-list" id="accordionExample">
																<div class="accordion-item">
																	<h2 class="accordion-header" id="`+value.course_category_id+`">
																		<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-`+value.course_category_id+`" aria-expanded="true" aria-controls="collapse-`+value.course_category_id+`">
																			`+value.course_category_headline+`
																		</button>
																	</h2>
																	<div id="collapse-`+value.course_category_id+`" class="accordion-collapse collapse `+_isShow+`" aria-labelledby="heading`+value.course_category_id+`" data-bs-parent="#accordionExample">
																		<div class="accordion-body">	
																			<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4 js-courses-list-`+value.course_category_id+`">
																				
																			</div>
																		</div>
																	</div>
																</div>
															</div>`).show(1000);

						if(value.courses.length > 0){
							$.each(value.courses, function(key, course){
								
								var courseDesc = jQuery.trim(course.feducation_course_description).substring(0, 65).trim(this) + "...";

								$(".js-courses-list-"+value.course_category_id).append(`<div class="col">
																							<div class="card">
																								<img src="assets/resources/images/courses/thumbnails/`+course.feducation_course_thumbnail+`" class="card-img-top" alt="feducation card course">
																								<div class="card-body">
																									<div class="course-card-title">
																										<h5 class="card-title">`+course.feducation_course_headline+`</h5>
																									</div>
																									<p class="card-text">`+courseDesc+`</p>  
																									<div class="d-flex align-items-center">
																										<div class="font-15 text-white">
																											<i class="lni lni-play"></i>
																										</div>
																										<div class="ms-2 me-3"><span>`+course.feducation_course_total_modul+` Videos</span></div>

																										<div class="font-15 text-white">
																											<i class="lni lni-notepad"></i>
																										</div>
																										<div class="ms-1"><span>`+course.feducation_course_total_modul+` Modul</span></div>
																									</div>

																									<div class="d-flex align-items-center">
																										<div class="font-15 text-white">
																											<i class="lni lni-alarm-clock"></i>
																										</div>
																										<div class="ms-2"><span>`+course.feducation_course_duration+` Menit</span></div>
																									</div>		
																									<a href="`+course_url+course.feducation_course_slug+`" class="btn btn-light mt-2">Masuk Kelas</a>
																								</div>
																							</div>
																						</div>`);
							});
						} else{
							$(".js-courses-list-"+value.course_category_id).html(`<div role="status" style="justify-content: center">No Availabel Course</div>`);
						}
					});


					_displayCourseWrapper._getCsrfToken(obj.csrf_token);

				}, error: (error) => {
					console.log(JSON.stringify(error));
				}
			});
		}, 2500);
	}

	/**
	 * 
	 *  Member Dashboard Filter Course Control
	 * 
	 **/
	var _formFilterCourse	= $('.js-form-filter-course');
	if(_formFilterCourse.length > 0 ){	
		_formFilterCourse.find(".js-form-filter-course-submit").on("click", function(){
			var _dataUrl 			= _formFilterCourse.data("url");			
			var formData 			= new FormData();
			var _selectedCategories = [];
			var _selectedSort		= $('input[name="filterByOrder"]:checked').val();

			//get checked categories
			_formFilterCourse.find('input[name="filterByCategory"]:checked').each(function(){
				var categoryId = $(this).val();
				_selectedCategories.push(categoryId);
			});			

			formData.set('filterByHeadline', _formFilterCourse.find('input[name="filterByHeadline"]').val());
			formData.set('filterByCategory', _selectedCategories);
			formData.set('filterBySort', _selectedSort ? _selectedSort : "");
			formData.set('filterByMinDuration', _formFilterCourse.find('input[name="filterByMinDuration"]').val());
			formData.set('filterByMaxDuration', _formFilterCourse.find('input[name="filterByMaxDuration"]').val());
			formData.set('filterByMinPrice', _formFilterCourse.find('input[name="filterByMinPrice"]').val());
			formData.set('filterByMaxPrice', _formFilterCourse.find('input[name="filterByMaxPrice"]').val());
			formData.set('_token', _displayCourseWrapper._getCsrfToken());

			_memberCourseAccordionInit.html(`<div class="spinner-grow" role="status" style="margin-left: 50%; margin-top: 5%; margin-bottom: 5%;"></div>`);
			
			setTimeout(function(){
				$.ajax({
					url: _dataUrl,
					data: formData,
					type: "post",
					processData: false,
					contentType: false,
					success: function(result) {
						$(".spinner-grow").hide(200);
						var obj = $.parseJSON(result);
						console.log("json response: ", obj.response);
						// $.each(obj.response, function(key, value){
						// 	var _isShow = "";
						// 	if(value.course_category_id == "1"){
						// 		_isShow = "show";
						// 	}
						// 	_memberCourseAccordionInit.append(`<div class="accordion js-course-card-list" id="accordionExample">
						// 											<div class="accordion-item">
						// 												<h2 class="accordion-header" id="`+value.course_category_id+`">
						// 													<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-`+value.course_category_id+`" aria-expanded="true" aria-controls="collapse-`+value.course_category_id+`">
						// 														`+value.course_category_headline+`
						// 													</button>
						// 												</h2>
						// 												<div id="collapse-`+value.course_category_id+`" class="accordion-collapse collapse `+_isShow+`" aria-labelledby="heading`+value.course_category_id+`" data-bs-parent="#accordionExample">
						// 													<div class="accordion-body">	
						// 														<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4 js-courses-list-`+value.course_category_id+`">
																					
						// 														</div>
						// 													</div>
						// 												</div>
						// 											</div>
						// 										</div>`).show(1000);
	
						// 	if(value.courses.length > 0){
						// 		$.each(value.courses, function(key, course){
									
						// 			var courseDesc = jQuery.trim(course.feducation_course_description).substring(0, 65).trim(this) + "...";
	
						// 			$(".js-courses-list-"+value.course_category_id).append(`<div class="col">
						// 																		<div class="card">
						// 																			<img src="assets/resources/images/courses/thumbnails/`+course.feducation_course_thumbnail+`" class="card-img-top" alt="feducation card course">
						// 																			<div class="card-body">
						// 																				<div class="course-card-title">
						// 																					<h5 class="card-title">`+course.feducation_course_headline+`</h5>
						// 																				</div>
						// 																				<p class="card-text">`+courseDesc+`</p>  
						// 																				<div class="d-flex align-items-center">
						// 																					<div class="font-15 text-white">
						// 																						<i class="lni lni-play"></i>
						// 																					</div>
						// 																					<div class="ms-2 me-3"><span>`+course.feducation_course_total_modul+` Videos</span></div>
	
						// 																					<div class="font-15 text-white">
						// 																						<i class="lni lni-notepad"></i>
						// 																					</div>
						// 																					<div class="ms-1"><span>`+course.feducation_course_total_modul+` Modul</span></div>
						// 																				</div>
	
						// 																				<div class="d-flex align-items-center">
						// 																					<div class="font-15 text-white">
						// 																						<i class="lni lni-alarm-clock"></i>
						// 																					</div>
						// 																					<div class="ms-2"><span>`+course.feducation_course_duration+` Menit</span></div>
						// 																				</div>		
						// 																				<a href="`+course_url+course.feducation_course_slug+`" class="btn btn-light mt-2">Masuk Kelas</a>
						// 																			</div>
						// 																		</div>
						// 																	</div>`);
						// 		});
						// 	} else{
						// 		$(".js-courses-list-"+value.course_category_id).html(`<div role="status" style="justify-content: center">No Availabel Course</div>`);
						// 	}
						// });


						_displayCourseWrapper._getCsrfToken(obj.csrf_token);
	
					}, error: (error) => {
						console.log("Server Response: ", JSON.stringify(error));
					}
				});
			}, 2500);
		});

	}

	/**
	 * 
	 *  Member Dashboard Watch Course
	 * 
	 **/
	var _displayMoreLessModulDesc	= $(".js-course-modul-description");
	if(_displayMoreLessModulDesc.length > 0){

		new PerfectScrollbar('.product-list')

		var showChar 		= 100;
		var ellipsestext 	= "...";
		var moretext 		= "Show more >";
		var lesstext 		= "Show less";

		$('.more').siblings('p').each(function() {
			var _this	= $(this);
			var content = _this.html();
	  
			if(content.length > showChar) {
				var c = content.substr(0, showChar);
				var h = content.substr(showChar, content.length - showChar);
				var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a class="morelink">' + moretext + '</a></span>';
				$(this).html(html);
			}
		 });
	  
		$(".morelink").on("click", function(){
			var _this	= $(this);
			if(_this.hasClass("less")) {
				_this.removeClass("less");
				_this.html(moretext);
			} else {
				_this.addClass("less");
				_this.html(lesstext);
			}
			_this.parent().prev().toggle();
			_this.prev().toggle();
			return false;
		});
	}

	/**
	 * 
	 *  Member Dashboard Related Courses
	 * 
	 **/
	var _displayRelatedCourse	= $(".js-related-course");
	var _courseListWrapper		= $(".js-courses-list-wrapper");
	if(_displayRelatedCourse.length > 0){
		var _dataUrl	= _displayRelatedCourse.data("url");
		var formData 	= new FormData();	
		formData.set('relatedType', _displayRelatedCourse.data("related-type"));
		formData.set('relatedId', _displayRelatedCourse.data("related-id"));
		formData.set('_token', _displayRelatedCourse._getCsrfToken());
		
		if(_displayRelatedCourse.data("related-type") == "categories"){
			formData.set('exceptId', _displayRelatedCourse.data("except-id"));
		}

		$.ajax({
			url: _dataUrl,
			data: formData,
			type: "post",
			processData: false,
			contentType: false,
			success: function(result) {
				var obj = $.parseJSON(result);
				if(obj.response.length > 0){
					$.each(obj.response, function(key, course){
						var courseDesc = jQuery.trim(course.feducation_course_description).substring(0, 65).trim(this) + "...";
						_courseListWrapper.append(`<div class="col">
													<div class="card">
														<img src="`+base_url+`assets/resources/images/courses/thumbnails/`+course.feducation_course_thumbnail+`" class="card-img-top" alt="feducation card course">
														<div class="card-body">
															<div class="course-card-title mb-1">
																<h5 class="card-title">`+course.feducation_course_headline+`</h5>
															</div>
															<p class="card-text">`+courseDesc+`</p>  
															<div class="d-flex align-items-center">
																<div class="font-15 text-white">
																	<i class="lni lni-play"></i>
																</div>
																<div class="ms-2 me-3"><span>`+course.feducation_course_total_modul+` Videos</span></div>

																<div class="font-15 text-white">
																	<i class="lni lni-notepad"></i>
																</div>
																<div class="ms-1"><span>`+course.feducation_course_total_modul+` Modul</span></div>
															</div>

															<div class="d-flex align-items-center">
																<div class="font-15 text-white">
																	<i class="lni lni-alarm-clock"></i>
																</div>
																<div class="ms-2"><span>`+course.feducation_course_duration+` Menit</span></div>
															</div>		
															<a href="`+course_url+course.feducation_course_slug+`" class="btn btn-light mt-2">Masuk Kelas</a>
														</div>
													</div>
												</div>`);
					});
				} else{
					_courseListWrapper.html(`<div role="status" style="justify-content: center">No Availabel Course</div>`);
				}
				_displayRelatedCourse._getCsrfToken(obj.csrf_token);

			}, error: (error) => {
				console.log(JSON.stringify(error));
			}
		});

	}

	/**
	 * 
	 *  Member Dashboard Course Add to Playlists
	 * 
	 **/
	var _playlistButtonControl = $('.js-playlist-button-control');
	var _courseModulViewWrapper= $(".js-related-course");
	if(_playlistButtonControl.length > 0){
		_playlistButtonControl.each(function(key, course){
			var _this			= $(this);
			var _courseId		= _this.data("course-id");
			var _dataUrl		= _this.data("url");
			var _selectedCourse	= $("#js-spinner-btn-"+_courseId);
			var _playlistBtnContent	= $('#js-btn-playlist-content');
			
			// change the course playlist button status
			_this.on("click", function(){

				_selectedCourse.attr("class", "").addClass("spinner-border spinner-border-sm");

				// prevent expired token from the same page
				setTimeout(function(){
					var _controlBtnStatus	= $('input[name="course_btn_status"]');
					var formData 			= new FormData();	
					formData.set('courseId', _courseId);
					formData.set('controlBtnStatus', _controlBtnStatus.val());
					formData.set('_token', _courseModulViewWrapper._getCsrfToken());

					$.ajax({
						url: _dataUrl,
						data: formData,
						type: "post",
						processData: false,
						contentType: false,
						success: function(result) {
							var obj = $.parseJSON(result);
							if(obj.response.length > 0){
								if(_controlBtnStatus.val() == "1"){
									_playlistButtonControl.removeClass('btn-light').addClass('btn-warning');
									_selectedCourse.attr("class", "").addClass("bx bxs-bookmark-plus");
									_controlBtnStatus.val("0");

									// diff betwen course overview and playlist page
									if(_playlistBtnContent){
										_playlistBtnContent.html('Tambahkan ke Playlist');
									}

								} else {
									_playlistButtonControl.removeClass('btn-warning').addClass('btn-light');
									_selectedCourse.attr("class", "").addClass("bx bxs-bookmark-minus");
									_controlBtnStatus.val("1");

									// diff betwen course overview and playlist page
									if(_playlistBtnContent){
										_playlistBtnContent.html('Hapus dari Playlist');
									}

									// hide course card on playlist page 
									if($("#course-card-"+_courseId)){
										$("#course-card-"+_courseId).fadeOut(400, function() {
											$(this).remove().fadeIn(400);
										});
										
										if($('.js-display-course-card').length === 1){		
											$(".js-member-course-playlists").fadeOut(500, function() {
												$(this).append(`<p>Your Playlist is Empty</p>`).fadeIn(500);
											});					
										} 
									}

								}
							} else {
								console.log("Action Failed");
							}
	
							_courseModulViewWrapper._getCsrfToken(obj.csrf_token);
						
						}, error: (jqXHR, textStatus, errorThrown) => {
							// console.log(JSON.stringify(error));
							console.log('ERRORS: ' + textStatus + ' - ' + errorThrown );
						}
					});
				},500);
			});
		})		
	}

	/**
	 * 
	 *  Member Withdrawal Page
	 * 
	 **/
	var _createWithdrawalModal = $('#memberCreateWithdrawalModal');
	var _formMemberWithdrawal = $('.js-form_register-withdrawal');
	if (_createWithdrawalModal.length > 0){
		_createWithdrawalModal.on('shown.bs.modal', function (e) {
			var _wdAmmountStatus 	= false;
			var _wdMinimumAmmount	= false;

			$(".modal-select").select2({
				theme: "bootstrap4",
				width: $(this).data("width") ? $(this).data("width") : $(this).hasClass("w-100") ? "100%" : "style",
				placeholder: $(this).data("placeholder"),
				allowClear: Boolean($(this).data("allow-clear")),
				dropdownParent: _createWithdrawalModal
			});

			function wdAmmountValidation(){
				var _url 			= _formMemberWithdrawal.data("url");
				var _wdInputAmmount	= _formMemberWithdrawal.find('input[name="wd_amount_input"]').val();
				var formData 		= new FormData();
				formData.set('wdInputAmmount', _wdInputAmmount);
				formData.set('_token', _formMemberWithdrawal._getCsrfToken());
	
				$.ajax({
					url: _url,
					data: formData,
					type: "post",
					processData: false,
					contentType: false
				}).done(function(result) {
					var obj = $.parseJSON(result);

					_wdAmmountStatus 	= obj.data["balanceValidate"];
					_wdMinimumAmmount	= obj.data["minimumAmmountValidate"];
					
					_formMemberWithdrawal._getCsrfToken(obj.csrf_token);
				});
			}

			var _selectMemberBankInfo = _formMemberWithdrawal.find('.js-select-member-account');
			_selectMemberBankInfo.on('change', function () {
				var _this = $(this);
				var _url = _this.data('url');
				$.ajax({
					url:_url,
					method:'POST',
					data : {'selectValue' : _this.val(), '_token' : _formMemberWithdrawal._getCsrfToken()},
					success: function(result) {
						var obj = $.parseJSON(result);
						$.each(obj.response, function(key, value){
							_formMemberWithdrawal.find(".js-payment-bank-name").html(value.nama_bank);
							_formMemberWithdrawal.find(".js-payment-bank-number").html(value.nomor_rekening);
							_formMemberWithdrawal.find(".js-payment-bank-recipient").html(value.pemilik_rekening);
						});

						_formMemberWithdrawal._getCsrfToken(obj.csrf_token);

					}, error: (error) => {
						console.log(JSON.stringify(error));
					}
				});
			});


			validateForm(_formMemberWithdrawal);

			$('.js-form_action_btn').on("click", function () {
				var _this = $(this);
				var actionType = _this.html();
				if (actionType == 'Submit'){
					wdAmmountValidation();
				}
			});


			_formMemberWithdrawal.find('input[name="wd_amount_input"]').rules( "add", {
				required : true,
				wdMininumAmmount:true,
				wdAmmountIsValidate: true,
				messages: {
					required: "Nominal WD tidak boleh kosong",
					wdMininumAmmount:"Minimal WD Rp. 100.000",
					wdAmmountIsValidate: "Saldo Anda Tidak Cukup"
				}
			});


			$(".js-select-member-account").rules("add", {
				required : true,
				messages: {
					required: "Payment Gateway Tidak Boleh Kosong"
				}
			});
	
			$.validator.addMethod("wdMininumAmmount", function() {
				if (_wdMinimumAmmount) {
					return true;
				} else {
					return false;
				}
	
			});

			$.validator.addMethod("wdAmmountIsValidate", function() {
				if (_wdAmmountStatus) {
					return true;
				} else {
					return false;
				}
	
			});
		});

		_createWithdrawalModal.modalClose();
	}
	
	/**
	 * 
	 *  Member Bank Info Page
	 * 
	 **/
	var _memberEditBankAccountModal = $('#editMemberBankAccountModal');
	if(_memberEditBankAccountModal.length > 0){
		_memberEditBankAccountModal.on('shown.bs.modal', function(e){
			var _this					= $(this);
			var _dataUrl 				= _this.data('url');
			var _dataBankAccountId		= $(e.relatedTarget).data('id');
			var _formEditMemberBankInfo = _this.find('.js-form-edit-bank-info');
			var formData 				= new FormData();
			formData.set('bankAccountId', _dataBankAccountId);
			formData.set('_token', _formEditMemberBankInfo._getCsrfToken());

			_this.find('input[name="member_bank_account_id"]').val(_dataBankAccountId);
		
			$.ajax({
				url: _dataUrl,
				data: formData,
				type: "post",
				processData: false,
				contentType: false
			}).done(function(result) {
				var obj = $.parseJSON(result);

				if (obj.status == 'success') {
					_this.find('input[name="nama_bank"]').val(obj.data["nama_bank"]);
					_this.find('input[name="pemilik_rekening"]').val(obj.data["pemilik_rekening"]);
					_this.find('input[name="nomor_rekening"]').val(obj.data["nomor_rekening"]);
				}

				_formEditMemberBankInfo._getCsrfToken(obj.csrf_token);

			}).fail(function (error, abc, dfg) {
				console.log("something went wrong : ", error);
			});


			validateForm(_formEditMemberBankInfo);
		});

		_memberEditBankAccountModal.modalClose();
	}
	
	/**
	 * 
	 *  Member Profile Page
	 * 
	 **/
	var _formMemberProfile = $('.js-form-user-account');
	if (_formMemberProfile.length > 0){

		_formMemberProfile.find(".js-member-profile-edit-btn").on("click", function () {
			var _this 		= $(this);
			var _getInputs	= _formMemberProfile.find(".js-member-input-profile");
			var _saveBtn 	= _formMemberProfile.find(".js_member-profile-btn-save");

			if (_this.hasClass("active")){
				_this.removeClass("active");
				_this.html("Edit Off");
				_getInputs.attr("readonly", true);
				_getInputs.attr("disabled", true);
				_saveBtn.attr("hidden", true);
				_saveBtn.attr("disabled", true);
			} else {
				_this.addClass("active");
				_this.html("Edit On");
				_getInputs.removeAttr("readonly");
				_getInputs.removeAttr("disabled");
				_saveBtn.removeAttr("hidden");
				_saveBtn.removeAttr("disabled");

			}
		});

		_formMemberProfile.find(".js-member-profile-upload").on("click", function () {
			$("input[type='file']").trigger('click');
		});

		_formMemberProfile.find('input[type="file"]').on('change', function() {
			var _this 		= $(this);
			var _url 		= _formMemberProfile.data('url');
			var _fileImage 	= _this[0].files[0];
			var formData 	= new FormData();
			formData.set('file', _fileImage);
			formData.set('memberId', _this.data("member-id"));
			formData.set('_token', _formMemberProfile._getCsrfToken());

			$.ajax({
				url: _url,
				data: formData,
				type: "post",
				processData: false,
				contentType: false
			}).done(function(result) {
				var obj = $.parseJSON(result);
				if (obj.status == 'success') {
					location.reload();
				} else {
					console.log("data error", obj.data);
				}
				_formMemberProfile._getCsrfToken(obj.csrf_token);
			});
		})
	};

})(jQuery);