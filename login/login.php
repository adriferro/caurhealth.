<?php
    include 'config.php';
    session_start();

    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('¡Consulta fallida!');

        if(mysqli_num_rows($select) > 0){
            $row = mysqli_fetch_assoc($select);
            $_SESSION['user_id'] = $row['id'];
            $message[] = '¡Sesión iniciada! Serás redirigido en 2 segundos.';
            $success = true;
        }else{
            $message[] = '¡Email o contraseña incorrectos!'; 

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Inicio de sesión</h3>
            <?php
                if(isset($message)){
                    foreach($message as $msg){
                        echo '<div class="message">'.$msg.'</div>';
                    }
                }
            ?>


            <input type="email" name="email" placeholder="Introduce tu email" class="box" required>
            <input type="password" name="password" placeholder="Introduce tu contrseña" class="box" required>
            <input type="submit" name="submit" value="Iniciar sesión" class="btn">
            <p>¿No tienes cuenta? <a href="register.php">Registrarse ahora.</a></p>
        </form>
    </div>

    <?php if(isset($success) && $success === true): ?>
        <script>
            document.querySelectorAll('.box, .btn, p').forEach(function(element) {
                element.classList.add('hidden');
            });

            setTimeout(function(){
                window.location = '../index.php';
            }, 2000);
        </script>
    <?php endif; ?>
</body>
</html>