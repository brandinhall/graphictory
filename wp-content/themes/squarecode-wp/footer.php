<!-- Start of footer widget wrapper -->
<div id="footer_widget_wrapper">
    
    <!-- Start of footer widget -->
    <div id="footer_widget">
        
        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer') ) : else : ?>		
        <?php endif; ?>
    
    </div>
    <!-- End of footer widget -->
    
    <div class="clearfix"></div>

</div>
<!-- End of footer widget wrapper -->

<!-- Start of footer wrapper -->
<div id="footer_wrapper">

    <!-- Start of footer -->
    <footer>

        <!-- Start of bottom logo -->
        <div id="bottom_logo">
            
            <?php if ( function_exists( 'get_option_tree' ) ) { $bottomlogopath=get_option_tree( 'vn_bottomlogo' ); }
            ?>
            <?php if ($bottomlogopath !=( '')) { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo $bottomlogopath; ?>" alt="<?php _e( 'bottom logo', 'squarecode' ); ?>" />
            </a>

            <?php } else { ?>

            <h6 class="bottom-site-title"><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='<?php _e( 'home', 'squarecode' ); ?>'><?php bloginfo( 'name' ); ?></a></h6>

            <?php } ?>

        </div>
        <!-- End of bottom logo -->

        <!-- Start of bottom menu -->
        <div id="bottom_menu">

            <?php wp_nav_menu( array( 'theme_location' => 'footer', 'fallback_cb' => 'false', ) ); ?>

        </div>
        <!-- End of bottom logo -->
        
        <?php if ( function_exists( 'get_option_tree' ) ) { $copyright=get_option_tree( 'vn_copyright' ); } ?>
        
        <?php if ($copyright !=( '')) { ?>

        <!-- Start of copyright -->
        <div class="copyright">
            &copy; <?php echo stripslashes($copyright); ?>

        </div>
        <!-- End of copyright -->
        
        <?php } ?>

    </footer>
    <!-- End of footer -->

    <div class="clearfix"></div>

</div>
<!-- End of footer wrapper -->

<?php if ( function_exists( 'get_option_tree' ) ) { $analytics=get_option_tree( 'vn_analytics' ); } ?>

<script><?php echo ($analytics); ?></script>


<script type="text/javascript">
    jQuery(document).ready(function() {
        
'use strict';
        
        // Initialize navgoco with default options
        jQuery("#demo1").navgoco({
            caretHtml: '',
            accordion: false,
            openClass: 'open',
            save: true,
            cookie: {
                name: 'navgoco',
                expires: false,
                path: '/'
            },
            slide: {
                duration: 400,
                easing: 'swing'
            },
            // Add Active class to clicked menu item
            onClickAfter: function(e, submenu) {
                e.preventDefault();
                jQuery('#demo1').find('li').removeClass('active');
                var li = jQuery(this).parent();
                var lis = li.parents('li');
                li.addClass('active');
                lis.addClass('active');
            },
        });
        
        // set the speed for filtering items
        jQuery("ul#cr3ativeportfolio_portfolio-list").filterable({ animationSpeed: 400 });
    
        // Create the dropdown base
        selectnav('menu-menu2', {
                        label: 'Menu',
                        nested: true,
                        indent: '-'
                    });
        
        // Create a sticky sidebar for single product pages to improve UX and conversions but first we check for screen size        
        if(window.matchMedia('(min-width: 1024px)').matches) {
        jQuery("body.single-download .right_content.edd_downloads").stick_in_parent({offset_top: 20});
        }
        
        
        var window_width = jQuery( window ).width();

            if (window_width < 1025) {
              jQuery("body.single-download .right_content.edd_downloads").trigger("sticky_kit:detach");
            } else {
              make_sticky();
            }

        jQuery( window ).resize(function() {

              window_width = jQuery( window ).width();

                  if (window_width < 1025) {
                    jQuery("body.single-download .right_content.edd_downloads").trigger("sticky_kit:detach");
                  } else {
                    make_sticky();
                  }

        });

        function make_sticky() {
          jQuery("#sidebar").stick_in_parent({
            parent: '.entry-content'
          });
        }
       
    });
    
    
    // Equal heights for columns - anything with the class of equal
     jQuery('.edd_download').addClass('equal');
    
    // equal height columns     
        jQuery(function() {
        jQuery('.equal').matchHeight({
            property: 'min-height'
        });
    });

</script>

<?php wp_footer(); ?>

</body>

</html>