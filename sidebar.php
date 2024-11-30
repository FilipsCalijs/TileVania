<aside>
    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else : ?>
        <p>Add widgets to the sidebar in the admin panel.</p>
    <?php endif; ?>
</aside>
