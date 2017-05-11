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
            
            <h1 class="title"><?php _e( 'Tagged In: ', 'squarecode' ); ?><?php $term =	$wp_query->queried_object; echo esc_html($term->name); ?></h1>

            <!-- Start of left content -->
            <div class="left_content">

                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

                    <!-- Start of post class -->
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <?php if (has_post_format('video')) { ?>

                        <!-- Start of post format -->
                        <div class="post_format">
                            <?php $format = 'video'; echo $format; ?>

                        </div><!-- End of post format -->

                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                        <!-- Start of meta date -->
                        <div class="meta_date">
                        <?php echo get_the_date(get_option('date_format')); ?>&nbsp;-&nbsp;<?php _e( 'By', 'squarecode' ); ?>&nbsp;<?php the_author_posts_link(); ?>

                        </div><!-- End of meta date -->
                        
                        <?php if ( has_post_thumbnail() ) {  ?>

                        <a href="<?php the_permalink (); ?>"><?php the_post_thumbnail(''); ?></a>
                        
                        <div class="clearbig"></div>

                        <?php } ?>                        

                        <?php 
                            if ( function_exists( 'get_option_tree' ) ) {
                            $readmoretext = get_option_tree( 'vn_readmore_button_text' );
                        } ?>

                        <?php
                            global $more;
                            $more = 0;
                            ob_start();
                            the_content(('' . $readmoretext . ''),true);
                            $postOutput = preg_replace('/<img[^>]+./','', ob_get_contents());
                            ob_end_clean();
                            echo $postOutput;
                        ?>

                        <?php } elseif (has_post_format('audio')) { ?>

                        <!-- Start of post format -->
                        <div class="post_format">
                            <?php $format = 'audio'; echo $format; ?>

                        </div><!-- End of post format -->

                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                        <!-- Start of meta date -->
                        <div class="meta_date">
                        <?php echo get_the_date(get_option('date_format')); ?>&nbsp;-&nbsp;<?php _e( 'By', 'squarecode' ); ?>&nbsp;<?php the_author_posts_link(); ?>

                        </div><!-- End of meta date -->
                        
                        <?php if ( has_post_thumbnail() ) {  ?>

                        <a href="<?php the_permalink (); ?>"><?php the_post_thumbnail(''); ?></a>
                        
                        <div class="clearbig"></div>

                        <?php } ?>                        

                        <?php 
                            if ( function_exists( 'get_option_tree' ) ) {
                            $readmoretext = get_option_tree( 'vn_readmore_button_text' );
                        } ?>

                        <?php
                            global $more;
                            $more = 0;
                            ob_start();
                            the_content(('' . $readmoretext . ''),true);
                            $postOutput = preg_replace('/<img[^>]+./','', ob_get_contents());
                            ob_end_clean();
                            echo $postOutput;
                        ?>

                        <?php } elseif (has_post_format('gallery')) { ?>

                        <!-- Start of post format -->
                        <div class="post_format">
                            <?php $format = 'gallery'; echo $format; ?>

                        </div><!-- End of post format -->

                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                        <!-- Start of meta date -->
                        <div class="meta_date">
                        <?php echo get_the_date(get_option('date_format')); ?>&nbsp;-&nbsp;<?php _e( 'By', 'squarecode' ); ?>&nbsp;<?php the_author_posts_link(); ?>

                        </div><!-- End of meta date -->
                        
                        <?php if ( has_post_thumbnail() ) {  ?>

                        <a href="<?php the_permalink (); ?>"><?php the_post_thumbnail(''); ?></a>
                        
                        <div class="clearbig"></div>

                        <?php } ?>                        

                        <?php 
                            if ( function_exists( 'get_option_tree' ) ) {
                            $readmoretext = get_option_tree( 'vn_readmore_button_text' );
                        } ?>

                        <?php
                            global $more;
                            $more = 0;
                            ob_start();
                            the_content(('' . $readmoretext . ''),true);
                            $postOutput = preg_replace('/<img[^>]+./','', ob_get_contents());
                            ob_end_clean();
                            echo $postOutput;
                        ?>

                        <?php } elseif (has_post_format('link')) { ?>   
                        <!-- Start of post format -->
                        <div class="post_format">
                            <?php $format = 'link'; echo $format; ?>

                        </div><!-- End of post format -->

                        <?php // Get the text & url from the first link in the content
                                    $content = get_the_content();
                                    $link_string = extract_from_string('<a href=', '/a>', $content);
                                    $link_bits = explode('"', $link_string);
                                    foreach( $link_bits as $bit ) {
                                        if( substr($bit, 0, 1) == '>') $link_text = substr($bit, 1, strlen($bit)-2);
                                        if( substr($bit, 0, 4) == 'http') $link_url = $bit;
                                    }?>

                        <h2 class="linkpost"><a href="<?php echo $link_url;?>"><?php echo $link_text;?></a></h2>

                        <!-- Start of meta date -->
                        <div class="meta_date">
                        <?php echo get_the_date(get_option('date_format')); ?>&nbsp;-&nbsp;<?php _e( 'By', 'squarecode' ); ?>&nbsp;<?php the_author_posts_link(); ?>

                        </div><!-- End of meta date -->

                        <?php } elseif (has_post_format('quote')) { ?>

                        <!-- Start of post format -->
                        <div class="post_format">
                            <?php $format = 'quote'; echo $format; ?>

                        </div><!-- End of post format -->

                        <blockquote>
                            <?php the_content (); ?>
                        </blockquote> 

                        <?php } else { ?>  
                        
                        <!-- Start of post format -->
                        <div class="post_format">
                            <?php $format = 'standard'; echo $format; ?>

                        </div><!-- End of post format -->

                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                        <!-- Start of meta date -->
                        <div class="meta_date">
                        <?php echo get_the_date(get_option('date_format')); ?>&nbsp;-&nbsp;<?php _e( 'By', 'squarecode' ); ?>&nbsp;<?php the_author_posts_link(); ?>

                        </div><!-- End of meta date -->
                        
                        <?php if ( has_post_thumbnail() ) {  ?>

                        <a href="<?php the_permalink (); ?>"><?php the_post_thumbnail(''); ?></a>
                        
                        <div class="clearbig"></div>

                        <?php } ?>                        

                        <?php 
                            if ( function_exists( 'get_option_tree' ) ) {
                            $readmoretext = get_option_tree( 'vn_readmore_button_text' );
                        } ?>

                        <?php
                            global $more;
                            $more = 0;
                            ob_start();
                            the_content(('' . $readmoretext . ''),true);
                            $postOutput = preg_replace('/<img[^>]+./','', ob_get_contents());
                            ob_end_clean();
                            echo $postOutput;
                        ?>

                        <?php } ?>

                        <hr />

                    </div><!-- End of post class -->

                    <?php endwhile; ?>
                
                    <?php else: ?>

                    <p>
                        <?php _e( 'There are no posts to display. Try using the search.', 'squarecode' ); ?>
                    </p>

                    <?php endif; ?>
                
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