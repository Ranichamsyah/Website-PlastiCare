<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('bg2.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header {
            text-align: center;
            color: black;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        .box {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
        }

        .form-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .menu-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .menu-item {
            margin-bottom: 10px;
        }

        .menu-link {
            display: block;
            padding: 10px 20px;
            background-color: green;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .menu-link:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1 class="header">PENGAJUAN SAMPAH PLASTIK</h1>
        <div class="form-header"></div>
        <ul class="menu-list">
            <?php
            $menu_items = array(
                "PENGAJUAN SAMPAH PLASTIK" => "pengajuanpenjemputan.php",
                "PUSAT BANTUAN" => "pusatbantuan.php",
                "TESTIMONI" => "testimoni.php",
                "Logout" => "logout.php" // Tambahkan menu untuk logout
            );
            foreach ($menu_items as $label => $link) {
                echo "<li class=\"menu-item\"><a class=\"menu-link\" href='$link'>$label</a></li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
