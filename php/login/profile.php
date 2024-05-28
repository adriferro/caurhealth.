<?php
    include 'config.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location:login.php');
    };

    if(isset($_GET['logout'])){
        unset($user_id);
        session_destroy();
        header('location:login.php');
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <link rel="stylesheet" href="../../styles/login.css">
</head>
<body>
    <div class="container">
        <div class="profile">
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
            <h3>
                <?php
                    echo $fetch['name'];
                ?>
            </h3>
            <a href="update_profile.php" class="btn">Editar el perfil</a>
            <a href="profile.php?logout=<?php echo $user_id; ?>" class="delete-btn">Cerrar sesión</a>
            <p>Nuevo <a href="login.php">inicio de sesión</a> o nuevo <a href="register.php">registro</a></p>
        </div>
    </div>
</body>
</html>