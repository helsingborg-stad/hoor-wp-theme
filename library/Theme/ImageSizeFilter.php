<?php

namespace Hoor\Theme;

class ImageSizeFilter
{
    public function __construct()
    {
        add_filter('jpeg_quality', array($this, 'setImageQuality'), 99);
        add_filter('wp_editor_set_quality', array($this, 'setImageQuality'), 99);
    }

    public function setImageQuality($quaility)
    {
        return 85; // Decided based on when pagespeed starts to complain about the images on the frontpage
    }
}
