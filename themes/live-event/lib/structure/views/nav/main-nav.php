<nav id="main-menu" class="nav-primary menu--container animated" data-slidein="slideInRight"
     data-slideout="slideOutRight" itemscope itemtype="http://schema.org/SiteNavigationElement">
    <div class="wrapper">
        <?php include( __DIR__ . '/hamburger.php' ); ?>
        <ul class="menu genesis-nav-menu menu-primary">
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>#overview" itemprop="url"><span itemprop="name">Overview</span></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/our-faculty" itemprop="url"><span itemprop="name">All-Star Teachers</span></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/program-details" itemprop="url"><span itemprop="name">Program Details and Pricing</span></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/why-go" itemprop="url"><span itemprop="name">Why Go</span></a>
            </li>
            <li class="menu-item">
            <?php if ( $current_iam_selection == 'developer' ) : ?>
                <a href="<?php echo $event_home_url; ?>/career-development-focus" itemprop="url" class="button --career-development"><span itemprop="name">Career Development Focus</span></a>
            <?php else: ?>
                <a href="<?php echo $event_home_url; ?>/business-focus" itemprop="url" class="button --business"><span itemprop="name">Business Focus</span></a>
            <?php endif; ?>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/project-management-focus" itemprop="url" class="button --project-management"><span itemprop="name">Project Management Focus</span></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/technical-focus" itemprop="url" class="button --technical"><span itemprop="name">Technical Focus</span></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/venue" itemprop="url"><span itemprop="name">The Venue</span></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/become-a-sponsor" itemprop="url"><span itemprop="name">Become a Sponsor</span></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/faq" itemprop="url"><span itemprop="name">FAQ</span></a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $event_home_url; ?>/blog" itemprop="url"><span itemprop="name">Bootcamp Blog</span></a>
            </li>
        </ul>
    </div>
</nav>