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

<header class="main-header">
    <section class="branding">

	    <?php
	    if ( is_front_page() && is_home() ) : ?>
            <h1 class="home-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	    <?php else : ?>
            <p class="inner-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		    <?php
	    endif;

	    $description = get_bloginfo( 'description', 'display' );
	    if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo $description; ?></p>
		    <?php
	    endif; ?>

    </section>
    <nav class="primary-nav">
        <ul class="primary-nav-ul">
            <li class="primary-nav-li active">Item 1</li>
            <li class="primary-nav-li">Item 2</li>
            <li class="primary-nav-li">Item 3</li>
        </ul>
    </nav>
</header>