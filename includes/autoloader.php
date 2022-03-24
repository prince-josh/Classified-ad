<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $path = "classes/";
    $extention = ".class.php";
    $fullPath = $path . $className . $extention;

    include_once $fullPath;
}
?>