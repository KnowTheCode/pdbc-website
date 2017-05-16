<p>
    <label for="_fulcrum_subtitle"><strong>Subtitle</strong></label>
    <input class="large-text" type="text" name="_fulcrum_subtitle" id="_fulcrum_subtitle" value="<?php esc_html_e( $this->metadata['_fulcrum_subtitle'] ); ?>">
</p>

<p>
    <label for="_fulcrum_header_content"><strong>Header Contents</strong></label>
	<?php
	$args = array(
		'textarea_name' => "_fulcrum_header_content",
	);
	wp_editor( $this->metadata['_fulcrum_header_content'], '_fulcrum_header_content', $args );
	?>
    <span class="description">Enter the content that you want to display in the header under the title.</span>
</p>