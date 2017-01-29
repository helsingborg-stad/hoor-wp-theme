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
function hoor_nginx_redirect($from, $to) {
    // Add both with and without /sv. Note, the from url should not contain /sv.
    $output = "location = $from {\n  return 301 $to;\n}\n";
    $output .= "location = /sv$from {\n  return 301 $to;\n}\n";
    return $output;

}
function output_nginx_redirects() {
    if (is_super_admin() && isset($_GET['nginx-conf'])) {
        /*

        location = /from/ {
          return 301 /to/;
        }

        */
        $other_redirects = array(
            '/Om-webbplatsen/Sok/' => '/?s',
            '/Kommunen/Nyhetslista/' => '/nyheter/',
            '/Kommunen/Pagang/' => '/evenemang/',
            '/Om-webbplatsen/Prenumerera-pa-information-fran-hemsidan/Nyheter-fran-startsidan/' => '/nyheter/feed/',
        );

        $output = "location = /sv/ {\n  return 301 /;\n}\n"; //Frontpage

        foreach ($other_redirects as $other_redirect_from => $other_redirect_to) {
            $output .= hoor_nginx_redirect($other_redirect_from, $other_redirect_to);
        }

        $error = '';
        $warning = '';
        $old_urls = array();
        $posts = get_posts(array(
            'numberposts'   => -1,
            'post_type'     => 'page',
            'meta_key'      => 'redirect_on',
            'meta_value'    => 'Ja'
        ));

        foreach ($posts as $post) {
            $old_url = get_field('redicrect_url', $post->ID);
            $old_url_relative = str_replace('http://www.hoor.se', '', $old_url);
            $old_url_relative = str_replace('http://hoor.se', '', $old_url_relative);
            $old_url_relative = str_replace('http://www.höör.se', '', $old_url_relative);
            $old_url_relative = str_replace('http://höör.se', '', $old_url_relative);
            $old_url_relative = str_replace('/sv', '', $old_url_relative);

            $permalink = get_permalink($post->ID);
            $permalink_relative = str_replace(home_url(), '', $permalink);
            $permalink_normalized = rtrim(str_replace(home_url(), '', $permalink), '/') . '/';
            if (in_array($old_url_relative, $old_urls)) {
                $page_url = array_search($old_url_relative, $old_urls);
                $warning .= "Det finns redan en <a href=\"http://hoor-prod.whitespace.work$page_url\">sida</a> som $old_url_relative redirectar till. <a href=\"http://hoor-prod.whitespace.work/$permalink_relative\">Visa/Redigera</a></br>\n";
            } elseif ($old_url == $old_url_relative || $old_url_relative == $permalink_relative || $old_url_relative == $permalink_normalized) {
                $error .= "Fel $old_url. <a href=\"$permalink\"><small>View page</small></a></br>";
            } elseif(strtolower($old_url_relative) == strtolower($permalink_normalized) || strtolower($old_url_relative) == strtolower($permalink_relative)) {
                var_dump($old_url_relative,$permalink_normalized); die;
            }
            else {
                $output .= hoor_nginx_redirect($old_url_relative, $permalink_normalized);
                $old_urls[$permalink_normalized] = $old_url_relative;
            }
        }
        if ($error) {
            echo "<p style=\"color:red\">The following redirect(s) are incorrect:<br/>$error</pre></p>";
        }
        echo "<p style=\"color:orange\">The following redirect(s) are incorrect:<br/>$warning</pre></p>";
        echo '<strong>Nginx conf:</strong>';
        echo "<pre>$output<pre>";
        die;
    }
}
output_nginx_redirects();
