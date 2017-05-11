<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



		<div class="row">


					<div class="col-md-2">

					<span class="post-avatar comment-avatar clearfix">

						<?php echo get_avatar( get_the_author_email(), '90' ); ?>

					</span>

				</div>


				<div class="col-md-10">
										<!-- post thumbnail -->

											<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
									        	<div class="entry-image">
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
												</a>
									        </div>
											<?php endif; ?>
											<!-- /post thumbnail -->

											<!-- post title -->
									        <div class="entry-title">
												<h2>
													<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
												</h2>
									        </div>
											<!-- /post title -->

			                                <ul class="entry-meta clearfix">
			                                    <li><i class="icon-calendar3"></i> <?php the_time( get_option( 'date_format' ) ); ?></li>
			                                    <li><a href="#"><i class="icon-user"></i> <?php the_author_posts_link(); ?></a></li>
			                                    <li><i class="icon-folder-open"></i> <?php _e( ' ', 'creativehouse' ); ?><?php the_category( ', ' ); ?></li>
			                                    <li><a href="<?php the_permalink(); ?>#comments"><i class="icon-comments"></i><?php comments_popup_link( __( '0 Comments', 'creativehouse' ), __( '1 Comment', 'creativehouse' ), __( '% Comments', 'creativehouse' ) ); ?></a></li>
			                                </ul>



			                                <div class="entry-content">
			                                
			                                    <p><?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?></p>
			                                   
			                                </div>

			    </div>


   		 </div>



	</article>
	<!-- /article -->

	<div class="divider clearfix no-line"></div>

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
