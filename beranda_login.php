<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Dashboard</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         background: linear-gradient(to right, #4CAF50, #45a049);
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
         margin: 0;
         color: #fff;
      }
      .container {
         background: rgba(255, 255, 255, 0.9);
         border-radius: 10px;
         box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
         padding: 40px;
         text-align: center;
         max-width: 600px;
         width: 100%;
      }
      h1 {
         margin-bottom: 30px;
         color: #333;
      }
      .role-container {
         display: flex;
         justify-content: space-around;
         align-items: center;
         margin: 20px 0;
      }
      .role {
         text-align: center;
         width: 45%;
      }
      .role img {
         width: 100px;
         height: 100px;
         border-radius: 50%;
         margin-bottom: 10px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }
      .btn {
         background: #4CAF50;
         color: #fff;
         border: none;
         border-radius: 5px;
         padding: 15px 30px;
         cursor: pointer;
         transition: background 0.3s ease;
         font-size: 16px;
         text-decoration: none;
         display: inline-block;
         margin-top: 10px;
      }
      .btn:hover {
         background: #45a049;
      }
   </style>
</head>
<body>
   <div class="container">
      <h1>Welcome to the Login Dashboard</h1>
      <div class="role-container">
         <div class="role">
            <img src="admin.jpg" alt="Admin">
            <a href="admin_login.php" class="btn">Login as Admin</a>
         </div>
         <div class="role">
            <img src="pimpinan.jpg" alt="Pimpinan">
            <a href="pimpinan_login.php" class="btn">Login as Pimpinan</a>
         </div>
      </div>
   </div>
</body>
</html>
