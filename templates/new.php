<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}


    $connection = mysqli_connect('localhost', 'root', '', 'caurhealth');

    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $intern = $_POST['intern'];
        $birth = $_POST['birth'];
        $verified = 0;

        $check_query = "SELECT * FROM new_form WHERE email = '$email' OR phone = '$phone'";
        $check_result = mysqli_query($connection, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $message = '¡Ya existe un cuidador con el mismo email o teléfono!';
        } else {
            $request = "INSERT INTO new_form (name, surname, email, phone, intern, birth, verified) VALUES ('$name','$surname','$email','$phone','$intern','$birth', '$verified')";
            
            if (mysqli_query($connection, $request)) {
                header('Location: helpers.php');
                exit();
            } else {
                $message = 'Error de solicitud. Por favor, intente de nuevo.';
            }
        }
    }
?>


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
        <h1>¡Únete!</h1>
    </div>


    <section class="join">
        <h1 class="heading-title">¡Anúnciate con nosotros!</h1>
        <?php
            if (!empty($message)) {
                echo '<div class="message">'.$message.'</div>';
            }
        ?>

        <form action="new.php" method="post" class="new-form">
            <div class="flex">
                <div class="inputBox">
                    <span>Nombre :</span>
                    <input type="text" placeholder="Introduce tu nombre" name="name" required>
                </div>

                <div class="inputBox">
                    <span>Apellido :</span>
                    <input type="text" placeholder="Introduce tu apellido" name="surname" required>
                </div>
                
                <div class="inputBox">
                    <span>Email :</span>
                    <input type="email" placeholder="Introduce tu email" name="email" required>
                </div>

                <div class="inputBox">
                    <span>Teléfono :</span>
                    <input type="number" placeholder="Introduce tu nº teléfono" name="phone" required>
                </div>

                <div class="inputBox">
                    <span>Disponible interno :</span>
                    <input type="text" placeholder="Sí / No" name="intern" required>
                </div>

                <div class="inputBox">
                    <span>Fecha de nacimiento :</span>
                    <input type="date" placeholder="Introduce tu fecha de nacimiento" name="birth" required>
                </div>
            </div>

            <input type="submit" value="Enviar" class="btn" name="send">
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
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script type="module" src="../scripts/main.js"></script>
</body>
</html>