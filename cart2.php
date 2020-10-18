<?php

if(isset($_POST['addCart'])){

            $prodID = $_POST['addCart'];
            //$user = $_SESSION['userID'];
            $customer = $_SESSION['current_user'];

           $sql = "SELECT * FROM products WHERE product_id = $prodID";
            $result = mysqli_query($db, $sql);
            
            $results = mysqli_fetch_array($result);

            $sql = "INSERT INTO cart (Cart_id, customer_id, product_id, product_type, product_name, price, count, image_path) VALUES (null, '".$customer."', '$prodID', '".$results['3']."', '".$results['4']."', '".$results['6']."', '".$results['7']."', '".$results['8']."')";
           
            if( mysqli_query($db, $sql)){
            header('location: Cart.php');
            }
       }





       if(isset($_POST['addCart'])){

            $prodID = $_POST['addCart'];
            //$user = $_SESSION['userID'];
            $customer = $_SESSION['userEmail'];

           $sql = "SELECT * FROM products WHERE product_id = $prodID";
            $result = mysqli_query($conn, $sql);
            
            $results = mysqli_fetch_array($result);

            $cartCountQuery = "SELECT count FROM carts WHERE product_id = '$prodID' AND customer_id = '$customer'";
            $cartResults = mysqli_query($conn, $cartCountQuery);
            $cartCount = mysqli_fetch_array($cartResults);
            if($cartCount[0] < 1){
              $sql = "INSERT INTO carts (cart_id, customer_id, product_id, product_type, product_name, price, count, image_path) VALUES (null, '".$customer."', '$prodID', '".$results['3']."', '".$results['4']."', '".$results['6']."', 1, '".$results['6']."')";

            }else{
              $amount = $cartCount['count'] + 1;
              $sql = "UPDATE carts SET count = $amount WHERE customer_id = '$customer'";
            }
            mysqli_query($conn, $sql);
       }
?> 
?> 