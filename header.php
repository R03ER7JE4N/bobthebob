<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>

<head>
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Poppins:400,600' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/css/bootstrap.min.css" type="text/css" />

    <script src="<?php bloginfo('template_directory') ?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/favicon.ico" type="image/vnd.microsoft.icon"/>
  	<link rel="icon" href="<?php bloginfo('template_directory') ?>/favicon.ico" type="image/x-ico"/>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<?php wp_head(); ?>
	
</head>

<body id="<?php echo $post->post_name; ?>" class="relative">
	<!--[if lt IE 7]>
        <p class="browsehappy">Vous utilisez présentement un navigateur obsolète. S'il-vous-plait, veuillez faire une <a href="http://browsehappy.com/">mise à jour de votre navigateur</a> profiter d'une visite plus agréable.</p>
    <![endif]-->
	
	<header>

  		<div class="logo inline-block">
  			<a class="flex-center" href="<?php echo get_option('home'); ?>/">
  				<img id="logo_white" src="<?php bloginfo('template_directory') ?>/img/logo-bob-the-bob.png" alt="">
  				<img id="logo_black" src="<?php bloginfo('template_directory') ?>/img/logo-bob-the-bob-noir.png" alt="">
  			</a>
  		</div>
      	
  		<nav>
  			<?php
				$defaults = array(
					'theme_location'  => '',
					'menu'            => 'primary',
					'container'       => 'div',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'menu',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 10,
					'walker'          => ''
				);
				wp_nav_menu

				( $defaults );
			?>

			<?php include('searchform.php'); ?>

			<div class="search flex-center btn_search_trigger">
				<a class="flex-center" href="javascript:void(0);">
					<img src="<?php bloginfo('template_directory') ?>/img/ico-search.png" alt="">
				</a>
	  		</div>

  		</nav>

	</header><!--/.navbar-->





