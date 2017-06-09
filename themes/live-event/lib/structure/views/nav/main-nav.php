<nav id="main-menu" class="nav-primary menu--container animated" data-slidein="slideInRight" data-slideout="slideOutRight" itemscope itemtype="http://schema.org/SiteNavigationElement">
    <div class="wrapper">
        <?php include( __DIR__ . '/hamburger.php' ); ?>
        <ul class="menu genesis-nav-menu menu-primary">
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/program-details" itemprop="url"><span itemprop="name">Bootcamp Details and Pricing</span></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/why-go" itemprop="url"><span itemprop="name">Why Go</span></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/our-faculty" itemprop="url"><span itemprop="name">Your Mentors and Faculty</span></a>
            </li>
            <li class="menu-item">
            <?php if ( $current_iam_selection == 'developer' ) : ?>
                <a href="<?php echo $event_home_url; ?>/career-development-focus" itemprop="url"><span itemprop="name">Career Development Program</span></a>
            <?php else: ?>
                <a href="<?php echo $event_home_url; ?>/business-focus" itemprop="url"><span itemprop="name">Business Program</span></a>
            <?php endif; ?>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/project-management-focus" itemprop="url"><span itemprop="name">Project Management Program</span></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/technical-focus" itemprop="url"><span itemprop="name">Technical Program</span></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/faq" itemprop="url"><span itemprop="name">FAQ</span></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/venue" itemprop="url"><span itemprop="name">The Venue</span></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/become-a-sponsor" itemprop="url"><span itemprop="name">Become a Sponsor</span></a>
            </li>
        </ul>

        <ul class="social-links">
            <li>
                <a href="https://twitter.com/ProfitableWPDev" target="_blank" itemprop="url"><i class="fa fa-twitter" aria-hidden="true"></i><span class="screen-reader-text">Follow us on Twitter @ProfitableWPDev</span></a>
            </li>
            <li>
                <a href="https://www.facebook.com/ProfitableWPDev/" target="_blank" itemprop="url"><i class="fa fa-facebook-official" aria-hidden="true"></i><span class="screen-reader-text">Like us on Facebook</span></a>
            </li>
            <li>
                <a href="<?php echo $event_home_url; ?>/blog" itemprop="url">Blog</a>
            </li>
            <li><?php do_action( 'rendering_before_primary_nav_hamburger'); ?></li>
        </ul>
    </div>
</nav>