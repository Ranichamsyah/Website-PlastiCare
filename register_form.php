<?php
@include 'config.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = "SELECT * FROM user_form WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exist!';
   } else {
      if($pass != $cpass){
         $error[] = 'Password not matched!';
      } else {
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','user')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
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
   <title>Register Form</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         background: #f2f2f2;
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
         margin: 0;
      }
      .container {
         display: flex;
         background: #fff;
         border-radius: 10px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         overflow: hidden;
         max-width: 800px;
         width: 100%;
      }
      .image-container {
         flex: 1;
         background: url('login4.jpg') no-repeat center center;
         background-size: cover;
      }
      .form-container {
         flex: 1;
         padding: 20px;
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
      }
      h3 {
         margin-bottom: 20px;
         color: #4CAF50;
      }
      input[type="email"],
      input[type="password"],
      input[type="text"] {
         width: calc(100% - 20px);
         padding: 10px;
         margin: 10px 0;
         border: 1px solid #ccc;
         border-radius: 5px;
      }
      input[type="submit"] {
         background: #4CAF50;
         color: #fff;
         border: none;
         border-radius: 5px;
         padding: 10px;
         width: calc(100% - 20px);
         cursor: pointer;
         transition: background 0.3s ease;
      }
      input[type="submit"]:hover {
         background: #45a049;
      }
      .error-msg {
         color: red;
         margin: 10px 0;
      }
      p {
         margin-top: 20px;
      }
      a {
         color: #4CAF50;
         text-decoration: none;
      }
      a:hover {
         text-decoration: underline;
      }
   </style>
</head>
<body>
<div class="container">
   <div class="image-container"></div>
   <div class="form-container">
      <form action="" method="post">
         <h3>Register Now</h3>
         <?php
         if(isset($error)){
            foreach($error as $err){
               echo '<span class="error-msg">'.$err.'</span>';
            }
         }
         ?>
         <input type="text" name="name" required placeholder="Enter your name">
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="password" name="cpassword" required placeholder="Confirm your password">
         <input type="submit" name="submit" value="Register Now">
         <p>Already have an account? <a href="login_form.php">Login now</a></p>
      </form>
   </div>
</div>
</body>
</html>
