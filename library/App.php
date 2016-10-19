<?php
namespace Hoor;

class App
{
    public function __construct()
    {
        /**
         * Theme
         */
        new \Hoor\Theme\Sidebars();
        new \Hoor\Theme\Enqueue();
        new \Hoor\Theme\Navigation();

        /**
         * Admin
         */
        new \Hoor\Admin\UI\Translations();

        /**
         * Widgets
         */
        new \Hoor\Widget\Contact();

        add_action('widgets_init', function () {
            unregister_widget('\Municipio\Widget\Contact');
        });
    }
}
