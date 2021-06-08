<?php
include "DB_conn.php";


if(isset($_POST['add'])){
     if(isset($_POST['asset']) && isset($_POST['anzahl'])){
         $asset = validiere($_POST['asset']);
         $anzahl = validiere($_POST['anzahl']);
         $query = mysqli_query($conn, "SELECT * FROM Wallet");
         
         echo $query;
        if (!$query)
        {
            die('Error: ' . mysqli_error($conn));
        }
         if(empty($anzahl)){
             header("Location: error.php");
         }else{
             if($asset = "Btc") {
                 
                 
             }
         }
         
     }
}
function validiere($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


