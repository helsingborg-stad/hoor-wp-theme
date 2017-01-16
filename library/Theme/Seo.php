<?php
namespace Hoor\Theme;

class Seo
{
    const IMAGE_NAME = 'default-meta-image.png';

    public function __construct() {
        add_filter('the_seo_framework_ogimage_output', array($this, 'default_image'), 10, 2);
        add_filter('the_seo_framework_twitterimage_output', array($this, 'default_image'), 10, 2);
    }

    function fallback_image() {
        $upload_dir = wp_upload_dir();
        return $upload_dir['url'] . '/' . self::IMAGE_NAME;
    }

    public function default_image($image = '', $page_id = 0) {
        if (empty($page_id) || !has_post_thumbnail($page_id)) {
            $image = esc_url($this->fallback_image());
        }

        return $image;
    }
}
