<?php
    include 'config.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['update_profile'])){
        $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
        $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

        mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('¡Consulta fallida!');

        $old_pass = $_POST['old_password'];
        $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_password']));
        $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_password']));
        $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));

        if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
            if($update_pass != $old_pass){
                $message[] = '¡Contraseña antigua incorrecta!';
            }elseif($new_pass != $confirm_pass){
                $message[] = '¡Contraseña de confirmación incorrecta!';
            }else{
                mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('¡Consulta fallida!');
                $message[] = '¡Contraseña editada correctamente!';
            }
        }

    }
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
            ?>

        <form action="" method="post" enctype="multipart/form-data">
            <?php
                if($fetch['image'] == ''){
                    echo '<img src="../../assets/uploaded_img/predeterminado.png">';
                }else{
                    echo '<img src="../../assets/uploaded_img/'.$fetch['image'].'">';
                }
                if(isset($message)){
                    foreach($message as $message){
                       echo '<div class="message">'.$message.'</div>';
                    }
                }
            ?>
            
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

            <input type="submit" value="Editar" name="update_profile" class="btn">
            <a href="profile.php" class="delete-btn">Atrás</a>
        </form>
    </div>
</body>
</html>