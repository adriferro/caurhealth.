<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Únete</title>

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
        <h1>¡Únete!</h1>
    </div>


    <section class="join">
        <h1 class="heading-title">¡Anúnciate con nosotros!</h1>

        <form action="" method="post" class="">
            <div class="flex">
                <div class="inputBox">
                    <span>Nombre :</span>
                    <input type="text" placeholder="Introduce tu nombre" name="name">
                </div>

                <div class="inputBox">
                    <span>Apellido :</span>
                    <input type="text" placeholder="Introduce tu apellido" name="surname">
                </div>
                
                <div class="inputBox">
                    <span>Email :</span>
                    <input type="email" placeholder="Introduce tu email" name="email">
                </div>

                <div class="inputBox">
                    <span>Teléfono :</span>
                    <input type="number" placeholder="Introduce tu nº teléfono" name="phone">
                </div>

                <div class="inputBox">
                    <span>Fecha de nacimiento :</span>
                    <input type="date" placeholder="Introduce tu fecha de nacimiento" name="birth">
                </div>

                <div class="inputBox">
                    <span>Disponible interno :</span>
                    <input type="text" placeholder="Sí / No" name="intern">
                </div>
            </div>

            <input type="submit" value="submit" class="btn">
        </form>
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