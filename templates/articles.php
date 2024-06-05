<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <section class="header">
        <a href="../index.php" class="logo">caurhealth.</a>

        <nav class="navbar">
            <a href="about.php">Nosotros</a>
            <a href="articles.php">Artículos</a>
            <a href="helpers.php">Cuidadores</a>
            <a href="new.php">Nuevo cuidador</a>
            <a href="../login/profile.php">Mi perfil</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </section>


    <div class="heading" style="background: url(../assets/background/articles-bg.jpg) no-repeat">
        <h1>¡A Leer!</h1>
    </div>


    <section>
        <h1 class="heading-title">Artículos de interés</h1>

        <div class="article">
            <div class="image">
                <img src="../assets/img/seguridad.png" alt="">
            </div>
    
            <div class="content">
                <h3>Libro Libro Libro</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores suscipit pariatur ducimus accusamus omnis magnam quae cumque voluptas sed voluptates repellat nisi laboriosam nihil excepturi, commodi, hic voluptatibus quia ipsum.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente expedita veritatis possimus temporibus voluptatum mollitia iste exercitationem dolorem asperiores quis.</p>
    
                <a href="#" class="btn">Leer</a>
            </div>
        </div>

        <div class="article">
            <div class="image">
                <img src="../assets/img/seguridad.png" alt="">
            </div>
    
            <div class="content">
                <h3>Libro Libro Libro</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores suscipit pariatur ducimus accusamus omnis magnam quae cumque voluptas sed voluptates repellat nisi laboriosam nihil excepturi, commodi, hic voluptatibus quia ipsum.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente expedita veritatis possimus temporibus voluptatum mollitia iste exercitationem dolorem asperiores quis.</p>
    
                <a href="#" class="btn">Leer</a>
            </div>
        </div>

        <div class="about">
            <div class="image">
                <img src="../assets/img/seguridad.png" alt="">
            </div>
    
            <div class="content">
                <h3>Libro Libro Libro</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores suscipit pariatur ducimus accusamus omnis magnam quae cumque voluptas sed voluptates repellat nisi laboriosam nihil excepturi, commodi, hic voluptatibus quia ipsum.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente expedita veritatis possimus temporibus voluptatum mollitia iste exercitationem dolorem asperiores quis.</p>
    
                <a href="#" class="btn">Leer</a>
            </div>
        </div>
    </section>




    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Links Rápidos</h3>
                <a href="about.php"><i class="fa-solid fa-angle-right"></i> Nosotros</a>
                <a href="articles.php"><i class="fa-solid fa-angle-right"></i> Artículos</a>
                <a href="helpers.php"><i class="fa-solid fa-angle-right"></i> Cuidadores</a>
                <a href="new.php"><i class="fa-solid fa-angle-right"></i> Nuevo cuidador</a>
            </div>

            <div class="box">
                <h3>Links Extras</h3>
                <a href="../login/profile.php"><i class="fa-solid fa-angle-right"></i> Mi perfil</a>
                <a href="#"><i class="fa-solid fa-angle-right"></i> Regulación </a>
                <a href="#"><i class="fa-solid fa-angle-right"></i> Política de privacidad</a>
                <a href="#"><i class="fa-solid fa-angle-right"></i> Términos de uso</a>
            </div>
            
            <div class="box">
                <h3>Contacto</h3>
                <a href="#"><i class="fa-solid fa-phone"></i> 999 999 999 </a>
                <a href="#"><i class="fa-solid fa-envelope"></i> caurhealth@gmail.com </a>
                <a href="#"><i class="fab fa-facebook-f"></i> caurhealth </a>
                <a href="#"><i class="fab fa-instagram"></i> caurhealth </a>
            </div>
        </div>

        <div class="credit"> Creado por <span>Adrián Fernández</span> | ¡Todos los derechos reservados! </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="module" src="../scripts/main.js"></script>
</body>
</html>