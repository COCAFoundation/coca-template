/* 
 * Sliding this badboy into the mix to help migrate JoomDonation's bootstrap 2 inline-form HTML to bootstrap 3.
 * The alternative was modifying the core jDonation template, which I was not willing to do, as updates are good.
 * I placed this inside the ready function so it fires after the page loads, but it could technically get pulled out	
 * 
 */
  (function($){  
    $(document).ready(function($) {
		if ($('#donation-form').length !== 0){		
			$('.control-group').each(function() {
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
						if ($(this).attr("name").localeCompare("exp_month") === 0 || $(this).attr("name").localeCompare("exp_year") === 0){
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
			$('.jd-heading').each(function() {
				var theHTML = this.innerHTML;
				if ($(this).parent().hasClass('form-group')){
					$(this).parent().replaceWith($('<fieldset><legend>' + theHTML + '</legend></fieldset>'));
				}else{
					$(this).replaceWith($('<fieldset><legend>' + theHTML + '</legend></fieldset>'));
				}
			});
			//Fixing heading to be HTML Form Legend
			$('.eb-heading').each(function() {
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