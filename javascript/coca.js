
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
      var filetypes = /\.(zip|exe|pdf|doc*|xls*|ppt*|mp3)$/i;
      var baseHref = '';
      if ($('base').attr('href') !== undefined)
        baseHref = $('base').attr('href');
      $('a').each(function() {
        var href = $(this).attr('href');
        if (href && (href.match(/^https?\:/i)) && (!href.match(document.domain))) {
          $(this).click(function() {
            var extLink = href.replace(/^https?\:\/\//i, '');
            _gaq.push(['_trackEvent', 'External', 'Click', extLink]);
            if ($(this).attr('target') !== undefined && $(this).attr('target').toLowerCase() !== '_blank') {
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
              if ($(this).attr('target') !== undefined && $(this).attr('target').toLowerCase() !== '_blank') {
                setTimeout(function() { location.href = baseHref + href; }, 200);
                return false;
              }
            });
          }
      }); 
      
      //Resolving issue where error message is using bootstrap 2 error.
      if ($('#system-message').length !== 0){
    	  $('#system-message').find('.alert-error').each(function (){
    		  $(this).addClass('alert-danger');
    		  $(this).removeClass('alert-error');   		  
    	  });
    	  $('#system-message').find('.alert-message').each(function (){
    		  $(this).addClass('alert-info');
    		  $(this).removeClass('alert-message');   		  
    	  });    	  
      }
      
      
      
    });
  })(jQuery);