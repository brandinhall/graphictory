<?php /* Template Name: Sidebar */ get_header(); ?>

<?php get_template_part('pagetitle'); ?>


       <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                    <div class="col-md-7">

                    <?php the_content();?>
					

                </div>

                <div class="col-md-4">

                    <?php get_sidebar(); ?>


                </div>


                </div>






            </div>

        </section><!-- #content end -->
        


<?php get_footer(); ?>
