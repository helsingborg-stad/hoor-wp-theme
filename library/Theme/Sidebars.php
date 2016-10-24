<?php

namespace Hoor\Theme;

class Sidebars
{
    public function __construct()
    {
        add_filter( 'dynamic_sidebar_params', array($this, 'set_footer_widget_classes') );
    }

    public function set_footer_widget_classes( $params ) {
        // Set up a static counter to get the order for each.
        static $count = 0;
        $grid_classes = array(
            'grid-lg-3 grid-md-12 grid-sm-12', // First column classes
            'grid-lg-2 grid-md-3 grid-sm-6', // Second column classes
            'grid-lg-2 grid-md-3 grid-sm-6', // Third column classes
            'grid-lg-2 grid-md-3 grid-sm-6', // Fourth column classes
            'grid-lg-3 grid-md-3 grid-sm-6', // Fifth column classes
        );

        // Override the wrapper html from Municipio with our own classes.
        if ($params[0]['id'] == 'footer-area') {
            $params[0]['before_widget'] = '<div class="' . $grid_classes[$count] . '">';
            $params[0]['after_widget'] = '</div>';
            $count++;
        }
        return $params;
    }
}
