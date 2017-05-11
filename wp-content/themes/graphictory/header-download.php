<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Brandin Hall" />

    <!-- Stylesheets
    ============================================= -->
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    
    
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/dist/css/style.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/src/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/src/css/responsive.css" type="text/css" />


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>


    <!-- Document Title
    ============================================= -->
    <title><?php wp_title("|",true, 'right'); ?> <?php if (!defined('WPSEO_VERSION')) { bloginfo('name'); } ?></title>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-62094638-1', 'auto');
      ga('send', 'pageview');

    </script>


<?php wp_head(); ?>
</head>


<body <?php body_class( 'stretched' ); ?>>


    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">
    
    
    
        <!-- Top Bar
        ============================================= -->
        <div id="top-bar">

            <div class="container clearfix">

                <div class="col_half nobottommargin">

                    <!-- Top Links
                    ============================================= -->
                    <div class="top-links">

                        <ul>
                    
                        <?php html5blank_topnav(); ?>

                        </ul>


                    </div><!-- .top-links end -->

                </div>

                <div class="col_half fright col_last nobottommargin">

                    <!-- Top Social
                    ============================================= -->
                     <div class="top-links alt-links">
                        <ul>
                          
                            <li></li>
                        
                        </ul>

                    </div><!-- #top-social end -->

                </div>

            </div>

        </div><!-- #top-bar end -->

        
        
    
        <!-- Header
        ============================================= -->
        <header id="header transparent-header">


            <div id="header-wrap">
            
       

                <div class="container clearfix">


                     <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                        <!-- Logo
                        ============================================= -->
                        <div id="logo">
                            <a href="<?php echo site_url(); ?>" class="standard-logo" data-dark-logo="<?php bloginfo('template_directory');?>/images/logo-dark.png"><img src="<?php bloginfo('template_directory');?>/images/logo.png" alt="Pixel Forge Media"></a>
                            <a href="<?php echo site_url(); ?>" class="retina-logo" data-dark-logo="<?php bloginfo('template_directory');?>/images/logo-dark@2x.png"><img src="<?php bloginfo('template_directory');?>/images/logo@2x.png" alt="Pixel Forge Media"></a>
                        </div><!-- #logo end -->


            
                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu" class="style-2">

                    
                        <ul>
                            <?php html5blank_nav(); ?>
                        </ul>
  
                     
                        <!-- Top Search
                        ============================================= -->
                        <div id="author-area">






                        <?php if ( is_user_logged_in() ) { ?> 
                        
                        <?php global $current_user; get_currentuserinfo();?>
                                <!-- Single button -->
                                                        <?php
                                        global $current_user;
                                        get_currentuserinfo();     
                                        echo get_avatar( $current_user->ID, 34 );
                                 ?>
                                <div class="btn-group">

                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        


                                Welcome back <?php echo $current_user->user_firstname; ?> <span class="caret"></span>
                                </button>
            
                                  <ul class="user-menu dropdown-menu">
                                    <li><a href="<?php echo get_site_url();?>/my-account/">Settings</a></li>
                                    <li><a href="<?php echo get_site_url();?>/my-account/my-downloads/">My Purchases</a></li>
                                    <li><a href="<?php echo wp_logout_url(get_permalink());?>">Logout</a></li>
                                    <li role="separator" class="divider"></li>
                                    
                                    <li><a href="<?php echo home_url() . '/author/' . get_the_author_meta( 'user_login', wp_get_current_user()->ID ); ?>">View My Store</a></li>
                                   <li><a href="<?php echo get_site_url();?>/author-dashboard/">Author Dashboard</a></li>
                                  </ul>
                                </div>

                                </div><!-- #top-search end -->

                            <?php } else { ?> 




                                 <ul class="login-menu">
                                    <li><a href="<?php echo get_site_url();?>/become-an-author/" class="btn button button-small btn-default">Start Selling</a></li><li>
                                    <li><a href="<?php echo get_site_url();?>/my-account/" class="btn button button-light button-small btn-default">Login</a></li>
                                </div>

                                                                               
                        <?php } ?>

                    </div>

                </nav><!-- #primary-menu end -->

            </div>
            </div>
        </div>
        </header><!-- #header end -->
    
 

<?php if ( ! user_can( $current_user, "frontend_vendor" ) ) { ?> 

<?php } else { ?> 

<div id="author-toolbar">
<ul>
    <li><a href="<?php echo get_site_url();?>/author-dashboard/?task=dashboard"><i class="icon-home"></i> My Dashboard</a></li>
    <li><a href="<?php echo get_site_url();?>/author-dashboard/?task=profile"><i class="icon-home"></i> Edit my store</a></li>
    <li><a href="<?php echo home_url() . '/author/' . get_the_author_meta( 'user_login', wp_get_current_user()->ID ); ?>"><i class="icon-home"></i> View my store</a></li>
    <li><a href="<?php echo get_site_url();?>/author-dashboard/?task=products"><i class="icon-pencil"></i> My Products</a></li>
    <li><a href="<?php echo get_site_url();?>/author-dashboard/?task=new-product"><i class="icon-pencil"></i> Add Product</a></li>
    <li><a href="<?php echo get_site_url();?>/author-dashboard/?task=orders"><i class="icon-pencil"></i> View Orders</a></li>
    <li><a href="<?php echo wp_logout_url(get_permalink());?>"><i class="icon-off"></i> Logout</a></li>
</ul>

</div>


<?php } ?>
