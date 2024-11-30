(function ($) {
    wp.customize('nav_menu_locations[primary-menu]', function (value) {
        value.bind(function (to) {
            // Здесь обновление HTML меню
            $('.primary-menu-container').load(window.location.href + ' .primary-menu-container > *');
        });
    });
})(jQuery);
