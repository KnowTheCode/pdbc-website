<ul class="faculty-social-links">
	<?php foreach ( $metadata as $social_network => $url ) :
		if ( ! $url ) {
			continue;
		}
		?>
	<li>
		<a href="<?php echo esc_url( $url ); ?>" target="_blank"><i class="fa fa-<?php esc_attr_e( $font_icons[ $social_network ] ); ?>" aria-hidden="true"></i><span class="screen-reader-text">Follow on <?php esc_html_e( $social_network ); ?></span></a>
	</li>
	<?php endforeach; ?>
</ul>