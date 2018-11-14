<?php 
/**
 * Template Name: Fraizers Menu Page
 * @developer Web Solutions Services
 * @package WordPress
 * @subpackage fraizers_restaurant
 */
get_header(); ?>
	<div class="container">
		<div class="col-md-12">
			<h1><?php the_title(); ?>:</h1>
			<span class="hidden-xs"><br /></span>
		</div>
		<div class="col-sm-3 noPaddingLR hidden-xs">
			<ul class="nav nav-pills nav-stacked" data-spy="affix">
				<li role="presentation"><a href="#apps"><strong>Appetizers</strong></a></li>
				<li role="presentation"><a href="#wings"><strong>Wings</strong></a></li>
				<li role="presentation"><a href="#salad"><strong>Salad &amp; Soup</strong></a></li>
				<li role="presentation"><a href="#sandwiches"><strong>Sandwiches</a></strong></li>
				<li role="presentation"><a href="#steaks"><strong>Cheese Steaks</a></strong></li>
				<li role="presentation"><a href="#wraps"><strong>Wraps</a></strong></li>
				<li role="presentation"><a href="#burgers"><strong>Burgers</a></strong></li>
				<li role="presentation"><a href="#entrees"><strong>Entrées</a></strong></li>
				<li role="presentation"><a href="#drinks"><strong>Beverages</a></strong></li>
			</ul>
			<span class="visible-xs"><br /><br /><br /><br /><br /></span>
		</div>
		<div class="col-sm-9 col-xs-12">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; else: ?>
					<p><?php _e('Sorry, this page does not exist.' , 'fraizers_restaurant' ); ?></p>
			<?php endif; ?>
		</div>
    </div>
<script>
// Smooth Scroll on Menu Page
	var jQueryroot = jQuery('html, body');
	jQuery('a').click(function() {
		var href = jQuery.attr(this, 'href');
		jQueryroot.animate({
			scrollTop: jQuery(href).offset().top
		}, 1000, function () {
			window.location.hash = href;
		});
		return false;
	});
		jQuery('ul.nav-pills li a').click(function (e) {
  		jQuery('ul.nav-pills li.active').removeClass('active')
  		jQuery(this).parent('li').addClass('active')
	});
</script>
<?php get_footer(); ?>