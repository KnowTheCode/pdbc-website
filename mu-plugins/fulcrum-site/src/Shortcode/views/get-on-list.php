<div class="get-on-list--form">
	<form method="POST" action="https://knowthecode.activehosted.com/proc.php" id="_form_5_" class="_form _form_5 _inline-form  _dark" novalidate>
		<input type="hidden" name="u" value="5" />
		<input type="hidden" name="f" value="5" />
		<input type="hidden" name="s" />
		<input type="hidden" name="c" value="0" />
		<input type="hidden" name="m" value="0" />
		<input type="hidden" name="act" value="sub" />
		<input type="hidden" name="v" value="2" />
		<div class="_form-content">
			<div class="_form_element _x99497760" >
                <label class="screen-reader-text" for="getonlist-NAME">Your name*</label>
				<input type="text" name="fullname" placeholder="Your name" id="getonlist-NAME" required/>
			</div>
			<div class="_form_element _x47469179" >
				<label class="screen-reader-text" for="getonlist-EMAIL">Your email*</label>
				<input type="text" name="email" placeholder="Your email" id="getonlist-EMAIL" required/>
			</div>
			<button id="_form_5_submit" class="_submit button orange" type="submit"><?php esc_html_e( $this->atts['button_text'] ); ?></button>
		</div>
		<div class="_form-thank-you" style="display:none;">
            <?php if ( $this->content ) :
                echo wpautop( do_shortcode( $this->content ) );
            else: ?>
            <p><strong>WooHoo! You are now on the list!</strong></p>
            <?php endif; ?>
        </div>
	</form>
</div>