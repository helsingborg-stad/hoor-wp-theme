<?php

namespace Hoor\Theme;

class Grid
{
    public function __construct()
    {
        add_filter( 'Municipio/controller/base/view_data', array($this, 'set_content_grid_classes') );
    }

    public function set_content_grid_classes( $data ) {
        $contentGridSize = 'grid-xs-12';

        // Always disable left sidebar for archive pages (e.g kommunalrådsbloggen)
        if (is_archive()) {
            $data['hasLeftSidebar'] = false;
        }

        if ($data['hasLeftSidebar'] && $data['hasRightSidebar']) {
            // Both
            $contentGridSize = 'grid-sm-12 grid-md-8';
        } elseif (!$data['hasLeftSidebar'] && $data['hasRightSidebar']) {
            // Right
            $contentGridSize = 'grid-sm-12 grid-md-8';
        } elseif ($data['hasLeftSidebar'] && !$data['hasRightSidebar']) {
            // Left
            $contentGridSize = 'grid-sm-12';
        }


        return array('contentGridSize' => $contentGridSize, 'hasLeftSidebar' => $data['hasLeftSidebar']);
    }
}
