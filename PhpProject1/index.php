<!DOCTYPE html>
    <HTML>
        
         <HEAD>
            <title>LOGIN</title>
            <link rel="stylesheet" type="text/css" href="stlye.css">
        </HEAD>
        
    <body>
        <form action="login.php" method="post">
            <h2>LOGIN</h2>
            <?php if(isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error']; ?></p>
            <?php }?>
            <LABEL> Username</LABEL>
            <input type="text" name="uname" placeholder="Username"> <BR>
            
            <LABEL> Password </LABEL>
            <input type="password" name="password" placeholder="Password"> <BR>
            
            <button type="submit" name="login"> Login </button>
            <button type="submit" name="register"> Register </button>
            
        </form>
        
    </BODY> 
    </HTML>
