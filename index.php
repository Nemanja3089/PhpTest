<?php

require "config.php";
// the following code take values controler and method from url
$controller = isset($_GET['sitecontroller']) ? $_GET['sitecontroller'] : 'user';
$method     = isset($_GET['sitemethod']) ? $_GET['sitemethod'] : 'index';
$cont       = ucfirst($controller) . 'Controller';
$c          = new $cont;
$c->$method(); // in this line we output the view
