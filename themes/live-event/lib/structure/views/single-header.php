<header class="page-header">
    <div class="wrap">
        <div class="one-half">
            <h1 class="page-title<?php esc_attr_e( $classes ); ?>" itemprop="headline"><?php esc_html_e( $page_title ); ?></h1>
            <?php do_action( 'page_header_content' ); ?>
            <p class="entry-meta"><?php echo $byline; ?></p>
        </div><div class="one-half last"><?php dynamic_sidebar( 'architect-sponsors' ); ?></div>
    </div>
</header>