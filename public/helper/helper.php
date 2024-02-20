<?php

function dd($item)
{
    var_dump($item);
    die();
}

function e($value)
{
    return htmlspecialchars($value);
}

function to($location_file){
    header('location:' . $location_file);
}