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
            <a href="<?php echo site_url(); ?>">
                        <?php if ( function_exists( 'get_option_tree' ) ) { $bottomlogopath=get_option_tree( 'vn_bottomlogo' ); } ?>
                        <img src="<?php echo $bottomlogopath; ?>" alt="<?php _e( 'bottom logo', 'squarecode' ); ?>" />
                    </a>

        </div>
        <!-- End of bottom logo -->

        <!-- Start of bottom menu -->
        <div id="bottom_menu">

            <?php wp_nav_menu( array( 'theme_location' => 'footer', 'fallback_cb' => 'false', ) ); ?>

        </div>
        <!-- End of bottom logo -->

        <!-- Start of copyright -->
        <div class="copyright">
            <?php if ( function_exists( 'get_option_tree' ) ) { $copyright=get_option_tree( 'vn_copyright' ); } ?>
            &copy; <?php echo stripslashes($copyright); ?>

        </div>
        <!-- End of copyright -->

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
        
        // Create a sticky sidebar for single product pages to improve UX and conversions        
        jQuery("body.single-download .right_content.edd_downloads").stick_in_parent({offset_top: 20});
            
    });
    
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