<?php  
/* 
Template Name: Home-Search
*/  
?>

<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<?php 

$post_image_id = get_post_thumbnail_id();
		if ($post_image_id) {
			$thumbnail = wp_get_attachment_image_src( $post_image_id, 'full', false);
			if ($thumbnail) (string)$thumbnail = $thumbnail[0];
		}

?>
                <?php endwhile; ?>

                <?php else: ?>

                <?php endif; ?>

    <!-- Start of page wrap -->
    <div class="page_wrap_home">

<!-- Start of featured image small -->
<div id="featured_image_small" style="background: url('<?php echo $thumbnail; ?>') no-repeat scroll 0 0 transparent; background-size:cover;">
  
  <!-- Start of title block -->
  <div class="title_block">
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('home') ) : else : ?>		
    <?php endif; ?> 
  </div>
  <!-- End of title block --> 
  
</div>
<!-- End of featured image small --> 

        <!-- Start of main content -->
        <div class="main_content">
            
            <div class="clearbig"></div>
            
            <!-- Start of search -->
            <div class="search_EDD">

                <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">

                <?php $searchresults = get_search_query(); ?>
                <?php if ($searchresults != ('')){ ?>
                <input type="text" placeholder="<?php _e( 'Search The Marketplace', 'squarecode' ); ?>" value="<?php echo $searchresults; ?>" name="s" id="s" />
                <?php } else { ?>

                <input type="text" value="" name="s" id="s" placeholder="<?php _e( 'Search The Marketplace', 'squarecode' ); ?>" />

                <?php } ?>
                <input type="hidden" name="post_type" value="download" />
                <input type="submit" id="searchsubmit" value="<?php _e( 'Search', 'squarecode' ); ?>" />

                </form>
                
                <div class="clear"></div>
                
            </div>
            <!-- End of search_EDD -->
            
            <?php 

            $args = array(
                'post_type' => 'download',
                'showposts' => 3,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'download_category',
                        'field' => 'slug',
                        'terms' => 'featured'
                    )
                )
            );
            $query = new WP_Query( $args ); ?>
            
            <?php if ($query) : ?>
            
            <?php if ( function_exists( 'get_option_tree' ) ) { $homefeaturedtitle=get_option_tree( 'vn_homefeaturedtitle' ); } ?>
            
            <?php if ($homefeaturedtitle != ('')) { ?>
            <h6 class="lined"><?php echo stripslashes($homefeaturedtitle); ?></h6>
            
            <?php } ?>
            
            <?php if ( function_exists( 'get_option_tree' ) ) { $homefeaturedtext=get_option_tree( 'vn_homefeaturedtext' ); } ?>
            
            <?php if ($homefeaturedtext != ('')) { ?>
            <p class="center home-featured"><?php echo stripslashes($homefeaturedtext); ?></p>
            
            <?php } ?>

            <!-- Start of cr3ativeportfolio portfolio-list ul -->                    
            <ul class="home_list">
                            
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                            <li class="min-height">
                            <?php if ( has_post_thumbnail() ) { ?>            

                            <!-- Start of EDD Featured Image Index -->
                            <div class="edd_feat_image_index">

                                <?php the_post_thumbnail(''); ?>
                                
                                <!-- Start of the overlay section on the thumbnail -->
                                <div class="caption" onclick="">
        
                                    <p><?php the_title (); ?></p>
                                    
                                    <p class="EDD_Price1"><?php _e( 'ITEM PRICE:', 'squarecode' ); ?> <?php edd_price($post->ID); ?></p>
                                    
                                    <a class="more-link-hidden" href="<?php the_permalink (); ?>"><?php _e( 'DETAILS', 'squarecode' ); ?></a>
                                    
                                    <div class="thumb_author_details">
                                        
                                        <div class="EDD-Avatar"><?php echo get_avatar( get_the_author_meta('email'), '80' ); ?></div>

                                        <div class="EDD-Author"><p><?php _e( 'By:', 'squarecode' ); ?>&nbsp;<?php the_author() ?></p></div>
                                        
                                    </div>
                                    
                                </div><!-- End of the overlay section on the thumbnail -->
                                    
                                    
                                <!-- Start of the item details under the thumbanail -->
                                <div class="EDD-thumb-details">

                                    <span class="more-link edd" href="<?php the_permalink (); ?>"><?php the_title (); ?></span>
                                    
                                    <?php edd_price($post->ID); ?>

                                    <div class="thumb_author_details">
                                        
                                        <div class="EDD-Avatar"><?php echo get_avatar( get_the_author_meta('email'), '80' ); ?></div>

                                        <div class="EDD-Author"><p><?php _e( 'By:', 'squarecode' ); ?>&nbsp;<?php the_author() ?></p></div>
                                        
                                    </div>

                                </div><!-- End of the item details under the thumbanail -->

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
            			
            <?php wp_reset_query(); ?>
            
            <div class="clearbig"></div>
            
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
            
            <?php if ( function_exists( 'get_option_tree' ) ) { $homerecenttext=get_option_tree( 'vn_homerecenttext' ); } ?>
            
            <?php if ($homerecenttext != ('')) { ?>
            <p class="center home-recent"><?php echo stripslashes($homerecenttext); ?></p>
            
            <?php } ?>
            
            <!-- Start of cr3ativeportfolio portfolio-list ul -->                    
            <ul class="home_list">
                            
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                            <li class="min-height">
                            <?php if ( has_post_thumbnail() ) { ?>            

                            <!-- Start of EDD Featured Image Index -->
                            <div class="edd_feat_image_index">

                                <?php the_post_thumbnail(''); ?>
                                
                                <!-- Start of the overlay section on the thumbnail -->
                                <div class="caption" onclick="">
        
                                    <p><?php the_title (); ?></p>
                                    
                                    <p class="EDD_Price1"><?php _e( 'ITEM PRICE:', 'squarecode' ); ?> <?php edd_price($post->ID); ?></p>
                                    
                                    <a class="more-link-hidden" href="<?php the_permalink (); ?>"><?php _e( 'DETAILS', 'squarecode' ); ?></a>
                                    
                                    <div class="thumb_author_details">
                                        
                                        <div class="EDD-Avatar"><?php echo get_avatar( get_the_author_meta('email'), '80' ); ?></div>

                                        <div class="EDD-Author"><p><?php _e( 'By:', 'squarecode' ); ?>&nbsp;<?php the_author() ?></p></div>
                                        
                                    </div>
                                    
                                </div><!-- End of the overlay section on the thumbnail -->
                                    
                                    
                                <!-- Start of the item details under the thumbanail -->
                                <div class="EDD-thumb-details">

                                    <span class="more-link edd" href="<?php the_permalink (); ?>"><?php the_title (); ?></span>
                                    
                                    <?php edd_price($post->ID); ?>

                                    <div class="thumb_author_details">
                                        
                                        <div class="EDD-Avatar"><?php echo get_avatar( get_the_author_meta('email'), '80' ); ?></div>

                                        <div class="EDD-Author"><p><?php _e( 'By:', 'squarecode' ); ?>&nbsp;<?php the_author() ?></p></div>
                                        
                                    </div>

                                </div><!-- End of the item details under the thumbanail -->

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
            			
            <?php wp_reset_query(); ?>
                    
            
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

                <?php the_content( '        '); ?>

                <?php endwhile; ?>

                <?php else: ?>

                <p>
                    <?php _e( 'There are no posts to display. Try using the search.', 'squarecode' ); ?>
                </p>

                <?php endif; ?>
            
            <div class="clearbig"></div>

        </div>
        <!-- End of main content -->

        <div class="clearfix"></div>

    </div>
    <!-- End of page wrap -->

    <?php get_footer(); ?>