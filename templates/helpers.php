<?php
    $connection = mysqli_connect('localhost', 'root', '', 'new_db');

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM new_form";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    $helpers = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $helpers[] = $row;
    }

    mysqli_close($connection);
?>


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
        <a href="../index.html" class="logo">caurhealth.</a>

        <nav class="navbar">
            <a href="about.html">Nosotros</a>
            <a href="articles.html">Artículos</a>
            <a href="helpers.html">Cuidadores</a>
            <a href="new.html">Nuevo cuidador</a>
        </nav>

        <div id="menu-btn" class="fas fa-bars"></div>
    </section>


    <div class="heading" style="background: url(../assets/background/articles-bg.jpg) no-repeat">
        <h1>¡Busca!</h1>
    </div>

    <section class="helpers">
        <h1 class="heading-title">Cuidadores</h1>

        <div class="box-container">
            <?php foreach ($helpers as $index => $helper): ?>
                <div class="box">
                    <div class="image">
                        <?php if ($helper['verified'] == 1): ?>
                            <img src="../assets/img/verificado.png" alt="Verificado">
                        <?php else: ?>
                            <img src="../assets/img/no-verificado.png" alt="No Verificado">
                        <?php endif; ?>
                    </div>
                    <div class="content">
                        <h3><?php echo htmlspecialchars($helper['name'] . ' ' . $helper['surname']); ?></h3>
                        <button class="btn show-more" id="show-button-<?php echo $index; ?>" data-dialog-id="<?php echo 'dialog-' . $index; ?>">Ver</button>

                        <dialog id="<?php echo 'dialog-' . $index; ?>" class="dialog">
                            <h3>Informe detallado</h3>
                                <p>Nombre: <?php echo htmlspecialchars($helper['name']); ?></p>
                                <p>Apellido: <?php echo htmlspecialchars($helper['surname']); ?></p>
                                <p>Email: <?php echo htmlspecialchars($helper['email']); ?></p>
                                <p>Teléfono: <?php echo htmlspecialchars($helper['phone']); ?></p>
                                <p>Interno: <?php echo htmlspecialchars($helper['intern']); ?></p>
                                <p>Fecha de nacimiento: <?php echo htmlspecialchars($helper['birth']); ?></p>
                                <button class="btn cancel-show" data-dialog-id="<?php echo 'dialog-' . $index; ?>">Cerrar</button>
                        </dialog>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="load-more">
            <span class="btn">Cargar más</span>
        </div>
    </section>



    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Links Rápidos</h3>
                <a href="about.html"><i class="fa-solid fa-angle-right"></i> Nosotros</a>
                <a href="articles.html"><i class="fa-solid fa-angle-right"></i> Artículos</a>
                <a href="helpers.html"><i class="fa-solid fa-angle-right"></i> Cuidadores</a>
                <a href="new.html"><i class="fa-solid fa-angle-right"></i> Nuevo cuidador</a>
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
    <script type="module" src="../scripts/main.js"></script>
</body>
</html>