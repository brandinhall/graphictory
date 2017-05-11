
    <!-- Start of search -->
    <div class="search">
        <div class="container">


            <h3 class="search-header">Search Mock-up's, print templates, PSDs, Illustrator vectors and graphics</h3>

            <form role="search" class="nomargin" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                <div class="input-group input-group-lg">
                <?php $searchresults = get_search_query(); ?>
                <?php if ($searchresults != ('')){ ?>
                <input type="text"class="search-form-control" value="<?php echo $searchresults; ?>" name="s" id="s" />
                <?php } else { ?>
                
                <input type="text" class="search-form-control search-form" placeholder="Eg: Business card mockup" value="" name="s" id="s" />
                
                <?php } ?>

                <span class="input-group-btn">
                <input type="hidden" name="post_type" value="download" />
                <input type="submit" class="button search-button" id="searchsubmit" value="<?php _e( 'Search', 'squarecode' ); ?>" />
                </span>
                  
            </form>
            </div>
           
        </div>
    </div>
    <!-- End of search -->


    

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
