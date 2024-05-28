<?php
    include 'config.php';
    session_start();
    $user_id = $_SESSION['user_id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar perfil</title>

    <link rel="stylesheet" href="../../styles/login.css">

</head>
<body>
    <div class="update-profile">
        <?php
            $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('¡Consulta fallida!');
            if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
            }        
            if($fetch['image'] == ''){
                echo '<img src="../../assets/uploaded_img/predeterminado.png">';
            }else{
                echo '<img src="../../assets/uploaded_img/'.$fetch['image'].'">';
            }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="flex">
                <div class="inputBox">
                    <span>Nombre de usuario:</span>
                    <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">

                    <span>Tu email:</span>
                    <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">

                    <span>Edita tu foto:</span>
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                </div>

                <div class="inputBox">
                    <input type="hidden" name="old_password" value="<?php echo $fetch['password']; ?>">

                    <span>Antigua contraseña :</span>
                    <input type="password" name="update_password" placeholder="Introduce contraseña previa" class="box">

                    <span>Nueva contraseña :</span>
                    <input type="password" name="new_password" placeholder="Introduce nueva contraseña" class="box">

                    <span>Confirmar contraseña :</span>
                    <input type="password" name="confirm_password" placeholder="Confirmar nueva contraseña" class="box">
                </div>
            </div>

            <input type="submit" value="Editar perfil" name="update_profile" class="btn">
            <a href="profile.php" class="delete-btn">Atrás</a>
        </form>
    </div>
</body>
</html>