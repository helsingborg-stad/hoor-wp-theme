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
        add_action('widgets_init', function () {
            // Duplicate the Contact widget in Municipio so we can have our own template.
            // A bit hackish since we can't deregister the original widget.
            register_widget('\Hoor\Widget\Contact');
        });
    }
}
