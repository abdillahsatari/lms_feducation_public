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
	 *  Admin Courses Index Page
	 * 
	 **/

	var _courseTypeContent = $(".js-course_type_content");
	if(_courseTypeContent.length > 0){
		var dataTypeId 				= _courseTypeContent.data("type-id");
		var _courseTypeContentChild = _courseTypeContent.find(".js-course-type-content-child");
		
		if(dataTypeId == "" ){
			_courseTypeContentChild.first().addClass("active");	
		} else {
			_courseTypeContentChild.each(function(){
				var _this 		= $(this);
				var dataChildId = _this.data("child-id");
				
				if(dataChildId == dataTypeId){
					_this.addClass("active");
				} 
			});
		}
	}

	var _createCourseModulModal = $('#createCourseModulModal');
	if (_createCourseModulModal.length > 0){

		_createCourseModulModal.on('shown.bs.modal', function (e) {

			var _proceedButton			= $("#js-proceed-btn");
			var _selectCourseCategories = $("#selectCourseCategories");
			var _selectTargetedCourse 	= $("#selectTargetedCourse");
			
			$(".modal-select").select2({
				theme: "bootstrap4",
				width: $(this).data("width") ? $(this).data("width") : $(this).hasClass("w-100") ? "100%" : "style",
				placeholder: $(this).data("placeholder"),
				allowClear: Boolean($(this).data("allow-clear")),
				dropdownParent: _createCourseModulModal
			});

			_selectCourseCategories.on("change", function(e){
				var _this			= $(this);
				var _dataUrl 		= _this.data('url');
				var _categoryId 	= _this.val();
				var formData 		= new FormData();
				formData.set('categoryId', _categoryId);
				formData.set('_token', _createCourseModulModal._getCsrfToken());
		
				_selectTargetedCourse.html('');
		
				$.ajax({
					url: _dataUrl,
					data: formData,
					type: "post",
					processData: false,
					contentType: false
				}).done(function(result) {
					var obj = $.parseJSON(result);
		
					if (obj.status == 'success') {
						var _dataFeducationCourses = obj.data;
						_selectTargetedCourse.append(`<option value="0" disabled selected>-- Pilih Kelas --</option>`);
						jQuery.each(_dataFeducationCourses, function( _key, _value){
							_selectTargetedCourse.append(`<option value="`+_value["fc_id"]+`" data-id="`+_value["fc_id"]+`" >`+_value["course_headline"]+`</option>`);
						});
					} else {
						_selectTargetedCourse.append(`<option value="0" disabled selected>-- No Availabel Course --</option>`);
						_proceedButton.addClass("isDisabled");
					}
		
					_createCourseModulModal._getCsrfToken(obj.csrf_token);
				});
		
			});

			_selectTargetedCourse.on("change", function(){
				var _this			= $(this);
				var _dataUrl 		= _proceedButton.data('url')+_this.val()+"/moduls";
				
				_proceedButton.removeClass("isDisabled");
				_proceedButton.prop("href", _dataUrl);

				// console.log("on change selected id: ", _this.val());
				// console.log("data url", _dataUrl);
			});
		});

		_createCourseModulModal.modalClose();
	}

	/**
	 *  Admin Course Create Page
	 **/

	var _formCreateCourse = $('.js-form_admin-course');
	if (_formCreateCourse.length > 0) {
		
		var _courseHeadline			= $('.js-course-create-headline');
		var _courseSlug				= $('.js-course-create-slug');
		var _courseSlugIsValidate 	= true;

		function slugValidation(){
			var _url 			= _courseSlug.data("url");
			var _courseSlugVal	= _courseSlug.val();
			var formData 		= new FormData();
			formData.set('courseSlug', _courseSlugVal);
			formData.set('_token', _formCreateCourse._getCsrfToken());

			$.ajax({
				url: _url,
				data: formData,
				type: "post",
				processData: false,
				contentType: false
			}).done(function(result) {
				var obj = $.parseJSON(result);
				(obj.data > 0) ? _courseSlugIsValidate = false : _courseSlugIsValidate = true ;
				_formCreateCourse._getCsrfToken(obj.csrf_token);
			});
		}

		_courseHeadline.on('keyup', function () {
			var _this = $(this);
			var trimmed = $.trim(_this.val());
			var _slug = trimmed.replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
			var code = _slug.toLowerCase();

			_courseSlug.val(code);
		});

		// do validation only when the first time or when article creation not the edit mode
		$('.js-form_action_btn').on("click", function () {
			var _this = $(this);
			var actionType = _this.html();
			if (actionType == 'Submit'){
				slugValidation();
			}
		});

		// course intake checkbox control
		$(".js-course-schedule-switch").on("change", function(){
			var _this = $(this);
			if(_this.is(":checked")){
				// console.log("checkbox is unchecked then set to checked");
				_this.prop("checked", true);
				$(".js-course-date").fadeOut(400, function() {
					$(this).html(`<div class="col-lg-6">
										<div class="mb-3">
											<label for="course_start_date" class="form-label">Tgl Mulai</label>
											<input type="datetime-local" class="form-control" id="course_start_date" name="course_start_date" data-rule-required="true" data-msg="Jadwal Mulai Kelas Tidak Boleh Kosong">
											<small><?= form_error('course_start_date')?></small>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="mb-3">
											<label for="course_end_date" class="form-label">Tgl Selesai</label>
											<input type="datetime-local" class="form-control" id="course_end_date" name="course_end_date" data-rule-required="true" data-msg="Jadwal Selesai Kelas Tidak Boleh Kosong">
											<small><?= form_error('course_end_date')?></small>
										</div>
									</div>`).fadeIn(400);
				});
				$(".js-course-held").fadeOut(500, function() {
					$(this).html(`<div class="col-12" id="dynamic-select">
										<label class="mb-1">Kategori Pelaksanaan Kursus</label>
										<select name="is_online_course" class="single-select dynamic-select js-input-with-plugin form-control" id="course-helding" data-rule-required="true" data-msg="Kategori Pelaksanaan Kursus Tidak Boleh Kosong">
											<option value="" disabled selected>-- Pilih Kategori Pelaksanaan Kursus --</option>
											<option value="1">Online</option>
											<option value="0">Offline</option>
										</select>
										<small class="js_input-error-placement"><?= form_error('is_online_course')?></small>
									</div>`).fadeIn(500);
				});

				setTimeout(function(){
					$(".dynamic-select").select2({
						theme: "bootstrap4",
						width: $(this).data("width") ? $(this).data("width") : $(this).hasClass("w-100") ? "100%" : "style",
						placeholder: $(this).data("placeholder"),
						allowClear: Boolean($(this).data("allow-clear")),
					});
				}, 600);
				
				$('input[name="is_on_schedule"]').val('1');
			} else {
				// console.log("checkbox is checked then set to unchecked");
				_this.prop("checked", false);
				$(".js-course-date").fadeOut(400);
				setTimeout(function(){
					$(".js-course-date").html("");
				}, 500);
				$(".js-course-held").fadeOut(500);
				setTimeout(function(){
					$(".js-course-held").html("");
				}, 600);

				$('input[name="is_on_schedule"]').val('0');
			}
		});

		imagePreview(_formCreateCourse, false);
		validateForm(_formCreateCourse);

		_courseSlug.rules( "add", {
			slugIsValidate: true,
			messages: {
				slugIsValidate: "Slug ini sudah digunakan"
			}
		});

		$.validator.addMethod("slugIsValidate", function() {
			if (_courseSlugIsValidate) {
				return true;
			} else {
				return false;
			}

		});
	};

	/**
	 *  Admin Course Modul Create Page
	 **/

	var _formCreateCourseModul = $('.js-form_admin-course-modul');
	if (_formCreateCourseModul.length > 0) {
		imagePreview(_formCreateCourseModul, false);
		validateForm(_formCreateCourseModul);
	};

	/**
	 *
	 * Admin Course Categories Page
	 *
	 **/
	var _createCourseCategoriesModal = $('#createCourseCategoriModal');
	if (_createCourseCategoriesModal.length > 0){
		_createCourseCategoriesModal.on('shown.bs.modal', function (e) {
			$(".modal-select").select2({
				theme: "bootstrap4",
				width: $(this).data("width") ? $(this).data("width") : $(this).hasClass("w-100") ? "100%" : "style",
				placeholder: $(this).data("placeholder"),
				allowClear: Boolean($(this).data("allow-clear")),
				dropdownParent: _createCourseCategoriesModal
			});
			validateForm(_createCourseCategoriesModal.find('.js-form_course_category'));
		});

		_createCourseCategoriesModal.modalClose();
	}

	var _editCourseCategoriesModal = $('#editCourseCategoriModal');
	if (_editCourseCategoriesModal.length > 0) {
		_editCourseCategoriesModal.on('shown.bs.modal', function (e) {
			var _this						= $(this);
			var _dataUrl 					= _this.data('url');
			var _dataCourseCategoryId		= $(e.relatedTarget).data('id');
			var _formEditCourseCategory 	= _this.find('.js-form_course_category');
			var formData 					= new FormData();
			formData.set('dataCourseCategoryId', _dataCourseCategoryId);
			formData.set('_token', _formEditCourseCategory._getCsrfToken());

			_this.find('input[name="course_category_id"]').val(_dataCourseCategoryId);

			$(".modal-select").select2({
				theme: "bootstrap4",
				width: $(this).data("width") ? $(this).data("width") : $(this).hasClass("w-100") ? "100%" : "style",
				placeholder: $(this).data("placeholder"),
				allowClear: Boolean($(this).data("allow-clear")),
				dropdownParent: _editCourseCategoriesModal,
			});

			$.ajax({
				url: _dataUrl,
				data: formData,
				type: "post",
				processData: false,
				contentType: false
			}).done(function(result) {
				var obj = $.parseJSON(result);

				if (obj.status == 'success') {
					_this.find('input[name="course_category_headline"]').val(obj.data["course_category_headline"]);
					$(".modal-select").select2('val', obj.data["course_category_status"]);
				}

				_formEditCourseCategory._getCsrfToken(obj.csrf_token);

			}).fail(function (error, abc, dfg) {
				console.log("error msg : ", error);
			});

			validateForm(_formEditCourseCategory);
		});

		_editCourseCategoriesModal.modalClose();
	}

	/**
	 *
	 * Admin Course Type Page
	 *
	 **/
	var _createCourseTypesModal = $('#createCourseTypesModal');
	if (_createCourseTypesModal.length > 0){
		_createCourseTypesModal.on('shown.bs.modal', function (e) {
			$(".modal-select").select2({
				theme: "bootstrap4",
				width: $(this).data("width") ? $(this).data("width") : $(this).hasClass("w-100") ? "100%" : "style",
				placeholder: $(this).data("placeholder"),
				allowClear: Boolean($(this).data("allow-clear")),
				dropdownParent: _createCourseTypesModal
			});
			validateForm(_createCourseTypesModal.find('.js-form_course_type'));
		});

		_createCourseTypesModal.modalClose();
	}

	var _editCourseTypesModal = $('#editCourseTypeModal');
	if (_editCourseTypesModal.length > 0) {
		_editCourseTypesModal.on('shown.bs.modal', function (e) {
			var _this						= $(this);
			var _dataUrl 					= _this.data('url');
			var _dataCourseTypeId			= $(e.relatedTarget).data('id');
			var _formEditCourseType 		= _this.find('.js-form_course_type');
			var formData 					= new FormData();
			formData.set('dataCourseTypeId', _dataCourseTypeId);
			formData.set('_token', _formEditCourseType._getCsrfToken());

			_this.find('input[name="course_type_id"]').val(_dataCourseTypeId);

			$(".modal-select").select2({
				theme: "bootstrap4",
				width: $(this).data("width") ? $(this).data("width") : $(this).hasClass("w-100") ? "100%" : "style",
				placeholder: $(this).data("placeholder"),
				allowClear: Boolean($(this).data("allow-clear")),
				dropdownParent: _editCourseTypesModal,
			});

			$.ajax({
				url: _dataUrl,
				data: formData,
				type: "post",
				processData: false,
				contentType: false
			}).done(function(result) {
				var obj = $.parseJSON(result);

				if (obj.status == 'success') {
					_this.find('input[name="course_type_headline"]').val(obj.data["course_type_headline"]);
					$("#select-course-type-status").select2('val', obj.data["course_type_status"]);
					$("#select-course-intake-status").select2('val', obj.data["course_type_has_schedule"]);
				}

				_formEditCourseType._getCsrfToken(obj.csrf_token);

			}).fail(function (error, abc, dfg) {
				console.log("error msg : ", error);
			});

			validateForm(_formEditCourseType);
		});

		_editCourseTypesModal.modalClose();
	}

	/**
	 *
	 *  Admin Course Tutor
	 *
	 * **/
	var _formAddCourseTutor = $('.js-form_add-course_tutor');
	if (_formAddCourseTutor.length > 0){
		imagePreview(_formAddCourseTutor, true);
		validateForm(_formAddCourseTutor);
	}


	/**
	 * / Admin Highlighted Course Page
	 **/
	var _formHighlightedCourse = $('.js_admin-highlighted-course');
	if (_formHighlightedCourse.length > 0) {

		var _orderNumber 				= $('#js_course-order-number');
		var _orderedNumberIsValidate 	= true;

		_orderNumber.on('change', function () {
			var _this			= $(this);
			var _url 			= _formHighlightedCourse.data("url");
			var _orderValue		= _this.val();
			var formData 		= new FormData();
			formData.set('ordered_number', _orderValue);
			formData.set('_token', _formHighlightedCourse._getCsrfToken());

			$.ajax({
				url: _url,
				data: formData,
				type: "post",
				processData: false,
				contentType: false
			}).done(function(result) {
				var obj = $.parseJSON(result);
				(obj.data > 0) ? _orderedNumberIsValidate = false : _orderedNumberIsValidate = true ;
				_formHighlightedCourse._getCsrfToken(obj.csrf_token);
			});
		});

		validateForm(_formHighlightedCourse);

		$('#js_course-id').rules("add", {
			required : true,
			messages: {
				required: "Anda Belum Memilih Kursus"
			}
		});

		_orderNumber.rules( "add", {
			required : true,
			orderNumberValidate: true,
			messages: {
				required: "Order Number Tidak Boleh Kosong",
				orderNumberValidate: ""
			}
		});

		$.validator.addMethod("orderNumberValidate", function() {
			if (_orderNumber.val() > 5) {
				Lobibox.notify('error', {
					pauseDelayOnHover: true,
					continueDelayOnInactiveTab: false,
					position: 'top right',
					icon: 'bx bx-x-circle',
					msg: 'Order Number Tidak Boleh Lebih Dari 5'
				});

				return false;
			};

			if (!_orderedNumberIsValidate){
				Lobibox.notify('error', {
					pauseDelayOnHover: true,
					continueDelayOnInactiveTab: false,
					position: 'top right',
					icon: 'bx bx-x-circle',
					msg: 'Order Number Sudah Terpilih'
				});

				return false;
			};

			return true;
		});
	}

	/**
	 * / Admin Registered Course Page
	 **/
	var _formRegisterCourseApproval = $('.js-admin-register-course-approval');
	if (_formRegisterCourseApproval.length > 0){

		var _registerCourseUpdateBtn 	= _formRegisterCourseApproval.find(".js-register-course-update");
		var _statusApproval 			= _formRegisterCourseApproval.data("approvalStatus");

		if (_statusApproval != "Registered"){

			_registerCourseUpdateBtn.each(function (){
				var _this = $(this);

				_this.attr("disabled", true);

				if (_this.hasClass("btn-success")){
					_this.addClass("btn-light").removeClass("btn-success");
				} else {
					_this.addClass("btn-light").removeClass("btn-danger");
				}
			});
		}

		_registerCourseUpdateBtn.on("click", function (){
			var _this 	= $(this);
			var _status	= _this.data("status");
			_formRegisterCourseApproval.find('input[name="feducation_member_course_status"]').val(_status);
			_formRegisterCourseApproval.submit();
		});
	}

	/**
	 * / Admin Course Edit Registration Page
	 **/

	var _formEditCourseRegistration = $('.js-form-edit-course-registration');
	if (_formEditCourseRegistration.length > 0){

		//resend email registration
		$('.js-rer-button').on("click", function () {
			var _this			= $(this);
			var _url 			= _formEditCourseRegistration.data("rer");
			var _registrarId	= $('input[name="registrarId"]').val();
			var formData 		= new FormData();
			formData.set('registrarId', _registrarId);
			formData.set('_token', _formEditCourseRegistration._getCsrfToken());

			$('.js-rer-wrapper').html();
			$('.js-rer-wrapper').html(`<button class="btn btn-warning" type="button" disabled> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending Email...</button>`);

			$.ajax({
				url: _url,
				data: formData,
				type: "post",
				processData: false,
				contentType: false
			}).done(function(result) {
				var obj = $.parseJSON(result);
				_formEditCourseRegistration._getCsrfToken(obj.csrf_token);

				$('.js-rer-wrapper').html();
				$('.js-rer-wrapper').html(`<button type="button" class="btn btn-warning js-rer-button">Resend Registration Email</button>`);

				if (obj.status == "success"){

					$(".js-dynamicElement").hide(500);
					setTimeout(function(){
						Lobibox.notify('success', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							position: 'top right',
							icon: 'bx bx-check-circle',
							msg: 'Email Registration has been sent succesfully'
						});
					}, 800);

				} else {
					setTimeout(function(){
						Lobibox.notify('error', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							position: 'top right',
							icon: 'bx bx-x-circle',
							msg: 'Sending Email Registration Failed. Please Contact Your Administrator.'
						});
					}, 800);
				}

			});

		});

		// show hide email acceptance email
		$('.js-updateRegisterStatus').on("change", function () {
			$(this).find("option:selected").each(function(){
				var optionValue = $(this).attr("value");
				if(optionValue == "Terjadwal"){
					$('.js-dynamicElement-sae').show(500);
				} else{
					$(".js-dynamicElement-sae").hide(500);
				}
			});
		});

		//send acceptance email
		$('.js-sae-button').on("click", function () {
			var _this			= $(this);
			var _url 			= _formEditCourseRegistration.data("sae");
			var _registrarId	= $('input[name="registrarId"]').val();
			var formData 		= new FormData();
			formData.set('registrarId', _registrarId);
			formData.set('_token', _formEditCourseRegistration._getCsrfToken());

			$('.js-sae-wrapper').html();
			$('.js-sae-wrapper').html(`<button class="btn btn-primary" type="button" disabled> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending Email...</button>`);

			$.ajax({
				url: _url,
				data: formData,
				type: "post",
				processData: false,
				contentType: false
			}).done(function(result) {
				var obj = $.parseJSON(result);
				_formEditCourseRegistration._getCsrfToken(obj.csrf_token);

				if (obj.status == "success"){

					$('.js-sae-wrapper').html();
					$('.js-sae-wrapper').html(`<button type="button" class="btn btn-primary js-rer-button">Send Acceptance Email</button>`);

					$(".js-dynamicElement-sae").hide(500);
					setTimeout(function(){
						Lobibox.notify('success', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							position: 'top right',
							icon: 'bx bx-check-circle',
							msg: 'Email Payment Confirmation has been sent succesfully'
						});
					}, 800);

				} else {

					$('.js-sae-wrapper').html();
					$('.js-sae-wrapper').html(`<button type="button" class="btn btn-primary js-rer-button">Resend Acceptance Email</button>`);

					setTimeout(function(){
						Lobibox.notify('error', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							position: 'top right',
							icon: 'bx bx-x-circle',
							msg: 'Sending Email Payment Confirmation Failed. Please Contact Your Administrator and Try Again.'
						});
					}, 800);
				}

			});

		});

		// post payment receipt
		imagePreview(_formEditCourseRegistration, true);
		validateForm(_formEditCourseRegistration);

	}

	/**
	 * / Admin Course Edit Registration Page
	 **/

	var _formEditLmsRegistration = $('.js-form-edit-member-lms-registration');
	if (_formEditLmsRegistration.length > 0){

		//resend email registration
		$('.js-rlr-button').on("click", function () {
			var _this			= $(this);
			var _url 			= _formEditLmsRegistration.data("rlr");
			var _registrarId	= $('input[name="registrarId"]').val();
			var formData 		= new FormData();
			formData.set('registrarId', _registrarId);
			formData.set('_token', _formEditLmsRegistration._getCsrfToken());

			$('.js-rlr-button').html();
			$('.js-rlr-button').html(`<button class="btn btn-warning" type="button" disabled> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending Email...</button>`);

			$.ajax({
				url: _url,
				data: formData,
				type: "post",
				processData: false,
				contentType: false
			}).done(function(result) {
				var obj = $.parseJSON(result);
				_formEditLmsRegistration._getCsrfToken(obj.csrf_token);

				$('.js-rlr-button').html();
				$('.js-rlr-button').html(`<button type="button" class="btn btn-warning js-rlr-button">Resend Registration Email</button>`);

				if (obj.status == "success"){

					$(".js-dynamicElement").hide(500);
					setTimeout(function(){
						Lobibox.notify('success', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							position: 'top right',
							icon: 'bx bx-check-circle',
							msg: 'LMS Activation Email has been send succesfully'
						});
					}, 800);

				} else {
					setTimeout(function(){
						Lobibox.notify('error', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							position: 'top right',
							icon: 'bx bx-x-circle',
							msg: 'LMS Activation Email Failed to Send. Please Contact Your Administrator.'
						});
					}, 800);

					console.log("something went wrong: ", obj.errors);
				}

			}).fail(function (jqXHR, exception) {
				console.log("something went wrong :(");
			});

		});

		// show hide email acceptance email
		$('.js-updateRegisterStatus').on("change", function () {
			$(this).find("option:selected").each(function(){
				var optionValue = $(this).attr("value");
				if(optionValue == "1"){
					$('.js-dynamicElement-sae').show(500);
				} else{
					$(".js-dynamicElement-sae").hide(500);
				}
			});
		});

		//send acceptance email
		$('.js-sae-button').on("click", function () {
			var _this			= $(this);
			var _url 			= _formEditLmsRegistration.data("sae");
			var _registrarId	= $('input[name="registrarId"]').val();
			var formData 		= new FormData();
			formData.set('registrarId', _registrarId);
			formData.set('_token', _formEditLmsRegistration._getCsrfToken());

			$('.js-sae-wrapper').html();
			$('.js-sae-wrapper').html(`<button class="btn btn-primary" type="button" disabled> <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending Email...</button>`);

			$.ajax({
				url: _url,
				data: formData,
				type: "post",
				processData: false,
				contentType: false
			}).done(function(result) {
				var obj = $.parseJSON(result);
				_formEditLmsRegistration._getCsrfToken(obj.csrf_token);

				if (obj.status == "success"){

					$('.js-sae-wrapper').html();
					$('.js-sae-wrapper').html(`<button type="button" class="btn btn-primary js-rlr-button">Send Acceptance Email</button>`);

					$(".js-dynamicElement-sae").hide(500);
					setTimeout(function(){
						Lobibox.notify('success', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							position: 'top right',
							icon: 'bx bx-check-circle',
							msg: 'Email Payment Confirmation has been sent succesfully'
						});
					}, 800);

				} else {

					$('.js-sae-wrapper').html();
					$('.js-sae-wrapper').html(`<button type="button" class="btn btn-primary js-rlr-button">Resend Acceptance Email</button>`);

					setTimeout(function(){
						Lobibox.notify('error', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							position: 'top right',
							icon: 'bx bx-x-circle',
							msg: 'Sending Email Payment Confirmation Failed. Please Contact Your Administrator and Try Again.'
						});
					}, 800);

					console.log("something went wrong: ", obj.errors);
				}

			}).fail(function (jqXHR, exception) {
				console.log("something went wrong :(");
			});

		});

		// post payment receipt
		imagePreview(_formEditLmsRegistration, true);
		validateForm(_formEditLmsRegistration);

	}

	/**
	 *
	 *  Admin Intern
	 *
	 * **/
	var _formAddIntern = $('.js-form_add-intern');
	if (_formAddIntern.length > 0){
		imagePreview(_formAddIntern, true);
		validateForm(_formAddIntern);
	}

	/**
	 *
	 * Admin Fast Response Page
	 *
	 **/
	var _formEditFastResponse = $('.js_fast_response_modal');
	if (_formEditFastResponse.length > 0 ){
		$('#exampleModal').on('shown.bs.modal', function (e) {
			var _this = $(this);
			var _inputStatus = $('input[name="fast_response_status"]');
			var _dataFastResponseId = $(e.relatedTarget).data('id');
			_this.find('input[name="feedback_id"]').val(_dataFastResponseId);

			validateForm(_formEditFastResponse.find('.js-form_fast_response_update'));
			_inputStatus.rules('add', {
				required : true,
				messages: {
					required: "Status Program Fast Response Tidak Boleh Kosong"
				}
			});
		});

		_formEditFastResponse.modalClose();
	}

	/**
	 *
	 *  Admin Mitra
	 *
	 * **/
	var _formAddMitra = $('.js-form_add_mitra');
	if (_formAddMitra.length > 0){
		imagePreview(_formAddMitra, true);
		validateForm(_formAddMitra);
	}

	/**
	 * / Admin Article Form Page
	 **/

	var _formCreateArticle = $('.js_admin-article');
	if (_formCreateArticle.length > 0){
		var _articleHeadline	= $('.js-article-create-headline');
		var _articleSlug		= $('.js-article-create-slug');
		var _articleSlugIsValidate 	= true;

		function slugValidation(){
			var _url 			= _articleSlug.data("url");
			var _articleSlugVal	= _articleSlug.val();
			var formData 		= new FormData();
			formData.set('articleSlug', _articleSlugVal);
			formData.set('_token', _formCreateArticle._getCsrfToken());

			$.ajax({
				url: _url,
				data: formData,
				type: "post",
				processData: false,
				contentType: false
			}).done(function(result) {
				var obj = $.parseJSON(result);
				(obj.data > 0) ? _articleSlugIsValidate = false : _articleSlugIsValidate = true ;
				_formCreateArticle._getCsrfToken(obj.csrf_token);
			});
		}

		_articleHeadline.on('keyup', function () {
			var _this = $(this);
			var trimmed = $.trim(_this.val());
			var _slug = trimmed.replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
			var code = _slug.toLowerCase();

			_articleSlug.val(code);
		});

		// do validation only when the first time or when article creation not the edit mode
		$('.js-form_action_btn').on("click", function () {
			var _this = $(this);
			var actionType = _this.html();
			if (actionType == 'Submit'){
				slugValidation();
			}
		});

		imagePreview(_formCreateArticle, false);
		validateForm(_formCreateArticle);

		_articleSlug.rules( "add", {
			slugIsValidate: true,
			messages: {
				slugIsValidate: "Slug ini sudah digunakan"
			}
		});

		$.validator.addMethod("slugIsValidate", function() {
			if (_articleSlugIsValidate) {
				return true;
			} else {
				return false;
			}

		});
	}

	/**
	 *
	 * Admin Article Categories Page
	 *
	 **/
	var _createArticleCategoriesModal = $('.js-create_category_modal');
	if (_createArticleCategoriesModal.length > 0){
		$('#createArticleCategoriModal').on('shown.bs.modal', function (e) {
			$(".modal-select").select2({
				theme: "bootstrap4",
				width: $(this).data("width") ? $(this).data("width") : $(this).hasClass("w-100") ? "100%" : "style",
				placeholder: $(this).data("placeholder"),
				allowClear: Boolean($(this).data("allow-clear")),
				dropdownParent: $("#createArticleCategoriModal")
			});
			validateForm(_createArticleCategoriesModal.find('.js-form_article_category'));
		});

		_createArticleCategoriesModal.modalClose();
	}

	var _editArticleCategoriesModal = $('.js-edit_category_modal');
	if (_editArticleCategoriesModal.length > 0) {
		$('#editArticleCategoriModal').on('shown.bs.modal', function (e) {
			var _this						= $(this);
			var _dataUrl 					= _this.data('url');
			var _dataArticleCategoryId		= $(e.relatedTarget).data('id');
			var _formEditArticleCategory 	= _this.find('.js-form_article_category');
			var formData 					= new FormData();
			formData.set('dataArticleCategoryId', _dataArticleCategoryId);
			formData.set('_token', _formEditArticleCategory._getCsrfToken());

			_this.find('input[name="article_category_id"]').val(_dataArticleCategoryId);

			$(".modal-select").select2({
				theme: "bootstrap4",
				width: $(this).data("width") ? $(this).data("width") : $(this).hasClass("w-100") ? "100%" : "style",
				placeholder: $(this).data("placeholder"),
				allowClear: Boolean($(this).data("allow-clear")),
				dropdownParent: $("#editArticleCategoriModal"),
			});

			$.ajax({
				url: _dataUrl,
				data: formData,
				type: "post",
				processData: false,
				contentType: false
			}).done(function(result) {
				var obj = $.parseJSON(result);

				if (obj.status == 'success') {
					_this.find('input[name="article_category_headline"]').val(obj.data["article_category_headline"]);
					$(".modal-select").select2('val', obj.data["article_category_status"]);
				}

				_formEditArticleCategory._getCsrfToken(obj.csrf_token);
			}).fail(function (error, abc, dfg) {
				console.log("error msg : ", error);
			});

			validateForm(_formEditArticleCategory);
		});

		_editArticleCategoriesModal.modalClose();
	}

	/**
	 * / Admin Featured Article Form Page
	 **/
	var _formFeaturedArticle = $('.js_admin-featured-article');
	if (_formFeaturedArticle.length > 0) {

		var _orderNumber 				= $('#js_article-order-number');
		var _orderedNumberIsValidate 	= true;

		_orderNumber.on('change', function () {
			var _this			= $(this);
			var _url 			= _formFeaturedArticle.data("url");
			var _orderValue		= _this.val();
			var formData 		= new FormData();
			formData.set('ordered_number', _orderValue);
			formData.set('_token', _formFeaturedArticle._getCsrfToken());

			$.ajax({
				url: _url,
				data: formData,
				type: "post",
				processData: false,
				contentType: false
			}).done(function(result) {
				var obj = $.parseJSON(result);
				(obj.data > 0) ? _orderedNumberIsValidate = false : _orderedNumberIsValidate = true ;
				_formFeaturedArticle._getCsrfToken(obj.csrf_token);
			});
		});

		validateForm(_formFeaturedArticle);

		$('#js_article-id').rules("add", {
			required : true,
			messages: {
				required: "Anda Belum Memilih Article"
			}
		});

		_orderNumber.rules( "add", {
			required : true,
			orderNumberValidate: true,
			messages: {
				required: "Order Number Tidak Boleh Kosong",
				orderNumberValidate: ""
			}
		});

		$.validator.addMethod("orderNumberValidate", function() {
			if (_orderNumber.val() > 5) {
				Lobibox.notify('error', {
					pauseDelayOnHover: true,
					continueDelayOnInactiveTab: false,
					position: 'top right',
					icon: 'bx bx-x-circle',
					msg: 'Order Number Tidak Boleh Lebih Dari 5'
				});

				return false;
			};

			if (!_orderedNumberIsValidate){
				Lobibox.notify('error', {
					pauseDelayOnHover: true,
					continueDelayOnInactiveTab: false,
					position: 'top right',
					icon: 'bx bx-x-circle',
					msg: 'Order Number Sudah Terpilih'
				});

				return false;
			};

			return true;
		});
	}

	/**
	 *
	 * Admin Member Page
	 *
	 **/
	var _formEditMember = $('.js_member_modal');
	if (_formEditMember.length > 0 ){
		$('#exampleModal').on('shown.bs.modal', function (e) {
			var _this = $(this);
			var _inputStatus = $('input[name="member_status"]');
			var _dataMemberId = $(e.relatedTarget).data('id');
			_this.find('input[name="member_id"]').val(_dataMemberId);

			validateForm(_formEditMember.find('.js-form_member_update'));
			_inputStatus.rules('add', {
				required : true,
				messages: {
					required: "Status Member Tidak Boleh Kosong"
				}
			});
		});

		_formEditMember.modalClose();
	}


	/**
	 * / Admin Finance Withdrawal Edit Page
	 **/

	var _formWDApproval = $('.js-admin-withdrawal-approval');
	if (_formWDApproval.length > 0){
		var _wdUpdateBtn 	= _formWDApproval.find(".js-withdrawal-update");

		_wdUpdateBtn.on("click", function (){
			var _this 	= $(this);
			var _status	= _this.data("status");
			_formWDApproval.find('input[name="wd_status"]').val(_status);
			_formWDApproval.submit();
		});

	}

	/**
	* / Admin Benefits
	* */

	var _formCreateBenefits	= $('.js_admin-benefits');
	if (_formCreateBenefits.length > 0){
		var _benefitsStatus		= _formCreateBenefits.find('.single-select');
		var _statusIsValidate 	= true;

		_benefitsStatus.on('change', function () {
				var _url 			= _formCreateBenefits.data("url");
				var _benefitsStatus = _formCreateBenefits.find('select[name="status_is_active"]').val();
				var formData 		= new FormData();
				formData.set('_token', _formCreateBenefits._getCsrfToken());

				if (_benefitsStatus == true) {
					$.ajax({
						url: _url,
						data: formData,
						type: "post",
						processData: false,
						contentType: false
					}).done(function(result) {
						var obj = $.parseJSON(result);
						(obj.data > 0) ? _statusIsValidate = false : _statusIsValidate = true ;
						_formCreateBenefits._getCsrfToken(obj.csrf_token);
					});

				} else { _statusIsValidate = true };
			});

		validateForm(_formCreateBenefits);

		_formCreateBenefits.find('input[name="commission_percentage"]').rules("add", {
			required : true,
			messages: {
				required: "Persentase Komisi Tidak Boleh Kosong"
			}
		});

		_formCreateBenefits.find('input[name="royalty_percentage"]').rules("add", {
			required : true,
			messages: {
				required: "Persentase Royalty Tidak Boleh Kosong"
			}
		});

		_benefitsStatus.rules( "add", {
			required : true,
			statusIsValidate: true,
			messages: {
				required: "Status Tidak Boleh kosong",
				statusIsValidate: ""
			}
		});

		$.validator.addMethod("statusIsValidate", function() {
			if (!_statusIsValidate) {
				Lobibox.notify('error', {
					pauseDelayOnHover: true,
					continueDelayOnInactiveTab: false,
					position: 'top right',
					icon: 'bx bx-x-circle',
					msg: 'Pastikan Tidak Ada Setting Benefits Yang Aktif !!'
				});
			}

			return _statusIsValidate;
		});
	}

})(jQuery);
