<?php
require 'config.php';
if(!empty($_SESSION["id_user"])){
  header("Location: list.php");
}
if(isset($_POST["submit"])){
    $username2 = $_POST["username2"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username2' ");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
      if($password == $row['password']){
        $_SESSION["login"] = true;
        $_SESSION["id_user"] = $row["id_user"];
        header("Location: list.php");
      }
      else{
        echo
        "<script> alert('Špatné heslo'); </script>";
      }
    }
    else{
      echo
      "<script> alert('Nejste Registrovaní'); </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Autopůjčovna</title>
</head>
<body>
    <div class="navbar">
       <div class="container">
           <a class="logo"href="index.php">Logo</a>

           <img id="svgmenu" class="mobile-menu" src="img/menu.svg" alt="menu">
          
           <nav>
               <img id="svgcross" class="menu-exit" src="img/cross.svg" alt="cross">
               <ul class="prvniLinky">
                   <li><a href="index.php">Domů</a></li>
                   <li><a href="#">Vozový park</a></li>
                   <li><a href="#">Podmínky</a></li>
                   <li><a href="#">Dárkový poukaz</a></li>
               </ul>
               <ul class="druhyLinky">
                <li><a href="#">Kontakt</a></li>
                <li><a href="kosik.php">Košík</a></li>
               </ul>
           </nav>
       </div>
    </div>
    <div class = container>
    <h5>Pro registraci klikněte <a href="registration.php">zde</a></h5>
    </div>
    <h2>Přihlaste se</h2>
    <br>
    <form class="prihlaseniformular" action="login.php" method="post" autocomplete="off">
      <label for="username2">Váš Email: </label>
      <input type="text" name="username2" id = "username2" required value=""> <br>
      <label for="password">Vaše heslo: </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <button type="submit" name="submit">Přihlásit</button>
    </form>
    <br>


</body>