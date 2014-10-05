<?php
/**
 * horizonweb functions and definitions
 *
 * @package horizonweb
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'horizonweb_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function horizonweb_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on horizonweb, use a find and replace
	 * to change 'horizonweb' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'horizonweb', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'horizonweb' ),
	) );

	register_nav_menus( array(
		'secondary' => __( 'Secondary Menu', 'horizonweb' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'horizonweb_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // horizonweb_setup
add_action( 'after_setup_theme', 'horizonweb_setup' );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function horizonweb_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'horizonweb' ),
		'id'            => 'right-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );

	register_sidebar( array(
		'name' 				=> __( 'Services Page Section', 'horizonweb' ),
		'id' 					=> 'horizonweb_services_page_sidebar',
		'description'   	=> __( 'Shows widgets on Services Page Template. Suitable widget: Horizonweb: Services','horizonweb' ),
		'before_widget' 	=> '<div id="%1$s" class="widget %2$s services-offer">',
		'after_widget'  	=> '</div>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>',
		
	) );

	register_sidebar( array(
		'name' 				=> __( 'Quote Text', 'horizonweb' ),
		'id' 					=> 'horizonweb_quotetext_sidebar',
		'description'   	=> __( 'Shows widgets on homepage as quote','horizonweb' ),
		'before_widget' 	=> '<span id="%1$s" class="widget %2$s style1">',
		'after_widget'  	=> '</span>',
		'before_title'  	=> '<h3 class="widget-title">',
		'after_title'   	=> '</h3>',
		
	) );

	// Registering widgets
	register_widget( "horizonweb_service_widget" );

}
add_action( 'widgets_init', 'horizonweb_widgets_init' );


/**
 * Widget for business layout that shows selected page content,title and featured image.
 * Construct the widget. 
 * i.e. Name, description and control options.
 */
 class horizonweb_service_widget extends WP_Widget {
 	function horizonweb_service_widget() {
 		$widget_ops = array( 'classname' => 'widget_service', 'description' => __( 'Display Services( Services Layout )', 'horizonweb' ) );
		$control_ops = array( 'width' => 200, 'height' =>250 ); 
		parent::WP_Widget( false, $name = __( 'horizonweb: Services', 'horizonweb' ), $widget_ops, $control_ops);
 	}

 	function form( $instance ) {
 		for ( $i=0; $i<8; $i++ ) {
 			$var = 'page_id'.$i;
 			$defaults[$var] = '';
 		}
 		$instance = wp_parse_args( (array) $instance, $defaults );
 		for ( $i=0; $i<8; $i++ ) {
 			$var = 'page_id'.$i;
 			$var = absint( $instance[ $var ] );
		}
	?>
<?php for( $i=0; $i<8; $i++) { ?>
<p>
  <label for="<?php echo $this->get_field_id( key($defaults) ); ?>">
    <?php _e( 'Page', 'horizonweb' ); ?>
    :</label>
  <?php wp_dropdown_pages( array( 'show_option_none' =>' ','name' => $this->get_field_name( key($defaults) ), 'selected' => $instance[key($defaults)] ) ); ?>
</p>
<?php
		next( $defaults );// forwards the key of $defaults array
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		for( $i=0; $i<8; $i++ ) {
			$var = 'page_id'.$i;
			$instance[ $var] = absint( $new_instance[ $var ] );
		}

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );
 		extract( $instance );

 		global $post;
 		$page_array = array();
 		for( $i=0; $i<8; $i++ ) {
 			$var = 'page_id'.$i;
 			$page_id = isset( $instance[ $var ] ) ? $instance[ $var ] : '';
 			
 			if( !empty( $page_id ) )
 				array_push( $page_array, $page_id );// Push the page id in the array
 		}
		$get_featured_pages = new WP_Query( array(
			'posts_per_page' 			=> -1,
			'post_type'					=>  array( 'page' ),
			'post__in'		 			=> $page_array,
			'orderby' 		 			=> 'post__in'
		) ); 
		echo $before_widget; ?>

  <?php 
				$j = 1;
	 			while( $get_featured_pages->have_posts() ):$get_featured_pages->the_post();
					$page_title = get_the_title();
					if( $j % 4 == 0 && $j > 3 ) {
						$service_class = "col-sm-3 clearfix-half";
					}	
					else {
						$service_class = "col-sm-3";
					}			
					?>
  <div class="<?php echo $service_class; ?>">

    <?php 
		if ( has_post_thumbnail() ) {
			echo'<div class="service-icon">'.get_the_post_thumbnail( $post->ID, 'icon' ).'</div>';
		}
	?>
      <h3><?php echo $page_title; ?></h3>
    <!-- .services-item -->
    <article>
      <?php the_excerpt(); ?>
    </article>
    <a class="more-link" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
    <?php _e( 'Read more','horizonweb' ); ?>
    </a>
  </div>
  <!-- .col-sm-3 -->
  <?php $j++; ?>
  <?php endwhile;
		 		// Reset Post Data
	 			wp_reset_query(); 
	 			?>
<?php echo $after_widget;
 		}
 	}

/**
 * END OF SERVICES WIDGET
 */

/**
 * Enqueue scripts and styles.
 */
function horizonweb_scripts() {
	
	wp_register_style( 'horizonweb-googlewebfont', 'http://fonts.googleapis.com/css?family=Roboto:700,500,900,400,300|Raleway:400,300,700,800,500' ); 

	if (!is_admin()) {
            wp_deregister_script('jquery');
            wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-1.10.2.min.js', false, '1.10.2', true);
            wp_enqueue_script('jquery');
	}

    wp_enqueue_style( 'horizonweb-googlewebfont' );
	wp_enqueue_style( 'horizonweb-common', get_template_directory_uri() . '/src/css/common.css', array(), '20140921' );
	wp_enqueue_style( 'horizonweb', get_stylesheet_uri() );
        wp_enqueue_style( 'horizonweb-bootstrap', get_template_directory_uri() . '/src/css/bootstrap.css', array(), '20140921' );
        wp_enqueue_style( 'horizonweb-responsive', get_template_directory_uri() . '/src/css/responsive.css', array(), '20140921' );
    
	wp_enqueue_script( 'horizonweb-navigation', get_template_directory_uri() . '/src/js/navigation.js', array(), '20140921', true );
	wp_enqueue_script( 'horizonweb-skip-link-focus-fix', get_template_directory_uri() . '/src/js/skip-link-focus-fix.js', array(), '20140921', true );
        wp_enqueue_script( 'horizonweb-bootstrap-js', get_template_directory_uri() . '/src/js/bootstrap.js', array(), '20140921', true );
        wp_enqueue_script( 'horizonweb-main-js', get_template_directory_uri() . '/src/js/main.js', array(), '20140921', true );
        wp_enqueue_script( 'horizonweb-modernizr', get_template_directory_uri() . '/src/js/modernizr-2.6.2.min.js', array(), '20140921', false );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'horizonweb_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



// CUSTOM CODE STSRT FROM HERE


// Custom favicon

add_action( 'wp_head', 'horizonweb_favicon');
function horizonweb_favicon(){
  echo "<link rel='shortcut icon' href='" . get_stylesheet_directory_uri() . "/images/favicon.ico' />";
}




//  Call stylesheet specific for iPhone and iPad

add_action('wp_print_styles', 'horizonweb_enqueue_styles');
function horizonweb_enqueue_styles(){
  global $is_iphone;
  if( $is_iphone ){
    wp_enqueue_style('iphone', get_stylesheet_directory_uri() . 'src/css/iphone-ipad.css' );
  }
}

//  Remove generator meta tag code from site

add_filter('the_generator', create_function('', 'return "";'));




// Redirect WordPress Feeds To FeedBurner

// add_action('template_redirect', 'horizonweb_rss_redirect');
// function horizonweb_rss_redirect() {
//   if ( is_feed() && !preg_match('/feedburner|feedvalidator/i', $_SERVER['HTTP_USER_AGENT'])){
//     header('Location: http://feeds.feedburner.com/horizonweb');
//     header('HTTP/1.1 302 Temporary Redirect');
//   }
// }


/**
 * HTML format of the search form.
 *
 * @package horizonweb
 *
 * 
 */

function my_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
	<input type="text" value="' . get_search_query() . '" placeholder="' . esc_attr_x( 'Search&hellip;', 'placeholder' ) . '" name="s" id="s" />
	</div>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'my_search_form' );