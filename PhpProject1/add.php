<!DOCTYPE html>
    <HTML>
        <HEAD>
            <title>Portfolio</title>
            <link rel="stylesheet" type="text/css" href="styleadd.css">
        </HEAD>
  <body>
      
      <form action="addsubmit.php" method="post">   
      <?php if(isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error']; ?></p>
      <?php }?>
      <label for="asset" >Asset</label>
      <select id="asset" name="asset"> 
          <option value="BTC"> BTC </option>
      </select>
       <label >Anzahl</label>
       <input type="text" name="anzahl"/>
       <br>
       <br>
       <button type="submit" name="add"> Add </button>
      </form>
  </body>
  </HTML>