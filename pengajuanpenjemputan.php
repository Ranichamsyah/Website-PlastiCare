<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pengajuan Penjemputan Sampah</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #4CAF50;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        
        .container {
            width: 80%;
            max-width: 1200px;
            background-color: #e0f2e9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            max-height: 90%;
        }
        h2 {
            color: #4CAF50;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            background-color: #d2f0dd;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        label {
            font-weight: bold;
        }
        .form-group {
            flex: 1 1 45%;
            display: flex;
            flex-direction: column;
        }
        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="number"],
        textarea,
        input[type="datetime-local"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }
        input[type="checkbox"] {
            margin-right: 5px;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
        }
        .full-width {
            flex: 1 1 100%;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        img {
            width: 100%;
            max-height: 500px; /* Set maximum height to ensure it fits */
            border-radius: 10px;
            margin-bottom: 20px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    $servername = "localhost"; // Ganti sesuai dengan nama server Anda
    $username = "root"; // Ganti sesuai dengan username database Anda
    $password = ""; // Ganti sesuai dengan password database Anda
    $dbname = "banksampah"; // Ganti sesuai dengan nama database Anda

    // Buat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $jenis_sampah = implode(', ', $_POST['jenis_sampah']); // Menggabungkan pilihan jenis sampah menjadi satu string
    $jumlah = $_POST['jumlah'];
    $jadwal = $_POST['jadwal'];
    $keterangan = $_POST['keterangan'];

    // SQL untuk menyimpan data ke dalam database
    $sql = "INSERT INTO pengajuan_sampah (nama, telepon, email, alamat, jenis_sampah, jumlah, jadwal, keterangan)
    VALUES ('$nama', '$telepon', '$email', '$alamat', '$jenis_sampah', '$jumlah', '$jadwal', '$keterangan')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to notification page
        header("Location: notifikasipengajuan.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<div class="container">
    <h2>Formulir Pengajuan Penjemputan Sampah</h2>
    <form method="post" enctype="multipart/form-data">
        <img src="form1.jpg" alt="Header Image">
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="telepon">Nomor Telepon:</label>
            <input type="tel" id="telepon" name="telepon" required>
        </div>
        <div class="form-group">
            <label for="email">Alamat Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group full-width">
            <label for="alamat">Alamat Pengambilan:</label>
            <textarea id="alamat" name="alamat" rows="4" required></textarea>
        </div>
        <div class="form-group full-width">
            <label for="jenis_sampah">Jenis Sampah:</label>
            <div class="checkbox-group">
                <input type="checkbox" id="plastik" name="jenis_sampah[]" value="Plastik">
                <label for="plastik">Plastik</label>
                <!-- Tambahkan jenis sampah lainnya sesuai kebutuhan -->
            </div>
        </div>
        <div class="form-group">
            <label for="jumlah">Estimasi Jumlah Sampah (kg):</label>
            <input type="number" id="jumlah" name="jumlah" required>
        </div>
        <div class="form-group">
            <label for="jadwal">Jadwal Pengambilan:</label>
            <input type="datetime-local" id="jadwal" name="jadwal" required>
        </div>
        <div class="form-group full-width">
            <label for="keterangan">Keterangan Tambahan:</label>
            <textarea id="keterangan" name="keterangan" rows="4"></textarea>
        </div>
        <div class="form-group full-width">
            <input type="submit" value="Ajukan Penjemputan">
        </div>
    </form>
</div>
</body>
</html>
