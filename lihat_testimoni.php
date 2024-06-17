<?php
@include 'config.php';
session_start();

// Periksa apakah user sudah login sebagai pimpinan
if (!isset($_SESSION['pimpinan_name'])) {
    header('location:pimpinan_login.php');
    exit;
}

// Mengambil data testimoni dari database
$query = "SELECT * FROM testimoni ORDER BY tanggal DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Testimoni</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
            height: 60px;
            width: 70px;
            margin-right: 10px;
        }
        header h1 {
            margin: 0;
            font-size: 24px;
            font-family: 'Times New Roman', serif;
        }
        .logout-btn {
            margin-left: auto;
            color: white;
            text-decoration: none;
            padding: 0px;
            background-color: #4CAF50;
            border-radius: 5px;
            margin-right: 50px;
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
            top: 100px;
            overflow: auto;
            transition: width 0.3s;
            z-index: 999;
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
            margin-top: 80px;
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
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f2f2f2;
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
                <li><a href="laporan_penjemputan.php">Laporan Penjemputan</a></li>
                <li><a href="lihat_testimoni.php">Lihat Testimoni</a></li>
            </ul>
        </div>
        
        <div class="main-content" id="main-content">
            <div class="table-container">
                <h2>Hasil Testimoni</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                    <td>{$row['nama']}</td>
                                    <td>{$row['pesan']}</td>
                                    <td>{$row['tanggal']}</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>Tidak ada testimoni.</td></tr>";
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
