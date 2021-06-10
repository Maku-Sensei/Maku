<?php
session_start();
include_once 'DB_conn.php';

?>
<?php
$uid = $_SESSION['idUser'];
$sql = "SELECT PrivateKey, PublicKey FROM Wallet WHERE idUser = '$uid'";
$result3 = mysqli_query($conn, $sql);
if((mysqli_num_rows($result3) === 1)){
    
    $query = "SELECT * FROM Wallet WHERE idUser = '$uid'";
    $result = mysqli_query($conn, $query);
    $sql = "SELECT Kürzel FROM Wallet WHERE idUser = '$uid'";
    $result4 = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result4) === 1){
        $row = mysqli_fetch_assoc($result4);
        $_SESSION['Asset'] = $row['Kürzel'];
    }
    $asset = $_SESSION['Asset'];
    
     $sql = "SELECT Value AND Preis FROM Wallet WHERE idUser = '$uid'";
                         $result2 = mysqli_query($conn, $sql);
                         if(mysqli_num_rows($result2) === 1){
                            $row = mysqli_fetch_assoc($result2);
                            $_SESSION['price'] = $row['Preis'];
                            $_SESSION['value'] = $row['Value'];
                            $price = $_SESSION['price'];
                            $value = $_SESSION['value'];
                            (double) $price;
                            (double) $value;
                            $value = $price * $anzahl;
                            $sql = "UPDATE Wallet SET Value = '$value' WHERE idUser ='$uid' AND Kürzel = '$asset'";
                            $conn->query($sql);
                         }
}else if ((mysqli_num_rows($result3) === 0)) {
    
    //generate Private Key and Public Key
    
}
?>

<!DOCTYPE html>
    <HTML>
        <HEAD>
            <title>Portfolio</title>
            <link rel="stylesheet" type="text/css" href="styleportfolio.css">
        </HEAD>
  <body>

<h2>Portfolio</h2>
<button onclick="location.href= 'add.php'">Add</button>
<button onclick="location.href='search.php'"> Search User </button>

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
</html>
   

