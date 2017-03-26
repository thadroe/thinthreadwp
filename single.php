<?php
/**
 * Single post template
 */
get_header(); ?>

	<main class="main-content-area">

		<section class="primary-section">

			<header class="primary-section-header">

			</header>

			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>

					<?php
				endif;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

					the_posts_navigation();

					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</section>

	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>