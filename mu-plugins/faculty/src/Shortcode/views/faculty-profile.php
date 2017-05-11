<div class="faculty--pop teacher-bio animated" id="faculty--<?php echo $name_slug; ?>" data-slidein="slideDown" data-slideout="slideUp">
	<div class="wrapper">
		<a href="javascript:void(0);" class="popup-close--button" data-popup-id="faculty--<?php echo $name_slug; ?>">Close</a>
		<h3><?php echo $name; ?></h3>
		<?php the_content(); ?>
        <?php include( $this->config['view_social_links'] ); ?>
	</div>
</div>