<nav class="inpost-pagination">
	<?php if ( is_object( $previous ) ) : ?>
		<div class="inpost-pagination--previous">
			<a href="<?php echo get_permalink( $previous ); ?>" class="inpost-pagination--link">&#x000AB; Previous</a>
			<div class="inpost-pagination--post-title"><?php esc_html_e( $previous->post_title ); ?></div>
		</div>
	<?php endif; ?>
	<?php if ( is_object( $next ) ) : ?>
		<div class="inpost-pagination--next">
			<a href="<?php echo get_permalink( $next ); ?>" class="inpost-pagination--link">Next &#x000BB;</a>
			<div class="inpost-pagination--post-title"><?php esc_html_e( $next->post_title ); ?></div>
		</div>
	<?php endif; ?>
</nav>