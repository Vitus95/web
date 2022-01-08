<?php
 session_start();
  $total = 0;
  
  
if(isset($_POST['submit'])){
         $firstname = $_POST['firstname'];
         $surname = $_POST['surname'];
         $address = $_POST['address'];
         $town = $_POST['town'];
         $phone = $_POST['phone'];
         $email = $_POST['email'];
         $order_price = $_POST['order_price'];
         
         
        
         $connect = mysqli_connect("localhost", "root", "", "cart");
         $query = "INSERT INTO customer_orders(firstname,surname,address,town,phone,email,order_price)
         VALUES('$firstname','$surname','$address','$town','$phone','$email','$order_price')";
 
         $result = mysqli_query($connect,$query);
         
         if(!$result){
             die("Dotaz do databáze selhal".mysqli_error());
         }
         $query2 = "SELECT * FROM customer_orders ORDER BY id_order DESC LIMIT 1";
         $query_run = mysqli_query($connect,$query2);

         if(mysqli_num_rows($query_run) > 0){
            $row = mysqli_fetch_array($query_run);
	        echo $row['id_order'];
            }

         
         
       
        
 foreach($_SESSION["shopping_cart"] as $keys => $values)  
  {
    $total = $total + ($values["item_quantity"] * $values["item_price"]);
    if(isset($_POST['submit'])){ 
    $car_name = $values["item_name"];
    $num_days = $values["item_quantity"];
    $car_total = $values["item_quantity"] * $values["item_price"];
     
    }
    else{
        $car_name = '';
        $num_days = '';
        $car_total = '';
        $car_customer = '';
    }
        
        $car_customer = $row['id_order'];
        $query1 = "INSERT INTO car_orders(car_name,num_days,car_total,car_customer)
         VALUES('$car_name','$num_days','$car_total','$car_customer')";  
         $result1 = mysqli_query($connect, $query1); 
         if(!$result1){
        die("Dotaz do databáze selhal".mysqli_error());
        } 
        


    }  
  } 
 else{
             
  $firstname = '';
  $surname = '';
  $address = '';
  $town = '';
  $phone = '';
  $email = '';
  $order_price = '';
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Fakturační údaje</title>
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
    <?php
     
     ?>      
            
        <div class="udajeformular" style="width: 300px; margin: 80px;">
               <form method="post"  action="udaje.php">
                <h5 style="margin: 5px;">Křestní jméno</h5>
                <input type="text" value="" name="firstname" required>
                <h5 style="margin: 11px;">Příjmení</h5>
                <input type="text" value="" name="surname" required>
                <h5 style="margin: 11px;">Adresa ulice a č.p.</h5>
                <input type="text" value="" name="address" required>
                <h5 style="margin: 11px;">Město</h5>
                <input type="text" value="" name="town" required>
                <h5 style="margin: 11px;">Telefon</h5>
                <input type="text" value="" name="phone" required>
                <h5 style="margin: 11px;">E-mailová adresa</h5>
                <input type="email" value="" name="email" required>
                <input type="hidden" value="<?php echo $total; ?>" name="order_price" required>
                <input type="submit" class="btn-send" name="submit" value="Odeslat Objednávku" align="right">

                
                </form>
        </div>
        <?php
function destroy_foo() 
{
    unset($firstname);
    unset($surname);
    unset($address);
    unset($town);
    unset($phone);
    unset($email);
    unset($order_price);
}

?>
 
        
       </div>
    </div> 
    <?php
     echo "<pre>";
   
   
     print_r($_SESSION["shopping_cart"]);
     echo "</pre>";
     ?>
                               
</body>