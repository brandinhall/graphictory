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
                
                <h2 class="small"><?php the_title (); ?></h2>

                    <!-- Start of single meta -->
                    <div class="single_meta">

                    <?php echo get_the_date(get_option('date_format')); ?>&nbsp;-&nbsp;<?php _e( 'By', 'squarecode' ); ?>&nbsp;<?php the_author_posts_link(); ?>

                    </div><!-- End of single meta -->

                    <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail(''); ?>
                
                    <div class="clearbig"></div>
                    
                    <?php } ?>

                    <!-- Start of content single -->
                    <section class="contentsingle">

                        <!-- Start of post class -->
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php the_content(); ?>
                            
                            <!-- Start of pagination -->
                    <div id="pagination2">

                        <!-- Start of pagination class -->
                        <div class="pagination2">
                            <?php wp_link_pages(); ?>

                        </div><!-- End of pagination class -->

                    </div><!-- End of pagination -->

                            <!-- Start of posted details -->
                            <div class="posted_details">

                                <!-- Start of metacats -->
                                <div class="metacats">
                                <?php _e( 'Posted In:', 'squarecode' ); ?> &nbsp;<?php the_category(' '); ?>

                                </div><!-- End of metacats -->

                                <?php 
                                $post_tags = wp_get_post_tags($post->ID);

                                if(!empty($post_tags)) { ?>

                                <!-- Start of metacats -->
                                <div class="metacats">
                                <?php _e( 'Tags:', 'squarecode' ); ?></span> <?php the_tags('', ', ', ''); ?> 

                                </div><!-- End of metacats -->
                                
                                <?php } ?>

                                <?php if ('open' == $post->comment_status) { ?>

                                <!-- Start of metacomments -->
                                <div class="metacomments">
                                <?php
                                if (get_comments_number()==1) { ?>

                                <?php comments_popup_link( '0', '1', '%', 'comments-link', ''); ?>&nbsp;
                                <?php _e( 'comment', 'squarecode' ); ?>

                                <?php } else { ?>

                                <?php comments_popup_link( '0', '1', '%', 'comments-link', ''); ?>&nbsp;
                                <?php _e( 'comments', 'squarecode' ); ?>

                                <?php } ?>

                                </div><!-- End of metacomments -->

                                <?php } ?>

                            </div><!-- End of posted details -->

                        </div><!-- End of post class -->

                    </section><!-- End of content single -->

                    <?php endwhile; ?> 

                    <?php else: ?> 
                    <p><?php _e( 'There are no posts to display. Try using the search.', 'squarecode' ); ?></p> 

                    <?php endif; ?>

                <?php
                $prev_link = get_previous_posts_link(__('Newer Posts', 'squarecode'));
                $next_link = get_next_posts_link(__('Older Posts', 'squarecode'));
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
            
                    <?php if ('open' == $post->comment_status) { ?>

                    <!-- Start of comment wrapper -->
                    <div class="comment_wrapper">

                        <!-- Start of comment wrapper main -->
                        <div class="comment_wrapper_main">

                        <?php comments_template(); ?>
                        <?php comment_form(); ?>

                        </div><!-- End of comment wrapper main -->

                        <div class="clear"></div>

                    </div><!-- End of comment wrapper -->

                    <?php } ?> 

            </div>
            <!-- End of left content -->

            <!-- Start of right content -->
            <div class="right_content">

                <?php get_sidebar( 'blog' ); ?>

            </div>
            <!-- End of right content -->

        </div>
        <!-- End of main content -->

        <div class="clearfix"></div>

    </div>
    <!-- End of page wrap -->

    <?php get_footer(); ?>