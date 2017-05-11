<?php get_header(); ?>

<?php get_template_part( 'include/breadcrumb' ); ?>
<?php get_template_part('pagetitle'); ?>


       <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                <div class="col_two_third">


						<?php get_template_part('loop'); ?>

						<?php get_template_part('pagination'); ?>


                </div>


						<?php get_sidebar(); ?>



                </div>

            </div>

        </section><!-- #content end -->
        


<?php get_footer(nocontact); ?>
