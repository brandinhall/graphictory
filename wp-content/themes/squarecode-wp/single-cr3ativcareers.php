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

            <!-- Start of left content -->
            <div class="left_content">
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

                <?php
                $printicontext = get_post_meta($post->ID, 'cr3ativ_printicontext', $single = true); 
                $downloadicontext = get_post_meta($post->ID, 'cr3ativ_downloadicontext', $single = true); 
                $pdf = get_post_meta($post->ID, 'cr3ativ_wp_custom_attachment', true); 
                ?>

                <!-- Start of blog wrapper -->
                <div class="cr3ativcareer_blog_wrapper">

                <?php 
                if ( has_post_thumbnail() ) {  ?>

                <?php the_post_thumbnail(''); ?>

                <?php } ?>

                <h1><?php the_title (); ?></h1>

                    <!-- Start of post details -->
                    <div class="cr3ativcareer_post_details">

                    <!-- Start of post date -->
                    <div class="cr3ativcareer_post_date2">
                    <?php the_time(get_option('date_format')); ?>

                    </div><!-- End of post date -->

                    <?php if ($printicontext != ('')){ ?>

                    <!-- Start of career print -->
                    <div class="cr3ativcareer_career_print">

                    <a href="javascript:window.print()"><?php echo stripslashes($printicontext); ?></a>

                    </div><!-- End of career print -->

                    <div class="cr3ativcareer_career_split"></div>

                    <?php } else { } ?>

                    <?php if ($pdf != ('')){ ?>

                    <!-- Start of PDF download -->
                    <div class="cr3ativcareer_pdf_download">

                    <a href="<?php echo wp_get_attachment_url( $pdf ); ?> "><?php echo stripslashes($downloadicontext); ?></a>

                    </div><!-- End of PDF download -->

                    <?php } else { } ?>

                    <!-- Clear Fix --><div class="cr3ativcareer_clear"></div>

                    </div><!-- End of post details -->

                <!-- Clear Fix --><div class="cr3ativcareer_clearbig"></div>

                <?php the_content('        '); ?> 

                <?php endwhile; ?> 

                <?php else: ?> 
                <p><?php _e( 'There are no posts to display. Try using the search.', 'squarecode' ); ?></p> 

                <?php endif; ?>

                </div><!-- End of blog wrapper -->

            </div>
            <!-- End of left content -->

            <!-- Start of right content -->
            <div class="right_content">

                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('cr3ativ_careers') ) : else : ?>		
                <?php endif; ?> 

            </div>
            <!-- End of right content -->

        </div>
        <!-- End of main content -->

        <div class="clearfix"></div>

    </div>
    <!-- End of page wrap -->

    <?php get_footer(); ?>