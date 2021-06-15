<?php
include "DB_conn.php";
    if(isset($_POST['tlog'])){
        $uid = $_SESSION['idUser'];
        $query = "SELECT * FROM Transaktionen WHERE idUser = '$uid'";
        $result = mysqli_query($conn, $query);
    }

?>
<!DOCTYPE html>
    <HTML>
        <HEAD>
            <title>Portfolio</title>
            <link rel="stylesheet" type="text/css" href="styleportfolio.css">
        </HEAD>
        <body>
            <h2> Transaction log </h2>
            <table style="width:100%">
                <tr>
                  <th>Asset</th>
                  <th>Holdings</th>
                  <th>Price</th>
                  <th>Value</th>  
                  <th>24h change</th>
                </tr>
                 <?php 
                    while($rows= mysqli_fetch_assoc($result)){


                  ?>
                 <tr>
                     <tr>
                        <td> <?php echo $rows['Kürzel']; ?> </td>
                        <td> <?php echo $rows['Anzahl']; ?> </td>
                        <td> <?php echo $rows['Preis']; ?> </td>
                        <td> <?php echo $rows['Value']; ?> </td>
                    </tr>
              <?php 
                    }
                  ?>
            </table>
        </body>
    </HTML>