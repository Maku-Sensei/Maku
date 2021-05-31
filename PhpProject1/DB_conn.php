<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$sname= "topsch.net:3306";
$unmae= "info12";
$password="9lgZ9ZwJTfV6O7EV";

$db_name ="mns_braun";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
    echo "Connection failed";
}