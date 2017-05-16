<p>
	<label for="_ux_developer_content">
		<strong>Developer Contents</strong>
	</label>
	<?php
	$args = array(
		'textarea_name' => "_ux_developer_content",
	);
	wp_editor( $this->metadata['_ux_developer_content'], '_ux_developer_content', $args );
	?>
</p>