<?php

namespace Sender\Template;

class Templater
{
    public $data=[];
    static public $root='.';
    static $ext;

    public static function template()
    {
        end($_POST );
        $key=key($_POST);
        $file = '/View/'.$_POST[$key].'.php';
        ob_start();
        extract($_POST, EXTR_OVERWRITE);
        require __DIR__.$file;
        return ob_get_clean();
    }
}
