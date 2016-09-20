<?php

namespace Hoor\Theme;

class Navigation
{
    /**
     * Outputs the html for the breadcrumb
     * @return void
     */
    public static function outputBreadcrumbs()
    {
        global $post;

        $title = get_the_title();
        $output = '';

        echo '<ol class="c-breadcrumbs__list" aria-labelledby="breadcrumbslabel" itemscope itemtype="http://schema.org/BreadcrumbList">';

        if (!is_front_page()) {
            if (is_category() || is_single()) {
                echo '<li>';
                the_category('<li>');

                if (is_single()) {
                    echo '<li>';
                    the_title();
                    echo '</li>';
                }
            } elseif (is_page()) {
                if ($post->post_parent) {
                    $anc = get_post_ancestors($post->ID);
                    $title = get_the_title();

                    $int = 1;
                    foreach ($anc as $ancestor) {
                        if (get_post_status($ancestor) != 'private') {
                            $output = '<li class="c-breadcrumbs__list-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                                            <a class="c-breadcrumbs__link" itemprop="item" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">
                                                <span itemprop="name">' . get_the_title($ancestor) . '</span><meta itemprop="position" content="' . $int . '"></a></li>' . $output;

                            $int++;
                        }
                    }

                    echo $output;
                    echo '<li class="c-breadcrumbs__list-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                            <span class="c-breadcrumbs__current" itemprop="name" title="' . $title . '">' . $title . '</span><meta itemprop="position" content="' . ($int+1) . '" />
                          </li>';
                } else {
                    echo '<li class="c-breadcrumbs__list-item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                            <span class="c-breadcrumbs__current" itemprop="name">' . get_the_title() . '</span><meta itemprop="position" content="1" />
                          </li>';
                }
            }
        }
        echo '</ol>';
    }
}
