<!DOCTYPE html>
<html lang="en">
	<head>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-79886304-1"></script>
		<script>
  			window.dataLayer = window.dataLayer || [];
  			function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());

  			gtag('config', 'UA-79886304-1');
		</script>
		<meta name="msvalidate.01" content="E4F5FA02C51943257359F1B364428943" />
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title('&raquo;','true','right'); ?><?php bloginfo('name'); ?>&nbsp;&raquo;&nbsp;<?php bloginfo('description'); ?></title>
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/img/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/img/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/img/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/img/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/img/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/img/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<!--[if lt IE 9]>
      		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
    	<?php wp_head(); ?>
  	</head>
	<body <?php body_class(); ?>>
		<div id="preHeader">
			<div class="container">
				<p>
					<span class="hidden-xs"><i class="fa fa-map-marker fa-fw"></i>&nbsp;9 East Loockerman St. Dover DE, 19901 &nbsp;&nbsp;</span>
						<i class="fa fa-mobile fa-fw fa-lg" aria-hidden="true"></i>302.741.2420
					<span class="pull-right"><a target="_blank" href="https://www.facebook.com/fraizersreataurant/"><i class="fa fa-facebook-official fa-lg fa-fb-blue"></i></a></span>
				</p>
			</div>
		</div>
		<nav class="navbar navbar-inverse">
      		<div class="container nav-container">
        		<div class="navbar-header">
          			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            			<span class="sr-only">Toggle navigation</span>
            			<i class="fa fa-bars fa-fw fa-lg" aria-hidden="true"></i>
          			</button>
          			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
          				<img alt="Fraizer's Restaurant - Dover Delaware" src="<?php echo get_template_directory_uri(); ?>/img/fraizers-web-logo.png" id="mainLogo" />
          			</a>
        		</div>
        		<div id="navbar" class="collapse navbar-collapse">
          			<?php 
                	wp_nav_menu( array(
                    	'menu'              => 'primary',
        				'theme_location'    => 'primary',
        				'depth'             => 2,
        				'container'         => '',
        				'container_class'   => '',
        				'menu_class'        => 'nav navbar-nav navbar-right',
        				'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        				'walker'            => new wp_bootstrap_navwalker())
                    );
            		?>
        		</div><!--/.nav-collapse -->
      		</div>
    </nav>
    <div class="offset-div"></div>