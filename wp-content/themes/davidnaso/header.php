<?php

	$header_logo = get_field('header_logo', 'options');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<?php wp_head(); ?>
		<!-- META -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- CSS -->
		<!-- <link rel="stylesheet" id="font-awesome-css" href="https://cdn.jsdelivr.net/fontawesome/4.7.0/css/font-awesome.min.css?ver=5.0.1" type="text/css" media="all"> -->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163485540-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-163485540-1');
        </script>

		<?php wp_head() ?>
	</head>
	<body <?php body_class(); ?>>

	<header>
		<nav class="navbar navbar-expand-sm navbar-dark bg-light fixed-top">
			<div class="container">
				<a href="/" class="navbar-brand navbar-logo">
		        	<img src="<?php echo $header_logo['url']; ?>" class="header-logo" alt="<?php echo $header_logo['alt']; ?>">
		        </a>
		         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		            <span class="navbar-toggler-icon">
		            </span>
		        </button>
		        <div class="collapse navbar-collapse" id="navbarSupportedContent">

		           <?php wp_nav_menu(array(
		        	     
		        	    'container'       => 2,
		        	    'container_id'    => 0,
		        	    'container_class' => 'collapse navbar-collapse',
		        	    'menu_id'         => false,
		        	    'menu_class'      => 'navbar-nav ml-auto',
		        	    'depth'           => 3,
		                'fallback_cb'     => '__return_false',
		                'walker'          => new Bootstrap_NavWalker()

		           	)); ?>

		        </div>
		    </div>
		</nav>
	</header>

