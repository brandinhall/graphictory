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

            <?php
            $stafftitle = get_post_meta($post->ID, 'stafftitle', $single = true); 
            $stafffullwidthimage = get_post_meta($post->ID, 'stafffullwidthimage', $single = true); 
            ?>
            
                <!-- Start of employee image -->
                <div class="cr3ativstaff_employee_image">
                    <?php echo wp_get_attachment_image($stafffullwidthimage, ''); ?>

                </div><!-- End of employee image single -->

                <h2><?php the_title (); ?></h2>

                <!-- Start of employee info -->
                <div class="cr3ativstaff_employee_info">

                    <!-- Start of social icons -->
                    <div class="cr3ativstaff_social_icons">

                        <?php $repeatable_fields = get_post_meta($post->ID, 'repeatable', true);
                        if ($repeatable_fields != ('')){ 
                        foreach ($repeatable_fields as $v) { ?>

                    <a href="<?php echo $v['repeatable_socailurl']; ?>"><?php echo wp_get_attachment_image($v['repeatable_socailimage'], ''); ?></a>
                    <?php } } else { }?>

                    </div><!-- End of social icons -->

                    <!-- Start of employee title -->
                    <div class="cr3ativstaff_employee_title">
                    <?php if ($stafftitle != ('')){ ?>
                    <?php echo stripslashes($stafftitle); ?>
                    <?php } else { } ?>

                    </div><!-- End of employee title -->

                </div><!-- End of employee info -->

            <?php the_content('        '); ?> 

            <?php endwhile; ?> 

            <?php else: ?> 
            <p><?php _e( 'There are no posts to display. Try using the search.', 'squarecode' ); ?></p> 

            <?php endif; ?>

        </div>
        <!-- End of main content -->

        <div class="clearfix"></div>

    </div>
    <!-- End of page wrap -->

    <?php get_footer(); ?>