<?php if ( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail( get_the_ID() ) ) : ?>
	<div class="edd_download_image">
		<a href="<?php the_permalink(); ?>">
			<?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
		</a>
        <a href="<?php the_permalink(); ?>" class="EDD_permalink_button">View Details</a>
	</div>
<?php endif; ?>
