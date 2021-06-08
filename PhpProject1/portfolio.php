<?php
include_once 'DB_conn.php';

?>
<?php
$query = "SELECT * FROM Wallet";
$result = mysqli_query($conn, $query);
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

<table style="width:100%">
  <tr>
    <th>Asset</th>
    <th>Price</th>
    <th>Value</th>  
    <th>24h change</th>
  </tr>
  <?php 
    while($rows= mysqli_fetch_assoc($result)){
        
    
  ?>
  <tr>
      <td> <?php echo $rows['Kürzel']; ?> </td>
      <td> <?php echo $rows['Preis']; ?> </td>
      <td> <?php echo $rows['Value']; ?> </td>
  </tr>
  <?php 
    }
  ?>
</table>


</body>
</html>
   

