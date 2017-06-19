<?php

$enable_deal = false;

if ( is_user_logged_in() ) {
    $link = $enable_deal
        ? 'https://www.siteground.com/?mktafcode=79a5913acbbf61fb5859345f0e3c13e4?'
        : 'https://www.siteground.com/go/knowthecode';
    $button_text = 'Get 3 months for Free';

} else {
    $link = 'https://www.siteground.com/?mktafcode=79a5913acbbf61fb5859345f0e3c13e4';
    $button_text = 'Signup today and get 60% off';
}

if ( $enable_deal ) {
    $button_text = 'Black Friday 70% OFF';
}

$image_src = $enable_deal
    ? $images_url . 'siteground/siteground-blackfriday-2016.jpg'
    : $images_url . 'siteground/siteground-800x500.jpg';
?>
<div class="partner partner__gold siteground">
    <div class="partner__badge">Partner</div>
    <a class="partner__graphic" href="<?php echo $link; ?>">
        <img src="<?php echo $image_src; ?>">
    </a>
    <div class="partner__badge_content">Partner</div>
    <div class="partner__content">
        <div class="partner__summary">
            <p>SiteGround offers managed WordPress hosting built on ultra-fast SSD and Linux container platform. They perform application and plugin auto updates, have developed in-house dynamic caching based on Nginx, and geeky tools like staging, Git, WP-CLI.</p>
        </div>
        <a class="partner__button" href="<?php echo $link; ?>"><?php echo $button_text; ?></a>
    </div>
</div>