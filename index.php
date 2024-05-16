<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <link rel="stylesheet" href="styles/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <section class="header">
        <a href="index.php" class="logo">GrandCare</a>

        <nav class="navbar">
            <a href="templates/about.php">Nosotros</a>
            <a href="templates/articles.php">Artículos</a>
            <a href="templates/helpers.php">Cuidadores</a>
            <a href="templates/new.php">Nuevo cuidador</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </section>


    <section class="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide" style="background:url(assets/img/compromiso.png) no-repeat">
                    <div class="content">
                        <span>DESCUBRE</span>
                        <h3>¡Descubre nuevos cuidadores!</h3>
                        <a href="templates/helpers.php" class="btn">Ver más</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background:url(assets/img/confianza.png) no-repeat">
                    <div class="content">
                        <span>CONTACTA</span>
                        <h3>¡Contacta sin compromiso!</h3>
                        <a href="templates/helpers.php" class="btn">Ver más</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background:url(assets/img/seguridad.png) no-repeat">
                    <div class="content">
                        <span>AYUDA</span>
                        <h3>¡Ayuda a tu ser querido!</h3>
                        <a href="templates/helpers.php" class="btn">Ver más</a>
                    </div>
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>


    <section class="principles">
        <h1 class="heading-title"> Nuestros principios </h1>
        <div class="box-container">
            <div class="box">
                <img src="assets/img/compromiso.png" alt="">
                <h3>Compromiso</h3>
            </div>
            <div class="box">
                <img src="assets/img/seguridad.png" alt="">
                <h3>Seguridad</h3>
            </div>
            <div class="box">
                <img src="" alt="3">
                <h3>Entrega</h3>
            </div>
            <div class="box">
                <img src="assets/img/motivacion.png" alt="">
                <h3>Motivación</h3>
            </div>
            <div class="box">
                <img src="" alt="6">
                <h3>https://storyset.com/</h3>
            </div>
            <div class="box">
                <img src="assets/img/confianza.png" alt="">
                <h3>Confianza</h3>
            </div>
        </div>
    </section>




    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Links Rápidos</h3>
                <a href="templates/about.php"><i class="fa-solid fa-angle-right"></i> Nosotros</a>
                <a href="templates/articles.php"><i class="fa-solid fa-angle-right"></i> Artículos</a>
                <a href="templates/helpers.php"><i class="fa-solid fa-angle-right"></i> Cuidadores</a>
                <a href="templates/new.php"><i class="fa-solid fa-angle-right"></i> Nuevo cuidador</a>
            </div>

            <div class="box">
                <h3>Links Extras</h3>
                <a href="#"><i class="fa-solid fa-angle-right"></i> Dudas / Sugerencias</a>
                <a href="#"><i class="fa-solid fa-angle-right"></i> Regulación </a>
                <a href="#"><i class="fa-solid fa-angle-right"></i> Política de privacidad</a>
                <a href="#"><i class="fa-solid fa-angle-right"></i> Términos de uso</a>
            </div>
            
            <div class="box">
                <h3>Contacto</h3>
                <a href="#"><i class="fa-solid fa-phone"></i> 999 999 999 </a>
                <a href="#"><i class="fa-solid fa-envelope"></i> grandcare@gmail.com </a>
                <a href="#"><i class="fab fa-facebook-f"></i> grandcare </a>
                <a href="#"><i class="fab fa-instagram"></i> grandcare </a>
            </div>
        </div>

        <div class="credit"> Creado por <span>Adrián Fernández</span> | ¡Todos los derechos reservados! </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="scripts/main.js"></script>
</body>
</html>