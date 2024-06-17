<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Pengajuan Penjemputan Sampah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4CAF50;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            max-width: 600px;
            background-color: #e0f2e9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        
        h2 {
            color: #4CAF50;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }
        
        .notifikasi {
            background-color: #d2f0dd;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .notifikasi p {
            margin: 0;
            font-size: 18px;
            color: #333;
        }
        
        .ikon {
            font-size: 50px;
            color: #4CAF50;
            margin-bottom: 15px;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Notifikasi Pengajuan Penjemputan Sampah</h2>
    <div class="notifikasi">
        <i class="fas fa-check-circle ikon"></i>
        <p>Data pengajuan penjemputan sampah berhasil tersimpan.</p>
        <a href="berandapengajuan.php" class="button">Kembali ke Beranda</a>
    </div>
</div>
</body>
</html>
