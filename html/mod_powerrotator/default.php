<?php /**
* @Copyright Copyright (C) 2010- ... VIjay Padsumbiya
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
**/
?>
<script type="text/javascript" src="<?php echo JURI::root(); ?>modules/mod_powerrotator/scripts/jquery-ui.min.js" ></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 7000, true);
	});
</script>
<style> 
	#featured li.ui-tabs-selected{ 
		/*background:url('<?php //echo JURI::root(); ?>modules/mod_powerrotator/images/selected-item.png') top left no-repeat;*/
	}
	#featured .ui-tabs-panel .info{ 
		background: url('<?php echo JURI::root(); ?>modules/mod_powerrotator/images/transparent-bg.png'); 
	}
	#featured{ 
		width:<?php echo $module_width;?>;
		height:<?php echo $module_height;?>;
	}
	#featured .info h2{ 
	   font-size:<?php echo $big_panel_title_font_size;?>; 
	   font-family:<?php echo $font_family;?>;
	}
	#featured .info p{ 
	   font-family:<?php echo $font_family;?>; 
	   font-size:<?php echo $big_panel_desc_font_size;?>; 
	}
	#featured ul.ui-tabs-nav li span{ 
	   font-size:<?php echo $thumb_panel_font_size;?>; 
	   font-family:<?php echo $font_family;?>;
	}
	#featured ul.ui-tabs-nav{ 
	   left:<?php $thid = 100 - $module_smallthumb_panel_width; echo $thid;?>%;
	   width:<?php echo $module_smallthumb_panel_width;?>;
	}
	#featured .ui-tabs-panel{ 
		width:<?php echo $module_bigthumb_panel_width;?>;
	}
	#featured .ui-tabs-panel > img{
		height:<?php echo $module_height;?>;
	}
	#featured ul.ui-tabs-nav li img{ 
	   width:<?php echo $thumb_width;?>;
	   height:<?php echo $thumb_height;?>;
	}
	#featured ul.ui-tabs-nav li.ui-tabs-selected a{ 
	   background:<?php echo $thumb_selected_color;?>; 
	   height:<?php echo $thumb_selected_height;?>;
	}
	#featured li.ui-tabs-nav-item a:hover{ 
	   height:<?php echo $thumb_selected_height;?>;
	}
	#featured li.ui-tabs-nav-item a{ 
	   height:<?php echo $thumb_selected_height;?>;
	}
	#featured ul.ui-tabs-nav li{ 
	   height:<?php echo $thumb_selected_height;?>;
	}
</style>
<?php if($media_option == 0 ) { $path = "modules/mod_powerrotator/images/";   } else {  $path = "images/powerrotator/";  } ?>	   
		
		<div id="featured" >
		  <ul class="ui-tabs-nav">
	        <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1"><a href="#fragment-1"><img src="<?php echo JURI::root()."".$path."". $thumb_image_1;?>" alt="" /><span><?php echo $thumb_image_1_desc;?></span></a></li>
	        <li class="ui-tabs-nav-item" id="nav-fragment-2"><a href="#fragment-2"><img src="<?php echo JURI::root()."".$path."". $thumb_image_2;?>" alt="" /><span><?php echo $thumb_image_2_desc;?></span></a></li>
			
			<?php if($num_of_image >= 3) { ?>
	        <li class="ui-tabs-nav-item" id="nav-fragment-3"><a href="#fragment-3"><img src="<?php echo JURI::root()."".$path."". $thumb_image_3;?>" alt="" /><span><?php echo $thumb_image_3_desc;?></span></a></li>
			
			<?php } if($num_of_image >= 4) { ?>
	        <li class="ui-tabs-nav-item" id="nav-fragment-4"><a href="#fragment-4"><img src="<?php echo JURI::root()."".$path."". $thumb_image_4;?>" alt="" /><span><?php echo $thumb_image_4_desc;?></span></a></li>
			
			<?php } if($num_of_image >= 5) { ?>
			 <li class="ui-tabs-nav-item" id="nav-fragment-5"><a href="#fragment-5"><img src="<?php echo JURI::root()."".$path."". $thumb_image_5;?>" alt="" /><span><?php echo $thumb_image_5_desc;?></span></a></li>
			 <?php } ?>
	      </ul>

	    <!-- First Content -->
            <div id="fragment-1" class="ui-tabs-panel" style="">
            	<a href="<?php echo $first_readmore;?>">
                    <img src="<?php echo JURI::root()."".$path."". $first_img;?>" alt="" >
                     <div class="info" >
                        <h2><?php echo $first_caption_header;?></h2>
                        <p><?php echo $first_caption_desc;?>...</p>
                     </div>
            	</a>
            </div>

	    <!-- Second Content -->
	    <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide" style="">
			<a href="<?php echo $second_readmore;?>">
                <img src="<?php echo JURI::root()."".$path."". $second_img;?>" alt="" />
                 <div class="info" >
                    <h2><?php echo $second_caption_header;?></h2>
                    <p><?php echo $second_caption_desc;?>...</p>
                 </div>
             </a>            
	    </div>

	    <!-- Third Content -->
	    <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide" style="">
			<a href="<?php echo $third_readmore;?>" >
                <img src="<?php echo JURI::root()."".$path."". $third_img;?>" alt=""/>
                 <div class="info" >
                    <h2><?php echo $third_caption_header;?></h2>
                    <p><?php echo $third_caption_desc;?>...</p>
                 </div>
             </a>
	    </div>

	    <!-- Fourth Content -->
		<?php if($num_of_image >= 4) { ?>
         <div id="fragment-4" class="ui-tabs-panel ui-tabs-hide" style="">
			<a href="<?php echo $fourth_readmore;?>" >
                <img src="<?php echo JURI::root()."".$path."". $fourth_img;?>" alt="" />
                 <div class="info" >
                    <h2><?php echo $fourth_caption_header;?></h2>
                    <p><?php echo $fourth_caption_desc;?></p>
                 </div>
             </a>
	    </div>
	    
        <!-- Fifth Content -->		
		<?php } if($num_of_image >= 5) { ?>
		 <div id="fragment-5" class="ui-tabs-panel ui-tabs-hide" style="">
			<a href="<?php echo $fifth_readmore;?>" >
                <img src="<?php echo JURI::root()."".$path."". $fifth_img;?>" alt="" />
                 <div class="info" >
                    <h2><?php echo $fifth_caption_header;?></h2>
                    <p><?php echo $fifth_caption_desc;?></p>
                 </div>
             </a>
	    </div>
		<?php } ?>
					
		</div>
