<dl<?php echo $this->get_id(); ?> class="qa qa--quiz<?php echo $this->get_classes(); ?>">
	<dt class="qa-question" itemscope itemtype="http://schema.org/Question">
		<span class="qa-icon <?php echo $this->get_icon(); ?>" aria-hidden="true"></span> <?php esc_html_e( $this->atts['question'] ); ?>
	</dt>
	<dd class="qa-answer" itemprop="suggestedAnswer" itemscope itemtype="http://schema.org/Answer" style="display: none;"><?php echo wpautop( $content ); ?></dd>
</dl>