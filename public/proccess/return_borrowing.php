<?php
require_once '../db/Connection.php';
require_once '../helper/helper.php';


$location_filename = '../borrowing.php';

if ($_SERVER['REQUEST_METHOD']=="POST"){
    
    try {
        $connection = Connection::getConnection();
        $sql = "UPDATE `borrowing_records` SET `status` = 'done', `return_date` = NOW()";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        to($location_filename);
        
    } catch (\Throwable $th) {
        throw $th;
    }
    to($location_filename);
}else{
    to($location_filename);
}


