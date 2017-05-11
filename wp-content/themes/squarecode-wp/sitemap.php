<?php  
/* 
Template Name: Sitemap 
*/  
?>

<?php get_header(); ?>

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

            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

                <?php if ( has_post_thumbnail() ) {  ?>

                <?php the_post_thumbnail(''); ?>

                <?php } ?>

                <?php the_content('        '); ?> 

                <div class="clearfix"></div>

            <?php endwhile; ?> 

            <?php endif; ?>

            <!-- Start of one third -->
            <div class="one_third">

            <h6><?php _e( 'Categories', 'squarecode' ); ?></h6>

            <ul>

            <?php $args = array(
                'show_option_all'    => '',
                'orderby'            => 'name',
                'order'              => 'ASC',
                'style'              => 'list',
                'show_count'         => 1,
                'hide_empty'         => 1,
                'use_desc_for_title' => 0,
                'child_of'           => 0,
                'feed'               => '',
                'feed_type'          => '',
                'feed_image'         => '',
                'exclude'            => '',
                'exclude_tree'       => '',
                'include'            => '',
                'hierarchical'       => true,
                'title_li'           => '',
                'show_option_none'   => __('No categories', 'squarecode'),
                'number'             => NULL,
                'echo'               => 1,
                'depth'              => 0,
                'current_category'   => 0,
                'pad_counts'         => 0,
                'taxonomy'           => 'category',
                'walker'             => 'Walker_Category' ); ?> 

                <?php wp_list_categories( $args ); ?>

            </ul>

            <div class="clearbig"></div>


            <h6><?php _e( 'Feeds', 'squarecode' ); ?></h6>

            <ul>

            <li><a title="<?php _e( 'Full content', 'squarecode' ); ?>" href="feed:<?php bloginfo('rss2_url'); ?>"><?php _e( 'Main RSS', 'squarecode' ); ?></a></li>
            <li><a title="<?php _e( 'Comment Feed', 'squarecode' ); ?>" href="feed:<?php bloginfo('comments_rss2_url'); ?>"><?php _e( 'Comment Feed', 'squarecode' ); ?></a></li>

            </ul>

            <div class="clearbig"></div>

            <h6><?php _e( 'Archives', 'squarecode' ); ?></h6>

            <ul>

            <?php wp_get_archives('type=monthly&show_post_count=true'); ?>

            </ul>

            </div><!-- End of one third -->

            <!-- Start of one third -->
            <div class="one_third">

            <h6><?php _e( 'Pages', 'squarecode' ); ?></h6>

            <ul>
            <?php wp_list_pages("title_li=" ); ?>

            </ul>

            </div><!-- End of one third -->

            <!-- Start of one third -->
            <div class="one_third">

            <h6><?php _e( 'All Blog Posts', 'squarecode' ); ?></h6>


            <ul>

            <?php $archive_query = new WP_Query('showposts=1000&cat=-8');
            while ($archive_query->have_posts()) : $archive_query->the_post(); ?>

            <li>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'squarecode' ); ?><?php the_title(); ?>"><?php the_title(); ?></a>
            (<?php comments_number('0', '1', '%'); ?>)
            </li>

            <?php endwhile; ?>

            </ul>

            </div><!-- End of one third -->

        </div>
        <!-- End of main content -->

        <div class="clearfix"></div>

    </div>
    <!-- End of page wrap -->

    <?php get_footer(); ?>