<?php 
/*template name: Portfolio Single */
get_header(); ?>


<?php get_template_part( 'include/breadcrumb' ); ?>
 
                <!-- Page Title
                ============================================= -->
                <section id="page-title" class="page-title" style="">

                        <div class="container clearfix">
                             
                            <div class="row">

                                <div class="col-md-12">

                                    <h1><?php the_title_attribute();?></h1>

                                </div>



                                <div class="clearfix divider-small no-line"></div>

                                    <?php if( have_rows('product_images') ): ?>
                                                 
                                        <div class="fslider" data-easing="">
                                        
                                            <div class="flexslider">
                                                
                                                <div class="slider-wrap">

                                                    <?php while( have_rows('product_images') ): the_row(); ?>

                                                        <div class="slide" data-thumb="<?php the_sub_field('product_slide'); ?>">
                                                                        
                                                            <img src="<?php the_sub_field('product_slide'); ?>" alt="<?php the_sub_field('product_alt_text'); ?>">
                                                                  
                                                        </div>
                                                                                
                                                    <?php endwhile; ?>
                                                                         
                                                                     
                                                </div>
                                            
                                            </div>
                                        
                                        </div>

                 
                                        <script>
                                        // Can also be used with $(document).ready()
                                        $(window).load(function() {
                                          $('.fslider').flexslider({
                                            animation: "fade"
                                          });
                                        });
                                        </script>

                                    <?php endif; ?>



                            </div>

                        </div>
                        

                </section><!-- #page-title end -->


                

        <!-- Content
        ============================================= -->
        <section id="content" style="overflow:visible;">

            <div class="content-wrap">


                <div class="section nomargin notoppadding">

                    <div class="container clearfix">
                    
                        <div class="row">

                            <div class="col-md-8">


                                <div class="tabs hidden-sm hidden-xs clearfix" id="tab-2" style="z-index:99;">

                                    <ul class="tab-nav clearfix">
                                        <li><a href="#tabs-5"><i class="icon-home2 norightmargin"></i> Item Details</a></li>
                                        <li><a href="#tabs-6"><i class="icon-line-help norightmargin"></i> Support & Comments (<?php $comments_number = get_comments_number( $post_id ); echo $comments_number; ?>)</a> </li>

                                    </ul>

                                    <div class="tab-container" style="padding-top:35px;">

                                        <div class="tab-content clearfix" id="tabs-5">
                                          

                                                <p class="lead"><?php echo get_the_content(); ?></p>

                                                <div class="clearfix no-line"></div>



                                        </div>



                                        <div class="tab-content clearfix" id="tabs-6">
                                           <?php comments_template(); ?> 
                                        </div>
                                       

                                    </div>

                                </div>


                                <div class="content hidden-lg hidden-md">
                                    <p class="lead"><?php echo get_the_content(); ?></p>
                                </div>

                                   
                            </div>

                            <div class="col-md-4">
                                
                                <div class="hidden-sm hidden-xs">
                                    <?php echo do_shortcode ('[purchase_link]');?>
                                </div>
                             

                                <div class="clearfix"></div>

                                        <!-- Download - Share
                                        ============================================= -->
                                        <div class="si-share noborder clearfix" style="margin-top:15px;">
                                            <span>Share:</span>
                                            <div>
                                                <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title_attribute(); ?>" title="Share on Facebook!" target="_blank" class="social-icon si-borderless si-facebook">
                                                    <i class="icon-facebook"></i>
                                                    <i class="icon-facebook"></i>
                                                </a>

                                                <a href="http://twitter.com/home/?status=<?php the_title_attribute(); ?> - <?php the_permalink(); ?>" title="Tweet this!" target="_blank"  class="social-icon si-borderless si-twitter">
                                                    <i class="icon-twitter"></i>
                                                    <i class="icon-twitter"></i>
                                                </a>


                                                <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>&description=<?php the_title_attribute(); ?>" target="_blank" class="social-icon si-borderless si-pinterest">
                                                    <i class="icon-pinterest"></i>
                                                    <i class="icon-pinterest"></i>
                                                </a>
                                                <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="social-icon si-borderless si-gplus">
                                                    <i class="icon-gplus"></i>
                                                    <i class="icon-gplus"></i>
                                                </a>

                                                <a href="mailto:type email address here?subject=I wanted to share this download with you from <?php bloginfo('name'); ?>&body=<?php the_title_attribute('','',true); ?>&#32;&#32;<?php the_permalink(); ?>" class="social-icon si-borderless si-email3">
                                                    <i class="icon-email3"></i>
                                                    <i class="icon-email3"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Download - Share End -->
                                    


                                    <div class="download-block download-details">

                                                <ul class="iconlist nobottommargin">

                                                    <li><i class="icon-line-clock"></i><strong>Date added:</strong> <?php the_time( get_option( 'date_format' ) ); ?></li>


                                                    <?php $number_of_files = get_field('number_of_files'); if( !empty($number_of_files) ){ ?> 

                                                    <li><i class="icon-line-folder"></i> <strong>Files:</strong> <?php echo $number_of_files; ?></li>

                                                    <?php } else { ?> 
                                                                                   
                                                    <?php } ?>



                                                    <?php $file_types = get_field('file_types'); if( !empty($file_types) ){ ?> 

                                                    <li><i class="icon-line-file"></i> <strong>File Types:</strong> <?php echo $file_types; ?></li>

                                                    <?php } else { ?> 
                                                                                   
                                                    <?php } ?>

                                                    <?php $file_size = get_field('file_size'); if( !empty($file_size) ){ ?> 

                                                    <li><i class="icon-line-expand"></i> <strong>Download Size:</strong> <?php echo $file_size; ?></li>

                                                    <?php } else { ?> 
                                                                                   
                                                    <?php } ?>

                                                    <li><i class="icon-line-download"></i> <strong>Downloads:</strong> <?php echo edd_format_amount( edd_get_total_sales(), false ); ?></li>



                                                    <li><i class="icon-folder"></i> <strong>Category:</strong> <?php the_terms( $post->ID, 'download_category', '', ', ', '' );?></li>


                                                    <?php if ( is_user_logged_in() ) { ?> 
                                                    
                                                    <li><i class="icon-pencil"></i><strong><?php edit_post_link(); ?></strong></li>
                                                        
                                                        <?php } else { ?> 
                                                                           
                                                    <?php } ?>





                                                    


                                                </ul>
                                    
                                    </div>
                               
                                    <div class="small-line clearfix"></div>


                            </div>

                        </div>


                    </div>
                
                </div>



            </div>

        </section><!-- #content end -->




<?php get_footer(); ?>