<?php

try {
    $mysqli = new mysqli("127.0.0.1", "root", "", "test");
} catch (Exception $ex) {
    print_r($ex);exit;
}  
