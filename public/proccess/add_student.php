<?php
require_once '../db/Connection.php';
require_once '../helper/helper.php';


$location_filename = '../students.php';

if ($_SERVER['REQUEST_METHOD']=="POST"){
    $data['name'] = $_POST['name'];
    $data['nisn'] = $_POST['nisn'];
    $data['class'] = $_POST['class'];
    $data['phone'] = $_POST['phone'];
    try {
        Connection::table('students')->create($data);
        to($location_filename);
        
    } catch (\Throwable $th) {
        throw $th;
    }
    to($location_filename);
}else{
    to($location_filename);
}


