<?php

class AppUtil
{
    static function staticURL($path)
    {
        get_stylesheet_directory_uri().'/static'. $path;
    }
}