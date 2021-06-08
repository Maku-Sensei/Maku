<?php
session_start();
include "DB_conn.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST['login'])){
if (isset($_POST['uname'])&& isset($_POST['password'])){
    
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
}
if(isset($_POST['register'])){
    
    $uname = validiere($_POST['uname']);
    $pass = validiere($_POST['password']);
    $query = mysqli_query($conn, "SELECT idUser FROM User WHERE Username='".$uname."'");

    if (!$query)
    {
        die('Error: ' . mysqli_error($conn));
    }

    if(mysqli_num_rows($query) > 0){

        header("Location: Index.php?error=Username exists");

    }else{

        if(empty($uname)){
        header("Location: Index.php?error=Username eingeben");
        exit();
    }else if (empty ($pass)) {
        header("Location: Index.php?error=Passwort eingeben");
        exit();
    }else{
        $sql = "INSERT INTO User(iduser, Username, Passwort, Wallet_PrivateKey, Wallet_PublicKey)
                VALUES(NULL,'$uname', '$pass', NULL, NULL)";
    }
   
    if ($conn->query($sql) === TRUE) {
    header("Location: Index.php?error=Success");
    }

    }
      
   
}
 
function validiere($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

