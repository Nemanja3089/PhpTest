<?php

//in the case of multiple autoload functions we use  spl_autoload_register()
function first($classname)
{
    if (file_exists('controller/' . $classname . '.php')) {
        require_once 'controller/' . $classname . '.php';
    }
}

function second($classname)
{
    if (file_exists('model/' . $classname . '.php')) {
        require_once 'model/' . $classname . '.php';
    }
}

spl_autoload_register('first');
spl_autoload_register('second');
