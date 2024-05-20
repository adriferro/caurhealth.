<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuidadores</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <section class="header">
        <a href="../index.php" class="logo">GrandCare</a>

        <nav class="navbar">
            <a href="about.php">Nosotros</a>
            <a href="articles.php">Artículos</a>
            <a href="helpers.php">Cuidadores</a>
            <a href="new.php">Nuevo cuidador</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </section>


    <div class="heading">
        <h1>¡Busca!</h1>
    </div>

    <section class="helpers">
        <h1 class="heading-title">Cuidadores</h1>

        <div class="box-container">
            <div class="box">
                <div class="image">
                    <img src="../assets/img/seguridad.png " alt="">
                </div>
                <div class="content">
                    <h3>Priscila Marín</h3>
                    <button onclick="showMore()" class="btn">Ver</button>

                    <dialog id="show-dialog" class="dialog">
                        <h3>Informe detallado</h3>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex, modi.</p>
                        <button onclick="cancelShow()" class="btn">Cerrar</button>
                    </dialog>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="../assets/img/seguridad.png " alt="">
                </div>
                <div class="content">
                    <h3>Rubén Lobo</h3>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="../assets/img/seguridad.png " alt="">
                </div>
                <div class="content">
                    <h3>Alfonso Méndez</h3>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="../assets/img/seguridad.png " alt="">
                </div>
                <div class="content">
                    <h3>Lucas Alonso</h3>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="../assets/img/seguridad.png " alt="">
                </div>
                <div class="content">
                    <h3>Sergio González</h3>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="../assets/img/seguridad.png " alt="">
                </div>
                <div class="content">
                    <h3>Eva Blanco</h3>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="../assets/img/seguridad.png " alt="">
                </div>
                <div class="content">
                    <h3>Ana Montero</h3>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="../assets/img/seguridad.png " alt="">
                </div>
                <div class="content">
                    <h3>Laura Matamoros</h3>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>
            
            <div class="box">
                <div class="image">
                    <img src="../assets/img/seguridad.png " alt="">
                </div>
                <div class="content">
                    <h3>Francisco Herrero</h3>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>
            
            <div class="box">
                <div class="image">
                    <img src="../assets/img/seguridad.png " alt="">
                </div>
                <div class="content">
                    <h3>Cristina Pedroche</h3>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="../assets/img/seguridad.png " alt="">
                </div>
                <div class="content">
                    <h3>Maikel Dela</h3>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="../assets/img/seguridad.png " alt="">
                </div>
                <div class="content">
                    <h3>Fernando Santos</h3>
                    <a href="#" class="btn">Ver</a>
                </div>
            </div>
        </div>

        <div class="load-more">
            <span class="btn">Cargar más</span>
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
    <script src="../scripts/main.js"></script>
</body>
</html>