<?php
session_start();
include "DB_conn.php";


if(isset($_POST['add'])){
     if(isset($_POST['asset']) && isset($_POST['anzahl'])){
         $asset = validiere($_POST['asset']);
         $anzahl = validiere($_POST['anzahl']);
         
         $query = "SELECT * FROM Wallet";
         $query = mysqli_query($conn, $query);
         $uname = $_SESSION['Username'];
         $uid = $_SESSION['idUser'];
         
         $sql = "SELECT idBlockchain, Blockchain FROM Blockchain WHERE Kürzel = $asset";
         $bresult = mysqli_query($conn, $sql);
         if(mysqli_num_rows($bresult) === 1){
             $brow = mysqli_fetch_assoc($result);
             $blockid = $brow['idBlockchain'];
             $blockchain = $brow['Blockchain'];
             $_SESSION['idBlockchain'] = $blockid;
         }
         
         
        if (!$query)
        {
            die('Error: Connection failed ' . mysqli_error($conn));
        }
         if(empty($anzahl)){
             header("Location: error.php");
         }else if(!empty ($asset)){
             
             $sql = "SELECT Anzahl FROM Wallet WHERE idUser = '$uid' AND Kürzel = '$asset'";
             $result = mysqli_query($conn, $sql);
             if(mysqli_num_rows($result) === 1){
                 $row = mysqli_fetch_assoc($result);
                 $sqlanzahl = $row['Anzahl'];
                 try {
                     (double) $sqlanzahl;
                     (double) $anzahl;
                     $anzahl = $anzahl + $sqlanzahl ;
                 } catch (InvalidArgumentException $ex) {
                     header("Location: Index.php?error=Keine Anzahl angegeben");
                 }
                
                 
                 $sql = "UPDATE Wallet SET Anzahl = '$anzahl' WHERE idUser ='$uid' AND Kürzel = '$asset'";
                 if ($conn->query($sql) === TRUE) {
                     $sql = "SELECT Value AND Preis FROM Wallet WHERE idUser = '$uid' AND Kürzel = '$asset'";
                     $result = mysqli_query($conn, $sql);
                     if(mysqli_num_rows($result) === 1){
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['Preis'] = row['Preis'];
                        $_SESSION['Value'] = row['Value'];
                        $price = $_SESSION['Preis'];
                        $value = $_SESSION['Value'];
                        (double) $price;
                        (double) $value;
                        $value = $price * $anzahl;
                        $sql = "UPDATE Wallet SET Value = '$value' WHERE idUser ='$uid' AND Kürzel = '$asset'";
                        $conn->query($sql);
                        $key = $_SESSION['PublicKey'];
                        $sql = "INSERT INTO Transaktionen VALUES('$uid', '$key', '$bid', '$blockchain', '$uid', '$anzahl')";
                        $conn->query($sql);
                     }
                    header("Location: portfolio.php");
                 }
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


