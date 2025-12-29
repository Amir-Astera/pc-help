(function($) { 

	"use strict";
    
	/* ================ Patterns Select Functions. ================ */
	var currentVal = $('input.patterns').val();
	$('.pattern-img').each(function(){
		if ($(this).attr('src') == currentVal){
			$(this).addClass('selected-im');
		}	
	});
	
	$('.pattern-img').each(function(){
		var thisSrc = $(this).attr('src');
		$(this).click(function(){
			$('.pattern-img').removeClass('selected-im');
			$(this).addClass('selected-im');
			$('input.patterns').val(thisSrc);
		});
	});
	
	$('.date-soon').attr('readonly','readonly').attr('autocomplete','off');
	$('.date-soon').datepicker({
        dateFormat : 'yy/mm/dd'
    });
	
	$('.hidden-desc').parent().find('.lbl .description').hide();

	// import demo data.
	var $import_true = '',
		_attachment = $('#import_data'),
    	_is_attachment  = null;

	$('.import_btn').click(function(e){
		
		e.preventDefault();
		
		$import_true = confirm('Are you sure ? This will overwrite the existing data!');
		
        if($import_true == false) return;
        
        if( _attachment.is(':checked') ) {
        	_is_attachment = true;
        }
        
        $('.noticeImp').fadeIn();
        $('.loader').html('<span class="spinner"></span>');
        $('.attachments').fadeOut();
                
        $.ajax({
            type  : 'POST',
            url   : ajaxurl,
            data  : { action: 'my_action', attachment: _is_attachment },
            success : function( data ) {              
              	$('.loader').html('');
            	$('.noticeImp').fadeOut();
            	$('.import_message').html('<div class="import_message_success">Successfully Imported</div>');
            	$('.col').addClass('hidden');
            	$('.colexp').click(function(){
		    		$(this).next().toggleClass('hidden');
		    	});
		    	window.location.reload(true);
            }
        });
    });
    
    $('button.but-sub[name="reset"]').click(function(e){
    	//e.preventDefault();
    	var $reset_true = confirm('Are you sure ? This will reset all theme options to defaults!');
    	if($reset_true == false) return false;
    });
    
    $('#upload_options').click(function(){
    	var optvl = $('#import_file').val();
    	if(optvl == ''){
    		alert('Please Choose file first!');
    		return false;
    	}else{
    		return true;
    	}
    });
	
	/* ================ Ajax Save Form Functions. ================ */
	
	$('body').append('<span class="msg"></span><span class="loadingDiv"></span>');
	
	// Reset Theme to defaults.
	var confirmtxt = $('.spconfirm').text();
	$('.btn-reset-theme').click(function(){
		return confirm(confirmtxt);
	});
	if ($('.updated.fade').length){
		$('.top-reset').css('top','72px');
	}
	var adminurl = $('.adm').text();
	function save_main_options_ajax() {
       $('.main-options-form').submit( function () {
            var b =  $(this).serialize();
            var el = $('.msg');
		 	$('.loadingDiv').show();
            $.post( adminurl +'options.php', b ).error( 
                function() {
                    el.text('Error saving data').addClass('error').fadeIn();
                    setTimeout(function () {
				        el.fadeOut();
				    }, 3000);
                }).success( function() {
                    el.text('Seccessfuly saved').addClass('success').fadeIn();
                    $('.loadingDiv').hide();
                    setTimeout(function () {
				        el.fadeOut();
				    }, 1500);
                });
                return false;    
            });
        }
 	save_main_options_ajax();
 		
	/* ================ Select Layout. ================ */
	if($('.layout-select').val() == ''){
	   $('.wp-picker-container').parent().nextAll().slice(0, 7).remove();
	}
	$('.sec-heading').each(function(){
		$(this).parent().find('div.lbl').remove();
	});
	
	/* ================ Radio Image Select. ================ */
	$('.radio-select').each(function(){
		if($(this).find('input.radio').attr('checked') == "checked"){
			$(this).find('img.head-img').addClass('selected-head');
		}
		var thiRad = $(this).find('input.radio').attr('value');
		var thiSrc = $(this).find('img.head-img').attr('src');
		$(this).find('img.head-img').css('display','block').attr('src',thiSrc+thiRad+'.jpg').click(function(){
			$('input.radio').removeAttr('checked');
			$(this).parent().find('input.radio').attr('checked','checked');
			$('img.head-img').removeClass('selected-head');
			$(this).addClass('selected-head');
		});
	});	
    
    /* ================ Accordion Show/Hide. ================ */
    $('.accordion').each(function(){
    	var $this = $(this);
    	$this.parent().removeClass('section').addClass('not-sec');
    });
        
    $('.not-sec').each(function(){
    	var $ids = $(this).find('.sec-heading').attr('data-id');
    	var idd = '';
    	if(typeof $ids !== typeof undefined && $ids !== false){
    		 idd = ' id="'+$ids+'"';
    	}
    	$(this).nextUntil('.not-sec').wrapAll('<div class="acc-content"'+idd+'></div>');
    	
    	$("select.shape-select").msDropdown().data("dd");
    	
    });
    
	
	/*********************************************/
	
    $('select.color-select').parent().parent().addClass('color-section');
	$("select.color-select").msDropdown().data("dd");
	$('select.shape-select').parent().parent().addClass('shape-section');

	$(window).load(function(){
		
		/* ================ Add Remove Side bars. ================ */
		var bar_box = $('.bar_txt'),
		data = bar_box.val(),
		arr = data.split('|-|-|-|-|-|'),
		len = arr.length-1;
		
	    $('.add_bar').click(function(e){
	    	e.preventDefault();
	    	$('.app_div').append('<div class="side_bar"><h4>Sidebar:<span class="bar-title"></span></h4><div class="inner"><input type="hidden" class="hidVal" /><input type="text" placeholder="New Side Bar Name" class="regular-text added_bar" /><a class="remove_bar" href="#"></a></div></div>');
	    	added_bar_val();
	    	remove_bar();
	    });

		for ( var i = 0; i < len; i++) {
			$('.app_div').append('<div class="side_bar"><h4>Sidebar:<span class="bar-title"></span></h4><div class="inner"><input type="hidden" class="hidVal" /><input type="text" value="'+arr[i]+'" class="regular-text added_bar" /><a class="remove_bar" href="#"></a></div></div>');
		}
		
		added_bar_val();
		remove_bar();
	    
	    function added_bar_val(){
		    $('.side_bar').each(function(){
		    	var t = $(this).find('.added_bar').val(),
		    		hidInp = $(this).find('.hidVal'),
		    		hidInpV = hidInp.val();
		    	hidInp.attr('value',t);
		    	$(this).find('.bar-title').text(t);
		    	$(this).find('.added_bar').keyup(function(){
		    		var t2 = $(this).val();
		    		$(this).parent().parent().find('.bar-title').text(t2);
		    		hidInp.attr('value',t2);
		    	});
		    });
	    }
	    
	    $('.submit-abs').click(function(){
	    	var vl = new Array();
	    	$('.hidVal').each(function(){
	    		if($(this).val() != ''){
	    			vl.push($(this).val() + "|-|-|-|-|-|");
	    		}
	    	});
	    	$('.bar_txt').attr('value',vl.join(''));
	    });
	    
	    function remove_bar(){
		    $('.remove_bar').each(function(){
		    	$(this).click(function(e){
		    		e.preventDefault();
		    		$(this).prev().parent().parent().remove();
			    	var thisD = $(this).prev().val() + "|-|-|-|-|-|";	
			    	var n = $('.bar_txt').val().replace(thisD, "");
			    	$('.bar_txt').val(n);
			    	if($('.added_bar').length <= 0){
			    		$('.bar_txt').val('');
			    	}
		    	});
		    });
	    }
	    
	    /* ================ Items Dependencies. ================ */
	    $("[data-dependency*='theme_options']").parent().hide();
	    
	    $("[data-dependency*='theme_options']").each(function(){
	    	
	    	var deps = $(this).attr('data-dependency'),
	    		dep = $(this).attr('data-dep');
	    		
    		if (deps.indexOf(',') != -1) {
			    
			    $.each(deps.split(",").slice(0,-1), function(index, item) {
					$('select[name*="'+item+'"]').each(function(){
						$(this).addClass('multi');
						var sel_dep3 = $(this).val();
						if(dep == sel_dep3){
				    		$("[data-dependency*='"+item+"'][data-dep*='"+sel_dep3+"']").parent().show();
				    	}
				    	$(this).on('change',function(){
					    	var sel_dep4 = $(this).val();
					    	$("[data-dependency*='"+item+"']").parent().hide();
					    	$("[data-dependency*='"+item+"'][data-dep*='"+sel_dep4+"']").parent().show();
					    	$('.multi').each(function(){
					    		if($(this).val() == dep){
						    		$("[data-dep*='"+dep+"']").parent().show();
						    	}
					    	});
					    });
					});
				});
								
    		}else{
    			
    			var sel_dep = $('select[name*="'+deps+'"]').val(),
    				chk_dep = $('input[name*="'+deps+'"]').val();
    			if(dep == sel_dep){
		    		$(this).parent().show();
		    	}
		    	if(dep == chk_dep){
		    		$(this).parent().show();
		    	}
		    	$('select[name*="'+deps+'"]').on('change',function(){
			    	var sel_dep2 = $(this).val();
			    	$("[data-dependency*='"+deps+"']").parent().hide();
			    	$("[data-dependency*='"+deps+"'][data-dep*='"+sel_dep2+"']").parent().show();
			    });
			    
			    $('input[name*="'+deps+'"]').on('change',function(){
			    	var sel_dep2 = $(this).val();
			    	$("[data-dependency*='"+deps+"']").parent().hide();
			    	$("[data-dependency*='"+deps+"'][data-dep*='"+sel_dep2+"']").parent().show();
			    });
    		}		    
	    });
	    
	    function load_icons(){
		
		// this variable to get the template directory path.
		var themeurl = '';
		if($('#popup-css-css').length > 0){
			themeurl = $('#popup-css-css').attr('href').split('/it-framework')[0];
		}else if($('.themeURI').length > 0){
			themeurl = $('.themeURI').text();
		}
		
		$('.icon_cust').each(function(){
			if($(this).val() == ''){		
				$(this).next('.icon-remove').hide();
				$(this).parent().find('.ico').hide();
			}else{
				var ic = $(this).val();
				$(this).parent().find('.ico').addClass(ic);
			}
		});		
		
		$('body').append('<div class="it_add_icon"></div><div id="icon-overlay"></div>');
		var dw = parseInt($(window).width())/2,
			mw = parseInt($('.it_add_icon').width())/2,
			dh = parseInt($(window).height())/2,
			mh = parseInt($('.it_add_icon').height())/2,
			lft = dw-mw+'px',
			tp = dh-mh+'px';
		$('.it_add_icon').css({left:lft,top:tp});
		click_icons();
		$.ajax({
			type: "GET",
			url: themeurl+'/it-framework/includes/fields/icons/icons.php',
			success: function(data) {
				$('.it_add_icon').html(data);
				var iconSearch = $('.iconSearch'),
					iconLoad     = $('.icons_set');
				    iconSearch.keyup( function(){
				    var $this = $(this),
				        val   = $this.val(),
				        list_icon  = iconLoad.find('a');
				    list_icon.each(function() {
				      var $ico = $(this);
				      if ( $ico.data('icon').search( new RegExp(val, "i") ) < 0 ) {
				        $ico.hide();
				      } else {
				        $ico.show();
				      }
				
				    });
				});
			}
		});
	}
	
	function click_icons(){
		var icon = '';
		$('.btn_icon').click(function(e){
			e.preventDefault();
			$(this).addClass('clicked');

			$('#icon-overlay').fadeIn(200);
			$('.it_add_icon').fadeIn(300);
						
			$('.icons_set i').each(function(){
				$(this).click(function(e){
					e.preventDefault();
					icon = $(this).attr('class');
					$('.btn_icon.clicked').parent().find('.icon_cust').val(icon);
					$('.btn_icon.clicked').prev('.ico').removeAttr('class').addClass(icon+' ico');
					$('#icon-overlay,.it_add_icon').fadeOut(400);
					$('.icon-remove').fadeIn();
					$('.btn_icon').removeClass('clicked');
					$('.ico').fadeIn();
					return icon;
				});
			});			
			
			$('.btn_icon.clicked').parent().find('.icon_cust').val(icon).addClass('has-icon');
			
			$('.close-login').click(function(e){
				e.preventDefault();
				$('.btn_icon.clicked').removeClass('clicked');
				$('#icon-overlay,.it_add_icon').fadeOut(400);
			});
		});		
				
		$('.icon-remove').each(function(){
			$(this).click(function(e){
				e.preventDefault();
				$(this).parent().find('.icon_cust').val('');
				$('.btn_icon.clicked').removeClass('clicked');
				$(this).parent().find('.ico').removeAttr('class').addClass('ico');
				$(this).fadeOut(200);
				$(this).parent().find('.ico').fadeOut(200);
			});
		});
		
		$('.select_icon').change(function(){
			var thisVal = $(this).val();
			$('.icons_set > div').hide();
			$('.icons_set').find('.'+thisVal).show();
		});
		
	}

	    
	    /* ===================== Social Icons ======================= */
	    var vll = parseInt($('.loc_txt').val(),10);
	    $('.cont_locs').parent().parent().find('[class*=column_]').addClass('contact-row').prepend('');
	    $('.it_socialicons').append('<ul id="sortable" class="connectedSortable loc_div"></ul>');
	    
	    for ( var i=0; i<= vll; i++){
	    	$('.group_contact_'+i).wrapAll('<li class="contact-row ui-state-default" id="'+i+'"></li>');
	    }
	    $('.contact-row').appendTo('#sortable');
	    $('.contact-row').each(function(){
	    	$(this).find('.section').wrapAll('<div class="collapse"></div>');
	    });
	    $('.contact-row').prepend('<h4 class="office-title"></h4>');
	    cont_rows();
	    remove_row();
	    sorting();
	    collap();
	    $('.add_social').click(function(e){
	    	e.preventDefault();
	    	vll= isNaN(vll) ? 1 : vll;
	   	 	vll++;
	    	$('.loc_txt').val(vll);
	    	var cont = '';
	    	
	    	cont += '<li class="contact-row ui-state-default ui-sortable-handle" id="'+vll+'"><h4 class="office-title"></h4>';
				cont += '<div class="collapse">';
				cont += '<div class="section group_contact_'+vll+'"><div class="lbl"><label class="opt-lbl" for="social_icon'+vll+'">Icon</label></div><i class="ico"></i><a class="button button-primary btn_icon" href="#">Add Icon</a><input type="hidden" name="theme_options[social_icon'+vll+']" id="social_icon'+vll+'" class="icon_cust " value=""><a class="button icon-remove"><i class="fa fa-times"></i></a></div>';
				cont += '<div class="section group_contact_'+vll+'"><div class="lbl"><label class="opt-lbl" for="social_icon_title'+vll+'">Title</label></div><div class="group"><input class="regular-text" type="text" id="social_icon_title'+vll+'" name="theme_options[social_icon_title'+vll+']" placeholder="" value=""></div></div>';
				cont += '<div class="section group_contact_'+vll+'"><div class="lbl"><label class="opt-lbl" for="social_icon_link'+vll+'">Link</label></div><div class="group"><input class="regular-text" type="text" id="social_icon_link'+vll+'" name="theme_options[social_icon_link'+vll+']" placeholder="" value=""></div></div>';
				cont += '</div>';
			cont += '</li>';
			
			$('.loc_div').append(cont);
			
	    	$('body').animate({scrollTop: $('.group_contact_'+vll).offset().top - 80}, 500);
	    	$('#column_'+vll).find('.regular-text').eq(0).focus();
	    	cont_rows();
	    	remove_row();
	    	load_icons();
	    	sorting();
	    	collap();
	    });	
		
		function cont_rows(){
			$('.contact-row').each(function(){
				var co_title = $(this).find('.regular-text').eq(0).val();
				$(this).find('h4').html('<span>Icon: </span>'+ co_title + '<a class="remove_row" href="#" title="Remove Icon"><i class="fa fa-times"></i></a><a class="collapse_row" href="#" title="Collapse"><i class="fa fa-chevron-down"></i></a>');
				var co_title = $(this).find('.regular-text').eq(0).keyup(function(){
					var thVL = $(this).val();
					$(this).parent().parent().parent().parent().find('h4').html('<span>Icon: </span>'+ thVL + '<a class="remove_row" href="#" title="Remove Icon"><i class="fa fa-times"></i></a><a class="collapse_row" href="#" title="Collapse"><i class="fa fa-chevron-down"></i></a>');
				});
			});
		}
		
		function remove_row(){
			$('.remove_row').each(function(){
				$(this).click(function(e){
					e.preventDefault();
					vll--;
					$('.loc_txt').val(vll);
					$(this).parent().parent().fadeOut(500).delay(500).remove();
				});
			});
		}
		
		function sorting(){
			$( "#sortable" ).sortable({
				connectWith: ".connectedSortable",
				update: function( event, ui ) {
					$(this).find('li').each(function(i) { 
			           $(this).data('id', i + 1); // updates the data object
			           $(this).attr('data-id', i + 1); // updates the attribute
			           var ii = i + 1;
			           $(this).find('.icon_cust').attr('id','social_icon'+ii).attr('name','theme_options[social_icon'+ii+']');
			           $(this).find('[id^="social_icon_title"]').attr('id','social_icon_title'+ii).attr('name','theme_options[social_icon_title'+ii+']');
			           $(this).find('[id^="social_icon_link"]').attr('id','social_icon_link'+ii).attr('name','theme_options[social_icon_link'+ii+']');
			           
			        });
				}
			}).disableSelection();
		}
		
		function collap(){
			$('.collapse_row').click(function(e){
	    		e.preventDefault();
	    		$(this).parent().next().toggleClass('hidden');
	    	});
		}
		
		$('.main-options-form .ui-tabs-panel').each(function(){
			var $par_id = $(this).attr('id');
			if($(this).find('.acc-content').length){
				$('.ui-tabs-nav li a[href="#'+$par_id+'"]').parent().addClass('hasChildren').append('<ul class="inner-menu"></ul>');
			}
	    	
	    	$(this).find('.acc-content').each(function(){
	    		var tt = $(this).prev('.not-sec').text();
	    		var $tid = $(this).attr('id');
	    		$('.ui-tabs-nav li a[href="#'+$par_id+'"]').parent().find('.inner-menu').append('<li><a href="#'+$tid+'">'+tt+'</a></li>');
	    	});
	    });
	    $('#general-acc').show();
	    $('#general-acc').prev('.not-sec').show();
	    $('.ui-tabs-nav li.hasChildren > a').append('<span class="fa fa-plus plus"></span>');
	    $('.ui-tabs-nav > li > a').click(function(e){
    		e.preventDefault();
    		if($(this).parent().find('ul').is(':hidden')){
	    		$(this).parent().find('ul li').eq(0).addClass('selected');
	    		var iddd = $(this).parent().find('ul li').eq(0).find(' > a').attr('href');
	    		$(iddd).fadeIn();
	    		$(iddd).prev('.not-sec').fadeIn();
	    		$('ul.inner-menu').slideUp();
	    		$(this).parent().find('ul').slideDown();
	    		$('.ui-tabs-nav li.hasChildren').find('.plus').removeClass('fa-minus').addClass('fa-plus');
	    		$(this).parent().find('.plus').removeClass('fa-plus').addClass('fa-minus');
	    		return false;
    		}else{
    			$('ul.inner-menu').slideUp();
    			$(this).parent().find('ul').slideUp();
    			$(this).parent().find('.plus').removeClass('fa-minus').addClass('fa-plus');
    			$('.ui-tabs-nav li.hasChildren').find('.plus').removeClass('fa-minus').addClass('fa-plus');
    			$('.ui-tabs-nav ul li').removeClass('selected');
    			return false;
    		}
	    });
	 	$('.ui-tabs-nav li li a').click(function(e){
    		e.preventDefault();
    		var thsID = $(this).attr('href');
    		$('body').animate({scrollTop: $('.top-lft-logo').offset().top - 50}, 500);
    		$('.acc-content').hide();
    		$('.acc-content').prev('.not-sec').hide();
    		$('.ui-tabs-nav ul li').removeClass('selected');
    		$(this).parent().addClass('selected');
    		$(thsID).prev('.not-sec').fadeIn();
    		$(thsID).fadeIn();
    		if($(this).parent().hasClass('selected')){
    			return false;
    		}
    	});	    	    
	});

})(jQuery);