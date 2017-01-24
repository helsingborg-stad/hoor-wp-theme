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
        new \Hoor\Theme\Oembed();
        new \Hoor\Theme\Seo();
        new \Hoor\Theme\Grid();

        /**
         * Admin
         */
        new \Hoor\Admin\UI\ACF();
        new \Hoor\Admin\UI\Editor();
        new \Hoor\Admin\UI\Widget();
        new \Hoor\Admin\UI\Metaboxes();

        /**
         * Widgets
         */
        add_action('widgets_init', function () {
            // Duplicate the Contact widget from Municipio so we can have our own template.
            register_widget('\Hoor\Widget\Contact');
            // Remove the original widget.
            unregister_widget('\Municipio\Widget\Contact');

        }, 11);
    }
}
