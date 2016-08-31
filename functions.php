<?php

define('HOOR_PATH', get_stylesheet_directory() . '/');

//Include vendor files
if (file_exists(dirname(ABSPATH) . '/vendor/autoload.php')) {
    require_once dirname(ABSPATH) . '/vendor/autoload.php';
}

require_once HOOR_PATH . 'library/Vendor/Psr4ClassLoader.php';
$loader = new Hoor\Vendor\Psr4ClassLoader();
$loader->addPrefix('Hoor', HOOR_PATH . 'library');
$loader->addPrefix('Hoor', HOOR_PATH . 'source/php/');
$loader->register();

new Hoor\App();

// Dequeue Styles from municipio
function hoor_dequeue_unnecessary_styles() {
    wp_dequeue_style( 'hbg-prime' );
    wp_deregister_style( 'hbg-prime' );

    wp_dequeue_style( 'municipio' );
    wp_deregister_style( 'municipio' );

}
add_action( 'wp_print_styles', 'hoor_dequeue_unnecessary_styles' );

// Dequeue JavaScripts from municipio
function hoor_dequeue_unnecessary_scripts() {
    wp_dequeue_script( 'hbg-prime' );
    wp_deregister_script( 'municipio' );
}
add_action( 'wp_print_scripts', 'hoor_dequeue_unnecessary_scripts' );
