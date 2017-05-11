<!-- Start of search -->
<div class="search">

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    
    <?php $searchresults = get_search_query(); ?>
    <?php if ($searchresults != ('')){ ?>
    <input type="text" value="<?php echo $searchresults; ?>" name="s" id="s" />
    <?php } else { ?>
    
    <input type="text" value="" name="s" id="s" />
    
    <?php } ?>
    <input type="hidden" name="post_type" value="post" />
    <input type="submit" id="searchsubmit" value="<?php _e( 'Search', 'squarecode' ); ?>" />
      
</form>

</div>
<!-- End of search -->
        