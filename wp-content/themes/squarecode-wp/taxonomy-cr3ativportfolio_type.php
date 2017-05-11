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
                    
            <!-- Start of cr3ativeportfolio_portfolio-wrapper -->
            <div id="cr3ativeportfolio_portfolio-wrapper">
                
                    <!-- Start of cr3ativeportfolio_portfolio-wrapper -->
                    <div id="cr3ativeportfolio_portfolio-wrapper">

                        <!-- Start of cr3ativeportfolio portfolio-list ul -->                    
                        <ul id="cr3ativeportfolio_portfolio-list-plain">
                            <?php if ( have_posts() ) : 
                                while ( have_posts() ) : the_post(); ?>

                            <li class="cr3ativeportfolio_portfolio-itemthree min-height-small">
                            <?php if ( has_post_thumbnail() ) { ?>            

                            <!-- Start of EDD Featured Image Index -->
                            <div class="edd_feat_image_index">

                                <?php the_post_thumbnail(''); ?>
                                
                                <!-- Start of the overlay section on the thumbnail -->
                                <div class="caption" onclick="">
        
                                    <p><?php the_title (); ?></p>
                                                                    
                                    <a class="more-link-hidden" href="<?php the_permalink (); ?>"><?php _e( 'DETAILS', 'squarecode' ); ?></a>
                                    
                                </div><!-- End of the overlay section on the thumbnail -->

                            </div><!-- End of EDD Featured Image Index -->

                                <?php } else { ?>

                            <!-- Start of EDD No Feat Image Index -->
                            <div class="edd_nofeat_image_index">

                                <a class="more-link eddnocenter" href="<?php the_permalink (); ?>"><?php the_title (); ?></a>
                                <?php the_excerpt (); ?>

                            </div><!-- End of EDD No Fea Image Index -->

                                <?php } ?> 

                            </li>

                          <?php endwhile; else: ?> <?php endif; ?>

                      </ul>

                      <div class="cr3ativeportfolioclear"></div>

                    </div>
                    <!-- end #portfolio-wrapper--> 

                </div>
                <!-- End of wrapper --> 

              <div class="cr3ativeportfolioclear"></div>
            
                <!-- Start of edd_download_pagination -->
                <div id="edd_download_pagination" class="navigation">
                <?php cr3ativ_pagination(); ?>

                </div><!-- End of edd_download_pagination -->
      
        </div>
        <!-- End of main content -->

        <div class="clearfix"></div>

    </div>
    <!-- End of page wrap -->

    <?php get_footer(); ?>