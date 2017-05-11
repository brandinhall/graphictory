<?php /* Template Name: Home */ get_header(); ?>

<?php get_template_part( 'include/slider' ); ?>


                <!-- Page Title
                ============================================= -->
                <section id="page-title" class="page-title" style="padding:30px 0 60px;">

                        <div class="container clearfix">
                             
                            <span class="home-intro">Welcome to Graphictory</span>

                            <h1 class="home-title">Design Resources.</h1>
             
                            <p class="lead2">
                                <?php echo get_the_content();?>
                            </p>

                        </div>
                        

                </section><!-- #page-title end -->




       <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="section" style="padding:60px 0;">
                    <div class="container">

                        <h3><strong>Latest Products</strong></h3>

                        <!-- Portfolio Filter
                        ============================================= -->
               

                        <?php 

                        $args = array(
                            'post_type' => 'download',
                            'showposts' => 9
                        );
                        $query = new WP_Query( $args ); ?>
                        
                        <?php if ($query) : ?>
                        
                        <?php if ( function_exists( 'get_option_tree' ) ) { $homerecenttitle=get_option_tree( 'vn_homerecenttitle' ); } ?>
                        
                        <?php if ($homerecenttitle != ('')) { ?>
                        
                        <h6 class="lined"><?php echo stripslashes($homerecenttitle); ?></h6>
                        
                        <?php } ?>            
                
                            <!-- Portfolio Items
                            ============================================= -->
                            <div id="portfolio" class="portfolio-2 filled clearfix">

                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                               <?php get_template_part( 'product-archive' ); ?>


                              <?php endwhile; else: ?> <?php endif; ?>

                            </div><!-- #portfolio end -->




                            <!-- Portfolio Script
                            ============================================= -->
                            <script type="text/javascript">
                            
                                jQuery(window).load(function(){
                                
                                    var $container = $('#portfolio');
                                    
                                    $container.isotope({ transitionDuration: '0.65s' });
                                    
                                    $('#portfolio-filter option').click(function(){

                                        var selector = $(this).attr('data-filter');
                                        $container.isotope({ filter: selector });
                                        return false;
                                    });

                                    $('#portfolio-shuffle').click(function(){
                                    $container.isotope('updateSortData').isotope({
                                        sortBy: 'random'
                                    });
                                });
                                    
                                    $(window).resize(function() {
                                        $container.isotope('layout');
                                    });
                                
                                });
                            
                            </script><!-- Portfolio Script End -->   
                            
                    <?php wp_reset_query(); ?>
                            
                    </div>
                </div>


            </div>

        </section><!-- #content end -->
        





<?php get_footer(); ?>
