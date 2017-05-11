<?php /* 
Template Name: Shop
*/   get_header(); ?>




    <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    
                        <!-- Portfolio Items
                        ============================================= -->
                        <div id="portfolio" class="portfolio-2 clearfix">



                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


                                <?php get_template_part( 'product-archive' ); ?>


                                <?php endwhile; endif; ?>

                                </section>



                        </div><!-- #portfolio end -->

                        <!-- Portfolio Script
                        ============================================= -->
                        <script type="text/javascript">
                        
                            jQuery(window).load(function(){
                            
                                var $container = $('#portfolio');
                                
                                $container.isotope({ transitionDuration: '0.65s' });
                                
                                $('#portfolio-filter a').click(function(){
                                    $('#portfolio-filter li').removeClass('activeFilter');
                                    $(this).parent('li').addClass('activeFilter');
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




 

                    <div class="clear"></div>

                    <div class="divider divider-center"><i class="icon-circle"></i></div>


                </div>

            </div>

        </section><!-- #content end -->





<?php get_footer(); ?>