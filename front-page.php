<?php get_header(); ?>
<?php include 'inc/fraizers_carousel.php' ?>
<div id="upcomingEvents">
	<div class="alert alert-info text-center"><?php dynamic_sidebar( 'fraizers_home_event_calendar' ); ?></div> 
</div>
<div id="mainBody">
	<div class="container">
	<br /><br />
		<?php dynamic_sidebar( 'fraizers_welcome_message' ); ?>
		<br /><br />
		<div class="col-md-7 noPaddingLR">
			<img src="<?php echo esc_url( get_theme_mod( 'fraizers_body_img_upload_one' ) ); ?>" alt="<?php echo get_theme_mod( 'fraizers_body_img_alt' ); ?>" class="img-responsive center-block" />
		</div>
		<div class="col-md-5 noPaddingLR">
			<div id="menuArea">
				<?php dynamic_sidebar( 'fraizers_text_area_1' ); ?>
			</div>
		</div>
	</div><!-- /.container -->
	<br /><br />
	<section id="home" data-speed="4" data-type="background" style="background: url(<?php echo esc_url( get_theme_mod( 'fraizers_home_parallax' ) ); ?>) 50% 0 fixed;">
		<div class="container">
		<br />
			<h2 class="text-center parallax-heading"><?php echo get_theme_mod( 'fraizers_parallax_heading' ); ?></h2>
			<p class="text-center white parallax-text"><?php echo get_theme_mod( 'fraizers_parallax_paragraph' ); ?>
				<br /><br />
					<a href="<?php echo get_theme_mod( 'fraizers_parallax_link' ); ?>" class="btn btn-warning btn-lg text-center"><?php echo get_theme_mod( 'fraizers_parallax_link_text' ); ?> &nbsp;<i class="fa fa-hand-pointer-o" aria-hidden="true"></i></a>
			</p>
	    </div>
	</section>
</div><!-- /#mainBody -->
<div id="subBody">
	<div class="container">
		<div class="col-md-7 noPaddingLR">
			<img src="<?php echo esc_url( get_theme_mod( 'fraizers_body_img_upload_two' ) ); ?>" alt="<?php echo get_theme_mod( 'fraizers_body_img_alt_2' ); ?>" class="img-responsive center-block" />
		</div>
		<div class="col-md-5 noPaddingLR">
			<div id="functionArea">
	    		<?php dynamic_sidebar( 'fraizers_text_area_2' ); ?>
			</div>
		</div>
	</div><!-- /.container -->
</div>
<?php get_footer(); ?>
