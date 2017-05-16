<dl<?php echo $this->get_id(); ?> class="qa<?php echo $this->get_class(); ?>">
	<dt class="qa--question" itemscope itemtype="http://schema.org/Question">
        <?php esc_html_e( $this->atts['question'] ); ?><div class="qa--icon --is-closed" data-open-handle="+" data-close-handle="-">+</div>
	</dt>
	<dd class="qa--answer" itemprop="suggestedAnswer" itemscope itemtype="http://schema.org/Answer" style="display: none;"><?php echo wpautop( $content ); ?></dd>
</dl>