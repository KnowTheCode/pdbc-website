<?php if ( $instance['show_cta'] ) : ?>
<div class="get-on-list--left-panel">
    <h4 class="widget-title widgettitle"><?php esc_html_e( $instance['title'] ); ?></h4>
    <?php echo $instance['message']; ?>
</div>
<?php endif; ?>
<div class="<?php echo $form_class; ?>">
    <form method="POST" action="https://knowthecode.activehosted.com/proc.php" id="_form_5_" class="_form _form_3 _inline-form get-on-list--form" novalidate>
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
            <button id="_form_5_submit" class="_submit button orange" type="submit"><?php esc_html_e( $instance['button_text'] ); ?></button>
        </div>
        <div class="_form-thank-you" style="display:none;"><?php echo $instance['thank_you_message']; ?></div>
    </form>
</div>