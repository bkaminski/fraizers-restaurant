<?php

//Load dependencies in header or footer
function enqueue_fraizers_scripts() {
	wp_enqueue_script( 'bootstrap-js-cdn', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'), null, true);
	wp_enqueue_script( 'fraizers-js' , get_template_directory_uri() . '/js/fraizers.js', array('jquery'), null, true);
	wp_enqueue_script( 'font-awesome-cdn', 'https://use.fontawesome.com/27505604f5.js', false, null, true);
}
	add_action('wp_enqueue_scripts', 'enqueue_fraizers_scripts');

function enqueue_fraizers_styles() {
	wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
	wp_enqueue_style( 'wp-styles', get_template_directory_uri() . '/style.css');
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic|Lato:400,400italic,900,900italic' );
}
add_action('wp_enqueue_scripts', 'enqueue_fraizers_styles');
//End Load Dependencies

//Add Bootstrap Responsive Image class to any uploaded image
function bootstrap_responsive_images( $html ){
  $classes = 'img-responsive'; // separated by spaces, e.g. 'img image-link'
 
  // check if there are already classes assigned to the anchor
  if ( preg_match('/<img.*? class="/', $html) ) {
    $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html);
  } else {
    $html = preg_replace('/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html);
  }
  // remove dimensions from images,, does not need it!
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}
add_filter( 'the_content','bootstrap_responsive_images',10 );
add_filter( 'post_thumbnail_html', 'bootstrap_responsive_images', 10 );
//End Responsive Imagery

//Responsive URL Video Embeds
add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 ) ;

function custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="embed-responsive embed-responsive-16by9">'.$html.'</div><br />';
    return $return;
}
//END Responsive URL Video Embeds

//Custom Widget Areas
//REGISTER HOME PAGE WELCOME MESSAGE
register_sidebar(array(
  'name' => __( 'Home Page Welcome Message' , 'fraizers_restaurant' ),
  'id' => 'fraizers_welcome_message',
  'description' => __( 'Use only a "text" widget in here for welcome message only!' , 'fraizers_restaurant' ),
  'before_widget' => '',
  'after_widget'  => '',
  'before_title' => '<h1 class="text-center">',
  'after_title' => '</h1>'
));

//TEXT AREA 1
register_sidebar(array(
  'name' => __( 'Home Page Text Area 1' , 'fraizers_restaurant' ),
  'id' => 'fraizers_text_area_1',
  'description' => __( 'Use only a "text" widget in here for text area message only!' , 'fraizers_restaurant' ),
  'before_widget' => '',
  'after_widget'  => '',
  'before_title' => '<h2 class="textarea-title">',
  'after_title' => '</h2>'
));
//TEXT AREA 2
register_sidebar(array(
  'name' => __( 'Home Page Text Area 2' , 'fraizers_restaurant' ),
  'id' => 'fraizers_text_area_2',
  'description' => __( 'Use only a "text" widget in here for text area message only!' , 'fraizers_restaurant' ),
  'before_widget' => '',
  'after_widget'  => '',
  'before_title' => '<h2 class="textarea-title">',
  'after_title' => '</h2>'
));

//EVENT CALENDAR WIDGET AREA
register_sidebar(array(
  'name' => __( 'Footer Event Calendar' , 'fraizers_restaurant' ),
  'id' => 'fraizers_event_calendar',
  'description' => __( 'Only the "Events Made Easy Calendar" widget can be placed here.' , 'fraizers_restaurant' ),
  'before_widget' => '',
  'after_widget'  => '',
  'before_title' => '<h4 class="text-center white">',
  'after_title' => '</h4>'
));

//EVENT CALENDAR WIDGET AREA
register_sidebar(array(
  'name' => __( 'Home Page Next Event' , 'fraizers_restaurant' ),
  'id' => 'fraizers_home_event_calendar',
  'description' => __( 'Only the "Events Made Easy List" widget can be placed here.' , 'fraizers_restaurant' ),
  'before_widget' => '',
  'after_widget'  => '',
  'before_title' => '',
  'after_title' => ''
));

//HIDE POSTS PAGE
function remove_admin_menu_items() {
	$remove_menu_items = array(__('Posts'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
		unset($menu[key($menu)]);}
	}
}

add_action('admin_menu', 'remove_admin_menu_items');

function fraizers_theme_customize_register( $wp_customize ) {

 //=============================================================
 // Remove header image and widgets option from theme customizer
 //=============================================================
 $wp_customize->remove_control('header_image');
 $wp_customize->remove_panel('widgets');
 $wp_customize->remove_panel('nav_menus');

 //=============================================================
 // Remove Colors, Background image, and Static front page 
 // option from theme customizer     
 //=============================================================
 $wp_customize->remove_section('colors');
 $wp_customize->remove_section('background_image');
 $wp_customize->remove_section('static_front_page');
 $wp_customize->remove_section('title_tagline');
 $wp_customize->remove_section('custom_css');
}
add_action( 'customize_register', 'fraizers_theme_customize_register', 20 );


function register_custom_menu_page() {
    add_menu_page('Fraizers Training Videos', 'Training Videos', 'add_users', 'fraizers_training_vids', '_custom_menu_page', 'dashicons-video-alt3', 50); 
}
add_action('admin_menu', 'register_custom_menu_page');

function _custom_menu_page(){
   echo "
   	<h1>Fraizer's Website Training Videos</h1><br />
   	<p>If you would like to request a tutorial video, <a href='mailto:ben@benkaminski.com'>contact Ben here</a></p>
   	<h3>Video 1: Intro to WordPress Dashboard</h3>
   	<video id='IntroToDashboard' poster='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/img/video-cover.png' width='640' height='360' src='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/vids/intro-to-wp-dashboard.mp4' controls='controls' preload='none'></video>
   	<br />
   	<br />
   	<hr style='border-top:3px solid'>
   	<h3>Video 2: Using / Updating the Image Slider on Home Page</h3>
	<video id='updateSlideShow' poster='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/img/edit-image-slideshow.png' width='640' height='360' src='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/vids/update-slideshow-fraizers.mp4' controls='controls' preload='none'></video>
   	<br />
   	<br />
   	<hr style='border-top:3px solid'>
   	<h3>Video 3: Cropping Images For Slideshow and Other Areas (Updated: 5/29/16)</h3>
	<video id='cropSlideShow' poster='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/img/resize-image-fraizers.png' width='640' height='360' src='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/vids/image-resizer-take-two.mp4' controls='controls' preload='none'></video>
   	<br />
   	<p style='font-size:18px;'>Visit <a target='_blank' href='https://resizeimage.net'>Resize Image Website</a></p>
   	<br />
   	<hr style='border-top:3px solid'>
   	<h3>Video 4: Using the Compressor.io to Compress Images</h3>
   	<video id='updateCompress' poster='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/img/using-compressor-io.png' width='640' height='360' src='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/vids/using_compressor_io.mp4' controls='controls' preload='none'></video>
	<br />
   	<br />
   	<hr style='border-top:3px solid'>
   	<h3>Video 5: Adding Single and Recurring Events</h3>
   	<video id='updateEvents' poster='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/img/events-manager.png' width='640' height='360' src='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/vids/fraizers_add_events.mp4' controls='controls' preload='none'></video>
	<br />
   	<br />
   	<hr style='border-top:3px solid'>
   	<h3>Video 6: Updating Welcome Text Area on Home Page</h3>
   	<video id='updateWelcome' poster='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/img/welcome-to-fraizers.png' width='640' height='360' src='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/vids/edit_home_welcome_text.mp4' controls='controls' preload='none'></video>
	<br />
   	<br />
   	<hr style='border-top:3px solid'>
   	<h3>Video 7: Updating <u>Our Menu</u> Section and Corresponding Image on Home Page</h3>
   	<video id='updateOurMenu' poster='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/img/our-menu-section.png' width='640' height='360' src='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/vids/update_our_menu_section.mp4' controls='controls' preload='none'></video>
	<br />
	<p style='font-size:18px;'>This same technique can be applied to the bottom portion of the home page with the same image and corresponding text area</p>
   	<br />
   	<hr style='border-top:3px solid'>
   	<h3>Video 8: Editing Pages Within The Website</h3>
   	<video id='updatePages' poster='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/img/fraizers-edit-pages.png' width='640' height='360' src='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/vids/fraizers-edit-pages.mp4' controls='controls' preload='none'></video>
	<br />
   	<br />
   	<hr style='border-top:3px solid'>
   	<h3>Video 9: Cropping and Resizing Images on Windows 10</h3>
   	<video id='updatePages' poster='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/img/crop-resize-win10.png' width='640' height='360' src='https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/vids/fraizers-cropping-square-images.mp4' controls='controls' preload='none'></video>
	<br />
   	<br />
   	<hr style='border-top:3px solid'>
   
   ";  
}


// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Fraizers Menu', 'fraizers_restaurant' ),
) );
// Nav Walker

//======================================================= STYLE LOGIN SCREEN
function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/website_logo_black.png) !important;
            background-size: 300px !important;
            width: 300px !important;
            height: 120px !important
        }
        body {
        	background: white;
        	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/paper_bg.png) !important;
    		background-repeat: repeat !important;
        }
        a:focus {
        	box-shadow: none;
        }
        .login form {
        	background: transparent;
        }
        .login form::before {
        	display: block;
        	content: "Website Administration Area";
        	margin-top: -20px;
        	padding-bottom: 20px;
        	font-size: 18px;
        	text-align: center;
        }
        .login label {
        	font-size: 18px;
        	font-weight: bold;
        	color: white;
        }
        label[for=user_pass]:before {
        	content: "\f023 \2002";
        	font-family: FontAwesome;
        	color: #999;
        }
        label[for=user_login]:before {
        	content: "\f007 \2002";
        	font-family: FontAwesome;
        	color: #999;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Fraizers Restaurant';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

//LOAD STYLES AND SCRIPTS ON LOGIN PAGE
function fraizers_restaurant_enqueue_style() {
	wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css', false ); 
}

function fraizers_restaurant_enqueue_script() {
	wp_enqueue_script( 'retina-js' , get_template_directory_uri() . '/js/retina.min.js', false, null, true);
}

add_action( 'login_enqueue_scripts', 'fraizers_restaurant_enqueue_style', 10 );
add_action( 'login_enqueue_scripts', 'fraizers_restaurant_enqueue_script', 1 );

//ADMIN SECTION FAVICON ITEMS TO <head> SECTION
function fraizersFavicon() {
 echo '<link rel="Icon" type="image/x-icon" href="https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/img/favicon-32x32.png" />
 <link rel="Shortcut Icon" type="image/x-icon" href="https://fraizersrestaurant.com/wp-content/themes/fraizers_restaurant/img/favicon-32x32.png" />';
 }
 add_action( 'login_head', 'fraizersFavicon' );
 add_action( 'admin_head', 'fraizersFavicon' );

//================================================================= END STYLE LOGIN SCREEN

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//END REMOVE WP EMOJI

//begin blog page read more button
function excerpt_read_more_link($output) {
global $post;
return $output . '<a style="margin-bottom: 20px;" class="" href="?p='. get_the_ID($post->ID) . '"><button class="btn btn-sm btn-default">Read More...</button></a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');
//end blog page read more button

//begin pagination
function fraizers_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
     if(1 != $pages)
     {
         echo "<div class='pagination'>Page:&nbsp;";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a class='btn btn-sm btn-info' href='".get_pagenum_link(1)."'><i class='fa fa-angle-double-left'></i></a>";
         if($paged > 1 && $showitems < $pages) echo "<a class='btn btn-sm btn-info' href='".get_pagenum_link($paged - 1)."'><i class='fa fa-angle-right'></i></a>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='btn btn-default btn-sm'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='btn btn-info btn-sm' >".$i."</a>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<a class='btn btn-info btn-sm' href='".get_pagenum_link($paged + 1)."'><i class='fa fa-angle-right'></i></a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a class='btn btn-info btn-sm' href='".get_pagenum_link($pages)."'><i class='fa fa-angle-double-right'></i></a>";
         global $wp_query;
         echo "&nbsp;of&nbsp;";
		 echo $wp_query->max_num_pages;
         echo "&nbsp;total pages</div>";
     }
}
//end pagination

//WP Helpers
show_admin_bar(false);

// THEME CUSTOMIZER ADD IMAGES AND TEXT TO 4 BOOTSTRAP SLIDERS

function fraizers_restaurant_home_img_slide_1( $wp_customize ) {
    $wp_customize->add_section(
    'home_slide_img_one',
    array(
        'title' => 'Home Page Slideshow Image 1',
        'description' => 'Update or Edit First Image in Slideshow',
        'priority' => 1,
    ));
    $wp_customize->add_setting( 'fraizers_slide_img_upload_one' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fraizers_slide_img_upload_one', array(
        'label'    => __( 'Upload first image:', 'fraizers_restaurant' ),
        'section' => 'home_slide_img_one',
        'settings' => 'fraizers_slide_img_upload_one',
        'description' => 'Upload your first slider image here. <strong>Image must be 3000px wide by 800px tall</strong>. Your iPhone can take pictures this large, just save at full image quality! Image should be .jpg or .png compressed using <a href="http://compressor.io" target="_blank">Compressor.io</a>. **TAKE PHOTOS IN LANDSCAPE (Sideways) ORENTATION NOT PORTRAIT (Tall). VERY IMPORTANT**'
    )));
	$wp_customize->add_setting( 'fraizers_slide_title_1', array(
        'default' => 'No Title Text Has Been Entered',
        'sanitize_callback' => 'sanitize_headline_one_text',
    )); 
    function sanitize_headline_one_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'fraizers_slide_title_1', array(
        'type' => 'text',
        'label'    => __( 'Headline Text Here:', 'fraizers_restaurant' ),
        'section' => 'home_slide_img_one'
    ));
    $wp_customize->add_setting( 'fraizers_slide_text_1', array(
    	'default' => 'No Descriptive Text Has Been Entered',
    	'sanitize_callback' => 'sanitize_slide_one_descriptive_text'
    ));
    function sanitize_slide_one_descriptive_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	} 
	$wp_customize->add_control( 'fraizers_slide_text_1', array(
    	'label'    => __( 'Descriptive Text Here:', 'fraizers_restaurant' ),
    	'section'  => 'home_slide_img_one',
    	'settings' => 'fraizers_slide_text_1',
    	'type'     => 'text'
	));
	$wp_customize->add_setting( 'fraizers_slide_one_link', array(
		'default' => 'http://example.com or /page-name/',
		'sanitize_callback' => 'sanitize_link_one_url',
	));
	function sanitize_link_one_url( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}  
	$wp_customize->add_control( 'fraizers_slide_one_link', array(
    	'label'    => __( 'Slide 1 URL Here:', 'fraizers_restaurant' ),
    	'section'  => 'home_slide_img_one',
    	'settings' => 'fraizers_slide_one_link',
    	'type'     => 'text',
	));       
}
add_action( 'customize_register', 'fraizers_restaurant_home_img_slide_1' );

// SECOND IMAGE
function fraizers_restaurant_home_img_slide_2( $wp_customize ) {
    $wp_customize->add_section(
    'home_slide_img_two',
    array(
        'title' => 'Home Page Slideshow Image 2',
        'description' => 'Update or Edit Second Image in Slideshow',
        'priority' => 2,
    ));
    $wp_customize->add_setting( 'fraizers_slide_img_upload_two' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fraizers_slide_img_upload_two', array(
        'label'    => __( 'Upload second image:', 'fraizers_restaurant' ),
        'section' => 'home_slide_img_two',
        'settings' => 'fraizers_slide_img_upload_two',
        'description' => 'Upload your second slider image here. <strong>Image must be 3000px wide by 800px tall</strong>. Your iPhone can take pictures this large, just save at full image quality! Image should be .jpg or .png compressed using <a href="http://compressor.io" target="_blank">Compressor.io</a>. **TAKE PHOTOS IN LANDSCAPE (Sideways) ORENTATION NOT PORTRAIT (Tall). VERY IMPORTANT**'
    )));
	$wp_customize->add_setting( 'fraizers_slide_title_2', array(
        'default' => 'No Title Text Has Been Entered',
        'sanitize_callback' => 'sanitize_headline_two_text',
    )); 
    function sanitize_headline_two_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'fraizers_slide_title_2', array(
        'type' => 'text',
        'label'    => __( 'Headline Text Here:', 'fraizers_restaurant' ),
        'section' => 'home_slide_img_two'
    ));
    $wp_customize->add_setting( 'fraizers_slide_text_2', array(
    	'default' => 'No Descriptive Text Has Been Entered',
    	'sanitize_callback' => 'sanitize_slide_two_descriptive_text'
    ));
    function sanitize_slide_two_descriptive_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	} 
	$wp_customize->add_control( 'fraizers_slide_text_2', array(
    	'label'    => __( 'Descriptive Text Here:', 'fraizers_restaurant' ),
    	'section'  => 'home_slide_img_two',
    	'settings' => 'fraizers_slide_text_2',
    	'type'     => 'text'
	));
	$wp_customize->add_setting( 'fraizers_slide_two_link', array(
		'default' => 'http://example.com or /page-name/',
		'sanitize_callback' => 'sanitize_link_two_url',
	));
	function sanitize_link_two_url( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}  
	$wp_customize->add_control( 'fraizers_slide_two_link', array(
    	'label'    => __( 'Slide 2 URL Here:', 'fraizers_restaurant' ),
    	'section'  => 'home_slide_img_two',
    	'settings' => 'fraizers_slide_two_link',
    	'type'     => 'text',
	));       
}
add_action( 'customize_register', 'fraizers_restaurant_home_img_slide_2' );

//THIRD IMAGE
function fraizers_restaurant_home_img_slide_3( $wp_customize ) {
    $wp_customize->add_section(
    'home_slide_img_three',
    array(
        'title' => 'Home Page Slideshow Image 3',
        'description' => 'Update or Edit Third Image in Slideshow',
        'priority' => 3,
    ));
    $wp_customize->add_setting( 'fraizers_slide_img_upload_three' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fraizers_slide_img_upload_three', array(
        'label'    => __( 'Upload third image:', 'fraizers_restaurant' ),
        'section' => 'home_slide_img_three',
        'settings' => 'fraizers_slide_img_upload_three',
        'description' => 'Upload your first slider image here. <strong>Image must be 3000px wide by 800px tall</strong>. Your iPhone can take pictures this large, just save at full image quality! Image should be .jpg or .png compressed using <a href="http://compressor.io" target="_blank">Compressor.io</a>. **TAKE PHOTOS IN LANDSCAPE (Sideways) ORENTATION NOT PORTRAIT (Tall). VERY IMPORTANT**'
    )));
	$wp_customize->add_setting( 'fraizers_slide_title_3', array(
        'default' => 'No Title Text Has Been Entered',
        'sanitize_callback' => 'sanitize_headline_three_text',
    )); 
    function sanitize_headline_three_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'fraizers_slide_title_3', array(
        'type' => 'text',
        'label'    => __( 'Headline Text Here:', 'fraizers_restaurant' ),
        'section' => 'home_slide_img_three'
    ));
    $wp_customize->add_setting( 'fraizers_slide_text_3', array(
    	'default' => 'No Descriptive Text Has Been Entered',
    	'sanitize_callback' => 'sanitize_slide_three_descriptive_text'
    ));
    function sanitize_slide_three_descriptive_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	} 
	$wp_customize->add_control( 'fraizers_slide_text_3', array(
    	'label'    => __( 'Descriptive Text Here:', 'fraizers_restaurant' ),
    	'section'  => 'home_slide_img_three',
    	'settings' => 'fraizers_slide_text_3',
    	'type'     => 'text'
	));
	$wp_customize->add_setting( 'fraizers_slide_three_link', array(
		'default' => 'http://example.com or /page-name/',
		'sanitize_callback' => 'sanitize_link_three_url',
	));
	function sanitize_link_three_url( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}  
	$wp_customize->add_control( 'fraizers_slide_three_link', array(
    	'label'    => __( 'Slide 3 URL Here:', 'fraizers_restaurant' ),
    	'section'  => 'home_slide_img_three',
    	'settings' => 'fraizers_slide_three_link',
    	'type'     => 'text',
	));       
}
add_action( 'customize_register', 'fraizers_restaurant_home_img_slide_3' );

//FOURTH IMAGE
function fraizers_restaurant_home_img_slide_4( $wp_customize ) {
    $wp_customize->add_section(
    'home_slide_img_four',
    array(
        'title' => 'Home Page Slideshow Image 4',
        'description' => 'Update or Edit Fourth Image in Slideshow',
        'priority' => 4,
    ));
    $wp_customize->add_setting( 'fraizers_slide_img_upload_four' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fraizers_slide_img_upload_four', array(
        'label'    => __( 'Upload fourth image:', 'fraizers_restaurant' ),
        'section' => 'home_slide_img_four',
        'settings' => 'fraizers_slide_img_upload_four',
        'description' => 'Upload your fourth slider image here. <strong>Image must be 3000px wide by 800px tall</strong>. Your iPhone can take pictures this large, just save at full image quality! Image should be .jpg or .png compressed using <a href="http://compressor.io" target="_blank">Compressor.io</a>. **TAKE PHOTOS IN LANDSCAPE (Sideways) ORENTATION NOT PORTRAIT (Tall). VERY IMPORTANT** '
    )));
	$wp_customize->add_setting( 'fraizers_slide_title_4', array(
        'default' => 'No Title Text Has Been Entered',
        'sanitize_callback' => 'sanitize_headline_four_text',
    )); 
    function sanitize_headline_four_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'fraizers_slide_title_4', array(
        'type' => 'text',
        'label'    => __( 'Headline Text Here:', 'fraizers_restaurant' ),
        'section' => 'home_slide_img_four'
    ));
    $wp_customize->add_setting( 'fraizers_slide_text_4', array(
    	'default' => 'No Descriptive Text Has Been Entered',
    	'sanitize_callback' => 'sanitize_slide_four_descriptive_text'
    ));
    function sanitize_slide_four_descriptive_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	} 
	$wp_customize->add_control( 'fraizers_slide_text_4', array(
    	'label'    => __( 'Descriptive Text Here:', 'fraizers_restaurant' ),
    	'section'  => 'home_slide_img_four',
    	'settings' => 'fraizers_slide_text_4',
    	'type'     => 'text'
	));
	$wp_customize->add_setting( 'fraizers_slide_four_link', array(
		'default' => 'http://example.com or /page-name/',
		'sanitize_callback' => 'sanitize_link_four_url',
	));
	function sanitize_link_four_url( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}  
	$wp_customize->add_control( 'fraizers_slide_four_link', array(
    	'label'    => __( 'Slide 4 URL Here:', 'fraizers_restaurant' ),
    	'section'  => 'home_slide_img_four',
    	'settings' => 'fraizers_slide_four_link',
    	'type'     => 'text',
	));       
}
add_action( 'customize_register', 'fraizers_restaurant_home_img_slide_4' );

// HOME PAGE BODY IMAGE
function fraizers_restaurant_home_body_img_1( $wp_customize ) {
    $wp_customize->add_section(
    'home_body_img_one',
    array(
        'title' => 'Home Page Body Image 1',
        'description' => 'Update or Edit First Image on Page Content',
        'priority' => 5,
    ));
    $wp_customize->add_setting( 'fraizers_body_img_upload_one' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fraizers_body_img_upload_one', array(
        'label'    => __( 'Upload image:', 'fraizers_restaurant' ),
        'section' => 'home_body_img_one',
        'settings' => 'fraizers_body_img_upload_one',
        'description' => 'Upload your image here. <strong>Image must be 635px wide by 635px tall</strong>. Your iPhone/Android can take pictures this large, just save at full image quality! Image should be .jpg or .png compressed using <a target="_blank" href="http://compressor.io">Compressor.io</a>. **TAKE PHOTOS IN LANDSCAPE (Sideways) ORENTATION NOT PORTRAIT (Tall). VERY IMPORTANT**'
    )));
    $wp_customize->add_setting( 'fraizers_body_img_alt', array(
        'default' => 'No Alt Text Has Been Entered',
        'sanitize_callback' => 'sanitize_body_img_alt',
    )); 
    function sanitize_body_img_alt( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'fraizers_body_img_alt', array(
        'type' => 'text',
        'label'    => __( 'Image Alt Text Here:', 'fraizers_restaurant' ),
        'section' => 'home_body_img_one'
    ));
}
add_action( 'customize_register', 'fraizers_restaurant_home_body_img_1' );

// HOME PAGE BODY IMAGE 2
function fraizers_restaurant_home_body_img_2( $wp_customize ) {
    $wp_customize->add_section(
    'home_body_img_two',
    array(
        'title' => 'Home Page Body Image 2',
        'description' => 'Update or Edit Second Image on Page Content',
        'priority' => 7,
    ));
    $wp_customize->add_setting( 'fraizers_body_img_upload_two' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fraizers_body_img_upload_two', array(
        'label'    => __( 'Upload image:', 'fraizers_restaurant' ),
        'section' => 'home_body_img_two',
        'settings' => 'fraizers_body_img_upload_two',
        'description' => 'Upload your image here. <strong>Image must be 635px wide by 635px tall</strong>. Your iPhone/Android can take pictures this large, just save at full image quality! Image should be .jpg or .png compressed using <a target="_blank" href="http://compressor.io">Compressor.io</a>. **TAKE PHOTOS IN LANDSCAPE (Sideways) ORENTATION NOT PORTRAIT (Tall). VERY IMPORTANT**'
    )));
    $wp_customize->add_setting( 'fraizers_body_img_alt_2', array(
        'default' => 'No Alt Text Has Been Entered',
        'sanitize_callback' => 'sanitize_body_img_alt_2',
    )); 
    function sanitize_body_img_alt_2( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'fraizers_body_img_alt_2', array(
        'type' => 'text',
        'label'    => __( 'Image Alt Text Here:', 'fraizers_restaurant' ),
        'section' => 'home_body_img_two'
    ));
}
add_action( 'customize_register', 'fraizers_restaurant_home_body_img_2' );

// HOME PAGE PARALLAX AREA
function fraizers_restaurant_parallax_area( $wp_customize ) {
    $wp_customize->add_section(
    'home_page_parallax',
    array(
        'title' => 'Home Page Parallax Image/Text',
        'description' => 'Update or Edit Home Page Parallax Image and Text',
        'priority' => 6,
    ));
    $wp_customize->add_setting( 'fraizers_home_parallax' );
 	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fraizers_parallax_img_upload', array(
        'label'    => __( 'Upload image:', 'fraizers_restaurant' ),
        'section' => 'home_page_parallax',
        'settings' => 'fraizers_home_parallax',
        'description' => 'Upload your image here. <strong>Image must be 2000px wide by 1500px tall</strong>. Your iPhone/Android can take pictures this large, just save at full image quality! Image should be .jpg or .png compressed using <a target="_blank" href="http://compressor.io">Compressor.io</a>. **TAKE PHOTOS IN LANDSCAPE (Sideways) ORENTATION NOT PORTRAIT (Tall). VERY IMPORTANT**'
    )));
    $wp_customize->add_setting( 'fraizers_parallax_heading', array(
        'default' => 'No Heading Text Has Been Entered',
        'sanitize_callback' => 'sanitize_parallax_heading_text',
    )); 
    function sanitize_parallax_heading_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'fraizers_parallax_heading', array(
        'type' => 'text',
        'label'    => __( 'Heading Text Here:', 'fraizers_restaurant' ),
        'section' => 'home_page_parallax'
    ));
    $wp_customize->add_setting( 'fraizers_parallax_paragraph', array(
        'default' => 'No Paragraph Text Has Been Entered',
        'sanitize_callback' => 'sanitize_parallax_paragraph_text',
    )); 
    function sanitize_parallax_paragraph_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}
	$wp_customize->add_control( 'fraizers_parallax_paragraph', array(
        'type' => 'text',
        'label'    => __( 'Paragraph Text Here:', 'fraizers_restaurant' ),
        'section' => 'home_page_parallax'
    ));
    $wp_customize->add_setting( 'fraizers_parallax_link', array(
		'default' => 'http://example.com or page-name',
		'sanitize_callback' => 'sanitize_parallax_url',
	));
	function sanitize_parallax_url( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}  
	$wp_customize->add_control( 'fraizers_parallax_link', array(
    	'label'    => __( 'Button URL Here:', 'fraizers_restaurant' ),
    	'section'  => 'home_page_parallax',
    	'settings' => 'fraizers_parallax_link',
    	'type'     => 'text',
	));
	$wp_customize->add_setting( 'fraizers_parallax_link_text', array(
		'default' => 'Button Text Here',
		'sanitize_callback' => 'sanitize_parallax_url_text',
	));
	function sanitize_parallax_url_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
	}  
	$wp_customize->add_control( 'fraizers_parallax_link_text', array(
    	'label'    => __( 'Button TEXT Here:', 'fraizers_restaurant' ),
    	'section'  => 'home_page_parallax',
    	'settings' => 'fraizers_parallax_link_text',
    	'type'     => 'text',
	));             
}
add_action( 'customize_register', 'fraizers_restaurant_parallax_area' );
