<div class="faculty--block" data-panel-state="inactive">
    <div class="faculty--card" data-panel-id="faculty--<?php echo $name_slug; ?>">
		<?php echo $profile_picture; ?>
        <span class="faculty-avatar-overlay"><i class="fa fa-plus-square" aria-hidden="true"></i></span>
        <span class="faculty-info"><span class="faculty-name"><?php echo $name; ?></span><span
                    class="faculty-byline"><?php esc_html_e( $byline ); ?></span></span>
    </div>
    <div class="faculty--profile-panel" id="faculty--<?php echo $name_slug; ?>" style="display: none;">
        <a href="javascript:void(0);" class="profile-close--button" data-panel-id="faculty--<?php echo $name_slug; ?>">Close</a>
        <h3><?php echo $name; ?></h3>
		<?php the_content(); ?>
		<?php include( $this->config['view_social_links'] ); ?>
    </div>
</div>
