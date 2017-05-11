<?php

function cr3ativ_edd_fes_author_url( $author = null ) {
	if ( ! $author ) {
		$author = wp_get_current_user();
	} else {
		$author = new WP_User( $author );
	}

	if ( ! class_exists( 'EDD_Front_End_Submissions' ) ) {
		return get_author_posts_url( $author->ID, $author->user_nicename );
	}

	return FES_Vendors::get_vendor_store_url( $author->ID );
}

function cr3ativ_count_user_downloads( $userid, $post_type = 'download' ) {
	global $wpdb;

	$where = get_posts_by_author_sql( $post_type, true, $userid );

	$count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts $where" );

  	return apply_filters( 'get_usernumposts', $count, $userid );
}

if( class_exists( 'Easy Digital Downloads' ) ) {
	
    function download_category_id_class($classes) {
   global $post;
   $categories = get_the_terms( $post->ID, 'download_category' );
   if( $categories ) {
	    foreach( $categories as $category ) {
	        $classes[] = $category->slug;
	    }
	}
	return $classes;
}
add_filter('post_class', 'download_category_id_class');

function download_tag_id_class($classes) {
   global $post;
   $tags = get_the_terms( $post->ID, 'download_tag' );
   if($tags) {
	    foreach( $tags as $tag ) {
   	     $classes[] = $tag->slug;
		}
	}
   return $classes;
}
add_filter('post_class', 'download_tag_id_class');
    
}


function cr3ativ_pagination($pages = '', $range = 2)
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
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a class='page-numbers' href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a class='page-numbers' href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='page-numbers current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='page-numbers' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a class='page-numbers' href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a class='page-numbers' href='".get_pagenum_link($pages)."'>&raquo;</a>";
     }
}



////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////         WP Core Functionality        ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );

function cr3ativ_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'cr3ativ_theme_add_editor_styles' );

add_post_type_support( 'attachment:audio', 'thumbnail' );
add_post_type_support( 'attachment:video', 'thumbnail' );

add_filter( 'wp_title', 'filter_wp_title' );
/**
 * Filters the page title appropriately depending on the current page
 *
 * This function is attached to the 'wp_title' fiilter hook.
 *
 * @uses	get_bloginfo()
 * @uses	is_home()
 * @uses	is_front_page()
 */
function filter_wp_title( $title ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	$site_description = get_bloginfo( 'description' );

	$filtered_title = $title . get_bloginfo( 'name' );
	$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
	$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s', 'squarecode' ), max( $paged, $page ) ) : '';

	return $filtered_title;
}

function wpse95147_filter_wp_title( $title ) {
    if ( is_single() || ( is_home() && !is_front_page() ) || ( is_page() && !is_front_page() ) ) {
        $title = single_post_title( '', false );
    }
    if ( is_front_page() && ! is_page() ) {
        $title = esc_attr( get_bloginfo( 'name' ) );
    }
    return $title;
}
add_filter( 'wp_title', 'wpse95147_filter_wp_title' );
////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Post Format     /////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

add_theme_support( 'post-formats', array( 'audio', 'link', 'gallery', 'video', 'quote' ) );


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     2 WP Nav Menus     //////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

register_nav_menus( array(  
  'popout' => __( 'Popout Navigation', 'squarecode' ), 
  'horizontal' => __( 'Horizontal Navigation', 'squarecode' ), 
  'footer' => __('Footer Menu', 'squarecode'),
  'cart' => __('Shopping Cart Menu', 'squarecode')

) );  	


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Setting up Option Tree includes     /////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

/* START OPTION TREE */ 
add_filter( 'ot_show_pages', '__return_false' );  
add_filter( 'ot_theme_mode', '__return_true' );
//add_filter( 'ot_show_pages', '__return_true' );  
//add_filter( 'ot_theme_mode', '__return_false' );
include_once( 'option-tree/ot-loader.php' );
include_once( 'functions/theme-options.php' );


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Load JS & Stylesheet Scripts     ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

include_once( 'functions/theme-scripts.php' );

/*  Enqueue css
/* ------------------------------------ */ 
function cr3ativ_styles()
{
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'cr3ativ_styles' ); 


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Theme Options for widget     ////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

include_once( 'functions/theme-options-widgets.php' );


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Comments     ////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function cr3ativ_mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

<div class="comment-author-avatar">
<?php echo get_avatar($comment, 55); ?>

</div>

<div class="comment-main">

<div class="comment-meta">

<?php printf(__('<span class="comment-author">%s</span>', 'squarecode'), get_comment_author_link()) ?>

<span class="comment-date"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"> <?php printf(__('%1$s at %2$s', 'squarecode'), get_comment_date(),  get_comment_time()) ?></a> </span>

</div>  

<div class="comment-content">      
<?php if ($comment->comment_approved == '0') : ?>
<p><em><?php _e('Your comment is awaiting moderation.', 'squarecode') ?></em></p>
<?php comment_text() ?>

<?php else : { ?>

<?php comment_text() ?>  

<?php } ?>  
    
<div class="button"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>

<?php endif; ?>

</div> 

</div>

<?php }
				
	
////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Content width set     ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

if ( ! isset( $content_width ) ) 
    $content_width = 1200;
		

////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Text Domain     /////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

load_theme_textdomain ('squarecode');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Multi Language Ready     ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

load_theme_textdomain( 'squarecode', get_template_directory().'/languages' );

$locale = get_locale();
$locale_file = get_template_directory()."/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);
	

////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Contact Form 7     //////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Functions:	Optimize and style Contact Form 7 - WPCF7
 *
 */
// Remove the default Contact Form 7 Stylesheet
function cr3ativ_remove_wpcf7_stylesheet() {
	remove_action( 'wp_head', 'wpcf7_wp_head' );
}

// Add the Contact Form 7 scripts on selected pages
function cr3ativ_add_wpcf7_scripts() {
	if ( is_page('contact') )
		wpcf7_enqueue_scripts();
}

// Change the URL to the ajax-loader image
function cr3ativ_change_wpcf7_ajax_loader($content) {
	if ( is_page('contact') ) {
		$string = $content;
		$pattern = '/(<img class="ajax-loader" style="visibility: hidden;" alt="ajax loader" src=")(.*)(" \/>)/i';
		$replacement = "$1".get_template_directory_uri()."/images/ajax-loader.gif$3";
		$content =  preg_replace($pattern, $replacement, $string);
	}
	return $content;
}

// If the Contact Form 7 Exists, do the tweaks
if ( function_exists('wpcf7_contact_form') ) {
	if ( ! is_admin() && WPCF7_LOAD_JS )
		remove_action( 'init', 'wpcf7_enqueue_scripts' );

	add_action( 'wp', 'cr3ativ_add_wpcf7_scripts' );
	add_action( 'init' , 'cr3ativ_remove_wpcf7_stylesheet' );
	add_filter( 'the_content', 'cr3ativ_change_wpcf7_ajax_loader', 100 );
}

////////////////////////////////////////////////////////////////////////////////////////////
/////////////////    Extract first occurance of text from a string     /////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

// Extract first occurance of text from a string
function cr3ativ_my_extract_from_string($start, $end, $tring) {
	$tring = stristr($tring, $start);
	$trimmed = stristr($tring, $end);
	return substr($tring, strlen($start), -strlen($trimmed));
}


function get_content_link( $content = false, $echo = false )
{
    // allows using this function also for excerpts
    if ( $content === false )
        $content = get_the_content(); // You could also use $GLOBALS['post']->post_content;

    $content = preg_match_all( '/href\s*=\s*[\"\']([^\"\']+)/', $content, $links );
    $content = $links[1][0];
    $content = make_clickable( $content );

    // if you set the 2nd arg to true, you'll echo the output, else just return for later usage
    if ( $echo === true )
        echo $content;

    return $content;
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Allow Shortcodes in Widgets     /////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

add_filter('widget_text', 'do_shortcode');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Remove height/width on images for responsive     ////////////////
////////////////////////////////////////////////////////////////////////////////////////////

add_filter( 'post_thumbnail_html', 'cr3ativ_remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'cr3ativ_remove_thumbnail_dimensions', 10 );

function cr3ativ_remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////              Exclude thumbnail from gallery              ////////////
////////////////////////////////////////////////////////////////////////////////////////////

function cr3ativ_exclude_thumbnail_from_gallery($null, $attr)
{
    if (!$thumbnail_ID = get_post_thumbnail_id())
        return $null; // no point carrying on if no thumbnail ID

    // temporarily remove the filter, otherwise endless loop!
    remove_filter('post_gallery', 'cr3ativ_exclude_thumbnail_from_gallery');

    // pop in our excluded thumbnail
    if (!isset($attr['exclude']) || empty($attr['exclude']))
        $attr['exclude'] = array($thumbnail_ID);
    elseif (is_array($attr['exclude']))
        $attr['exclude'][] = $thumbnail_ID;

    // now manually invoke the shortcode handler
    $gallery = gallery_shortcode($attr);

    // add the filter back
    add_filter('post_gallery', 'cr3ativ_exclude_thumbnail_from_gallery', 10, 2);

    // return output to the calling instance of gallery_shortcode()
    return $gallery;
}
add_filter('post_gallery', 'cr3ativ_exclude_thumbnail_from_gallery', 10, 2);


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////    Link Extraction for Post Format Link     /////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

// Extract first occurance of text from a string
if( !function_exists ('extract_from_string') ) :
function extract_from_string($start, $end, $tring) {
	$tring = stristr($tring, $start);
	$trimmed = stristr($tring, $end);
	return substr($tring, strlen($start), -strlen($trimmed));
}
endif;

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////    EDD Sales Count Display in Details Widget     //////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function cr3ativ_sumobi_edd_show_download_sales() {
	echo '<p class="sales">';
	echo edd_get_download_sales_stats( get_the_ID() ) . ' <span>sales</span>';
	echo '</p>';
}
add_action( 'edd_product_details_widget_before_purchase_button', 'cr3ativ_sumobi_edd_show_download_sales' ); 

/**
 * Get the download count of a download
 * Modified version of edd_get_file_downloaded_count()
 */
function cr3ativ_sumobi_edd_get_download_count( $download_id = 0 ) {
	global $edd_logs;

	$meta_query = array(
		'relation'	=> 'AND',
		array(
			'key' 	=> '_edd_log_file_id'
		),
		array(
			'key' 	=> '_edd_log_payment_id'
		)
	);

	return $edd_logs->get_log_count( $download_id, 'file_download', $meta_query );
}



remove_filter( 'the_content', 'easy_image_gallery_append_to_content' );    


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////    Include CPT authors & archive & archive widget    ////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


function cr3ativ_post_author_archive( &$query )
{
    if ( $query->is_author )
        $query->set( 'post_type', array('post', 'page', 'download', 'cr3ativcareers', 'cr3ativstaff', 'cr3ativportfolio'));
    remove_action( 'pre_get_posts', 'cr3ativ_post_author_archive' ); // run once!
}
add_action( 'pre_get_posts', 'cr3ativ_post_author_archive' );



if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
    //Call action that sets
    //Do redirect
    header( 'Location: '.admin_url().'themes.php?page=ot-theme-options' ) ;
}

add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
wp_enqueue_style( 'dashicons' );
}


?>