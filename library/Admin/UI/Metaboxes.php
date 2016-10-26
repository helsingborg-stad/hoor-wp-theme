<?php

namespace Hoor\Admin\UI;

class Metaboxes
{
    public function __construct()
    {
        add_filter('default_hidden_meta_boxes', array($this, 'defaultHiddenMetaBoxes'), 10, 2);
    }

    public function defaultHiddenMetaBoxes($hidden, $screen)
    {
        // Hide the_seo_framework_inpost_seo_settings by defalt.
        $hidden[] = 'tsf-inpost-box';
        return $hidden;

    }
}
