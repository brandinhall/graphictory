<?php 

class cr3ativ_eddsorting extends WP_Widget {

	// constructor
	function cr3ativ_eddsorting() {
        parent::WP_Widget(false, $name = __('EDD Sorting Options', 'squarecode') );
    }

	// widget form creation
	function form($instance) { 
    // Check values
     if( $instance) { 
         $title = esc_attr($instance['title']); 
    } else { 
         $title = ''; 
    } 

function cr3_edd_sorting_options( $single_key = false  ) {
	$options = array(
		'date'  => __( 'Date', 'squarecode' ),
		'title' => __( 'Title', 'squarecode' ),
		'sales' => __( 'Sales', 'squarecode' ),
		'pricing' => __( 'Price', 'squarecode' )
	);

	if ( 'edd_price' == get_query_var( 'meta_key' ) ) {
		$key = 'pricing';
	} elseif ( '_edd_download_sales' == get_query_var( 'meta_key' ) ) {
		$key = 'sales';
	} else {
		$key = $single_key;
	}

	if ( $single_key && $key ) {
		return $key;
	}

	return $options;
}

/**
 * Sorting for standard query
 */
function cr3_edd_orderby( $query ) {
	if ( ! $query->is_main_query() || is_admin() || ( defined( 'DOING_AJAX' ) && DOING_AJAX ) || is_page_template( 'page-templates/shop.php' ) ) {
		return;
	}

	if ( get_query_var( 'cr3-orderby' ) && 'pricing' == get_query_var( 'cr3-orderby' ) ) {
		$query->set( 'orderby', 'meta_value_num' );
		$query->set( 'meta_key', 'edd_price' );
	} elseif ( get_query_var( 'cr3-orderby' ) && 'sales' == get_query_var( 'cr3-orderby' ) ) {
		$query->set( 'orderby', 'meta_value_num' );
		$query->set( 'meta_key', '_edd_download_sales' );
	}
}
add_filter( 'pre_get_posts', 'cr3_edd_orderby' );
        
        
	function widget( $args, $instance ) {
		if ( $this->get_cached_widget( $args ) ) {
			return;
		}

		ob_start();

		extract( $args );

		$title   = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$order   = get_query_var( 'cr3-order' ) ? strtolower( get_query_var( 'cr3-order' ) ) : 'desc';
		$orderby = get_query_var( 'cr3-orderby' ) ? strtolower( cr3_edd_sorting_options( get_query_var( 'cr3-orderby' ) ) ) : 'post_date';

		echo $before_widget;

		if ( $title ) echo $before_title . $title . $after_title;
		?>

		<form action="" method="get" class="download-sorting">
			<label for="orderby">
				<?php _e( 'Sort by:', 'squarecode' ); ?>
				<?php
					echo EDD()->html->select( array(
						'name' => 'cr3-orderby',
						'id' => 'cr3-orderby',
						'selected' => $orderby,
						'show_option_all' => false,
						'show_option_none' => false,
						'options' => cr3_edd_sorting_options()
					) );
				?>
			</label>


				<label for="order-asc">
					<input type="radio" name="cr3-order" id="order-asc" value="asc" <?php checked( 'asc', $order ); ?>><span class="icon-arrow-up"></span>
				</label>

				<label for="order-desc">
					<input type="radio" name="cr3-order" id="order-desc" value="desc" <?php checked( 'desc', $order ); ?>><span class="icon-arrow-down2"></span>
				</label>



		</form>

		<?php

		echo $after_widget;

		$content = ob_get_clean();

		echo $content;

		$this->cache_widget( $args, $content );
	}        
        
        
        
        
        
}
