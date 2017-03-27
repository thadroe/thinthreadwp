<?php
/**
 * 404 template
 */
get_header(); ?>

	<main class="main-content-area">

        <section class="primary-section 404-not-found">

            <header class="primary-section-header">

                <h1 class="primary-section-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'thinthreadwp' ); ?></h1>

            </header>

            <div class="404-content">

                <p><?php esc_html_e( 'It looks like nothing was found at this location.', 'thinthreadwp' ); ?></p>

            </div>

        </section>

	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>