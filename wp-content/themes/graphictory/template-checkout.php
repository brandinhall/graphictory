<?php /* Template Name: Checkout */ get_header(); ?>
<?php get_template_part( 'include/breadcrumb' ); ?>
<?php get_template_part('pagetitle'); ?>


       <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">



                    <?php the_content();?>
					


                </div>

            </div>

        </section><!-- #content end -->
        


<?php get_footer(); ?>
