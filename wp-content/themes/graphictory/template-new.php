<?php acf_form_head(); ?>
<?php /* Template Name: New Download */ get_header(); ?>

<?php get_template_part( 'include/breadcrumb' ); ?>

       <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap ">

                <div class="container">


                    <?php /* The loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php acf_form(array(
                            'post_id'       => 'new_post',
                            'new_post'      => array(
                                'post_type'     => 'download',
                                'post_status'       => 'publish'
                            ),
                            'submit_value'      => 'Submit Download'
                        )); ?>

                    <?php endwhile; ?>
                  


            </div>

        </section><!-- #content end -->
        





<?php get_footer(); ?>
