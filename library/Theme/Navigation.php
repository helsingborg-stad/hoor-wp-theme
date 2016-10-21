<?php

namespace Hoor\Theme;

class Navigation
{

    /**
     * Adds a search icon to the main menu
     * @param string $items Menu items html markup
     * @param object $args  Menu args
     */
    public function addSearchMagnifier($items, $args = null)
    {
        if ($args && $args->theme_location != apply_filters('Hoor/main_menu_theme_location', 'main-menu')) {
            return $items;
        }

        //Not in child (if inherited from main)
        if ($args && (isset($args->child_menu) && $args->child_menu == true) && $args->theme_location == "main-menu") {
            return $items;
        }

        $search = '<li class="menu-item-search"><a href="#search" class="search-icon-btn toggle-search-top" aria-label="' . __('Search', 'municipio') . '">YEAH BABY<span data-tooltip="' . __('Search', 'municipio') . '"><i class="pricon pricon-search"></i></span></a></li>';

        $items .= $search;
        return $items;
    }


    /**
     * Outputs the html for the breadcrumb
     * @return void
     * TODO: Refactor this mess.
     */
    public static function outputBreadcrumbs()
    {
        global $post;

        if (!is_front_page()) {
            $output = '';
            $int = 1;
            echo '<ol class="c-breadcrumbs__list" aria-labelledby="breadcrumbslabel" itemscope itemtype="http://schema.org/BreadcrumbList">';
            echo '<li class="c-breadcrumbs__list-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                            <a class="c-breadcrumbs__link" itemprop="item" href="' . get_home_url() . '" title="' . __('Home') . '">
                                <span itemprop="name">' . __('Home') . '</span><meta itemprop="position" content="' . $int++ . '"></a></li>';

            if (is_page() && $post->post_parent) {
                $anc = array_reverse(get_post_ancestors($post->ID));
                $title = get_the_title();

                foreach ($anc as $ancestor) {
                    if (get_post_status($ancestor) != 'private') {
                        $output .= '<li class="c-breadcrumbs__list-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                                        <a class="c-breadcrumbs__link" itemprop="item" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">
                                            <span itemprop="name">' . get_the_title($ancestor) . '</span><meta itemprop="position" content="' . $int++ . '"></a></li>';
                    }
                }

                echo $output;
                echo '<li class="c-breadcrumbs__list-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                        <span class="c-breadcrumbs__current" itemprop="name" title="' . $title . '">' . $title . '</span><meta itemprop="position" content="' . $int . '" />
                      </li>';

            } elseif (!is_home() && !is_archive() && get_post_type_archive_link($post->post_type)) {
                $title = get_the_title();
                $post_type_object = get_post_type_object($post->post_type);
                $archive_title = $post_type_object->label;

                echo '<li class="c-breadcrumbs__list-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                       <a class="c-breadcrumbs__link" itemprop="item" href="' . get_post_type_archive_link($post->post_type) . '" title="' . $archive_title . '">
                        <span itemprop="name">' . $archive_title . '</span><meta itemprop="position" content="' . $int++ . '"></a></li>';
                echo '<li class="c-breadcrumbs__list-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                        <span class="c-breadcrumbs__current" itemprop="name" title="' . $title . '">' . $title . '</span><meta itemprop="position" content="' . $int . '" />
                      </li>';
            } else {
                if (is_home()) {
                    $title = single_post_title();
                } elseif (is_archive()) {
                    $title = post_type_archive_title();
                } else {
                    $title = get_the_title();
                }
                echo '<li class="c-breadcrumbs__list-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                        <span class="c-breadcrumbs__current" itemprop="name">' . $title . '</span><meta itemprop="position" content="' . $int . '" />
                      </li>';
            }
            echo '</ol>';
        }
    }
}
