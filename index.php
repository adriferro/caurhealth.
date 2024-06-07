<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login/login.php");
        exit();
    }

    $connection = mysqli_connect('localhost', 'root', '', 'caurhealth');

    if (!$connection) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    // Obtener los tres cuidadores con los ID más bajos
    $sql = "SELECT id, name, surname, image FROM new_form ORDER BY id ASC LIMIT 3";
    $result = mysqli_query($connection, $sql);

    $cuidadores = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cuidadores[] = $row;
        }
    }

    mysqli_close($connection);
?>


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
        <a href="index.php" class="logo">caurhealth.</a>

        <nav class="navbar">
            <a href="templates/about.php">Nosotros</a>
            <a href="templates/articles.php">Artículos</a>
            <a href="templates/helpers.php">Cuidadores</a>
            <a href="templates/new.php">Nuevo cuidador</a>
            <a href="login/profile.php">Mi perfil</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </section>


    <section class="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide" style="background:url(assets/img/descubrir.jpg) no-repeat">
                    <div class="content">
                        <span>¡DESCUBRE!</span>
                        <h3>¡Descubre nuevos cuidadores!</h3>
                        <a href="templates/helpers.php" class="btn">Ver más</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background:url(assets/img/leer.jpg) no-repeat">
                    <div class="content">
                        <span>¡INFÓRMATE!</span>
                        <h3>¡Lee y aprende!</h3>
                        <a href="templates/articles.php" class="btn">Ver más</a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background:url(assets/img/unir.jpg) no-repeat">
                    <div class="content">
                        <span>¡ÚNETE!</span>
                        <h3>¡Únete a nosotros!</h3>
                        <a href="templates/new.php" class="btn">Ver más</a>
                    </div>
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
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
                <img src="assets/img/calidad.png" alt="">
                <h3>Calidad</h3>
            </div>
            <div class="box">
                <img src="assets/img/motivacion.png" alt="">
                <h3>Motivación</h3>
            </div>
            <div class="box">
                <img src="assets/img/igualdad.png" alt="">
                <h3>Igualdad</h3>
            </div>
            <div class="box">
                <img src="assets/img/confianza.png" alt="">
                <h3>Confianza</h3>
            </div>
        </div>
    </section>


    <section class="home-about">
        <div class="image">
            <img src="assets/img/inicio.png" alt="">
        </div>

        <div class="content">
            <h3>¿Dónde empieza todo?</h3>
            <p>Decidí crear una página web de cuidadores de ancianos después de experimentar personalmente las dificultades que enfrentó mi familia al buscar un cuidador para mi bisabuelo. Durante ese tiempo, nos dimos cuenta de que encontrar el cuidador adecuado para nuestras necesidades específicas era un proceso complicado y desafiante.</p>
            <a href="templates/about.php" class="btn">¡Leer Más!</a>
        </div>
    </section>


    <section class="home-helpers">
        <h1 class="heading-title">Cuidadores más antiguos</h1>

        <div class="box-container">
            <?php foreach ($cuidadores as $cuidador) { ?>
                <div class="box">
                    <div class="image">
                        <?php if (!empty($cuidador['image'])): ?>
                            <img src="assets/helpers_img/<?php echo htmlspecialchars($cuidador['image']); ?>" alt="">
                        <?php else: ?>
                            <img src="assets/uploaded:img/default.png" alt="No image available">
                        <?php endif; ?>
                    </div>
                    <div class="content">
                        <h3><?php echo htmlspecialchars($cuidador['name'] . ' ' . $cuidador['surname']); ?></h3>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="load-more"><a href="templates/helpers.php" class="btn">Cargar más</a></div>
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
                <a href="login/profile.php"><i class="fa-solid fa-angle-right"></i> Mi perfil</a>
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
    <script type="module" src="scripts/main.js"></script>
</body>
</html>