<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlastiCare</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
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
            padding: 10px 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        header h1 {
            margin: 0;
            font-size: 36px;
            margin-left: 10px; /* Beri sedikit jarak antara logo dan teks */
            font-family: 'Times New Roman', cursive; /* Terapkan font Pacifico */
        }
        header img.logo {
            height: 70px; /* Tinggi logo yang lebih besar */
            width: 80px;
            margin-right: 10px; /* Jarak antara logo dan teks */
        }
        .login-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-left: auto;
            transition: background-color 0.3s;
        }
        .login-btn:hover {
            background-color: #45a049;
        }
        .sidebar {
            width: 250px;
            background: #333;
            color: white;
            padding: 15px;
            height: calc(100vh - 60px);
            position: fixed;
            top: 80px; /* Pastikan sidebar dimulai dari bawah header */
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
            text-align: left;
            cursor: pointer;
            margin-bottom: 10px;
            margin-top: 20px; /* Tambahkan margin atas untuk memberi jarak dari header */
        }
        .sidebar h2 {
            text-align: center;
            margin-top: 20px; /* Tambahkan margin atas untuk memberi jarak dari header */
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin-top: 20px; /* Tambahkan margin atas untuk memberi jarak dari header */
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
            padding-left: 5px;
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
        .banner {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 500px;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .banner img {
            width: 98%;
            height: 90%;
            border-radius: 10px;
            position: relative;
            object-fit: cover;
        }
        .welcome {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
        }
        .welcome h2 {
            color: #4CAF50;
            text-align: center;
        }
        .h2 {
            text-align: center;
        }
        .welcome img {
            width: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .content {
            display: grid;
            grid-template-columns: 3fr 1fr;
            gap: 20px;
            margin-top: 0px;
        }
        .left-content {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .right-content {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        .left-content {
            text-align: justify;
        }
        .right-content h3 {
            color: #4CAF50;
        }
        .right-content ul {
            list-style-type: none;
            padding: 0;
            flex: 1;
        }
        .right-content ul li {
            padding: 10px 0;
            border-bottom: 1px solid #f4f4f4;
        }
        .right-content ul li a {
            text-decoration: none;
            color: #333;
        }
        .right-content ul li a:hover {
            color: #4CAF50;
        }
        .hidden-content {
            display: none;
        }
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        footer{
            background-color: #333;
        }
        .footerContainer{
            width: 100%;
            padding: 70px 30px 20px ;
        }
        .socialIcons{
            display: flex;
            justify-content: center;
        }
        .socialIcons a{
            text-decoration: none;
            padding:  10px;
            background-color: white;
            margin: 10px;
            border-radius: 50%;
        }
        .socialIcons a i{
            font-size: 2em;
            color: black;
            opacity: 0,9;
        }
        .socialIcons a:hover{
            background-color: #111;
            transition: 0.5s;
        }
        .socialIcons a:hover i{
            color: white;
            transition: 0.5s;
        }
        .footerNav{
            margin: 30px 0;
        }
        .footerNav ul{
            display: flex;
            justify-content: center;
            list-style-type: none;
        }
        .footerNav ul li a{
            color:white;
            margin: 20px;
            text-decoration: none;
            font-size: 1.3em;
            opacity: 0.7;
            transition: 0.5s;
        }
        .footerNav ul li a:hover{
            opacity: 1;
        }
        .footerBottom{
            background-color: #333;
            padding: 20px;
            text-align: center;
        }
        .footerBottom p{
            color: white;
        }
        .designer{
            opacity: 0.7;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 400;
            margin: 0px 5px;
        }
        @media (max-width: 700px){
            .footerNav ul{
                flex-direction: column;
            } 
            .footerNav ul li{
                width:100%;
                text-align: center;
                margin: 10px;
            }
            .socialIcons a{
                padding: 8px;
                margin: 4px;
            }
        }
        .center-green {
            text-align: center;
            color: #4CAF50;
        }
    </style>
</head>
<body>
<header>
    <img src="logonew.png" alt="Bank Sampah Logo" class="logo"> <!-- Tambahkan elemen gambar logo di sini -->
    <h1>PlastiCare</h1>
    <button onclick="redirectToAdminLogin()" class="login-btn">Login</button>
</header>

<script>
    function redirectToAdminLogin() {
        window.location.href = "beranda_login.php";
    }

    let allArticles = [];
    let displayedArticlesCount = 5;

    function displayArticles() {
        const articlesList = document.getElementById('articles-list');
        articlesList.innerHTML = '';
        const articlesToDisplay = allArticles.slice(0, displayedArticlesCount);
        articlesToDisplay.forEach(article => {
            const listItem = document.createElement('li');
            const link = document.createElement('a');
            link.href = article.url;
            link.textContent = article.title;
            listItem.appendChild(link);
            articlesList.appendChild(listItem);
        });
    }

    window.addEventListener('load', () => {
        const apiKey = 'c7f416cf84994ac6beae21f776fba89c';
        const url = `https://newsapi.org/v2/everything?q=plastic+waste&apiKey=${apiKey}`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                allArticles = data.articles;
                displayArticles();
            })
            .catch(error => console.error('Error fetching news:', error));
    });

    function showMoreArticles() {
        displayedArticlesCount += 5;
        displayArticles();
    }
</script>

<div class="container">
    <div class="sidebar" id="sidebar">
        <div class="toggle-btn" onclick="toggleSidebar()">☰</div>
        <ul>
            <li><a href="pengenalansampah.php">Informasi Pengenalan Sampah Plastik</a></li>
            <li><a href="cara_kelola_sampah.php">Cara Mengelola Sampah Plastik</a></li>
            <li><a href="login_form.php">Informasi Pengajuan penjemputan Sampah Plastik</a></li>
            <li><a href="tentang_website.php">Tentang Website</a></li>
            <li><a href="FAQ.php">FAQ</a></li>
        </ul>
    </div>
    
    <div class="main-content" id="main-content">
        <div class="banner" id="banner">
            <img src="gambar8.png" alt="Banner Image 2">
        </div>
        <div class="content">
            <div class="left-content">
                <h2 class="center-green">Sambutan Kepala Bank Sampah</h2>
                <img src="profil.jpg" alt="Foto Memberikan Sambutan" style="width: 200px; border-radius: 5px; margin: 10px auto; display: block;">
                <p>Hormat kami, para pahlawan lingkungan yang tak kenal lelah!</p>
                <div class="hidden-content" style="display: block;">
                    <p>
                        Pagi ini, dengan hati yang penuh kebanggaan dan rasa syukur yang mendalam, kami, tim Bank Sampah, berkumpul di hadapan kalian semua untuk merayakan dedikasi luar biasa yang telah kalian tunjukkan dalam upaya menjaga kebersihan lingkungan. Betapa luar biasanya momen ini, di mana kami dapat bersama-sama merayakan setiap langkah kecil yang kalian ambil dalam perjalanan menuju kelestarian lingkungan.

                        Dengan penuh rasa hormat dan terima kasih, kami ingin mengucapkan selamat kepada setiap individu yang telah berkontribusi melalui platform Plasticare. Setiap sumbangan plastik yang kalian berikan tidak hanya merupakan tindakan nyata untuk membersihkan lingkungan kita dari ancaman sampah plastik yang merusak, tetapi juga menjadi pemicu bagi gerakan yang lebih besar, yang mengajak masyarakat untuk peduli dan bertindak dalam menjaga bumi kita ini.
                    </p>
                    <p>
                        Kami menyadari bahwa setiap botol plastik, setiap kantong plastik, setiap bungkus plastik yang kalian sumbangkan merupakan simbol dari komitmen yang kuat untuk berbuat baik bagi lingkungan. Dibalik setiap sumbangan itu, terdapat cerita, semangat, dan harapan untuk masa depan yang lebih hijau bagi kita semua. Kami ingin kalian tahu bahwa setiap langkah kecil yang kalian ambil tidaklah sia-sia. Setiap tindakan kebaikan kalian menjadi batu loncatan bagi perubahan yang lebih besar.

                        Melalui Plasticare, kita tidak hanya menciptakan sebuah platform untuk menyumbangkan sampah plastik, tetapi juga sebuah komunitas yang bersatu dalam misi yang sama: menjaga kebersihan lingkungan. Kami, di Bank Sampah, berjanji untuk menjaga integritas dan transparansi dalam setiap langkah kami. Setiap sumbangan yang kalian berikan akan dikelola dengan penuh tanggung jawab, dan akan diubah menjadi sumber daya yang berharga melalui program daur ulang dan inisiatif lingkungan lainnya.
                    </p>
                    <p>
                        Kami juga ingin mengucapkan terima kasih kepada setiap relawan, donatur, dan mitra yang telah mendukung perjalanan kami. Tanpa dukungan kalian, pencapaian kita tidak akan sebesar ini. Mari terus berkolaborasi, terus menginspirasi satu sama lain, dan terus bergerak maju menuju masa depan yang lebih hijau dan berkelanjutan.

                        Terakhir, tetapi tidak kalah pentingnya, kami ingin mengucapkan terima kasih kepada setiap individu di balik layar, tim Plasticare, yang telah bekerja keras untuk menjadikan platform ini menjadi tempat yang aman, transparan, dan inspiratif bagi semua orang yang ingin berbuat baik bagi lingkungan.

                        Sekali lagi, dari lubuk hati yang paling dalam, terima kasih banyak atas kontribusi dan dedikasi kalian. Mari kita terus bersama-sama, dengan semangat yang tak kenal lelah, dalam upaya menjaga keindahan bumi kita ini.
                    </p>
                    <p>Terima kasih.</p>
                </div>
            </div>
            <div class="right-content">
                <h3>Artikel Terbaru</h3>
                <ul id="articles-list"></ul>
                <button id="load-more-button" onclick="showMoreArticles()">Lihat lebih banyak</button>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="footerContainer">
        <div class="socialIcons">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-google-plus"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></a>
        </div>
        <div class="footerNav">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">News</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact Us</a></li>
                <li><a href="">our Team</a></li>
            </ul>
        </div>
    </div>
    <div class="footerBottom">
        <p>BANK SAMPAH 2024</p>
    </div>
</footer>

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
