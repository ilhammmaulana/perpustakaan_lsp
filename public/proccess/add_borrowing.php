<?php
require_once '../db/Connection.php';
require_once '../helper/helper.php';


$location_filename = '../borrowing.php';

if ($_SERVER['REQUEST_METHOD']=="POST"){
    $data['student_id'] = $_POST['student_id'];
    $data['book_id'] = $_POST['book_id'];
    $data['created_by'] = 1;
    try {
        Connection::table('borrowing_records')->create($data);
        to($location_filename);
        
    } catch (\Throwable $th) {
        throw $th;
    }
    to($location_filename);
}else{
    to($location_filename);
}


