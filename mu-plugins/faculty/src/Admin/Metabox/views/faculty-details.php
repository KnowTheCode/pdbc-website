<p>
    <label for="_short_bio">Short Bio</label>
    <textarea class="widefat" name="_faculty_details[short_bio]" id="_short_bio" rows="2" cols="4"><?php echo esc_textarea( $this->metadata['_faculty_details']['short_bio'] ); ?></textarea>
</p>

<h4>Social Media Links</h4>
<p>
    <input type="text" name="_faculty_details[twitter]" id="_twitter" value="<?php esc_attr_e( $this->metadata['_faculty_details']['twitter'] ); ?>" />
    <label for="_twitter">Twitter</label>
</p>
<p>
    <input type="text" name="_faculty_details[facebook]" id="_Ffcebook" value="<?php esc_attr_e( $this->metadata['_faculty_details']['facebook'] ); ?>" />
    <label for="_facebook">Facebook</label>
</p>
<p>
    <input type="text" name="_faculty_details[linkedin]" id="_linkedin" value="<?php esc_attr_e( $this->metadata['_faculty_details']['linkedin'] ); ?>" />
    <label for="_linkedin">LinkedIn</label>
</p>
<p>
    <input type="text" name="_faculty_details[github]" id="_github" value="<?php esc_attr_e( $this->metadata['_faculty_details']['github'] ); ?>" />
    <label for="_github">GitHub</label>
</p>
<p>
    <input type="text" name="_faculty_details[wordpress]" id="_wordpress" value="<?php esc_attr_e( $this->metadata['_faculty_details']['wordpress'] ); ?>" />
    <label for="_wordpress">WordPress</label>
</p>
<p>
    <input type="text" name="_faculty_details[blog_url]" id="_blog_url" value="<?php esc_attr_e( $this->metadata['_faculty_details']['blog_url'] ); ?>" />
    <label for="_blog_url">Blog</label>
</p>
<p>
    <input type="text" name="_faculty_details[business_url]" id="_business_url" value="<?php esc_attr_e( $this->metadata['_faculty_details']['business_url'] ); ?>" />
    <label for="_business_url">Business Website</label>
</p>