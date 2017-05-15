<?php
/**
 * Archive template
 */
get_header(); ?>

    <main class="main-content-area">

        <section class="primary-section">

            <header class="archive-section-header">

                <?php
                the_archive_title( '<h1 class="archive-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>

            </header>

            <?php
            if ( have_posts() ) : while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() );

            endwhile;

                the_posts_navigation();

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif; ?>

        </section>

    </main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>