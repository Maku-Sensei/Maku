<?php
session_start();

if(isset($_SESSION['idUser']) && isset($_SESSION['Username'])){
    

?>
<!DOCTYPE html>
    <HTML>
        <HEAD>
            <title>HOME</title>
            <link rel="stylesheet" type="text/css" href="stlye.css">
        </HEAD>
    <body>
        <h1>Hello, <?php echo $_SESSION['Username']; ?> </h1> 
        <a href="logout.php" class="button"> Logout </a>
        <a href="Portfolio.php" class="button"> Portfolio </a>
        <a href="transactionlog.php" class="button" name="alltlog"> view Transactions </a>
    </BODY>
    </HTML>
<?php 
}else{
    header("Location: index.php");
    exit();
}
?>