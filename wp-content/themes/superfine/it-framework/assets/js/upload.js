(function($) { 
	
	"use strict";

	$(window).load(function() {
		uploads();
	});
	$(document).ajaxComplete(function(){
		uploads();
	});
	
	function uploads(){
		$('#TB_title').not(':first').remove();
		$('.section .upload_image_button,.edit_form_line .upload_image_button,.btn-banner,.btn-image').each(function(){
			var txtb = $(this).prev(),
			formfield,imgurl;
			$(this).click(function(e) {
				e.preventDefault();
				formfield = $(this).prev().attr('name');
				tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true',removeExtraTitle());
				window.send_to_editor = function(html) {
					imgurl = $(html).attr('src');
					txtb.val(imgurl);
					txtb.parent().find('img.logo-im').attr('src',imgurl);
					txtb.parent().find('img.logo-im').fadeIn(500);
					txtb.parent().find('.remove-img').show();
					tb_remove();
				}
				return false;
			});
		});
		
		$('.upload_video_button').each(function(){
			var txtb = $(this).prev(),
			formfield,videourl;
			$(this).click(function(e) {
				e.preventDefault();
				formfield = $(this).prev().attr('name');
				tb_show('', 'media-upload.php?type=video&TB_iframe=true',removeExtraTitle());
				window.send_to_editor = function(html) {

					var pathArray = html.match(/<media>(.*)<\/media>/);
			        var mediaUrl = pathArray != null && typeof pathArray[1] != 'undefined' ? pathArray[1] : '';
        			txtb.val(mediaUrl);
					tb_remove();
				}
				return false;
			});
		});
	
		
		$('.remove-img').each(function(){
			$(this).click(function(e){
				e.preventDefault();
				$(this).parent().find('img.logo-im').fadeOut(500).attr('src','');
				$(this).parent().parent().find('.regular-text').attr('value','');
				$(this).hide();
			});
		});
		
		$('img.logo-im').each(function(){
			if($(this).attr('src') == ""){
				$(this).parent().find('.remove-img').fadeOut(500);
				$(this).fadeOut(500);
			};
		
		});	
	}
	function removeExtraTitle(){
		$('#TB_window > div').remove();
	}
	
	
	
})(jQuery);