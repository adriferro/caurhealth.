<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../login/login.php");
        exit();
    }


    $connection = mysqli_connect('localhost', 'root', '', 'caurhealth');

    if (!$connection) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM articles";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Consulta fallida: " . mysqli_error($connection));
    }

    $articles = [];
    $alignment_counter = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $row['alignment_class'] = ($alignment_counter % 2 == 0) ? 'left-aligned' : 'right-aligned';
        $articles[] = $row;
        $alignment_counter++;
    }

    mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

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


    <div class="heading">
        <h1>¡A Leer!</h1>
    </div>


    <section>
        <h1 class="heading-title">Artículos de interés</h1>

        <?php foreach ($articles as $article): ?>
            <div class="article <?php echo htmlspecialchars($article['alignment_class']); ?>">
                <div class="image">
                    <?php if (!empty($article['image'])): ?>
                        <img src="../assets/articles_img/<?php echo htmlspecialchars($article['image']); ?>" alt="Imagen del artículo">
                    <?php else: ?>
                        <img src="../assets/uploaded_img/predeterminado.png" alt="Imagen predeterminada">
                    <?php endif; ?>
                </div>
                <div class="content">
                    <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                    <p><?php echo htmlspecialchars($article['summary']); ?></p>
                    <a href="<?php echo htmlspecialchars($article['link']); ?>" class="btn">Comprar</a>
                </div>
            </div>
        <?php endforeach; ?>
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