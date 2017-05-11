<?php  
/* 
Template Name: Vendor List
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
            
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            
            <h1 class="title"><?php the_title (); ?></h1>

                <?php the_content( '        '); ?>

                <?php endwhile; ?>

                <?php else: ?>

                <p>
                    <?php _e( 'There are no posts to display. Try using the search.', 'squarecode' ); ?>
                </p>

                <?php endif; ?>
            
            <div class="clear"></div>
            
<?php 

 $no=24;// total no of author to display

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if($paged==1){
      $offset=0;  
    }else {
       $offset= ($paged-1)*$no;
    }


 $user_query = new WP_User_Query( array( 'role' => 'frontend_vendor',  'number' => $no, 'offset' => $offset ) );
       if ( ! empty( $user_query->results ) ) {
    foreach ( $user_query->results as $user ) { 
 ?>  
            
                <!-- Start of vendor list wrapper -->
                <div class="vendor_list_wrapper">
                    
                    <div class="edd-author-bio">
                        
                        <div class="EDD-Avatar">
                            <?php echo get_avatar( $user->ID, 80 ); ?>
                            
                        </div><!-- End of EDD Avatar -->
                        
                        
                        <div class="member_info">
                                
                            <p class="vendor"><?php printf( '<a class="author-link" href="%s" rel="author">%s</a>', cr3ativ_edd_fes_author_url( $user->ID ), '' != $user->display_name ? esc_attr( $user->display_name ) : esc_attr( $user->user_login ) ); ?></p>

                            <div class="vendor-details">
                                <p><?php _e( 'Item(s): ', 'squarecode' ); ?>&nbsp;<span class="darktext"><?php echo cr3ativ_count_user_downloads( $user->ID ); ?></span></p>

                                <p><?php _e( 'Member since: ', 'squarecode' ); ?>&nbsp;<span class="darktext"><?php echo date("M Y", strtotime($user->user_registered)); ?></span></p>
                            </div>

                        </div>
                        <!-- End of member info -->

                        <div class="vendor_list_meta">
                            
                            <div class="EDD-Author">

                                <?php $websiteurl = $user->website; ?>

                                <?php $new_store_url = get_the_author_meta( 'user_login' ); ?>
                                
                                <p class="tinylink"><a href="<?php echo cr3ativ_edd_fes_author_url( $user->ID ) ?>"><?php _e( 'View Store', 'squarecode' ); ?></a></p>

                            </div>
                            <!-- End of EDD Author -->
                        
                            
                        
                        <?php if ( '' != $user->description ) : ?>

                            <div class="download-author-bio">

                                <p><?php echo ( $user->description ); ?></p>

                            </div>
                            <!-- End of download author bio -->

                        <?php endif; ?>
                            
                        </div>
                        <!-- End of vendor list meta -->
                        
                        <div class="clear"></div>
                        
                    </div>
                    <!-- End of edd author bio -->
                    
                </div>
                <!-- End of vendor list wrapper -->

            
            <?php }

            } else {
                echo 'No users found.';
            }

            ?>            
            
            <div class="clearbig"></div>
                
<?php
            $total_user = $user_query->total_users;  
            $total_pages=ceil($total_user/$no);

              echo paginate_links(array(  
                  'base' => get_pagenum_link(1) . '%_%',  
                  'format' => '?paged=%#%',  
                  'current' => $paged,  
                  'total' => $total_pages,  
                  'prev_text' => 'Previous',  
                  'next_text' => 'Next',
                  'type'     => 'plain',
                )); 
?>

        </div>
        <!-- End of main content -->

        <div class="clearfix"></div>

    </div>
    <!-- End of page wrap -->

    <?php get_footer(); ?>
