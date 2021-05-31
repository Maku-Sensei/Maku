<?php
session_start();
include "DB_conn.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['uname'])&& isset($_POST['password'])){
    function validiere($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validiere($_POST['uname']);
    $pass = validiere($_POST['password']);
    
    if(empty($uname)){
        header("Location: Index.php?error=Username eingeben");
        exit();
    }else if (empty ($pass)) {
        header("Location: Index.php?error=Passwort eingeben");
        exit();
    } else {
        $sql = "SELECT * FROM User WHERE Username = '$uname' AND Passwort = '$pass'"; 
        
        $result = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['Username']=== $uname && $row['Passwort']===$pass){
                $_SESSION['Username'] = $row['Username'];
                $_SESSION['idUser'] = $row['idUser'];
                header("Location: home.php");
            exit();
            }else{
            header("Location: Index.php?error=Falsches Passwort oder Username");
            exit();
            }         
        }else{
            header("Location: Index.php?error=Falsches Passwort oder Username");
            exit();
        }
    }
    
}else {
    header("Location: Index.php");
    exit();
}
