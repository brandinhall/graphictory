<?php  
/* 
Template Name: Shop-SingleAuthor
*/  
?>

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
            
            <!-- Start of header store image -->
            <div class="header_store_image">
            
                <?php the_post_thumbnail(''); ?>      
                
                <div class="shop EDD-Avatar">
                    <?php echo get_avatar( get_the_author_meta('email'), '80' ); ?>
                </div>
                
                <div class="shop EDD-Author"><p><?php echo the_author_meta( 'display_name' ); ?></p></div>
                
            <div class="clear"></div>
                
            <?php 
                $by_title=esc_url(add_query_arg(array( 'orderby'=>'title','order'=>'asc'))); 
                $by_price = esc_url(add_query_arg(array('orderby'=>'price','order'=>'asc'))); 
                $by_date = esc_url(add_query_arg(array('orderby'=>'date','order'=>'asc'))); 
                $by_titledesc = esc_url(add_query_arg(array('orderby'=>'titledesc','order'=>'desc'))); 
                $by_pricedesc = esc_url(add_query_arg(array('orderby'=>'pricedesc','order'=>'desc'))); 
                $by_datedesc = esc_url(add_query_arg(array('orderby'=>'datedesc','order'=>'desc'))); 
            ?>

            <!-- Start of orderby -->
            <div class="orderby">
                <div class="cr3ativeportfolio_filter">
                    <span class="cr3ativeportfolio_portfolio-filter"><?php _e( 'Filter:', 'squarecode' ); ?></span>
                </div>
                
                <div>
                    <a class="uparrow" href="<?php echo esc_url($by_price);?>"><span class="orderme"><?php _e( 'Price', 'squarecode' ); ?></span><span class="dashicons dashicons-arrow-up-alt2"></span></a>
                    <a class="downarrow" href="<?php echo esc_url($by_pricedesc);?>"><span class="orderme"><?php _e( 'Price', 'squarecode' ); ?></span><span class="dashicons dashicons-arrow-down-alt2"></span></a>
                </div>
                <div>
                    <a class="uparrow" href="<?php echo esc_url($by_title);?>"><span class="orderme"><?php _e( 'Title', 'squarecode' ); ?></span><span class="dashicons dashicons-arrow-up-alt2"></span></a>
                    <a class="downarrow" href="<?php echo esc_url($by_titledesc);?>"><span class="orderme"><?php _e( 'Title', 'squarecode' ); ?></span><span class="dashicons dashicons-arrow-down-alt2"></span></a>
                </div>
                <div>
                    <a class="uparrow" href="<?php echo esc_url($by_date);?>"><span class="orderme"><?php _e( 'Date', 'squarecode' ); ?></span><span class="dashicons dashicons-arrow-up-alt2"></span></a>
                    <a class="downarrow" href="<?php echo esc_url($by_datedesc);?>"><span class="orderme"><?php _e( 'Date', 'squarecode' ); ?></span><span class="dashicons dashicons-arrow-down-alt2"></span></a>
                </div>

            </div>
            <!-- End of orderby -->
                
            </div><!-- End of header store iamge -->

            <!-- Start of left content -->
            <div class="left_content">
                
                    <!-- Start of cr3ativeportfolio portfolio-list ul -->                    
                    <ul id="cr3ativeportfolio_portfolio-list-plain">
                        
                    <?php $paged=( get_query_var( 'paged')) ? get_query_var( 'paged') : 1; 
                    if ( ! isset( $wp_query->query['orderby'] ) ) { 
                        $args = array( 
                            'order' => 'ASC', 
                            'post_type' => 'download', 
                            'paged' => $paged ); 
                    } else { 
                        switch ($wp_query->query['orderby']) { 
                            case 'date': 
                            $args = array( 
                                'orderby' => 'date', 
                                'order' => 'ASC', 
                                'post_type' => 'download', 
                                'paged' => $paged ); 
                            break; 
                            case 'title': 
                            $args = array( 
                                'orderby' => 'title', 
                                'order' => 'ASC', 
                                'post_type' => 'download', 
                                'paged' => $paged ); 
                            break; 
                            case 'price': 
                            $args = array( 
                                'meta_key'=>'edd_price', 
                                'order' => 'ASC', 
                                'orderby' => 'meta_value_num', 
                                'post_type' => 'download', 
                                'paged' => $paged ); 
                            break; 
                            case 'datedesc': 
                            $args = array( 
                                'orderby' => 'date', 
                                'order' => 'DESC', 
                                'post_type' => 'download', 
                                'paged' => $paged ); 
                            break; 
                            case 'titledesc': 
                            $args = array( 
                                'orderby' => 'title', 
                                'order' => 'DESC', 
                                'post_type' => 'download', 
                                'paged' => $paged ); 
                            break; 
                            case 'pricedesc': 
                            $args = array( 
                                'meta_key'=>'edd_price', 
                                'order' => 'DESC', 
                                'orderby' => 'meta_value_num', 
                                'post_type' => 'download', 
                                'paged' => $paged ); 
                            break; 
                        } } 
                        $temp = $wp_query; 
                        $wp_query = null; $wp_query = new WP_Query(); $wp_query->query($args); while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                            <li class="cr3ativeportfolio_portfolio-itemthree min-height">   

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

                                        <div class="EDD-Author"><p><?php _e( 'By:', 'squarecode' ); ?>&nbsp;<?php the_author(); ?></p></div>
                                        
                                    </div>

                                </div><!-- End of the item details under the thumbanail -->

                            </div><!-- End of EDD Featured Image Index -->

                            </li>

                      <?php endwhile; ?>

                      </ul>
                
                <div class="cr3ativeportfolioclear"></div>
                        
                <!-- Start of edd_download_pagination -->
                <div id="edd_download_pagination" class="navigation">
                <?php cr3ativ_pagination(); ?>

                </div><!-- End of edd_download_pagination -->
                
                <?php $wp_query = null; $wp_query = $temp;  // Reset ?>
                
            </div>
            <!-- End of left content -->

            <!-- Start of right content -->
            <div class="right_content edd_downloads">
                
                    <div class="edd-author-bio">
                
                        <div class="EDD-Avatar">
                            <?php echo get_avatar( get_the_author_meta('email'), '80' ); ?>
                        
                        </div>
                        
					<div class="download-author-bio">
						<p><?php echo ( get_the_author_meta('description') ); ?></p>

					</div>
            
                    <div class="clear"></div>
                    
                    </div>
                
                <div class="member_details">
                    
                    <div class="circle"><?php echo cr3ativ_count_user_downloads( $author->ID ); ?></div>
                    <span class="item_count"><?php _e( 'ITEM(S)', 'squarecode' ); ?></span>
                    
                    </div>
                

                    <div class="EDD-Author">
                        <p><span class="copyright"><?php _e( 'Copyright', 'squarecode' ); ?>&nbsp;<?php echo date('Y'); ?></span></p>
                        <p><?php echo the_author_meta( 'display_name' ); ?></p>
                    </div>
            
            <div class="clear"></div>

            </div>
            <!-- End of right content --> 


        </div>
        <!-- End of main content -->

        <div class="clearfix"></div>

    </div>
    <!-- End of page wrap -->

    <?php get_footer(); ?>