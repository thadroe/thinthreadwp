<?php
/**
 * Blog Sidebar
 */
?>

<aside class="primary-sidebar">
    <section class="primary-sidebar-section">

        <?php if ( ! dynamic_sidebar( 'primary' ) ): ?>

            <h4 class="widget-heading">Sidebar Setup</h4>
            <p>Please add a sidebar widget in the admin area.</p>

        <?php endif; ?>

    </section>
</aside>