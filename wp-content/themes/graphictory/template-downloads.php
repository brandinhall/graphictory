<?php /* Template Name: My Account - My Downloads */ get_header(); ?>
<?php get_template_part( 'include/breadcrumb' ); ?>



                <!-- Page Title
                ============================================= -->
                <section id="page-title" class="page-title" style="padding-bottom:80px;">

                        <div class="container clearfix">
                             


                            <h1><?php the_title_attribute();?></h1>
             


                        </div>
                        

                </section><!-- #page-title end -->


       <!-- Content
        ============================================= -->
        <section id="content" style="overflow:visible;">

            <div class="content-wrap">

                <div class="container clearfix">
                



                <?php if ( is_user_logged_in() ) { ?> 
                


                        <div class="clearfix" style="margin-top:-71px; z-index:99;">

                            <ul class="tab-nav clearfix">
                                <li><a href="<?php echo get_site_url();?>/my-account/"><i class="icon-user norightmargin"></i> Edit Profile</a></li>
                                <li class="ui-tabs-active"><a href="<?php echo get_site_url();?>/my-account/my-downloads/"><i class="icon-line-download norightmargin"></i> My Downloads</a></li>
                            </ul>

                                <div class="divider no-line"></div>
                                   <h3><strong>Downloads</strong></h3>
                                   <?php echo do_shortcode ('[download_history]');?> 
                                    
                                   <h3><strong>Purchase History</strong></h3>
                                   <?php echo do_shortcode ('[purchase_history]');?> 


                    <?php } else { ?> 

                    <?php echo do_shortcode ('[fes_login_form]');?>
                                                                       
                <?php } ?>


                    


                </div>

            </div>

        </section><!-- #content end -->
        


<?php get_footer(); ?>
