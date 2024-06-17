<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlastiCare - Cara Kelola Sampah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #4CAF50;
        }
        .navbar {
            background-color: #000;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: #4CAF50;
        }
        .navbar a.active {
            background-color: #575757;
            color: white;
        }
        .navbar .login {
            float: right;
        }
        .container {
            padding: 20px;
        }
        .title {
            text-align: center;
            margin: 20px 0;
            color: #4CAF50;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }
        .grid-item {
            background-color: #4CAF50;
            padding: 20px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            color: white;
        }
        .grid-item img {
            max-width: 100%;
            height: auto;
        }
        .grid-item p {
            margin-top: 10px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="title">Mau Daur Ulang Sampah Plastikmu?</h1>
        <div class="grid-container">
            <div class="grid-item">
                <a href="detail_kelola_sampah.php?item=tas_belanja"><img src="assets/tasplastik.jpg" alt="Tas Belanja"></a>
                <p>Tas Belanja</p>
            </div>
            <div class="grid-item">
                <a href="detail_kelola_sampah.php?item=baju_kreasi"><img src="assets/bajuplastik.jpg" alt="Baju Kreasi"></a>
                <p>Baju Kreasi</p>
            </div>
            <div class="grid-item">
                <a href="detail_kelola_sampah.php?item=pot_cantik"><img src="assets/potplastik.jpg" alt="Pot Cantik"></a>
                <p>Pot Cantik</p>
            </div>
            <div class="grid-item">
                <a href="detail_kelola_sampah.php?item=bunga_hias"><img src="assets/bungahias.jpg" alt="Bunga Hias"></a>
                <p>Bunga Hias</p>
            </div>
            <div class="grid-item">
                <a href="detail_kelola_sampah.php?item=tas_belanja2"><img src="assets/tasplastik2.jpg" alt="Tas Belanja"></a>
                <p>Tas Belanja</p>
            </div>
            <div class="grid-item">
                <a href="detail_kelola_sampah.php?item=baju_kreasi2"><img src="assets/bajuplastik2.jpg" alt="Baju Kreasi"></a>
                <p>Baju Kreasi</p>
            </div>
            <div class="grid-item">
                <a href="detail_kelola_sampah.php?item=pot_cantik2"><img src="assets/potplastik2.jpg" alt="Pot Cantik"></a>
                <p>Pot Cantik</p>
            </div>
            <div class="grid-item">
                <a href="detail_kelola_sampah.php?item=bunga_hias2"><img src="assets/bungahias2.jpg" alt="Bunga Hias"></a>
                <p>Bunga Hias</p>
            </div>
        </div>
    </div>
</body>
</html>