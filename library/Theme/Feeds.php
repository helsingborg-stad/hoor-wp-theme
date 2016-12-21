<?php
namespace Hoor\Theme;

class Feeds
{
    public function __construct() {
        // Enable feed link to front-page
        add_theme_support('automatic-feed-links');
    }
}

