
  (function($){   
    $(window).load(function(){
      // dropdown
      $('.deeper > a').addClass('dropdown-toggle');
      $('.deeper > a').attr('data-toggle', 'dropdown');
      $('.deeper > a').append('<b class="caret"></b>');
      $('.nav-child > .divider-vertical').addClass('divider');    
      $('.nav-child > .divider').removeClass('divider-vertical');  
    });   
    $(document).ready(function($) {
      //alert('hello world');
      var filetypes = /\.(zip|exe|pdf|doc*|xls*|ppt*|mp3)$/i;
      var baseHref = '';
      if ($('base').attr('href') != undefined)
        baseHref = $('base').attr('href');
      $('a').each(function() {
        var href = $(this).attr('href');
        if (href && (href.match(/^https?\:/i)) && (!href.match(document.domain))) {
          $(this).click(function() {
            var extLink = href.replace(/^https?\:\/\//i, '');
            _gaq.push(['_trackEvent', 'External', 'Click', extLink]);
            if ($(this).attr('target') != undefined && $(this).attr('target').toLowerCase() != '_blank') {
              setTimeout(function() { location.href = href; }, 200);
              return false;
            }
          });
        }
        else if (href && href.match(/^mailto\:/i)) {
          $(this).click(function() {
            var mailLink = href.replace(/^mailto\:/i, '');
            _gaq.push(['_trackEvent', 'Email', 'Click', mailLink]);
          });
        }
          else if (href && href.match(filetypes)) {
            $(this).click(function() {
              var extension = (/[.]/.exec(href)) ? /[^.]+$/.exec(href) : undefined;
              var filePath = href;
              _gaq.push(['_trackEvent', 'Download', 'Click-' + extension, filePath]);
              if ($(this).attr('target') != undefined && $(this).attr('target').toLowerCase() != '_blank') {
                setTimeout(function() { location.href = baseHref + href; }, 200);
                return false;
              }
            });
          }
      });


		//Sliding this badboy into the mix to help migrate JoomDonation's bootstrap 2 inline-form HTML to bootstrap 3.
		//The alternative was modifying the core jDonation template, which I was not willing to do, as updates are good.
		//I placed this inside the ready function so it fires after the page loads, but it could technically get pulled out	
		if ($('#donation-form').length != 0){
			console.log("Pumping in CSS updates for Donation Form");
			
			$('.control-group').each(function(i, obj) {
				$(this).removeClass('control-group');
				$(this).addClass('form-group');
				$(this).children('label').each(function () {
					$(this).addClass('col-sm-3');						
				});
				$(this).children('.controls').each(function () {
					$(this).addClass('col-sm-5');	
					$(this).removeClass('controls');	
					
					$(this).find('select').each(function () {
						//Making the Month/Year selects compatible with Bootstrap 3 and inline was not worth the effort
						//Leaving that for another day.
						if ($(this).attr("name").localeCompare("exp_month") == 0 || $(this).attr("name").localeCompare("exp_year") == 0){
							$(this).removeClass('form-control');	
						}else{
							$(this).addClass('form-control');
						}
					});	

					$(this).find('input').each(function () {
						if ($(this).is(':radio')) {
							if ($(this).parent().is('label')){
								//There is some funky javascript that is causing the other_amount field to shed its form-control
								//This fixes that by adding a change event that finds the input and adds it again
								$(this).change(function() {
									  $(this).parent().parent().parent().find('input').each(function (){
										  if ($(this).is(':text')) {
											  
											  $(this).addClass('form-control');	
										  }
									  });
								});
								//$(this).parent().parent().addClass('col-sm-9');
								//$(this).parent().parent().removeClass('col-sm-5');
								$(this).parent().wrap('<div class="radio"></div>');
							}
						}else{
							$(this).addClass('form-control');	
						}				
					});										
				});					
			});
			
			//Fixing inputGroup Addon
			$(this).find('.input-prepend').each(function () {
				$(this).find('.add-on').each(function(){
					$(this).addClass('input-group-addon');
					$(this).removeClass('add-on');
				});
			});
			
			$(this).find('.input-prepend').addClass('input-group');
			$(this).find('.input-prepend').removeClass('input-prepend');
			

			//Fixing heading to be HTML Form Legend
			$('.jd-heading').each(function(i, obj) {
				var theHTML = this.innerHTML;
				if ($(this).parent().hasClass('form-group')){
					$(this).parent().replaceWith($('<fieldset><legend>' + theHTML + '</legend></fieldset>'));
				}else{
					$(this).replaceWith($('<fieldset><legend>' + theHTML + '</legend></fieldset>'));
				}
			});
			//Fixing heading to be HTML Form Legend
			$('.eb-heading').each(function(i, obj) {
				var theHTML = this.innerHTML;
				if ($(this).parent().hasClass('form-group')){
					$(this).parent().replaceWith($('<fieldset><legend>' + theHTML + '</legend></fieldset>'));
				}else{
					$(this).replaceWith($('<fieldset><legend>' + theHTML + '</legend></fieldset>'));
				}
			});
		}   
    });
  })(jQuery);