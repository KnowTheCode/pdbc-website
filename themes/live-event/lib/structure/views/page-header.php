<header class="page-header">
    <div class="wrap">
        <h1 class="page-title" itemprop="headline"><?php esc_html_e( $page_title ); ?></h1>
        <?php if ( $byline ) : ?>
        <p class="entry-meta"><?php esc_html_e( $byline ); ?></p>
        <?php endif; ?>
        <?php do_action( 'page_header_content' ); ?>
    </div>
</header>