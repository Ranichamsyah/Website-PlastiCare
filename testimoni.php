<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banksampah";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$showPopup = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO testimoni (nama, pesan) VALUES ('$nama', '$pesan')";

    if ($conn->query($sql) === TRUE) {
        $showPopup = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM testimoni ORDER BY tanggal DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni Pengguna - PlastiCare</title>
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
            font-size: 24px;
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
        .testimoni {
            margin-bottom: 20px;
        }
        .testimoni h3 {
            color: #388e3c;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 0 0 10px 10px;
            margin-top: 20px;
        }
        .contact-form {
            display: flex;
            flex-direction: column;
        }
        .contact-form label {
            margin-top: 10px;
        }
        .contact-form input, .contact-form textarea {
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-family: 'Times New Roman', serif;
        }
        .contact-form button {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
        }
        .contact-form button:hover {
            background-color: #45a049;
        }
        /* Popup styles */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        .popup-content h3 {
            margin: 0;
            margin-bottom: 20px;
        }
        .popup-content button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .popup-content button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
            window.location.href = 'berandapengajuan.php'; // Redirect to homepage
        }

        document.addEventListener('DOMContentLoaded', function() {
            <?php if ($showPopup) { ?>
                document.getElementById('popup').style.display = 'flex';
            <?php } ?>
        });
    </script>
</head>
<body>
    <div class="container">
        <header>
            <img src="logonew.png" alt="Logo" class="logo">
            <h1>PlastiCare</h1>
        </header>
        <div class="content">
            <h2>Testimoni Pengguna</h2>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='testimoni'>";
                    echo "<h3>" . $row["nama"] . "</h3>";
                    echo "<p>" . $row["pesan"] . "</p>";
                    echo "<small>" . $row["tanggal"] . "</small>";
                    echo "</div>";
                }
            } else {
                echo "<p>Belum ada testimoni.</p>";
            }
            ?>
            <h2>Kirim Testimoni Anda</h2>
            <form action="" method="post" class="contact-form">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>

                <label for="pesan">Pesan:</label>
                <textarea id="pesan" name="pesan" rows="5" required></textarea>

                <button type="submit">Kirim</button>
            </form>
        </div>
        <div class="footer">
            <p>&copy; 2024 PlastiCare. All rights reserved.</p>
        </div>
    </div>
    <!-- Popup -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <h3>Testimoni berhasil dikirim!</h3>
            <button onclick="closePopup()">Kembali ke Beranda</button>
        </div>
    </div>
</body>
</html>
