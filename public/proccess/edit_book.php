<?php
require_once '../db/Connection.php';
require_once '../helper/helper.php';


$location_filename = '../books.php';

if ($_SERVER['REQUEST_METHOD']=="POST"){
    $id = $_POST['id'];
    $data['title'] = $_POST['title'];
    $data['description'] = $_POST['description'];
    try {
        Connection::table('books')->update($data, $id);
        to($location_filename);

    } catch (\Throwable $th) {
        throw $th;
    }
}else{
    to($location_filename);
}


