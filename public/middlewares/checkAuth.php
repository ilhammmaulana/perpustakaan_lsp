<?php
require_once __DIR__ .  'helper/Authenticate.php';

if(!Authenticate::check()){
    to('../index.php');
}