<?php   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "cart");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'             =>     $_GET["id"],  
                     'item_name'           =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'       =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Pokožka už je přidaná")</script>';  
                echo '<script>window.location="kosik.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'             =>     $_POST["hidden_name"],  
                'item_price'            =>     $_POST["hidden_price"],  
                'item_quantity'         =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Položka odstraněna")</script>';  
                     echo '<script>window.location="kosik.php"</script>';  
                }  
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
    
 <div class="container2" style="width:900px; margin: 50px;">  
                <h3 align="center">Simple PHP Mysql Shopping Cart</h3><br />  
                <?php  
                $query = "SELECT * FROM product ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="vypis-aut">  
                     <form method="post" action="kosik.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src="<?php echo $row["image"]; ?>" class="img-responsive "style="width: 450px;" /><br />  
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger"> <?php echo $row["price"]; ?> Kč</h4>  
                               <h4>Počet hodin</h4><input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart"  class="btn-success" value="Přidat do košíku" style="position: relative;" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />  

    <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Položka</th>  
                               <th width="10%">Počet Dnů</th>  
                               <th width="20%">Cena</th>  
                               <th width="15%">Celkově</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>
                         
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td> <?php echo $values["item_price"]; ?> Kč</td>  
                               <td> <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?> Kč</td>  
                               <td><a href="kosik.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Celková cena</td>  
                               <td align="right"> <?php echo number_format($total, 2); ?> Kč</td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br /> 
           <a href="udaje.php">Pokračovat</a>
        
          
</body>
</html>