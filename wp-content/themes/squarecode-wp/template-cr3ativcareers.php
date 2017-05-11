<?php  
/* 
Template Name: Cr3ativ-Careers
*/  
?>

<?php $author=get_query_var( 'vendor' ); $author=get_user_by( 'slug', $author ); if ( ! $author ) { $author=get_current_user_id(); } get_header(); ?>

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
                
                <h1 class="cr3career_title"><?php the_title (); ?></h1>

                <?php 
                if ( has_post_thumbnail() ) {  ?>

                <?php the_post_thumbnail(''); ?>

                <?php } ?>

                <?php the_content('        '); ?> 

                <?php endwhile; ?> 

                <?php else: ?> 
                <p><?php _e( 'There are no posts to display. Try using the search.', 'squarecode' ); ?></p> 

                <?php endif; ?>

                <?php 
                  $temp = $wp_query; 
                  $wp_query = null; 
                  $wp_query = new WP_Query(); 
                  $wp_query->query('post_type=cr3ativcareers'.'&paged='.$paged); 
                ?>

                <?php while ($wp_query->have_posts()) : $wp_query->the_post();  ?> 

                <!-- Start of blog wrapper -->
                <div class="cr3ativcareer_blog_wrapper">

                <h5><a href="<?php the_permalink (); ?>"><?php the_title (); ?></a></h5>

                        <!-- Start of read more -->
                        <div class="cr3ativcareer_read_more">
                          <?php the_excerpt ();	?>
                        </div>
                        <!-- End of read more -->

                <!-- Start of post details -->
                <div class="cr3ativcareer_post_details">

                <!-- Start of post date -->
                <div class="cr3ativcareer_post_date">
                <?php the_time(get_option('date_format')); ?>

                </div><!-- End of post date -->

                <!-- Start of post read more -->
                <div class="cr3ativcareer_post_read_more">
                        <?php 
                            if ( function_exists( 'get_option_tree' ) ) {
                            $readmoretext = get_option_tree( 'vn_readmore_button_text' );
                        } ?>
                <a href="<?php the_permalink (); ?>"><?php echo ($readmoretext); ?></a>

                </div><!-- End of post read more -->

                </div><!-- End of post details -->

                </div><!-- End of blog wrapper -->

                <?php endwhile; ?> 
                
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