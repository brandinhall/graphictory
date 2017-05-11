<?php 

$author = get_query_var( 'vendor' );
$author = get_user_by( 'slug', $author );

if ( ! $author ) {
	$author = get_current_user_id();
}

get_header(); ?>

<?php 
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'breadcrumb-navxt/breadcrumb-navxt.php' ) ) { ?>

    <!-- Start of breadcrumb wrapper -->
    <div class="breadcrumb_wrapper">

        <!-- Start of breadcrumbs -->
        <div class="breadcrumbs">
            <?php if(function_exists('bcn_display'))
                {
                bcn_display();
            }?>
        </div><!-- End of breadcrumbs -->

        <!-- Clear Fix --><div class="clear"></div>

    </div><!-- End of breadcrumb wrapper -->

<?php } ?>

    <!-- Start of page wrap -->
    <div class="page_wrap">

        <!-- Start of main content -->
        <div class="main_content">
            
            <h1 class="EDD_title_small"><?php the_title (); ?></h1>
            
            <div class="thumb_author_details byline">
                                        
                <div class="EDD-Avatar"><?php echo get_avatar( get_the_author_meta('email'), '80' ); ?></div>

                <div class="EDD-Author"><p><?php _e( 'By:', 'squarecode' ); ?>&nbsp;<?php the_author() ?></p></div>

            </div>
            
            <?php
                        $plugin_name = 'edd-fes/edd-fes.php';
                        $is_active = is_plugin_active($plugin_name);
                        if ($is_active == '1') { ?>
                        
                        <?php $new_store_url = get_the_author_meta( 'user_login' ); ?>
                        <a class="store-button" href="<?php echo site_url(); ?>/<?php _e( 'shop', 'squarecode' ); ?>/<?php echo str_replace(" ","-", $new_store_url); ?>"><?php _e( 'View ', 'squarecode' ); ?><?php echo the_author_meta( 'display_name' ); ?><?php _e( '\'s Full Store', 'squarecode' ); ?></a>
                        
                        <?php } ?>
            
            <div class="clear"></div>

            <!-- Start of left content -->
            <div class="left_content_EDD">
                            
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                
                    <!-- Start of EDD Featured Image Container -->
                    <div class="EDD_Featured_Image">
                        
                        <?php $videourl = get_post_meta($post->ID, 'video_url', $single = true); ?>
                        
                        <?php if ($videourl != ('')) { ?> 
                        
                        <div class="video-container">
                        <?php   echo wp_oembed_get( $videourl );
                        ?>
                        </div>
                        <?php } else { ?>
                        
                        <?php the_post_thumbnail(''); ?>
                        
                        <?php } ?>
                        
                        <?php $livepreviewurl = get_post_meta($post->ID, 'live_preview_url', $single = true); ?>
                        
                        <?php if ($livepreviewurl != ('')) { ?> 
                        
                            <!-- Start of live preview button -->
                            <div class="live_preview_button">
                                <a href="<?php echo $livepreviewurl; ?>" target="_blank"><?php _e( 'Click to View The Live Preview', 'squarecode' ); ?></a>

                            </div><!-- End of live preview button -->
                
                        <?php } ?>
                        
                        <?php if( function_exists( 'easy_image_gallery' ) ) {
                        
                        $eddgallery = easy_image_gallery (); ?>
                        
                        <?php if ($eddgallery != ('')){ ?> 
                        
                        <p><?php _e( 'Click to view larger images', 'squarecode' ); ?></p>
                        
                        <?php echo easy_image_gallery (); } ?>
                        
                        <?php } ?>
 
                        </div><!-- End of EDD Featured Image Container -->
                
                <div class="clear"></div>

                    <!-- Start of content single -->
                    <section class="contentsingle">

                        <!-- Start of post class -->
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php the_content(); ?>
                                                        
                        </div><!-- End of post class -->
                        
                    </section><!-- End of content single -->
                
                    <?php endwhile; ?> 

                    <?php else: ?> 
                    <p><?php _e( 'There are no posts to display. Try using the search.', 'squarecode' ); ?></p> 

                    <?php endif; ?>
                
                    <div class="clearbig"></div>  
                
            </div>
            <!-- End of left content -->

            <!-- Start of right content -->
            <div class="right_content edd_downloads">
                
                <div id="sticky-column">

                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('cr3ativ-edd') ) : else : ?>		
                <?php endif; ?> 

                <div class="edd-author-bio">
                
                    <p><span class="EDD-Avatar"><?php echo get_avatar( get_the_author_meta('email'), '80' ); ?></span>
                    <span class="copyright"><?php _e( 'Copyright', 'squarecode' ); ?>&nbsp;<?php echo the_author_meta( 'display_name' ); ?>&nbsp;<?php echo date('Y'); ?></span></p>
            
                    <div class="clear"></div>
                    
                </div>
                
            </div>

            </div>
            <!-- End of right content -->
            
            <div class="clear"></div>

        </div>
        <!-- End of main content -->

        <div class="clearfix"></div>

    </div>
    <!-- End of page wrap -->

    <?php get_footer(); ?>