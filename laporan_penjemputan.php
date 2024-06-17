<?php
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjemputan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            margin-top: 60px;
        }
        header {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            text-align: left;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        header img.logo {
            height: 60px; /* Tinggi logo yang lebih besar */
            width: 70px;
            margin-right: 10px; /* Jarak antara logo dan teks */
        }
        header h1 {
            margin: 0;
            font-size: 36px;
            font-family: 'Times New Roman', serif;
        }
        .logout-btn {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            border-radius: 5px;
            margin-left: auto;
            margin-right: 45px;
        }
        .logout-btn:hover {
            background-color: #45a049;
        }
        .sidebar {
            width: 250px;
            background: #333;
            color: white;
            padding: 15px;
            height: calc(100vh - 60px);
            position: fixed;
            top: 100px; /* Pastikan sidebar dimulai dari bawah header */
            overflow: auto;
            transition: width 0.3s;
            z-index: 999; /* Pastikan sidebar di bawah header */
        }
        .sidebar.collapsed {
            width: 60px;
        }
        .sidebar.collapsed h2, .sidebar.collapsed ul {
            display: none;
        }
        .sidebar.collapsed .toggle-btn {
            text-align: center;
        }
        .toggle-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }
        .sidebar h2 {
            text-align: center;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }
        .sidebar ul li a:hover {
            background-color: #575757;
            padding-left: 10px;
            transition: 0.3s;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            transition: margin-left 0.3s, width 0.3s;
        }
        .main-content.collapsed {
            margin-left: 60px;
            width: calc(100% - 60px);
        }
        .table-container {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            overflow-x: auto;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .aksi {
            text-align: center;
        }
        .aksi button {
            padding: 8px 16px;
            margin: 2px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .aksi button.approve {
            background-color: #4CAF50;
            color: white;
        }
        .aksi button.reject {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <img src="logonew.png" alt="Logo" class="logo">
        <h1>PlastiCare</h1>
        <a href="logout.php" class="logout-btn">Logout</a>
    </header>
    
    <div class="container">
        <div class="sidebar" id="sidebar">
            <div class="toggle-btn" onclick="toggleSidebar()">☰</div>
            <ul>
                <li><a href="permintaan_penjemputan.php">Permintaan Penjemputan</a></li>
                <li><a href="laporan_penjemputan.php">Laporan Penjemputan</a></li>
            </ul>
        </div>
        
        <div class="main-content" id="main-content">
            <div class="table-container">
                <h2>Laporan Pengajuan Sampah</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Berat Sampah (kg)</th>
                            <th>Status Rekomendasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query untuk mengambil data dari tabel pengajuan_sampah
                        $sql_pengajuan = "SELECT nama, telepon, email, alamat, jumlah, status_rekomendasi FROM pengajuan_sampah";
                        $result_pengajuan = $conn->query($sql_pengajuan);

                        if ($result_pengajuan->num_rows > 0) {
                            while ($row_pengajuan = $result_pengajuan->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row_pengajuan["nama"] . "</td>
                                    <td>" . $row_pengajuan["telepon"] . "</td>
                                    <td>" . $row_pengajuan["email"] . "</td>
                                    <td>" . $row_pengajuan["alamat"] . "</td>
                                    <td>" . $row_pengajuan["jumlah"] . "</td>
                                    <td>" . $row_pengajuan["status_rekomendasi"] . "</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            var mainContent = document.getElementById('main-content');
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('collapsed');
        }
    </script>
</body>
</html>
