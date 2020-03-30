<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


$target = '../hotelms/storage/app/public/images/';
$shortcut = 'images';

if (file_exists($target)) {
    echo "exists: $target <br>";
    exec("ln -s $target $shortcut");
    /*
    if (symlink($target, $shortcut)) {
        echo "created<br>";
        echo readlink($shortcut);
    }*/
}

?>