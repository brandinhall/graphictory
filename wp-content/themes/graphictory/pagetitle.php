 
                <!-- Page Title
                ============================================= -->
                <section id="page-title" class="page-title">

                    <div class="container clearfix">
                         
                    



                    <h1>
                         <?php

                                    if ( is_home() ) {
                                       _e( 'Latest Posts', 'html5blank' );

                                    } elseif ( is_page() ) {
                                       the_title(); 

                                    } elseif ( is_single() ) {
                                       the_title(); 
                                       
                                    } elseif ( is_category() ) {
                                        printf( __( 'Category Archives: %s', 'html5blank' ), '' . single_cat_title( '', false ) . '' );
                         
                                    } elseif ( is_tag() ) {
                                        printf( __( 'Tag Archives: %s', 'html5blank' ), '' . single_tag_title( '', false ) . '' );

                                    } elseif ( is_search() ) {
                                       the_title(); 

                                    } elseif ( is_author() ) {
                                        /* Queue the first post, that way we know
                                         * what author we're dealing with (if that is the case).
                                        */
                                        the_post();
                                        printf( __( 'Author Archives: %s', 'html5blank' ), '<a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a>' );
                                        /* Since we called the_post() above, we need to
                                         * rewind the loop back to the beginning that way
                                         * we can run the loop properly, in full.
                                         */
                                        rewind_posts();
                         
                                    } elseif ( is_day() ) {
                                        printf( __( 'Daily Archives: %s', 'html5blank' ), '' . get_the_date() . '' );
                         
                                    } elseif ( is_month() ) {
                                        printf( __( 'Monthly Archives: %s', 'html5blank' ), '' . get_the_date( 'F Y' ) . '' );
                         
                                    } elseif ( is_year() ) {
                                        printf( __( 'Yearly Archives: %s', 'html5blank' ), '' . get_the_date( 'Y' ) . '' );
                         

                                    } elseif ( is_404() ) {
                                        _e( '404', 'html5blank' );
                         

                                    } else {
                                        _e( 'Archives', 'html5blank' );
                         
                                    }
                                ?>
                    </h1>
                    



                   

                    
                    </div>
             

                        
                    </div>

                </section><!-- #page-title end -->




       