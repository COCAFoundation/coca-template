/* 
 * @version        1.0
 * @package        COCA Template
 * @subpackage     Joom Donation Bootstrap Converter
 * @author         David Larrimore
 * @copyright      Copyright (C) 2009 - 2016 Children of Central Asia Foundation
 * @license        GNU/GPL
 * 
 * 
 * SUMMARY
 * Sliding this badboy into the mix to help migrate JoomDonation's bootstrap 2 inline-form HTML to bootstrap 3.
 * The alternative was creating jDonation overrides, which is what got me into this mess in the first place.	
 * 
 * Requirements
 * - jQuery 2.2 or greater
 * - Bootstrap 3.3 or greater
 * - Joomla 3.5 or greater (I suspect this might actually work for previous versions)
 * - jDonation 4.3 or greater (I suspect this might actually work for previous versions)
 * 
 * Currently resolved the following jDonation views:
 *  - com_jdonation/donation
 *  - com_jdonation/failure
 * 
 * Notes: 
 *  - There are some CSS changes required that can be found in the coca.css file (https://github.com/COCAFoundation/coca_template/blob/master/css/coca.css)
 * 
 * TODO: Resolve JsLint findings
 * TODO: Method to allow users to manually adjust field sizes by providng a JSON formatted field.
 * 
 */

  (function($){  
    $(document).ready(function($) {
    	
    	//Disabling Minified Bootstrap that comes with jDonation
    	if($('link[href="/media/com_jdonation/assets/bootstrap/css/bootstrap.min.css"]').length){
    		$('link[href="/media/com_jdonation/assets/bootstrap/css/bootstrap.min.css"]').disabled=true;   
    	} 
    	
    	//Disabling Bootstrap that comes with jDonation
    	if($('link[href="/media/com_jdonation/assets/bootstrap/css/bootstrap.css"]').length){
    		$('link[href="/media/com_jdonation/assets/bootstrap/css/bootstrap.css"]').disabled=true;     
    	}   
    	
    	//Disabling custom CSS that comes with jDonation
    	if($('link[href="/media/com_jdonation/assets/css/style.css"]').length){
    		$('link[href="/media/com_jdonation/assets/css/style.css"]').disabled=true;      
    	}   
    	
		if ($('#donation-form').length !== 0){		
			$('#donation-form').find('.control-group').each(function() {
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
	
					//Input fields need to have "form-control" added
					$(this).find('input').each(function () {
						//Radio fields need to be wrapped in a div with a "radio" class
						if ($(this).is(':radio')) {
							//This code may not wholly be necessary
							if ($(this).parent().is('label')){
								//There is some funky javascript that is causing the other_amount field to shed its form-control
								//This fixes that by adding a change event that finds the input and adds it again.
								$(this).change(function() {
									  $(this).parent().parent().parent().find('input[type="text"]').each(function (){
										  $(this).addClass('form-control');	
									  });
								});
								
								//This peace of code fixes an issue where if you click off of the text box it will reset all classes
								$(this).parent().parent().parent().find('input[type="text"]').each(function (){
									  $(this).change(function() {
										  $(this).addClass('form-control');	
									  });
								  });
								
								$(this).parent().wrap('<div class="radio"></div>');
							}
						}else{
							$(this).addClass('form-control');	
						}				
					});										
				});					
			
			//Fixing inputGroup Addon
			$('#donation-form').find('.input-prepend').each(function () {
					$(this).find('.add-on').each(function(){
						$(this).addClass('input-group-addon');
						$(this).removeClass('add-on');
					});
				});
				
				$(this).find('.input-prepend').addClass('input-group');
				$(this).find('.input-prepend').removeClass('input-prepend');
			
			});
			
			//Fixing heading to be HTML Form Legend
			$('#donation-form').find('.jd-heading').each(function() {
				var theHTML = this.innerHTML;
				if ($(this).parent().hasClass('form-group')){
					$(this).parent().replaceWith($('<fieldset><legend>' + theHTML + '</legend></fieldset>'));
				}else{
					$(this).replaceWith($('<fieldset><legend>' + theHTML + '</legend></fieldset>'));
				}
			});
			
			//Fixing heading to be HTML Form Legend
			$('#donation-form').find('.eb-heading').each(function() {
				var theHTML = this.innerHTML;
				if ($(this).parent().hasClass('form-group')){
					$(this).parent().replaceWith($('<fieldset><legend>' + theHTML + '</legend></fieldset>'));
				}else{
					$(this).replaceWith($('<fieldset><legend>' + theHTML + '</legend></fieldset>'));
				}
			});
		} 
		
		//Here we are updating the donation failure page to leverage Bootstrap panels
		if ($('#donation-failure-page').length !== 0){	
			//First we select all of the control-groups
			$('#donation-failure-page').find('.control-group').each(function(i) {
				//The second control group (index 1) is our target
				if (i === 1){
					$(this).find('label').each(function() {
						var theHTML = this.innerHTML;
						$(this).replaceWith($('<div class="panel-heading">' + theHTML + '</div>'));
					});
					
					$(this).find('.controls').each(function() {
						$(this).addClass('panel-body');
						$(this).removeClass('controls');
					});
										
					$(this).addClass('panel');
					$(this).addClass('panel-danger');
					$(this).removeClass('control-group');
				}	
			});
		}
    });
  })(jQuery);