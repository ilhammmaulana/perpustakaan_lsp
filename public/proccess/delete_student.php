<?php
require_once '../db/Connection.php';
require_once '../helper/helper.php';


$location_filename = '../students.php';

if ($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        Connection::table('students')->delete($id);
        to($location_filename);
    }else{
        to($location_filename);
    }

}else{
    to($location_filename);
}


