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
                <?php
                $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                $args = array( 'post_type'=>'cr3ativcareers', 'cr3ativdepartment'=>$term->slug );
                $loop = new WP_Query( $args );
                ?>

                <!-- Start of blog wrapper -->
                <div class="cr3ativcareer_blog_wrapper">

                <?php
                while ($loop->have_posts()) : $loop->the_post();
                ?>

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

                <div class="space"></div>

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