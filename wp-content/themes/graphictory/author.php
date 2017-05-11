<?php get_header(); ?>
<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<?php
global $author;
$author_id=$post->post_author;
?>

            <?php $storebanner = $curauth->store_banner; if ($storebanner == '') { ?>


                <!-- Page Title
                ============================================= -->
                <section id="page-title" class="page-title" style="padding:60px 0;">


                        <div class="container clearfix">
                         


                            <div class="author-avatar-store">

                             <img src="<?php echo $curauth->user_avatar;?>">

                            </div>  


                            <div class="col-md-9">
                  

                                <h1><?php
                                $storename = $curauth->name_of_store;

                                if ($storename == '') {
                                // code to run if the above is empty, eg.
                                  echo $curauth->display_name;

                                } else {
                                    // else the code, eg.
                                    echo $storename;
                                }
                                ?></h1>
                            
                                 
                                <div class="clearfix"></div>
                                <?php echo do_shortcode('[broo_user_badges]');?>

                            </div>


                        </div>


                </section><!-- #page-title end -->



            <?php } else { ?> 
                
           

                <!-- Page Title
                ============================================= -->
                <section id="page-title" class="page-title page-title-dark" style="padding:0; height:300px; background: url('<?php $storebanner = $curauth->store_banner; if ($storebanner == '') { } else { echo wp_get_attachment_url($storebanner); } ?>') top center; background-size:cover;">


                    <div id="banner-container">


                        <div class="container clearfix">
                 

                            <div class="col-md-9">
                            
                                <div class="author-avatar-store">

                                 <img src="<?php echo $curauth->user_avatar;?>">

                                </div>  
                                <div class="author-title-badges">

                                    <?php
                                    $storename = $curauth->name_of_store;

                                    if ($storename == '') {
                                    // code to run if the above is empty, eg.
                                        echo '<h1>';
                                        echo $curauth->display_name;
                                        echo '</h1>';

                                    } else {
                                        // else the code, eg.
                                        echo'<small>Welcome to my store</small><div class="clearfix"></div>';
                                        echo '<h1>';
                                        echo $storename;
                                        echo '</h1>';
                                    }
                                    ?></h1>


                                    <div class="download-author-sales">
                                        <strong>Total Downloads:</strong><?php echo marketify_count_user_downloads( $author ); ?>
                                        
                                    </div>

                                     
                                    <div class="clearfix"></div>

                                    <div class="profile-badges">
                                    <?php echo do_shortcode('[broo_user_badges]');?>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3 tright">
                                    <div class="si-share dark noborder clearfix" style="margin-top:15px;">
                                     
                                        <div>

                                            <?php $facebookurl = $curauth->facebook_url; if ($facebookurl == '') { ?>

                                            <?php } else { ?> 
                                                
                                            <a href="http://<?php echo $facebookurl; ?>" title="Like us on Facebook" target="_blank" class="social-icon si-borderless si-facebook">
                                                    <i class="icon-facebook"></i>
                                                    <i class="icon-facebook"></i>
                                            </a>

                                            <?php } ?>



                                            <?php $twitterurl = $curauth->twitter_url; if ($twitterurl == '') { ?>

                                            <?php } else { ?> 
                                                
                                            <a href="http://<?php echo $twitterurl; ?>" title="Follow us on Twitter" target="_blank" class="social-icon si-borderless si-twitter">
                                                    <i class="icon-twitter"></i>
                                                    <i class="icon-twitter"></i>
                                            </a>

                                            <?php } ?>



                                            <?php $pinteresturl = $curauth->pinterest_url; if ($pinteresturl == '') { ?>

                                            <?php } else { ?> 
                                                
                                            <a href="http://<?php echo $pinteresturl; ?>" title="Find us on Pinterest" target="_blank" class="social-icon si-borderless si-pinterest">
                                                    <i class="icon-pinterest"></i>
                                                    <i class="icon-pinterest"></i>
                                            </a>

                                            <?php } ?>





                                            <?php $website = $curauth->user_url; if ($website == '') { ?>

                                            <?php } else { ?> 
                                                
                                            <a href="<?php echo $website; ?>" title="Our website" target="_blank" class="social-icon si-borderless si-facebook">
                                                    <i class="icon-link"></i>
                                                    <i class="icon-link"></i>
                                            </a>

                                            <?php } ?>


                                        </div>


 


                                    </div>

                            </div>

                        </div>
                    </div>

                </section><!-- #page-title end -->



            <?php } ?>
                
                


       <!-- Content
        ============================================= -->
        <section id="content" style="padding:30px 0;">

            <div class="content-wrap">

                <div class="container clearfix">
                <?php get_template_part('include/filters'); ?>
                       
                           
                       <!-- <?php $user_info = get_user_meta($author); var_dump($user_info); ?> -->
     

                        <!-- Portfolio Items
                        ============================================= -->
                        <div id="portfolio" class="portfolio-3 clearfix">



							<?php $args = array(
							    'post_type' => 'download' ,
							    'author' => get_queried_object_id(), // this will be the author ID on the author page
							    'showposts' => -1
							); ?>
							<?php $custom_posts = new WP_Query( $args );
							if ( $custom_posts->have_posts() ):
							    while ( $custom_posts->have_posts() ) : $custom_posts->the_post(); ?>
							      <?php get_template_part( 'product-archive' ); ?>
											    <?php endwhile; ?>
											<?php else: ?>
							    // nothing found
							<?php endif; ?>

                        



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


           






            </div>

        </section><!-- #content end -->

<?php get_footer(); ?>





