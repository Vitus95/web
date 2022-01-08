<?php
require 'config.php';
if(!empty($_SESSION["id_user"])){
  $id_user = $_SESSION["id_user"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE id_user = $id_user");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
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
    <h1>Vítejte <?php echo $row["username"]; ?></h1>
    <a href="logout.php">Logout</a>
</body>