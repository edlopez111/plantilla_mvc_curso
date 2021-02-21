<?php

function controller_autoload($filename) {
    require_once 'controllers/'.$filename.'.php';
}

spl_autoload_register('controller_autoload');