<p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'genesis' ); ?>:</label>
    <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php esc_attr_e( $instance['title'] ); ?>" class="widefat" />
</p>

<p>
    <input id="<?php echo esc_attr( $this->get_field_id( 'show_cta' ) ); ?>" type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'show_cta' ) ); ?>" value="1"<?php checked( $instance['show_cta'] ); ?> />
    <label for="<?php echo esc_attr( $this->get_field_id( 'show_cta' ) ); ?>">Show the CTA</label>
</p>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id('message') ); ?>"><?php _e( 'Call-to-Action Message', 'fulcrum_site'); ?>:</label><br />
    <textarea id="<?php echo esc_attr( $this->get_field_id( 'message' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'message' ) ); ?>" class="widefat" rows="6" cols="4"><?php echo esc_textarea( $instance['message'] ); ?></textarea>
</p>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id('thank_you_message') ); ?>"><?php _e( 'Thank You Message', 'fulcrum_site'); ?>:</label><br />
    <textarea id="<?php echo esc_attr( $this->get_field_id( 'thank_you_message' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'thank_you_message' ) ); ?>" class="widefat" rows="6" cols="4"><?php echo esc_textarea( $instance['thank_you_message'] ); ?></textarea>
</p>

<p>
	<label for="<?php echo esc_attr( $this->get_field_id('class') ); ?>"><?php _e( 'Widget class', 'fulcrum_site'); ?>:</label><br />
	<input type="text" id="<?php echo esc_attr( $this->get_field_id('class')); ?>" name="<?php echo esc_attr( $this->get_field_name( 'class' ) ); ?>" value="<?php echo esc_attr( $instance['class'] ); ?>" class="widefat" />
</p>

<p>
    <label for="<?php echo esc_attr( $this->get_field_id('button_text') ); ?>"><?php _e( 'Submit Button Text', 'fulcrum_site'); ?>:</label><br />
    <input type="text" id="<?php echo esc_attr( $this->get_field_id('button_text')); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>" value="<?php echo esc_attr( $instance['button_text'] ); ?>" class="widefat" />
</p>