<?php
include "DB_conn.php";
    if(isset($_POST['tlog'])){
        $uid = $_SESSION['idUser'];
        $query = "SELECT * FROM Transaktionen WHERE idUser = '$uid'";
        $result = mysqli_query($conn, $query);
    

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
                        <td> <?php echo $rows['Transcation id']; ?> </td>
                        <td> <?php echo $rows['idBlockchain']; ?> </td>
                        <td> <?php echo $rows['Blockchain']; ?> </td>
                        <td> <?php echo $rows['Anzahl']; ?> </td>

                    </tr>
              <?php 
                    }
        }
                  ?>
            </table>
            <?php 
                if(isset($_POST['alltlog'])){
                    $query = "SELECT * FROM Transaktionen";
                    $result = mysqli_query($conn, $query);
                    ?>
            <h2> Transacions </h2>
            <table style="width:100%">
                <tr>
                  <th>ID</th>
                  <th>PublicKey</th>
                  <th>BlockchainID</th>
                  <th>Blockchain</th>  
                  <th>UserID</th>
                  <th> Anzahl </th>
                </tr>
                <?php
                    while(mysql_fetch_assoc($query)){
                     
                ?>
                <tr>
                  <td> <?php echo $rows['idTransaktionen']; ?> </td>
                  <td> <?php echo $rows['PublicKey']; ?> </td>
                  <td> <?php echo $rows['idBlockchain']; ?> </td>
                  <td> <?php echo $rows['Blockchain']; ?> </td>
                  <td> <?php echo $rows['idUser']; ?> </td>
                  <td> <?php echo $rows['Anzahl']; ?> </td>

                </tr>
            <?php
                    }
                }
            ?>
        </body>
    </HTML>