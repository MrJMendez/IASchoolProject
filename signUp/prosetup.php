<?php 

session_start();

include("projectconfig.php");


$error = "";

  if(isset($_POST["register"])){

    $myfirstname = mysqli_real_escape_string($conn, $_POST["firstName"]);
	  $mylastname = mysqli_real_escape_string($conn, $_POST["lastName"]);
    $myemail = mysqli_real_escape_string($conn, $_POST["email"]);
  	$mypassword = mysqli_real_escape_string($conn, $_POST["password"]);
    $myphonenumber = mysqli_real_escape_string($conn, $_POST["phoneNumber"]);
    $myaddress1 = mysqli_real_escape_string($conn, $_POST["address"]);
    $mystate = mysqli_real_escape_string($conn, $_POST["state"]);
    $mycity = mysqli_real_escape_string($conn, $_POST["city"]);
    $mycountry = mysqli_real_escape_string($conn, $_POST["country"]);
    $myzip = mysqli_real_escape_string($conn, $_POST["zip"]);
 

  	$sql = "SELECT * FROM customers WHERE email_address = '$myemail' AND password = '$mypassword'";
  	$result = mysqli_query($conn, $sql);

  	$row = mysqli_fetch_assoc($result);


  	if($row){ // this needs more clarification

  		 $error = "Your email address or password already exists";
       header("Location: signUp.php");
     
      
  	} else {

  		$sql = "INSERT INTO customers (customer_id, first_name, last_name, phone_number, email_address, password,address1,state, city, country, zip_code) VALUES (NULL, '$myfirstname','$mylastname','$myphonenumber','$myemail', '$mypassword','$myaddress1', '$mystate','$mycity','$mycountry','$myzip')";

  		mysqli_query($conn, $sql);

  		$_SESSION['current_user'] = $myfirstname;
      $_SESSION['userEmail'] = $myemail;
  		header("Location: ../index.php"); 
  	}

  }


  if(isset($_POST["login"])){

      $myemail = mysqli_real_escape_string($conn, $_POST["email"]);
      $mypassword = mysqli_real_escape_string($conn, $_POST["password"]);

      $sql = "SELECT * FROM customers WHERE email_address = '$myemail' AND password = '$mypassword'";
      $result = mysqli_query($conn, $sql);

      $row = mysqli_fetch_assoc($result);

      if($row){

        $_SESSION['current_user'] = $row['first_name'];
        $_SESSION['userEmail'] = $myemail;
        header("Location: ../index.php");
        //echo $name; 

      } else{

        $error = "Your email address or password is incorrect"; 
      }

  }

if(isset($_POST['addCart'])){

      if(isset($_SESSION['userEmail'])){

        $prodID = $_POST['addCart'];
            
            $customer = $_SESSION['userEmail'];

           $sql = "SELECT * FROM products WHERE product_id = $prodID";
            $result = mysqli_query($conn, $sql);
            
            $results = mysqli_fetch_array($result);

            $cartCountQuery = "SELECT count FROM carts WHERE product_id = '$prodID' AND customer_id = '$customer'";
            $cartResults = mysqli_query($conn, $cartCountQuery);
            $cartCount = mysqli_fetch_array($cartResults);
            if($cartCount[0] < 1){
              $sql = "INSERT INTO carts (cart_id, customer_id, product_id, product_type, product_name, price, count, image_path) VALUES (null, '".$customer."', '$prodID', '".$results['4']."', '".$results['1']."', '".$results['2']."', 1, '".$results['6']."')";

            }else{
              
              $amount = $cartCount['count'] + 1;
              $sql = "UPDATE carts SET count = $amount WHERE customer_id = '$customer'";
            }
            mysqli_query($conn, $sql);
          }else{

            header("location: signUp/signIn.php");
          }
  } 
          
       


     if(isset($_POST["contact"])){

      $firstName = mysqli_real_escape_string($conn, $_POST["fname"]);
      $lastName = mysqli_real_escape_string($conn, $_POST["lname"]);
      $subject = mysqli_real_escape_string($conn , $_POST["subject"]);
      $message = mysqli_real_escape_string($conn, $_POST["message"]);
      $email = mysqli_real_escape_string($conn, $_POST["email"]);
      $phone_number = mysqli_real_escape_string($conn, $_POST["pNumber"]);

      $sql = "INSERT INTO contact (first_name, last_name, subject, message, email, phone_number) values('$firstName', '$lastName', '$subject', '$message', '$email','$phone_number')";

        mysqli_query($conn, $sql);

     }
     if(isset($_POST["subscribe"])){

      $email = mysqli_real_escape_string($conn, $_POST["email"]);

       $sql = "INSERT INTO subscribers (email) values('$email')";
       mysqli_query($conn, $sql);
     }

     if(isset($_POST['delete'])){

      $cart_id = $_POST['delete'];

      $remove = $conn->prepare("DELETE FROM carts where cart_id = '$cart_id'");
      $remove -> execute();

      header("location: cart.php");
     } 

      if(isset($_POST['clear'])){

     

      $remove = $conn->prepare("DELETE FROM carts");
      $remove -> execute();

      header("location: cart.php");

     }






      if(isset($_POST["placeOrder"])){

        $user = $_SESSION['userEmail'];
        $userArray = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM customers WHERE email_address = '$user' limit 1"));
        $billing = $userArray[7]. "\n" .$userArray[8]. "\n" .$userArray[9]. "\n" .$userArray[10]. "\n" .$userArray[11];

       // $_SESSION["billing_address"] = $billing;

        $sameAddress = mysqli_real_escape_string($conn, $_POST["sameAddress"]);
      if(empty($sameAddress)){
          $fName = mysqli_real_escape_string($conn, $_POST["fname"]);
          $lName = mysqli_real_escape_string($conn, $_POST["lname"]);

          $country = mysqli_real_escape_string($conn , $_POST["country"]);
          $address1 = mysqli_real_escape_string($conn, $_POST["district"]);
          $address2 = mysqli_real_escape_string($conn, $_POST["Street"]);

         $state = mysqli_real_escape_string($conn, $_POST["state"]);
         $zip = mysqli_real_escape_string($conn, $_POST["zip"]);
          $city = mysqli_real_escape_string($conn, $_POST["city"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);

        
       

        $billing_address = $address1 . "\n" . $address2 . "\n" . $city . "\n" . $state . $zip . "\n" . $country;
      }
      else {
        
        
        $billing_address = $billing;
        $email = $user;
      
      }

      $userCart = $_SESSION['cartArray'];

      foreach($userCart as $uc){

        if(mysqli_query($conn,"INSERT INTO ordered (product_id, quantity, product_name, price, user_email, billing_address, shipping_address) VALUES ('$uc[2]','$uc[7]','$uc[4]','$uc[6]','$email','$billing_address', '$billing')")){
          mysqli_query($conn,"DELETE FROM carts where customer_id = '$user'");
        }
      }

      header("location: thankUpage.php");
      
      
     } 






?> 



