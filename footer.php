<?php
/**
 * Theme Footer
 */
?>

</div><!-- .sticky-footer-flex-wrap -->

<footer class="primary-footer">

    <p class="footer-content"></p>

    <nav class="footer-nav">

        <?php
        $args = array(
            'container'      => false,
            'theme_location' => 'footer-menu',
            'menu_class'     => 'footer-nav-menu',
            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
        );

        wp_nav_menu( $args );
        ?>

    </nav>

</footer>

<?php wp_footer(); ?>

</body>

</html>
