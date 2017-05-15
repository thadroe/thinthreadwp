<?php
/**
 * Page Sidebar
 */
?>

<aside class="page-sidebar">
    <section class="page-sidebar-section">

        <?php if ( ! dynamic_sidebar( 'page' ) ): ?>

            <h4 class="widget-heading">Sidebar Setup</h4>
            <p>Please add a sidebar widget in the admin area.</p>

        <?php endif; ?>

    </section>
</aside>