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
            
        </form>
    </div>
</body>
</html>