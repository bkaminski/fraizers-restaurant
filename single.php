<?php get_header(); ?>
	<div class="container">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?>:</h1>
		<br />
		<?php the_content(); ?>
		<br />
		<?php endwhile; else: ?>
			<p><?php _e('Sorry, this page does not exist.' , 'fraizers_restaurant' ); ?></p>
	<?php endif; ?>
    </div>
<?php get_footer(); ?>