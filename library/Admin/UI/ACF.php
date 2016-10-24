<?php

namespace Hoor\Admin\UI;

class ACF
{
    public function __construct()
    {
        // Change "Show author" to be off by default.
        add_filter('acf/load_field/name=post_show_author', function($field) {
            $field['default_value'] = 0;
            return $field;
        });
    }
}


