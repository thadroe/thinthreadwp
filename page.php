<?php
/**
 * Page template
 */
get_header(); ?>

    <main class="main-content-area">

        <section class="primary-section">

            <header class="primary-section-header">

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

<?php get_sidebar( 'page' ); ?>

<?php get_footer(); ?>