<?php
	global $minimag_options;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
 
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
 
  
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
	<?php do_action( 'before' ); ?>
	
  	<div class="w1">
    
	<header id="masthead" class="site-header" role="banner">
			<div id="header">
				<div class="header-holder">
					<h1 class="logo">
                    	 
                        <?php if ( $minimag_options['CMlogo'] != '' ):
								
						?>  
                  			<a href="<?php echo get_site_url(); ?>"><img class="special" src="<?php 
									$img =  wp_get_attachment_image_src($minimag_options['CMlogo'],array(227,65));
										if(empty($img)){
											echo get_template_directory_uri()."/images/conceptdesign-logo.png";
										}else{
											 echo $img[0];
										}
										?>" alt="<?php bloginfo('name'); ?>" /></a>  
						<?php else :  ?>
							<a href="<?php echo get_site_url(); ?>"><img class="special" src="<?php bloginfo("template_directory"); ?>/images/conceptdesign-logo.png" alt="<?php bloginfo('name'); ?>" /></a>  
						<?php endif; ?> 
                    </h1>
				<nav id="site-navigation-top" class="navigation-main top-nav" role="navigation">
                    
                    <?php wp_nav_menu( array('container' => 'div', 'container_class' => 'menu-wrapper', 'container_id' => 'top-main-superfish-wrapper','menu_class'=> 'sf-menu', 'menu_id' => 'top-nav', 'theme_location' => 'main_nav','fallback_cb' => false,'depth'=>1 ) ); ?>
 
                    
					</nav>
                   
				<div class="nav-block">
					
				<nav id="site-navigation-main" class="navigation-main" role="navigation">
                   
                    <?php wp_nav_menu( array('container' => 'div', 'container_class' => 'menu-wrapper', 'menu' => 'header-menu', 'container_id' => 'main-superfish-wrapper', 'menu_id' => 'nav','menu_class'=> 'sf-menu', 'theme_location' => 'drop_nav', 'fallback_cb' => false,'depth'=>2) ); ?>
				</nav>
					
				
					
				</div>
				<div class="clear" ></div>                
				</div>
			</div>
		<div class="clear" ></div>
	</header>
<div id="main">
	<div class="ad-blocks">
		<div class="ad-block">
				<?php 
				if(isset($minimag_options['CMbh']))
						echo  $minimag_options['CMbh'] ;
				?>
		</div>
	</div>	
 