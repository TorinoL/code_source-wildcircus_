<?php 
  include('inc/head.php');

   include('inc/header.php');
 ?>

<?php

 if(isset($_POST['submit'])){
 	$fullName = htmlspecialchars(trim($_POST['fullName']));
 	$email = htmlspecialchars(trim($_POST['email']));

 	if(!empty($_POST['fullName']) && !empty($_POST['email'])){

 		if(preg_match('/^[a-zA-Z0-9_]+$/', $_POST['fullName'])){

 		  $fullNamelength = strlen($_POST['fullName']);
 		  if($fullNamelength >= 6 && $fullNamelength <= 255){

 			if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']) || filter_var($_POST['email'], !FILTER_VALIDATE_EMAIL)){
 				$message = "Your message has been sent";
 				header('Location: index.php');
 			}else{
 				$error = "Your adress mail is not valid";
 			}
 		}else{
 			$error = "Your name must be between 6 and 255 characters";
 		}
 	}else{
 		$error = "Your name is not valid, you must write alphanumeric characters";
 	}
 }else{
     $error = "All fields are required!";
  }
 }

?>


 <h5 class="title">CONTACT WILD CIRCUS</h5>

 <P class="para">For other inquiries regarding Wildcircus.com, please send us a message below.</P>

<div id="form">
 <form method="post" action="">

    <table>
      <tr>
         <td align="right"><label for="fullName">Full Name :</label></td>
         <td><input type="text" name="fullName" id="fullName" required value="<?php if(isset($fullName)){ echo $fullName;}?>" /></td>
     </tr>

     <tr>
         <td align="right"><label for="email">Email (required) :</label></td>
		 <td><input type="email" name="email" id="email" required value="<?php if(isset($email)) { echo $email;} ?>"  /></td>
     </tr>

      <tr>
         <td align="right"><label for="message">Message :</label></td>
		 <td><textarea name="message" id="message" value="<?php if(isset($message)) { echo $message;} ?>"></textarea></td>
     </tr>

     <tr>
		 <td colspan="2"><input type="submit" name="submit" value="Send Message" /> <a href "">Actualize</a></td>
     </tr>
    
    </table>
   </form>

    <?php

       if(isset($error)){
       	  echo '<font color="red">' .$error. '</font>';
       }

       if(isset($message)){
       	  echo '<font color="green">' .$message. '</font>';
       }

    ?>
  </div>
