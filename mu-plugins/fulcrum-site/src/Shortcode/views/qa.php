<dl<?php echo $this->get_id(); ?> class="qa<?php echo $this->get_class(); ?>">
	<dt class="qa--question<?php echo $this->get_classes(); ?>" itemscope itemtype="http://schema.org/Question">
        <div class="qa--icon-container"><span class="qa--icon <?php echo $this->get_icon(); ?>" aria-hidden="true"></span></div><div class="qa--question-content"><?php esc_html_e( $this->atts['question'] ); ?></div>
	</dt>
	<dd class="qa--answer" itemprop="suggestedAnswer" itemscope itemtype="http://schema.org/Answer" style="display: none;"><?php echo wpautop( $content ); ?></dd>
</dl>