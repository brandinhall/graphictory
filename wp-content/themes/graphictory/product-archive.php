                            <?php
                                $terms = get_the_terms( $post->ID, 'download_category' );

                                if ( $terms && ! is_wp_error( $terms ) ) : 
                                    $links = array();

                                    foreach ( $terms as $term ) 
                                    {
                                        $links[] = $term->name;
                                    }
                                    $links = str_replace(' ', '-', $links); 
                                    $tax = join( " ", $links );     
                                else :  
                                    $tax = '';  
                                endif;
                            ?>

                        <!-- article -->
                        <article id="post-<?php the_ID(); ?>" class="portfolio-item <?php echo strtolower($tax); ?>">


                                     
                                            <div class="portfolio-image">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>
                                                </a>
                                               <div class="portfolio-overlay">
                                                <a href="<?php the_permalink(); ?>" class="center-icon"><i class="icon-eye"></i></a>






                                                </div>
                                            </div>
                                                  
                                             
                                            <div class="portfolio-desc">
                                                <h3><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h3>
                                                <span><?php edd_price($post->ID); ?></span>

                                                <div class="desc-hidden download-description">

                                                        <ul class="download-meta">

                                                            <li><i class="icon-line-clock"></i> <?php the_time( get_option( 'date_format' ) ); ?></li>

                                                            <li><i class="icon-folder"></i> <?php the_terms( $post->ID, 'download_category', '', ', ', '' );?></li>


                                                        </ul>
                                                        
                                                    <div class="clearfix"></div>

                                                    <div class="download-excerpt"><?php the_excerpt();?></div>
      
                                                    <div class="clearfix"></div> 

                                                    <?php $download_id = get_field('download_id'); if( !empty($download_id) ){ ?> 

                                                    <a class="button button-small text-center" href="<?php echo get_site_url(); ?>/checkout?edd_action=add_to_cart&download_id=<?php echo $download_id; ?>">Download <?php edd_price($post->ID); ?></a>

                                                    <?php } else { ?> 
                                                                                   
                                                    <?php } ?>



                                                </div>

                                            </div>
                                            
                                     


                        </article>
                        <!-- /article -->
