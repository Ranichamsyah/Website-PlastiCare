<?php
@include 'config.php';
session_start();

if(isset($_POST['submit'])){
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = md5($_POST['password']);
   
   $select = "SELECT * FROM pimpinan_table WHERE username = '$username' AND password = '$pass'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      $_SESSION['pimpinan_name'] = $row['username'];
      header('location:pimpinan.php');
   } else {
      $error[] = 'Incorrect username or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pimpinan Login</title>
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
         width: 650px;
         height: 500px;
         background: url('pimpinan.jpg') no-repeat center center;
         background-size: cover;
      }
      .form-container {
         width: 400px;
         padding: 20px;
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
      }
      h3 {
         margin-bottom: 20px;
         color: #4CAF50;
         text-align: center;
      }
      input[type="text"],
      input[type="password"],
      input[type="submit"] {
         width: 100%;
         padding: 10px;
         margin: 10px 0;
         border: 1px solid #ccc;
         border-radius: 5px;
         box-sizing: border-box;
      }
      input[type="submit"] {
         background: #4CAF50;
         color: #fff;
         border: none;
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
         <h3>Pimpinan Login</h3>
         <?php
         if(isset($error)){
            foreach($error as $err){
               echo '<span class="error-msg">'.$err.'</span>';
            }
         }
         ?>
         <input type="text" name="username" required placeholder="Enter your username">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="submit" name="submit" value="Login Now">
      </form>
   </div>
</div>
</body>
</html>
