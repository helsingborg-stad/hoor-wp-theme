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
    }
}
