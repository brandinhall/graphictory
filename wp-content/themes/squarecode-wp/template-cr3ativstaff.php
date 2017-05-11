<?php  
/* 
Template Name: Cr3ativStaff
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
            
            <div class="center">

            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            
            <h1 class="cr3staff_title"><?php the_title (); ?></h1>

            <?php the_content('        '); ?> 

            <?php endwhile; ?>

            <?php else: ?> 
                
            <p><?php _e( 'There are no posts to display. Try using the search.', 'squarecode' ); ?></p> 

            <?php endif; ?>
                
             </div>   
                
            
            <?php 
              $temp = $wp_query; 
              $wp_query = null; 
              $wp_query = new WP_Query(); 
              $wp_query->query('post_type=cr3ativstaff'.'&paged='.$paged); 
            ?>

            <?php while ($wp_query->have_posts()) : $wp_query->the_post();  ?>            

                <!-- Start of one third -->
                <div class="one_third">

                <?php
                $stafftitle = get_post_meta($post->ID, 'stafftitle', $single = true); 
                $staffheadshot = get_post_meta($post->ID, 'staffheadshot', $single = true); 
                ?>

                    <!-- Start of employee image -->
                    <div class="cr3ativstaff_employee_image">
                    <a href="<?php the_permalink (); ?>"><?php echo wp_get_attachment_image($staffheadshot, ''); ?></a>

                    </div><!-- End of employee image -->

                    <!-- Start of employee name -->
                    <div class="cr3ativstaff_employee_name">
                    <a href="<?php the_permalink (); ?>"><?php the_title (); ?></a>

                    </div><!-- End of employee name -->

                    <!-- Start of employee title -->
                    <div class="cr3ativstaff_employee_title">
                    <?php if ($stafftitle != ('')){ ?>
                    <?php echo stripslashes($stafftitle); ?>
                    <?php } else { } ?>

                    </div><!-- End of employee title -->

                    <!-- Start of employee social -->
                    <div class="cr3ativstaff_employee_social">
                        <?php $repeatable_fields = get_post_meta($post->ID, 'repeatable', true);
                        if ($repeatable_fields != ('')){ 
                        foreach ($repeatable_fields as $v) { ?>

                    <a href="<?php echo $v['repeatable_socailurl']; ?>"><?php echo wp_get_attachment_image($v['repeatable_socailimage'], ''); ?></a>
                    <?php } } else { }?>

                    </div><!-- End of employee social -->

                </div><!-- End of one third -->

            <?php endwhile; ?> 
            
            <div class="clearfix"></div>
            
                <?php
                $prev_link = get_previous_posts_link(__('Newer', 'squarecode'));
                $next_link = get_next_posts_link(__('Older', 'squarecode'));
                ?>
                    <!-- Start of pagination -->
                    <div id="pagination">
                    <?php 
                    if ($prev_link && $next_link) {
                      if ($prev_link){
                        echo '<div class="paginationprev">'.$prev_link .'</div>';
                      }
                      if ($next_link){
                        echo '<div class="paginationnext">'.$next_link .'</div>';
                      }
                    } else if ($next_link) {
                        echo '<div class="paginationnext">'.$next_link .'</div>';
                    } else if ($prev_link) {
                        echo '<div class="paginationprev">'.$prev_link .'</div>';
                    }
                    ?>

                    </div><!-- End of pagination -->   
            
                    <?php $wp_query = null; $wp_query = $temp;  // Reset ?>

        </div>
        <!-- End of main content -->

        <div class="clearfix"></div>

    </div>
    <!-- End of page wrap -->

    <?php get_footer(); ?>