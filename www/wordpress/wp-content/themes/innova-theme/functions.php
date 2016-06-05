<?php
/**
 * Bootstrap functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 *
 * Last Updated: September 9, 2012
 */

 //date_default_timezone_set('GMT');
 
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );


if (!defined('BOOTSTRAPWP_VERSION'))
define('BOOTSTRAPWP_VERSION', '.90');

 /**
 * Declaring the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
  $content_width = 770; /* pixels */

/*
| -------------------------------------------------------------------
| Setup Theme
| -------------------------------------------------------------------
|
| */
add_action( 'after_setup_theme', 'bootstrapwp_theme_setup' );
if ( ! function_exists( 'bootstrapwp_theme_setup' ) ):
function bootstrapwp_theme_setup() {
  add_theme_support( 'automatic-feed-links' );
  /**
   * Adds custom menu with wp_page_menu fallback
   */
  register_nav_menus( array(
    'main-menu' => __( 'Main Menu','bootstrapwp' ),
    'top-menu' => __( 'Top Menu','bootstrapwp' ),
    'footer-menu-col-1' => __( 'Footer Menu Col 1','bootstrapwp'),
    'footer-menu-col-2' => __( 'Footer Menu Col 2','bootstrapwp'),
    'footer-menu-col-3' => __( 'Footer Menu Col 3','bootstrapwp')
  ) );
  add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery', 'link', 'quote', 'status', 'video', 'audio', 'chat' ) );
  /**
   * Declaring the theme language domain
   */
   load_theme_textdomain('bootstrapwp', get_template_directory() . '/lang');
}
endif;

################################################################################
// Loading All CSS Stylesheets
################################################################################
function bootstrapwp_css_loader() {
    //wp_enqueue_style('bootstrapmin', get_template_directory_uri().'/css/bootstrap.min.css', false , 'all' );
    //wp_enqueue_style('bootstrapopup', get_template_directory_uri().'/css/bootstrap-lightbox.min.css', false , 'all' );
    wp_enqueue_style('main', get_template_directory_uri().'/css/style.min.css', false , 'all' );
  }
add_action('wp_enqueue_scripts', 'bootstrapwp_css_loader');

################################################################################
// Loading all JS Script Files.  Remove any files you are not using!
################################################################################

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

function bootstrapwp_js_loader() {
      //wp_enqueue_script( 'jquery' );
      wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/js/jquery.stellar.min.js', array('jquery'), true );
      wp_enqueue_script('morphtext', get_template_directory_uri().'/js/morphtext.min.js', array('jquery'), true );
      wp_enqueue_script('hover', get_template_directory_uri().'/js/hoverIntent.js', array('jquery'), true );
	  wp_enqueue_script('superfish', get_template_directory_uri().'/js/superfish.js', array('jquery'), true );
	  wp_enqueue_script('wow', get_template_directory_uri().'/js/wow.min.js', array('jquery'), true );
	  wp_enqueue_script('owl', get_template_directory_uri().'/js/owl.carousel.min.js', array('jquery'), true );
	  wp_enqueue_script('iso', get_template_directory_uri().'/js/isotope.pkgd.min.js', array('jquery'), true );
	  wp_enqueue_script('isoimg', get_template_directory_uri().'/js/imagesloaded.pkgd.min.js', array('jquery'), true );
	  wp_enqueue_script('custom', get_template_directory_uri().'/js/custom.js', array('jquery'), true );
  }
add_action('wp_enqueue_scripts', 'bootstrapwp_js_loader');

//function wpshock_search_filter( $query ) {
//    if ( $query->is_search ) {
//        $query->set( 'post_type', array('post') );
//    }
//    return $query;
//}
//add_filter('pre_get_posts','wpshock_search_filter');

/*
| -------------------------------------------------------------------
| Top Navigation Bar Customization
| -------------------------------------------------------------------

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function bootstrapwp_page_menu_args( $args ) {
  $args['show_home'] = true;
  return $args;
}
add_filter( 'wp_page_menu_args', 'bootstrapwp_page_menu_args' );

/**
 * Get file 'includes/class-bootstrap_walker_nav_menu.php' with Custom Walker class methods
 * */

//include 'includes/class-bootstrapwp_walker_nav_menu.php';
//include 'includes/class-bootstrapwp_child_walker_nav_menu.php';
//include 'includes/class-bootstrapwp_current_child_walker_nav_menu.php';
//include 'includes/class-custom-menu-walker.php';
include 'includes/wp-walker.php';

//add_action( 'admin_menu', 'my_remove_menu_pages' );
//
//function my_remove_menu_pages() {
//    remove_menu_page('link-manager.php');
//}

/*
| -------------------------------------------------------------------
| Registering Widget Sections
| -------------------------------------------------------------------
| */
function bootstrapwp_widgets_init() {
  register_sidebar( array(
    'name' => 'Posts Sidebar',
    'id' => 'sidebar-posts',
    'before_widget' => '<div class="widget widget_categories">',
    'after_widget' => "</div>",
    'before_title' => '<h3 class="widgettitle">',
    'after_title' => '</h3>',
  ) );
  register_sidebar( array(
    'name' => 'Footer Col 1',
    'id' => 'foot-col-1',
    'before_widget' => '',
    'after_widget' => "",
    'before_title' => '<p class="side-heads">',
    'after_title' => '</p>',
  ) );
  register_sidebar( array(
    'name' => 'Footer Col 2',
    'id' => 'foot-col-2',
    'before_widget' => '',
    'after_widget' => "",
    'before_title' => '<p class="side-heads">',
    'after_title' => '</p>',
  ) );
  register_sidebar( array(
    'name' => 'Footer Col 3',
    'id' => 'foot-col-3',
    'before_widget' => '',
    'after_widget' => "",
    'before_title' => '<p class="side-heads">',
    'after_title' => '</p>',
  ) );
}
add_action( 'init', 'bootstrapwp_widgets_init' );

/*
| -------------------------------------------------------------------
| Adding Post Thumbnails and Image Sizes
| -------------------------------------------------------------------
| */
//if ( function_exists( 'add_theme_support' ) ) {
//  add_theme_support( 'post-thumbnails' );
//  set_post_thumbnail_size( 160, 120 ); // 160 pixels wide by 120 pixels high
//  
//}
//
//if ( function_exists( 'add_image_size' ) ) {
//  add_image_size( 'bootstrap-small', 260, 180 ); // 260 pixels wide by 180 pixels high
//  add_image_size( 'blog-medium', 470, 365 ); // 360 pixels wide by 268 pixels high
//  add_image_size( 'secondary-img', 570, 290);
//  add_image_size( 'ranges-preview', 390, 190 ); // 370 pixels wide by 240 pixels high
//}

    /* Remove thumbnail classes for blog post images */
    //function the_post_thumbnail_remove_class($output) {
    //        $output = preg_replace('/class=".*?"/', '', $output);
    //        return $output;
    //}
    //add_filter('post_thumbnail_html', 'the_post_thumbnail_remove_class');

//add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
//add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
// 
//function remove_width_attribute( $html ) {
//    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
//    return $html;
//}

//add_action('restrict_manage_posts','my_restrict_manage_posts');
//
//		function my_restrict_manage_posts() {
//			global $typenow;
//
//			if ($typenow=='product-details'){
//                         $args = array(
//                             'show_option_all' => "Show All Ranges",
//                             'taxonomy'        => 'range',
//                             'name'               => 'Range'
//
//                         );
//				wp_dropdown_categories($args);
//                        }
//		}
//add_action( 'request', 'my_request' );
//function my_request($request) {
//	if (is_admin() && $GLOBALS['PHP_SELF'] == '/wp-admin/edit.php' && isset($request['post_type']) && $request['post_type']=='product-details') {
//		$request['term'] = get_term($request['product-details'],'product-details')->name;
//
//	}
//	return $request;
//}


function add_body_class( $classes )
{
    global $post;
    if ( isset( $post ) ) {
        $classes[] =  $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'add_body_class' );

function menu_set_dropdown( $sorted_menu_items, $args ) {
    $last_top = 0;
    foreach ( $sorted_menu_items as $key => $obj ) {
        // it is a top lv item?
        if ( 0 == $obj->menu_item_parent ) {
            // set the key of the parent
            $last_top = $key;
        } else {
            $sorted_menu_items[$last_top]->classes['dropdown'] = 'dropdown';
        }
    }
    return $sorted_menu_items;
}
add_filter( 'wp_nav_menu_objects', 'menu_set_dropdown', 10, 2 );

/* Blog post Query by date */
function home_page_current_year( $query ){
    if( $query->is_home() && $query->is_main_query() )
        $query->set( 'year', date('Y') );
}
add_action( 'pre_get_posts', 'home_page_current_year' );

/*
| -------------------------------------------------------------------
| Revising Default Excerpt
| -------------------------------------------------------------------
| Adding filter to post excerpts to contain ...Continue Reading link
| */

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

function bootstrapwp_excerpt($more) {
       global $post;
  return '';
}
add_filter('excerpt_more', 'bootstrapwp_excerpt');

function pagination_small() {
global $wp_query;
    $total_pages = $wp_query->max_num_pages;
      if ($total_pages > 1){
	$current_page = max(1, get_query_var('paged'));
	  //echo '<div class="pagination">';
	    echo paginate_links(array(
		'base' => get_pagenum_link(1) . '%_%',
		'format' => '/page/%#%',
		'current' => $current_page,
		'total' => $total_pages,
		'prev_text' => '<img src="/wp-content/themes/avacta/img/arrow-l.png" alt="Arrow Left">',
		'next_text' => '<img src="/wp-content/themes/avacta/img/arrow-r.png" alt="Arrow Right">',
		'type' => 'list'
	));
      //echo '</div>'; 
  }
}

if ( ! function_exists( 'yourtheme_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 * Based on paging nav function from Twenty Fourteen
 */

function lees_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 3,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'lees' ),
		'next_text' => __( 'Next &rarr;', 'lees' ),
		'type'      => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
      <div class="row no-pad">
      <div class="col-md-8 col-sm-8 col-xs-12">
      <div class="paging">
			<?php echo $links; ?>
      </div>
      </div>
      </div>
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;




if ( ! function_exists( 'search_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function search_nav( $nav_id ) {
	global $wp_query;
	?>

	<?php if ( is_single() ) : // navigation links for single posts ?>
<ul class="pager">
		<?php previous_post_link( '<li class="previous">%link</li>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bootstrapwp' ) . '</span> %title' ); ?>
		<?php next_post_link( '<li class="next">%link</li>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bootstrapwp' ) . '</span>' ); ?>
</ul>
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
<ul class="pager">
		<?php if ( get_previous_posts_link() ) : ?>
		<li class="previous"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Previous results', 'bootstrapwp' ) ); ?></li>
		<?php endif; ?>
  
		<?php if ( get_next_posts_link() ) : ?>
		<li class="next"><?php next_posts_link( __( 'More results <span class="meta-nav">&rarr;</span>', 'bootstrapwp' ) ); ?></li>
		<?php endif; ?>
</ul>
	<?php endif; ?>
	<?php
}
endif; // bootstrapwp_content_nav
if ( ! function_exists( 'bootstrapwp_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function bootstrapwp_content_nav( $nav_id ) {
	global $wp_query;
	?>
	<?php if ( is_single() ) : // navigation links for single posts ?>
<ul class="pager">
		<?php previous_post_link( '<li class="previous">%link</li>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bootstrapwp' ) . '</span> %title' ); ?>
		<?php next_post_link( '<li class="next">%link</li>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bootstrapwp' ) . '</span>' ); ?>
</ul>
	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
<ul class="pager">
		<?php if ( get_next_posts_link() ) : ?>
		<li class="next"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'bootstrapwp' ) ); ?></li>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<li class="previous"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'bootstrapwp' ) ); ?></li>
		<?php endif; ?>
</ul>
	<?php endif; ?>

	<?php
}
endif; // bootstrapwp_content_nav


if ( ! function_exists( 'bootstrapwp_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own bootstrap_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'bootstrap' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'bootstrap' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'bootstrap' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'bootstrap' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'bootstrap' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'bootstrap' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for bootstrapwp_comment()

if ( ! function_exists( 'bootstrapwp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own bootstrap_posted_on to override in a child theme
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_posted_on() {
	printf( __( '<span class="sep">Posted By: </span><span class="byline"><span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span><a href="%1$s" title="%2$s" rel="bookmark"><span class="sep"> on </span><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>', 'bootstrap' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'bootstrap' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_body_classes( $classes ) {
	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	return $classes;
}
add_filter( 'body_class', 'bootstrapwp_body_classes' );

/**
 * Returns true if a blog has more than 1 category
 *
 * @since WP-Bootstrap .5
 */
function bootstrapwp_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so bootstrap_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so bootstrap_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in bootstrapwp_categorized_blog
 *
 * @since bootstrap 1.2
 */
function bootstrapwp_category_transient_flusher() {
  // Like, beat it. Dig?
  delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'bootstrapwp_category_transient_flusher' );
add_action( 'save_post', 'bootstrapwp_category_transient_flusher' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
//function bootstrapwp_enhanced_image_navigation( $url ) {
//	global $post;
//
//	if ( wp_attachment_is_image( $post->ID ) )
//		$url = $url . '#main';
//
//	return $url;
//}
//add_filter( 'attachment_link', 'bootstrapwp_enhanced_image_navigation' );

/*
| -------------------------------------------------------------------
| Checking for Post Thumbnail
| -------------------------------------------------------------------
|
| */
//function bootstrapwp_post_thumbnail_check() {
//    global $post;
//    if (get_the_post_thumbnail()) {
//          return true; }
//          else { return false; }
//}

/*
| -------------------------------------------------------------------
| Setting Featured Image (Post Thumbnail)
| -------------------------------------------------------------------
| Will automatically add the first image attached to a post as the Featured Image if post does not have a featured image previously set.
| */
//function bootstrapwp_autoset_featured_img() {
//  $post_thumbnail = bootstrapwp_post_thumbnail_check();
//  if ($post_thumbnail == true ){
//    return the_post_thumbnail();
//  }
//    if ($post_thumbnail == false ){
//      $image_args = array(
//                'post_type' => 'attachment',
//                'numberposts' => 1,
//                'post_mime_type' => 'image',
//                'post_parent' => $post->ID,
//                'order' => 'desc'
//          );
//      $attached_image = get_children( $image_args );
//             if ($attached_image) {
//                                foreach ($attached_image as $attachment_id => $attachment) {
//                                set_post_thumbnail($post->ID, $attachment_id);
//                                }
//            return the_post_thumbnail();
//          } else { return " ";}
//        }
//      }  //end function

/*
| -------------------------------------------------------------------
| Adding Breadcrumbs
| -------------------------------------------------------------------
|
| */
 function bootstrapwp_breadcrumbs() {

  $delimiter = '';
  $home = 'Home'; // text for the 'Home' link
  $before = '<li class="active">'; // tag before the current crumb
  $after = '</li>'; // tag after the current crumb

  if ( !is_home() && !is_front_page() || is_paged() ) {

    echo '<ul class="breadcrumb">';

    global $post;
    $homeLink = home_url();
    echo '<li><a href="' . $homeLink . '">' . $home . '</a></li> ' . $delimiter . ' ';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;

    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page', 'bootstrapwp') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</ul>';

  }
} // end bootstrapwp_breadcrumbs()
/*
| -------------------------------------------------------------------
| Remove wordpress version meta
| -------------------------------------------------------------------
|
| */
remove_action('wp_head', 'wp_generator');

add_filter('xmlrpc_enabled', '__return_false');
/*
| -------------------------------------------------------------------
| Remove after comments notes
| -------------------------------------------------------------------
|
| */

add_filter('comment_form_defaults','changing_comment_form_defaults');
function changing_comment_form_defaults($defaults){
  $defaults['comment_notes_after']='';
  return $defaults;
}