<?php  
/* 
Template Name: Cr3ativPortfolio-3ColumnFilterable
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
            
            <div class="center">
                
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            
            <h1 class="portfolio_title"><?php the_title (); ?></h1>
                
                <?php the_content('        '); ?>
                <?php endwhile; ?>
                <?php else: ?>
                <p>
                  <?php _e( 'There are no posts to display. Try using the search.', 'squarecode' ); ?>
                </p>
                <?php endif; ?>
                
                </div>

                <!-- Start of wrapper -->
                <div class="cr3ativeportfolio_wrapper"> 

                <?php
                             $terms = get_terms("cr3ativportfolio_type");
                             $count = count($terms);
                             echo '<ul id="cr3ativeportfolio_portfolio-filter">';
                                echo '<li class="cr3ativeportfolio_filter">Filter:</li><li><a href="#all" title="">' . __( 'All', 'squarecode' ) . '</a></li>';
                             if ( $count > 0 ){

                                    foreach ( $terms as $term ) {

                                        $termname = strtolower($term->name);
                                        $termname = str_replace(' ', '-', $termname);
                                        echo '<li><a href="#'.$termname.'" title="" rel="'.$termname.'">'.$term->name.'</a></li>';
                                    }
                             }
                             echo '</ul>';
                        ?>
                <?php 
                            $loop = new WP_Query(array('post_type' => 'cr3ativportfolio', 'posts_per_page' => -1, 'showposts' => 9999999 ));
                            $count =0;
                        ?>

                    <!-- Start of cr3ativeportfolio_portfolio-wrapper -->
                    <div id="cr3ativeportfolio_portfolio-wrapper">

                        <!-- Start of cr3ativeportfolio portfolio-list ul -->                    
                        <ul id="cr3ativeportfolio_portfolio-list">
                            <?php if ( $loop ) : 
                                while ( $loop->have_posts() ) : $loop->the_post(); ?>

                            <?php
                                $terms = get_the_terms( $post->ID, 'cr3ativportfolio_type' );

                                if ( $terms && ! is_wp_error( $terms ) ) : 
                                    $links = array();

                                    foreach ( $terms as $term ) 
                                    {
                                        $links[] = $term->name;
                                    }
                                    $links = str_replace(' ', '-', $links);	
                                    $tax = join( " ", $links );		
                                else :	
                                    $tax = '';	
                                endif;
                            ?>

                            <li class="cr3ativeportfolio_portfolio-itemthree <?php echo strtolower($tax); ?> all">
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

        </div>
        <!-- End of main content -->

        <div class="clearfix"></div>

    </div>
    <!-- End of page wrap -->

    <?php get_footer('portfolio'); ?>
