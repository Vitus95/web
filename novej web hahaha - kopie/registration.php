<?php
require 'config.php';
if(!empty($_SESSION["id_user"])){
    header("Location: list.php");
}
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");
    if(mysqli_num_rows($duplicate) > 0){
      echo
      "<script> alert('Email už je zaregistrován'); </script>";
    }
    else{
      if($password == $confirmpassword){
        $query = "INSERT INTO users VALUES('','$username','$password')";
        mysqli_query($conn, $query);
        echo
        "<script> alert('Registrace úspěšná'); </script>";
      }
      else{
        echo
        "<script> alert('Hesla se neshodují'); </script>";
      }
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
    <title>registration</title>
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
    <form class="registraceformular" action="registration.php" method="post" autocomplete="off">
      <label for="username">Zadejte e-mail: </label>
      <input type="text" name="username" id = "username" required value=""> <br>
      <label for="password">Zadejte heslo: </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <label for="confirmpassword">Potvrďte heslo : </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
      <button type="submit" name="submit">Zaregistrovat</button>
    </form>
    <br>
    <a href="login.php">Přihlaste se</a>
</body>