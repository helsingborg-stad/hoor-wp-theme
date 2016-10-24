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

// Add Styles to the Format TinyMCE toolbar
add_filter( 'tiny_mce_before_init', 'editor_buttons_before_init' );

function editor_buttons_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'Pull quote',
            'selector' => 'blockquote',
            'classes' => 'o-pull-quote'
        ),
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;
}

/**
 * Remove unused buttons from TinyMCE toolbar
 */
function hoor_tinymce_buttons($buttons) {
    $remove = array('alignleft', 'aligncenter', 'alignright');
    return array_diff($buttons,$remove);
}
add_filter('mce_buttons','hoor_tinymce_buttons');

function hoor_tinymce_second_buttons($buttons) {
    $remove = array('underline', 'alignjustify', 'forecolor', 'indent', 'outdent');
    return array_diff($buttons,$remove);
}
add_filter('mce_buttons_2','hoor_tinymce_second_buttons');

function hoor_tinymce_elements($arr){
    $arr['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;';
    return $arr;
}
add_filter('tiny_mce_before_init', 'hoor_tinymce_elements');


// Register editor stylesheet for the theme.
function hoor_add_editor_styles() {
    add_editor_style( 'assets/dist/css/editor-style.css' );
}
add_action( 'admin_init', 'hoor_add_editor_styles' );

// Wrap embeds in an div to be able to make videos responsive
add_filter('embed_oembed_html', 'site_embed_oembed_html', 99, 4);
function site_embed_oembed_html($html, $url, $attr, $post_id) {
    return '<div class="o-embed-container">' . $html . '</div>';
}

// Unregister stale and unused WordPress widgets
function hoor_unregister_widgets() {
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Text');

    //unregister_widget('WP_Widget_Pages');
    //unregister_widget('WP_Nav_Menu_Widget');
    //unregister_widget('WP_Widget_RSS');
}
add_action( 'widgets_init', 'hoor_unregister_widgets' );


register_nav_menus( array(
    'footer_links' => 'Footer Navigation',
    'footer_social_links' => 'Social Links',
) );

add_action( 'after_setup_theme', 'hoor_theme_setup' );
function hoor_theme_setup() {
    add_image_size( 'hero_image', 1300, 280, array( 'left', 'top' ) );
}

load_child_theme_textdomain( 'hoor', get_stylesheet_directory() . '/languages' );


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


