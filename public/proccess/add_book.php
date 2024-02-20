<?php
require_once '../db/Connection.php';
require_once '../helper/helper.php';


$location_filename = '../books.php';

if ($_SERVER['REQUEST_METHOD']=="POST"){
    $data['title'] = $_POST['title'];
    $data['description'] = $_POST['description'];
    try {
        Connection::table('books')->create($data);
        to($location_filename);
    } catch (\Throwable $th) {
        throw $th;
    }
    to($location_filename);
}else{
    to($location_filename);
}


