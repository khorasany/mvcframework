<?php 

spl_autoload_register("__autoloaderCore");

function __autoloaderCore($class) {
    $class = explode("\\",$class);

    require_once __DIR__.DIRECTORY_SEPARATOR."/libraries/".end($class).".php";
}