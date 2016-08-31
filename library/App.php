<?php
namespace Hoor;

class App
{
    public function __construct()
    {
        new \Hoor\Theme\Enqueue();
    }
}
