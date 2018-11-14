		<div id="fraizersFooter">
			<div class="col-md-4 footer-boxes">
			<img src="<?php echo get_template_directory_uri(); ?>/img/fraizers_logo_2016.png" class="img-responsive center-block" alt="Fraizer's Restaurant and Bar" />
				    <br />
				<p class="text-center white">302.741.2420 | 9 East Loockerman St. | Dover DE, 19901</p>
			</div>
			<div class="col-md-4 footer-boxes">
				<?php dynamic_sidebar( 'fraizers_event_calendar' ); ?>
			</div>
			<div class="col-md-4 footer-boxes">
				<h4 class="text-center white">Directions &amp; Map</h4>
				<a href="https://goo.gl/maps/Wmp1xX5VbKw" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/img/fraizers-map.png" class="img-responsive center-block map-img" />
				</a>
			</div>
			<br />
		</div>
		<div id="subFooter">
		 	<div class="col-md-4 subFooterLeft">
		 		<p class="hidden-xs">Copyright &copy; <?php echo date ('Y'); ?> Fraizer's Restaurant</p>
		 		<p class="visible-xs text-center">Copyright &copy; <?php echo date ('Y'); ?> Fraizer's Restaurant</p>
		 	</div>
		 	<div class="col-md-4 subFooterMiddle">
		 		<p class="text-center"><a target="_blank" href="https://www.facebook.com/Fraizers-Restaurant-1007554355993945/?ref=aymt_homepage_panel"><i class="fa fa-facebook-official fa-2x fa-fb-blue"></i></a></p>
		 	</div>
		 	<div class="col-md-4 subFooterRight">
		 		<a target="_blank" href="https://benkaminski.com"><img src="<?php echo get_template_directory_uri(); ?>/img/kaminski-consulting.png" alt="Benjamin Kaminski Consulting" width="50" height="50" class="img-responsive pull-right hidden-xs" style="margin-top:-7px;" /></a>
		 		<a target="_blank" href="https://benkaminski.com"><img src="<?php echo get_template_directory_uri(); ?>/img/kaminski-consulting.png" alt="Benjamin Kaminski Consulting" width="50" height="50" class="img-responsive center-block visible-xs" /></a><br />
		 	</div>
		</div>
		<?php wp_footer(); ?>
</body>
</html>