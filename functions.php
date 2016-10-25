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

load_child_theme_textdomain( 'hoor', get_stylesheet_directory() . '/languages' );

new Hoor\App();

add_action( 'after_setup_theme', 'hoor_theme_setup' );
function hoor_theme_setup() {
    add_image_size( 'hero_image', 1300, 280, array( 'left', 'top' ) );
}


/**
 * Quick hack to render output collected redirects.
 * TODO: Remove this after the site has been released.
 */
function output_nginx_redirects() {
    if (is_super_admin() && isset($_GET['nginx-conf'])) {
        /*

        location = /content/unique-page-name {
          return 301 /new-name/unique-page-name;
        }

        */

        $output = '';
        $error = '';
        $posts = get_posts(array(
            'numberposts'   => 10,
            'post_type'     => 'page',
            'meta_key'      => 'redirect_on',
            'meta_value'    => 'Ja'
        ));

        foreach ($posts as $post) {
            $old_url = get_field('redirect_url', $post->ID);
            $old_url_relative = str_replace('http://www.hoor.se', '', $old_url);
            $permalink = get_permalink($post->ID);
            $permalink_relative = str_replace(home_url(), '', $permalink);
            $permalink_normalized = rtrim(str_replace(home_url(), '', $permalink), '/');
            if ($old_url == $old_url_relative || $old_url_relative == $permalink_relative || $old_url_relative == $permalink_normalized) {
                $error .= "$old_url. <a href=\"$permalink\"><small>View page</small></a></br>";
            }
            else {
                $output .= "location = $old_url_relative {\n  return 301 $permalink_relative;\n}\n";
            }
        }

        echo "<p style=\"color:red\">The following redirect(s) are incorrect:<br/>$error</pre></p>";
        echo '<strong>Nginx conf:</strong>';
        echo "<pre>$output<pre>";
        die;
    }
}
output_nginx_redirects();


