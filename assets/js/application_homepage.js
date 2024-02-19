$(document).ready(function() {

	setShareLinks();

	function socialWindow(url) {
		var left = (screen.width - 570) / 2;
		var top = (screen.height - 570) / 2;
		var params = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + top + ",left=" + left;
		window.open(url, "NewWindow", params);
	}

	function copyToClipboard(_target) {
		console.log(_target);
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val(_target).select();
		document.execCommand("copy");
		$temp.remove();
		alert("URL Copied.");
	}

	function setShareLinks() {
		var pageUrl = encodeURIComponent(document.URL);
		var tweet = encodeURIComponent($("meta[property='og:description']").attr("content"));
		$(".social-share-facebook").on("click", function() {
			url = "https://www.facebook.com/sharer.php?u=" + pageUrl;
			socialWindow(url);
		});
		$(".social-share-twitter").on("click", function() {
			url = "https://twitter.com/intent/tweet?url=" + pageUrl + "&text=" + tweet;
			socialWindow(url);
		});
		$(".social-share-linkedin").on("click", function() {
			url = "https://www.linkedin.com/sharing/share-offsite/?url=" + pageUrl;
			socialWindow(url);
		});
		$(".social-share-email").on("click", function() {
			url = "mailto:?Subject=" + tweet + "&amp;Body=" + pageUrl;
			socialWindow(url);
		});
		$('.social-copy-link').on('click', function () {
			copyToClipboard($(location).attr('href'));
		})
	}
	
    setTimeout(function(){
    	$("#loader").css("display", "none");
        $("#myDiv").css("display", "block");
        $("#myDiv").addClass("contentLoaded");
    }, 5000);

});

(function ($) {
	var _articleForm = $('.js-article_search_form');

	if (_articleForm.length > 0){
		_articleForm.each(function () {
			var _searchForm 	= $(this);
			var _dataAction		= _searchForm.attr("action");
			var _inputKeywords 	= $('input[name="keywords"]');

			_inputKeywords.on('keyup', function () {
				var _this = $(this);
				var trimmed = $.trim(_this.val());
				var _slug = trimmed.replace(/[^a-z0-9-]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '');
				var code = _slug.toLowerCase();
				_searchForm.attr("action", _dataAction+"/"+code);
			})
		})
	}

})(jQuery);
