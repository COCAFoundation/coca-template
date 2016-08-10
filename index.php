<?php
$doc = JFactory::getDocument();

$dontInclude = array(
		'/media/jui/js/jquery.js',
		'/media/jui/js/jquery.min.js',
		'/media/jui/js/jquery-noconflict.js',
		'/media/jui/js/jquery-migrate.js',
		'/media/jui/js/jquery-migrate.min.js',
		'/media/jui/js/bootstrap.js',
		'/media/system/js/core-uncompressed.js',
		'/media/system/js/tabs-state.js',
		'/media/system/js/core.js',
		'/media/system/js/mootools-core.js',
		'/media/system/js/mootools-core-uncompressed.js',
);

foreach($doc->_scripts as $key => $script){
	if(in_array($key, $dontInclude)){
		unset($doc->_scripts[$key]);
	}
}


defined( '_JEXEC' ) or die( 'Restricted access' );

#Set to resolve jCaption Issues (http://www.joostrap.com/blog/joomla-jcaption-issue-conflict-a-snippet-of-code-to-help)
if (isset($this->_script['text/javascript'])){
    $this->_script['text/javascript'] = preg_replace('%jQuery\(window\)\.on\(\'load\',\s*function\(\)\s*{\s*new\s*JCaption\(\'img\.caption\'\);\s*}\);\s*%', '', $this->_script['text/javascript']);
    if (empty($this->_script['text/javascript'])){
        unset($this->_script['text/javascript']);
    }
}

$app = JFactory::getApplication();
unset($this->_scripts[JURI::root(true).'/media/system/js/caption.js']);
//unset($this->_scripts[JURI::root(true).'/media/system/js/mootools-core.js']);
$this->_script = preg_replace('%window\.addEvent\(\'load\',\s*function\(\)\s*{\s*new\s*JCaption\(\'img.caption\'\);\s*}\);\s*%', '', $this->_script);
?>
<!DOCTYPE html>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
  <head>
  <meta name="google-site-verification" content="bo4VH478YFeWvahD1hAmX2m1ukQg4HkATGRY9LgvRjw" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  $itemid = JRequest::getVar('Itemid');
  $menu = &JSite::getMenu();
  $active = $menu->getItem($itemid);
  $params = $menu->getParams( $active->id );
  $pageclass = $params->get( 'pageclass_sfx' );
  ?>
    <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/system.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/general.css" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <!-- Start custom CSS for COCA Template -->
    <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/coca.css" rel="stylesheet" />
    <!--  End Custom CSS for COCA Template -->
    <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/powerRotator.css" rel="stylesheet" media="screen"/>
    <!-- Sprite Map CSS Files -->
    <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/social-icons-spritesheet.css" rel="stylesheet" />
    <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/vega-spritesheet.css" rel="stylesheet" />

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400|Rokkitt|Josefin+Slab:300,400|Karla' rel='stylesheet' type='text/css'>
  	<?php if($pageclass){?>
     <link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/<?php echo htmlspecialchars($pageclass) ?>.css" type="text/css"/>
    <?php }?>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.3.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Start head jdoc include -->
    <jdoc:include type="head" />
    <!-- End head jdoc include -->
    <meta name="google-translate-customization" content="cdf027e5440b9c8f-cb40fc80eac9fe21-g025a20baa11a5cbc-19"></meta>
    </head>
<body>
  <?php if($this->countModules('debug')){ ?>
    <div class="container debug"><jdoc:include type="modules" name="debug" style="xhtml"/></div>
  <?php }?>
  <?php if($this->countModules('navbar')){ ?>
  <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
   <div class="container-fluid">
      <!-- Navbar Header -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Everything you want hidden at 940px or less, place within here -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav" id="top-nav-menu">
            <jdoc:include type="modules" name="navbar" style="xhtml" />
          </ul>
          <form action="/search" method="post" class="navbar-form navbar-left pull-right" >
              <div class="form-group">
                <input name="searchword" id="mod-search-searchword" maxlength="20"  class="inputbox form-control search-query" type="text" size="20" value="Search..."  onblur="if (this.value=='') this.value='Search...';" onfocus="if (this.value=='Search...') this.value='';" />
              </div>
              <input type="hidden" name="task" value="search" />
              <input type="hidden" name="option" value="com_search" />
              <input type="hidden" name="Itemid" value="479" />
           </form>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
<?php } ?>
  <div class="container ctr" style="background:#fff;">
    <div class="cleafix" style="height:55px;">&nbsp;</div>
      <div class="row banner">
          <div class="row banner-left hidden-sm hidden-xs"></div>
          <div class="col-md-7 col-sm-7 col-xs-7">
            <a href="/">
              <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo_1.png" class="img-responsive" alt="Children of Central Asia Foundation"/>
            </a>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
             <div class="social-bar">
                <a href="http://www.facebook.com/COCAFoundation" target="_blank">
                	<i class="social-icons-sprite social-icons-sprite-facebook"></i>
                </a>
                <a href="https://twitter.com/cocafoundation" target="_blank" class="">
                    <i class="social-icons-sprite social-icons-sprite-twitter"></i>
                </a>
                <a href="http://www.youtube.com/cocafoundation" target="_blank" class="">
                    <i class="social-icons-sprite social-icons-sprite-youtube"></i>
                </a>
                <a href="http://www.flickr.com/photos/cocafoundation/" target="_blank" class="">
                    <i class="social-icons-sprite social-icons-sprite-flickr"></i>
                </a>
            </div>
<div class="clearfix">&nbsp;</div>
            <div class="pull-right"><div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true, gaId: 'UA-35817130-1'}, 'google_translate_element');
}
            </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></div>
            <jdoc:include type="modules" name="banner-right" style="xhtml" />
        </div>
        <div class="row banner-right hidden-sm hidden-xs"></div>
        </div>
        <div class="row banner-bottom hidden-sm hidden-xs"></div>
         <?php if($this->countModules('slider')){ ?>
    <div class="clearfix" style="height:12px;"></div>
            <div class="row hidden-sm hidden-xs">
                <div class="col-md-12"><jdoc:include type="modules" name="slider" style="xhtml" /></div>
            </div>
         <?php }?>
         <?php if($this->countModules('contextual-menu')){ ?>
        <div class="cleafix" style="height:15px;">&nbsp;</div>
        <div class="row contextual-menu" >
          <div class="col-md-12"><jdoc:include type="modules" name="contextual-menu" /></div>
           <span class="row contextual-menu-left hidden-sm hidden-xs"></span>
        </div>
        <div class="row contextual-menu-bottom hidden-sm hidden-xs" style=""></div>
        <?php }?>
         <?php if($this->countModules('breadcrumb')){ ?>
        <div class="row">
          <div class="col-md-12"><jdoc:include type="modules" name="breadcrumb" /></div>
            </div>
      <?php }?>
      <?php if ($this->getBuffer('message')){ ?>
            <div class="row">
                <div class="col-md-12"><jdoc:include type="message" /></div>
            </div>
      <?php } ?>
      <?php
         $content = 'middle';
         $class = 'col-md-12';
         if($this->countModules('left') && $this->countModules('middle') && $this->countModules('right')){
          $content = 'none';
         }elseif(!$this->countModules('left') && !$this->countModules('middle') && $this->countModules('right')){
          $content = 'left';
          $class = 'col-md-8';
         }elseif($this->countModules('left') && !$this->countModules('middle') && !$this->countModules('right')){
          $content = 'right';
          $class = 'col-md-8';
         }elseif(!$this->countModules('left') && !$this->countModules('middle') && $this->countModules('right')){
          $content = 'left';
          $class = 'col-md-8';
         }elseif($this->countModules('left') && !$this->countModules('middle') && $this->countModules('right')){
          $content = 'middle';
          $class = 'col-md-4';
         }elseif(!$this->countModules('left') && !$this->countModules('middle') && $this->countModules('right')){
          $content = 'left';
          $class = 'col-md-8';
         }elseif($this->countModules('left') && !$this->countModules('middle') && !$this->countModules('right')){
          $content = 'right';
          $class = 'col-md-8';
         }elseif(!$this->countModules('left') && !$this->countModules('middle') && !$this->countModules('right')){
          $content = 'middle';
          $class = 'col-md-12';
         }elseif(!$this->countModules('left') && $this->countModules('middle') && !$this->countModules('right')){
          $content = 'left';
          $class = 'col-md-4';
         }
      ?>


    <div class="row">
        <?php if($this->countModules('left')){ ?>
          <div class="col-md-4 module-bar-wrapper"><div class="module-bar"><jdoc:include type="modules" name="left" style="xhtml" /></div></div>
        <?php }elseif($content == 'left'){ ?>
          <div class="<?php echo $class;?> mainContent"><jdoc:include type="component" /><div class="clearfix" height="15px">&nbsp;</div></div>
        <?php }?>

        <?php if($this->countModules('middle')){ ?>
          <div class="col-md-4 module-bar-wrapper"><div class="module-bar"><jdoc:include type="modules" name="middle" style="xhtml" /></div></div>
        <?php }elseif($content == 'middle'){ ?>
          <div class="<?php echo $class;?> mainContent"><jdoc:include type="component" /><div class="clearfix" height="15px">&nbsp;</div>  </div>
        <?php }?>

        <?php if($this->countModules('right')){ ?>
          <div class="col-md-4 module-bar-wrapper"><div class="module-bar"><jdoc:include type="modules" name="right" style="xhtml" /></div></div>
        <?php }elseif($content == 'right'){ ?>
          <div class="<?php echo $class;?> mainContent"><jdoc:include type="component" /><div class="clearfix" height="15px">&nbsp;</div>  </div>
        <?php }?>
    </div>
</div>
  <?php if($this->countModules('footer')){ ?>
    <div class="container ftr">
      <div class="row">
        <div class="col-md-12" style="padding-top:5px;"><jdoc:include type="modules" name="footer" style="xhtml" /></div>
      </div>

    </div>
  <?php } ?>
    <div class="container">
      <div class="clearfix" style="height:6px;"></div>
      <div class="row">
          <div class="col-md-12"><span id="copyright"><jdoc:include type="modules" name="copyright" style="xhtml" /></span></div>
      </div>
      <div class="clearfix" style="height:6px;"></div>
    </div>
    <!-- Start custom Javascript for COCA Template -->
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/javascript/coca.js" /></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/javascript/jDonationConvert.js" /></script>
    <!--  End Custom Javascript for COCA Template -->
</body>
</html>
