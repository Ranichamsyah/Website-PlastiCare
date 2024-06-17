<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - PlastiCare</title>
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
        .faq-item {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #e0f2e9;
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .faq-item h3 {
            color: #388e3c;
            margin: 0;
        }
        .faq-item p {
            display: none;
            margin-top: 10px;
            line-height: 1.6;
        }
        .faq-item button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .faq-item button:hover {
            background-color: #45a049;
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                const button = item.querySelector('button');
                const answer = item.querySelector('p');
                button.addEventListener('click', function() {
                    const isOpen = answer.style.display === 'block';
                    answer.style.display = isOpen ? 'none' : 'block';
                    button.textContent = isOpen ? 'Lihat Jawaban' : 'Tutup Jawaban';
                });
            });
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
            <h2>Frequently Asked Questions (FAQ)</h2>
            <div class="faq-item">
                <h3>Apa itu PlastiCare?</h3>
                <p>PlastiCare adalah inisiatif yang didedikasikan untuk mengurangi sampah plastik di lingkungan kita dengan menyediakan layanan penjemputan sampah plastik dari rumah Anda.</p>
                <button>Lihat Jawaban</button>
            </div>
            <div class="faq-item">
                <h3>Bagaimana cara kerja layanan penjemputan sampah plastik?</h3>
                <p>Anda dapat mendaftar atau menghubungi kami untuk jadwal penjemputan. Persiapkan sampah plastik yang sudah dipisahkan dari sampah lain dan tunggu petugas kami datang pada jadwal yang sudah disepakati.</p>
                <button>Lihat Jawaban</button>
            </div>
            <div class="faq-item">
                <h3>Apakah ada biaya untuk layanan penjemputan ini?</h3>
                <p>Layanan penjemputan sampah plastik dari PlastiCare tidak dikenakan biaya. Kami bertujuan untuk membantu masyarakat dalam mengelola sampah plastik mereka dengan lebih baik.</p>
                <button>Lihat Jawaban</button>
            </div>
            <div class="faq-item">
                <h3>Apa saja jenis sampah plastik yang bisa dijemput?</h3>
                <p>Kami menerima berbagai jenis sampah plastik seperti botol plastik, kantong plastik, bungkus plastik, dan lain-lain. Pastikan sampah plastik Anda bersih dan sudah dipisahkan dari sampah lainnya.</p>
                <button>Lihat Jawaban</button>
            </div>
            <div class="faq-item">
                <h3>Bagaimana saya bisa mendapatkan insentif dari PlastiCare?</h3>
                <p>Anda dapat menerima insentif berupa poin atau hadiah lainnya dari hasil daur ulang sampah plastik yang dikumpulkan. Insentif ini akan diberikan berdasarkan jumlah sampah plastik yang Anda sumbangkan.</p>
                <button>Lihat Jawaban</button>
            </div>
            <div class="faq-item">
                <h3>Bagaimana cara menghubungi PlastiCare?</h3>
                <p>Anda dapat menghubungi kami melalui email di info@banksampah.com atau telepon di 123-456-7890.</p>
                <button>Lihat Jawaban</button>
            </div>
        </div>
        <div class="footer">
            <p>&copy; 2024 PlastiCare. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
