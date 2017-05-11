       <section id="slider" class="slider-parallax swiper_wrapper clearfix" style="height: 300px;">

            <div class="swiper-container swiper-parent">

                <div class="swiper-wrapper">


                        <?php 

                            $args = array(
                                'post_type' => 'slider',
                                'posts_per_page' => -1,
                                'orderby' => 'ASC'
                            );

                            $the_query = new WP_Query( $args );

                        ?>

                        <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>




                    <div class="swiper-slide" style="background-image: url('<?php $background_image = get_field('background_image'); if( !empty($background_image) ): ?><?php echo $background_image; ?><?php endif; ?>');">





                        <div class="container clearfix">
                            <div class="slider-caption <?php $slider_class = get_field('slider_class'); if( !empty($slider_class) ): ?><?php echo $slider_class; ?><?php endif; ?>">
                               
                                <h1 data-caption-animate="fadeInUp">


                                <?php $title_image = get_field('title_image'); if( !empty($title_image) ): ?><img src="<?php echo $title_image; ?>"><?php endif; ?>
                                <?php $slider_title = get_field('slider_title'); if( !empty($slider_title) ): ?><?php echo $slider_title; ?><?php endif; ?></h1>
                                <p style="max-width:90%;" data-caption-animate="fadeInUp" data-caption-delay="200"><?php the_content();?></p>
                                
                                <?php $button_1_text = get_field('button_1_text'); if( !empty($button_1_text) ): ?>
                                <a href="<?php $button_1_link = get_field('button_1_link'); if( !empty($button_1_link) ): ?><?php echo $button_1_link; ?><?php endif; ?>" class="button button-rounded" data-animate="fadeInUp" data-delay="300"><?php echo $button_1_text; ?></a>

                                <?php endif; ?>

                                <?php $button_2_text = get_field('button_2_text'); if( !empty($button_2_text) ): ?>

                                <a href="<?php $button_2_link = get_field('button_2_link'); if( !empty($button_2_link) ): ?><?php echo $button_2_link; ?><?php endif; ?>" class="button button-rounded button-dark" data-animate="fadeInUp" data-delay="300"><?php echo $button_2_text; ?></a>

                                <?php endif; ?>



                            </div>
                        </div>
                    </div>



                        <?php endwhile; else : ?>

                            <p>There were no slides :( </p>

                        <?php endif; ?>

                </div>
<!-- 
                <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
                <div id="slider-arrow-right"><i class="icon-angle-right"></i></div> -->
               
                <div class="swiper-pagination"></div>

                <a href="#" data-scrollto="#content" class="one-page-arrow bottommargin-sm dark">
                    <i class="icon-angle-down infinite animated fadeInDown"></i>
                </a>

            </div>

            <script>
                    jQuery(document).ready(function ($) {
                        var swiperSlider = new Swiper('.swiper-parent', {
                            paginationClickable: false,
                            slidesPerView: 1,
                            grabCursor: true,
                            autoplay: false,
                            speed: 650,
                            loop: true,
                            onSwiperCreated: function (swiper) {
                                $('[data-caption-animate]').each(function () {
                                    var $toAnimateElement = $(this);
                                    var toAnimateDelay = $(this).attr('data-caption-delay');
                                    var toAnimateDelayTime = 0;
                                    if (toAnimateDelay) { toAnimateDelayTime = Number(toAnimateDelay) + 750; } else { toAnimateDelayTime = 750; }
                                    if (!$toAnimateElement.hasClass('animated')) {
                                        $toAnimateElement.addClass('not-animated');
                                        var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                        setTimeout(function () {
                                            $toAnimateElement.removeClass('not-animated').addClass(elementAnimation + ' animated');
                                        }, toAnimateDelayTime);
                                    }
                                });
                                SEMICOLON.slider.swiperSliderMenu();
                            },
                            onSlideChangeStart: function (swiper) {
                                $('#slide-number-current').html(swiper.activeLoopIndex + 1);
                                $('[data-caption-animate]').each(function () {
                                    var $toAnimateElement = $(this);
                                    var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                    $toAnimateElement.removeClass('animated').removeClass(elementAnimation).addClass('not-animated');
                                });
                                SEMICOLON.slider.swiperSliderMenu();
                            },
                            onSlideChangeEnd: function (swiper) {
                                $('#slider').find('.swiper-slide').each(function () {
                                    if ($(this).find('video').length > 0) { $(this).find('video').get(0).pause(); }
                                    if ($(this).find('.yt-bg-player').length > 0) { $(this).find('.yt-bg-player').pauseYTP(); }
                                });
                                $('#slider').find('.swiper-slide:not(".swiper-slide-active")').each(function () {
                                    if ($(this).find('video').length > 0) {
                                        if ($(this).find('video').get(0).currentTime != 0) $(this).find('video').get(0).currentTime = 0;
                                    }
                                    if ($(this).find('.yt-bg-player').length > 0) {
                                        $(this).find('.yt-bg-player').getPlayer().seekTo($(this).find('.yt-bg-player').attr('data-start'));
                                    }
                                });
                                if ($('#slider').find('.swiper-slide.swiper-slide-active').find('video').length > 0) { $('#slider').find('.swiper-slide.swiper-slide-active').find('video').get(0).play(); }
                                if ($('#slider').find('.swiper-slide.swiper-slide-active').find('.yt-bg-player').length > 0) { $('#slider').find('.swiper-slide.swiper-slide-active').find('.yt-bg-player').playYTP(); }

                                $('#slider .swiper-slide.swiper-slide-active [data-caption-animate]').each(function () {
                                    var $toAnimateElement = $(this);
                                    var toAnimateDelay = $(this).attr('data-caption-delay');
                                    var toAnimateDelayTime = 0;
                                    if (toAnimateDelay) { toAnimateDelayTime = Number(toAnimateDelay) + 300; } else { toAnimateDelayTime = 300; }
                                    if (!$toAnimateElement.hasClass('animated')) {
                                        $toAnimateElement.addClass('not-animated');
                                        var elementAnimation = $toAnimateElement.attr('data-caption-animate');
                                        setTimeout(function () {
                                            $toAnimateElement.removeClass('not-animated').addClass(elementAnimation + ' animated');
                                        }, toAnimateDelayTime);
                                    }
                                });
                            }
                        });

                        $('#slider-arrow-left').on('click', function (e) {
                            e.preventDefault();
                            swiperSlider.swipePrev();
                        });

                        $('#slider-arrow-right').on('click', function (e) {
                            e.preventDefault();
                            swiperSlider.swipeNext();
                        });

                        $('#slide-number-current').html(swiperSlider.activeLoopIndex + 1);
                        $('#slide-number-total').html($('#slider').find('.swiper-slide:not(.swiper-slide-duplicate)').length);
                    });
            </script>


        </section>




