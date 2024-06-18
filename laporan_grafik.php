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

// Mengambil data untuk grafik berdasarkan tanggal
$sql_grafik = "SELECT DATE(jadwal) AS hari, SUM(jumlah) AS total_berat FROM pengajuan_sampah GROUP BY hari";
$result_grafik = $conn->query($sql_grafik);

$days = [];
$weights = [];

if ($result_grafik->num_rows > 0) {
    while ($row_grafik = $result_grafik->fetch_assoc()) {
        $days[] = $row_grafik["hari"];
        $weights[] = $row_grafik["total_berat"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Penjemputan Sampah per Hari</title>
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
            height: 60px;
            width: 70px;
            margin-right: 10px;
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
        .chart-container {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <li><a href="laporan_grafik.php">Grafik Pengajuan</a></li>
                
            </ul>
        </div>
        
        <div class="main-content" id="main-content">
            <div class="chart-container">
                <h2>Grafik Berat Sampah per Hari</h2>
                <canvas id="sampahChart"></canvas>
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

        var days = <?php echo json_encode($days); ?>;
        var weights = <?php echo json_encode($weights); ?>;

        var ctx = document.getElementById('sampahChart').getContext('2d');
        var sampahChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: days,
                datasets: [{
                    label: 'Berat Sampah (kg)',
                    data: weights,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
