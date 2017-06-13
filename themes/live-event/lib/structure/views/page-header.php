<header class="page-header parent-canvas">
    <div class="wrap">
        <div class="one-half">
            <h1 class="page-title" itemprop="headline"><?php esc_html_e( $page_title ); ?></h1>
            <?php if ( $byline ) : ?>
            <p class="entry-meta"><?php esc_html_e( $byline ); ?></p>
            <?php endif; ?>
            <?php do_action( 'page_header_content' ); ?>
        </div><div class="one-half last"><?php dynamic_sidebar( 'architect-sponsors' ); ?></div>
    </div>
    <div class="profits-canvas--container"><canvas id="profits-canvas" class="profits-canvas aniview" data-av-animation="animateCanvas" width="1000" height="300"></canvas></div>
</header>