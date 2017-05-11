<?php get_header(); ?>


<?php get_template_part('pagetitle'); ?>


       <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap">

                <div class="container clearfix">

                <div class="col_two_third">


					<h1><?php _e( 'Tag Archive: ', 'html5blank' ); echo single_tag_title('', false); ?></h1>

					<?php get_template_part('loop'); ?>

					<?php get_template_part('pagination'); ?>

					

                </div>


						<?php get_sidebar(); ?>



                </div>

            </div>

        </section><!-- #content end -->
        


<?php get_footer(); ?>
