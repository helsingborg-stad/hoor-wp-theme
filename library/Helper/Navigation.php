<?php

namespace Hoor\Helper;

class Navigation extends \Municipio\Helper\Navigation
{
    /**
     * Get navigation tree main menu
     * @return string Markup
     */
    public function mainMenuAuto()
    {
        $transientHash = \Municipio\Helper\Hash::short(\Municipio\Helper\Url::getCurrent());

        $markup = null;
        $transientType = '';

        if (is_user_logged_in()) {
            $transientType = '_loggedin';
        }

        $menu = false; //get_transient('main_menu_' . $transientHash . $transientType);

        $classes = array('nav');

        if (!$menu || !is_string($menu) || (isset($_GET['menu_cache']) && $_GET['menu_cache'] == 'false')) {
            $menu = new \Hoor\Helper\NavigationTree(array(
                'include_top_level' => true,
                'render' => get_field('nav_primary_render', 'option'),
                'depth' => get_field('nav_primary_depth', 'option')
            ));

            if (!empty(get_field('nav_primary_align', 'option'))) {
                $classes[] = 'nav-' . get_field('nav_primary_align', 'option');
            }

            if (get_field('nav_primariy_dropdown', 'option') === true) {
                $classes[] = 'nav-dropdown';
            }

            if (isset($menu) && $menu->itemCount() > 0) {
                $markup = '<ul id="main-menu" class="' . implode(' ', apply_filters('Municipio/main_menu_classes', $classes)) . ' ' . apply_filters('Municipio/desktop_menu_breakpoint', 'hidden-xs hidden-sm') . '">';
                $markup .= apply_filters('Municipio/main_menu/items', $menu->render(false));
                $markup .= '</ul>';
            }

            //set_transient('main_menu_' . $transientHash . $transientType, $markup, 60*60*168);

            return $markup;
        }

        return $menu;
    }

    /**
     * Get navigation tree sidebar menu
     * @return string Menu markup
     */
    public function sidebarMenuAuto()
    {
        $transientHash = \Municipio\Helper\Hash::short(\Municipio\Helper\Url::getCurrent());

        $transientType = '';
        if (is_user_logged_in()) {
            $transientType = '_loggedin';
        }

        $menu = false; //get_transient('sidebar_menu_' . $transientHash . $transientType);

        if (!$menu || (isset($_GET['menu_cache']) && $_GET['menu_cache'] == 'false')) {
            $menu = new \Hoor\Helper\NavigationTree(array(
                'include_top_level' => !empty(get_field('nav_sub_include_top_level', 'option')) ? get_field('nav_sub_include_top_level', 'option') : false,
                'render' => get_field('nav_sub_render', 'option'),
                'depth' => get_field('nav_sub_depth', 'option')
            ));

            set_transient('sidebar_menu_' . $transientHash . $transientType, $menu, 60*60*168);
        }

        if ($menu->itemCount === 0) {
            return '';
        }

        return '<nav id="sidebar-menu">
            <ul class="nav-aside hidden-xs hidden-sm">
                ' . $menu->render(false) . '
            </ul>
        </nav>';
    }
}
