<?php
/**
 * Theme Header
 */
?>

<!DOCTYPE html>
<html class="no-js no-svg" <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="sticky-footer-flex-wrap"><!-- closed in footer -->

    <header class="main-header">
        <section class="branding">

            <?php
            if ( is_front_page() && is_home() ) : ?>
                <h1 class="home-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                          rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
                <p class="inner-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                          rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
            endif;

            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p class="site-description"><?php echo $description; ?></p>
                <?php
            endif; ?>

        </section>

        <nav class="primary-nav">

            <?php
            $args = array(
                'container'      => false,
                'theme_location' => 'primary-menu',
                'menu_class'     => 'primary-nav-menu',
                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
            );

            wp_nav_menu( $args );
            ?>

        </nav>

    </header>