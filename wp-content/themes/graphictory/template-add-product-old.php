
<?php /* Template Name:  */ get_header(); ?>

<?php
       acf_form_head();
 ?>
<?php get_template_part( 'include/breadcrumb' ); ?>

                <!-- Page Title
                ============================================= -->
                <section id="page-title" class="page-title" style="padding:30px 0;">

                	
                        <div class="container clearfix">
                         

							<div class="row">
                  
                        		<div class="col-md-8">
                                <h1>Add Product</h1>
                                <span>Become a Creative House Author today!</span>
                            	</div>


                            	<div class="col-md-4 tright">
                            		<a href="#" class="button">View Product</a>
                            	</div>
                                 	
                                <div class="clearfix"></div>
                      


                        	</div>


                    	</div>

                </section><!-- #page-title end -->

       <!-- Content
        ============================================= -->
        <section id="content">

            <div class="content-wrap nopadding">




                <div class="section nomargin" style="padding:60px 0;">

   					
	                    <div class="container clearfix">

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<?php
 
    $args = array(
        'post_id' => 'new',
        'field_groups' => array(647)
    );
     
    acf_form( $args );
 
?>

<?php endwhile; ?>

<?php else: ?>



<?php endif; ?>





	                    </div>

                </section>
                    <div class="line nomargin"></div>

                <div class="section bgcolor text-center nomargin dark">

                	<div class="container">

                		<h1>You make the product, we do the selling!</h1>

                	</div>


                </div>


                <div class="section">

                	<div class="container">

						

                	</div>


                </div>



                    
                    
                </div>


        </section><!-- #content end -->
        


<?php get_footer(); ?>
