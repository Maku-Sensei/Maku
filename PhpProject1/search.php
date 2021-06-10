<!DOCTYPE html>
    <HTML>
        
         <HEAD>
            <title>Search</title>
            <link rel="stylesheet" type="text/css" href="styleportfolio.css">
        </HEAD>
        
    <body>
        <?php
        include "DB_conn.php";
        
        if(isset($_POST['search'])){
            $search = $_POST['search'];
            $sql = "SELECT Username FROM User WHERE Username LIKE '%$search%'"; 
        }else{
             $sql = "SELECT User.Username, User.idUser, Wallet.PublicKey FROM User, Wallet";
             $search = "";
        }   
        
        
        $result = mysqli_query($conn, $sql);
        
        ?>
        
        <form action="" method="post">
            <input type="text" name="search" placeholder="Username" value="<?php echo $search; ?>">
            <button> Search </button>
        </form>
        <br>
        <br>
        
        <TABLE width="50%" style="margin: 0 auto; border:1px solid;text-align:center">
            <tr>
                <th> ID </th>
                <th>Username</th>
                <th> Public Key </th>
                <th> Open </th>
            </tr>
            <?php
                    while ($row = mysqli_fetch_object($result)){
            ?>
            <tr>
                <td> <?php echo $row->idUser?> </td>
                <td> <?php echo $row->Username?> </td>
                <td> <?php echo $row->PublicKey?></td>
                <td> <?php echo "<button> Open </button>"?>
                
            </tr>
            <?php 
                    }
            ?>
        </TABLE>
        
    </BODY>
    </HTML>