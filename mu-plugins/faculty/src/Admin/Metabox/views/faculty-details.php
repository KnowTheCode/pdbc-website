<p>
    <label for="_short_bio">Short Bio</label>
    <textarea class="widefat" name="_faculty_details[short_bio]" id="_short_bio" rows="2" cols="4"><?php echo esc_textarea( $this->metadata['_faculty_details']['short_bio'] ); ?></textarea>
</p>

<h4>Social Media Links</h4>

<?php
foreach( $this->config->social_links as $meta_key => $label ) : ?>
<p>
    <input type="text" name="_faculty_details[<?php echo $meta_key; ?>]" id="_<?php echo $meta_key; ?>" value="<?php esc_attr_e( $this->metadata['_faculty_details'][ $meta_key ] ); ?>" />
    <label for="_<?php echo $meta_key; ?>"><?php echo $label; ?></label>
</p>
<?php endforeach;