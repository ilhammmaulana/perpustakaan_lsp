<?php
require_once '../db/Connection.php';
require_once '../helper/helper.php';


$location_filename = '../borrowing.php';

if ($_SERVER['REQUEST_METHOD']=="POST"){
    $id = $_POST['id'];
    $data['student_id'] = $_POST['student_id'];
    $data['book_id'] = $_POST['book_id'];
    try {
        Connection::table('borrowing_records')->update($data, $id);
        to($location_filename);
    } catch (\Throwable $th) {
        throw $th;
    }
}else{
    to($location_filename);
}


