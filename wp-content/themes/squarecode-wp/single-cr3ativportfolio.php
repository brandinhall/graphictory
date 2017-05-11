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
            
                <!-- Start of page wrap -->
                <div class="cr3ativeportfolio_page_wrap"> 

                    <!-- Start of wrapper -->
                    <div class="cr3ativeportfolio_wrapper"> 

                        <!-- Start of one third first -->
                        <div class="cr3ativeportfolio_one_third_first">
                            <h1><?php the_title (); ?></h1>
                          <?php
                            $portfolio_clientname = get_post_meta($post->ID, 'cr3ativportfolio_clientname', $single = true); 
                            $portfolio_url = get_post_meta($post->ID, 'cr3ativportfolio_url', $single = true); 
                            $portfolio_urltext = get_post_meta($post->ID, 'cr3ativportfolio_urltext', $single = true); 
                            $portfolio_skills = get_post_meta($post->ID, 'cr3ativportfolio_skills', $single = true); 
                            $portfolio_leftintrotext = get_post_meta($post->ID, 'cr3ativportfolio_leftintrotext', $single = true); 
                            $sd = get_post_meta($post->ID, 'cr3ativportfolio_date', $single = true); 
                    ?>
                          <?php if ($portfolio_leftintrotext != ('')){ 
                    ?>
                          <p><?php echo stripslashes($portfolio_leftintrotext); ?></p>
                          <?php } ?>
                          <?php if ($sd != ('')){ 
                    ?>
                              <!-- Start of custom tax -->
                              <div class="cr3ativeportfolio_custom_tax">
                                <?php _e( 'Date', 'squarecode' ); ?>
                              </div>
                              <!-- End of custom tax --> 

                              <!-- Start of custom meta -->
                              <div class="cr3ativeportfolio_custom_meta"> 
                                  <?php echo get_the_date(get_option('date_format',$sd)); ?>

                              </div>
                              <!-- End of custom meta -->

                              <?php } ?>
                              <?php if ($portfolio_clientname != ('')){ 
                        ?>

                              <!-- Start of custom tax -->
                              <div class="cr3ativeportfolio_custom_tax">
                                <?php _e( 'Client', 'squarecode' ); ?>
                              </div>
                              <!-- End of custom tax --> 

                              <!-- Start of custom meta -->
                              <div class="cr3ativeportfolio_custom_meta"> <?php echo stripslashes($portfolio_clientname); ?> </div>
                              <!-- End of custom meta -->

                              <?php } ?>
                              <?php if ($portfolio_url != ('')){ 
                        ?>

                              <!-- Start of custom tax -->
                              <div class="cr3ativeportfolio_custom_tax">
                                <?php _e( 'Link', 'squarecode' ); ?>
                              </div>
                              <!-- End of custom tax --> 

                              <!-- Start of custom meta -->
                              <div class="cr3ativeportfolio_custom_meta"> <a href="<?php echo ($portfolio_url); ?>"><?php echo stripslashes($portfolio_urltext); ?></a> </div>
                              <!-- End of custom meta -->

                              <?php } ?>
                              <?php if ($portfolio_skills != ('')){ 
                        ?>

                              <!-- Start of custom tax -->
                              <div class="cr3ativeportfolio_custom_tax">
                                <?php _e( 'Skills', 'squarecode' ); ?>
                              </div>
                              <!-- End of custom tax --> 

                              <!-- Start of custom meta -->
                              <div class="cr3ativeportfolio_custom_meta"> <?php echo stripslashes($portfolio_skills); ?> </div>
                              <!-- End of custom meta -->

                          <?php } ?>
                            
                        </div>
                        <!-- End of one third first --> 

                        <!-- Start of two third -->
                        <div class="cr3ativeportfolio_two_third">
                          <?php the_content('        '); ?>
                            
                        </div>
                        <!-- End of two third --> 
                        
                        <div class="clearbig"></div>

                    <?php endwhile; ?>
                    <?php else: ?>
                    <p>
                      <?php _e( 'There are no posts to display. Try using the search.', 'squarecode' ); ?>
                    </p>
                    <?php endif; ?>

                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('cr3ativ_portfolio_widget_area') ) : else : ?>		
                    <?php endif; ?> 
                        
                  </div>
                  <!-- End of wrapper --> 
  
                  <!-- Start of clear fix -->
                  <div class="cr3ativeportfolioclear"></div>
                    
                </div>
                <!-- End of page wrap -->
            
        </div>
        <!-- End of main content -->

        <div class="clearfix"></div>

    </div>
    <!-- End of page wrap -->

    <?php get_footer(); ?>
