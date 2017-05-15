<?php
/**
 * Content partial
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-container' ); ?>>

    <header class="article-header">

        <?php
        if ( is_single() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;

        if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php thinthreadwp_posted_on(); ?>
            </div>
            <?php
        endif; ?>

    </header>

    <?php if ( get_the_post_thumbnail() ) : ?>

        <figure class="thumbnail">
            <?php the_post_thumbnail( 'large' ); ?>
        </figure>

    <?php endif; ?>

    <section class="article-content">

        <?php
        the_content( sprintf(
        /* translators: %s: Name of current post. */
            wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'thinthreadwp' ), array( 'span' => array( 'class' => array() ) ) ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ) );

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thinthreadwp' ),
            'after'  => '</div>',
        ) );
        ?>

    </section>

    <footer class="article-footer">

        <?php thinthreadwp_entry_footer(); ?>

    </footer>

</article>