


                    <div id="layout-shuffle">
                        <button class="grid inactive"><i class="icon-line-grid"></i></button>
                    </div>

                    <div id="layout-shuffle">
                        <button class="list inactive">
                        <i class="icon-list-ul"></i>
                        </button>
                    </div>

                    <div id="portfolio-shuffle">
                        <i class="icon-random"></i>
                    </div>

                    <div class="clear divider-small"></div>


                            <script type='text/javascript'>//<![CDATA[
                                jQuery(window).load(function(){
                                    var $container = $('#portfolio');
                                    
                                    $container.isotope({ transitionDuration: '0.65s' });

                                $('button').on('click',function(e) {
                                     
                                    if ($(this).hasClass('grid')) {
                                        $('.list').removeClass('active').addClass('inactive');
                                        $('.grid').removeClass('inactive').addClass('active');
                                        $('#portfolio').removeClass('portfolio-1').addClass('portfolio-3');
                                        $('.download-description').removeClass('desc-visible').addClass('desc-hidden');
                                        $container.isotope('layout');

                                    }
                                    else if($(this).hasClass('list')) {
                                        $('.grid').removeClass('active').addClass('inactive');
                                        $('.list').removeClass('inactive').addClass('active');
                                        $('#portfolio').removeClass('portfolio-3').addClass('portfolio-1');
                                        $('list').removeClass('').addClass('active');
                                        $('.download-description').removeClass('desc-hidden').addClass('desc-visible');
                                        $container.isotope('layout');
                                    }

                                });

                            });//]]> 

                            </script>