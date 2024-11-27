<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?> <!-- Обязательно для подключения стилей и скриптов -->
</head>
<body <?php body_class(); ?>>

<?php
if (has_nav_menu('primary-menu')) {
    wp_nav_menu(array(
        'theme_location' => 'primary-menu', // The location registered in functions.php
        'container' => 'nav', // Wraps the menu in a <nav> tag
        'container_class' => 'primary-menu-container', // Adds a class to the <nav> tag
        'menu_class' => 'primary-menu', // Adds a class to the <ul> element
    ));
} else {
    echo '<p>Please assign a menu to the Primary Menu location in the WordPress admin area.</p>';
}
?>
