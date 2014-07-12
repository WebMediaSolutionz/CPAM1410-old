<?php include('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo site_name; ?></title>
        
        <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory'); ?>/Styles/tags.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory'); ?>/Styles/classes.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory'); ?>/style.css" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory'); ?>/Styles/nivo-slider.css" />
        
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Mrs+Saint+Delafield' >
        <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,800' >
        
        <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory'); ?>/Styles/jcarousel_style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory'); ?>/Styles/skin.css" />

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo bloginfo('stylesheet_directory'); ?>/scripts/jquery.nivo.slider.pack.js" type="text/javascript"></script>
        
		<script src="<?php echo bloginfo('stylesheet_directory'); ?>/scripts/jquery.jcarousel.min.js" type="text/javascript"></script>
        
        <script src="<?php echo bloginfo('stylesheet_directory'); ?>/scripts/javascript.js" type="text/javascript"></script>
        
        <script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider({
				effect: 'fade',
				directionNav: false,	
				controlNav: false,
				pauseOnHover: false, 
				animSpeed: 1000,
				pauseTime: 6000,
			});
		});
		</script>
        <script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('#mycarousel').jcarousel();
			});
		</script>
        <?php wp_head(); ?>
        
        <?php if( is_page(10) ){ ?>
        	<style>
				<?php if( isset($_REQUEST['schedule']) && $_REQUEST['schedule'] == 1 ){ ?>
				#one {
					display: block;	
				}
				
				#two, #three, #four {
					display: none;	
				}
				<?php } elseif( isset($_REQUEST['schedule']) && $_REQUEST['schedule'] == 2 ){ ?>
				#two {
					display: block;	
				}
				
				#one, #three, #four {
					display: none;	
				}
				<?php } elseif( isset($_REQUEST['schedule']) && $_REQUEST['schedule'] == 3 ){ ?>
				#three {
					display: block;	
				}
				
				#two, #one, #four {
					display: none;	
				}
				<?php } elseif( isset($_REQUEST['schedule']) && $_REQUEST['schedule'] == 4 ){ ?>
				#four {
					display: block;	
				}
				
				#two, #three, #one {
					display: none;	
				}
				<?php } ?>
			</style>
        <?php } ?>
    </head>
    
    <body>
    	<div class="outer_container blue_bg">
        	<div class="inner_container">
            	<a id="logo" class="left" href="<?php echo get_page_link(2); ?>"><span class="hide"><?php echo site_name; ?></span></a>
                
                <div id="navigation">
                	<?php include('navigation.php'); ?>
                </div>
            </div>
        </div>
        
        <div id="header" class="outer_container">
        	<div class="inner_container">
        		<h1 id="tagline" class="delafield no_padding"><?php echo $lang['tagline']; ?></h1>
            </div>
        </div>