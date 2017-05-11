
                                <div class="download-block user-detail-block">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <?php echo get_avatar( $post->post_author, 70 );?>
                                        </div>
                                        <div class="col-md-8">
                                            <h4 class="author-title"><?php the_author_posts_link(); ?></h4><div class="clearfix"></div>
                                            <div class="clearfix"></div>
                                            <?php echo do_shortcode('[broo_user_badges]');?>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12">
                                            <a class="button button-light btn-block button-3d noleftmargin topmargin-sm button-small text-center" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">View Portfolio</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>