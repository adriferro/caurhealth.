<?php
    include 'config.php';

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../assets/uploaded_img/'.$image;

        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('¡Consulta fallida!');

        if(mysqli_num_rows($select) > 0){
            $message[] = '¡Este usuario ya existe!'; 
        }else{
            if($pass != $cpass){
                $message[] = '¡Las contraseñas no coinciden!';
            }elseif($image_size > 2000000){
                $message[] = '¡Tamaño de la imagen muy grande!';
            }else{
                $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('¡Consulta fallida!');

                if($insert){
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = '¡Registro exitoso!';
                    header('location:login.php');
                }else{
                    $message[] = '¡Registro fallido!';
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Registro</h3>
            <?php
                if(isset($message)){
                    foreach($message as $message){
                        echo '<div class="message">'.$message.'</div>';
                    }
                }
            ?>


            <input type="text" name="name" placeholder="Nombre de usuario" class="box" required>
            <input type="email" name="email" placeholder="Introduce tu email" class="box" required>
            <input type="password" name="password" placeholder="Introduce tu contrseña" class="box" required>
            <input type="password" name="cpassword" placeholder="Confirma tu contrseña" class="box" required>
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
            <input type="submit" name="submit" value="Registrarse" class="btn">
            <p>¿Ya tienes cuenta? <a href="login.php">Iniciar sesión.</a></p>
        </form>
    </div>
</body>
</html>