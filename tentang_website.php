<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banksampah";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tutup koneksi saat selesai
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - PlastiCare</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        header img.logo {
            height: 50px;
            margin-right: 10px;
            vertical-align: middle;
        }
        header h1 {
            display: inline;
            font-size: 30px;
            font-family: 'Times New Roman', serif;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            color: #388e3c;
        }
        .content p {
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 0 0 10px 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <img src="logonew.png" alt="Logo" class="logo">
            <h1>PlastiCare</h1>
        </header>
        <div class="content">
            <h2>Tentang Kami</h2>
            <p>Selamat datang di PlastiCare! Kami adalah inisiatif yang didedikasikan untuk mengurangi sampah plastik di lingkungan kita. Melalui program penjemputan sampah plastik, kami berusaha untuk membuat pengelolaan sampah menjadi lebih mudah dan efisien bagi masyarakat.</p>
            <p>PlastiCare hadir dengan tujuan untuk memberikan solusi dalam pengelolaan sampah plastik yang semakin meningkat. Kami bekerja sama dengan berbagai pihak untuk memastikan bahwa sampah plastik yang terkumpul dapat didaur ulang dan digunakan kembali dengan efektif.</p>
            <h2>Misi Kami</h2>
            <p>Misi kami adalah untuk menciptakan lingkungan yang bersih dan bebas dari sampah plastik. Kami percaya bahwa dengan kerjasama dan partisipasi aktif dari seluruh masyarakat, kita dapat mencapai tujuan ini.</            </p>
            <h2>Visi Kami</h2>
            <p>Visi kami adalah menjadi platform utama dalam pengelolaan sampah plastik di Indonesia, dengan memanfaatkan teknologi untuk mendukung proses daur ulang yang efektif dan efisien.</p>
            <h2>Hubungi Kami</h2>
            <p>Jika Anda memiliki pertanyaan atau ingin bergabung dengan program kami, silakan hubungi kami melalui email di info@banksampah.com atau telepon di 123-456-7890.</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 PlastiCare. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
