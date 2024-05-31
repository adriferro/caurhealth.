<?php
    $connection = mysqli_connect('localhost', 'root', '', 'new_db');

    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $intern = $_POST['intern'];
        $birth = $_POST['birth'];
        $verified = 0;

        $request = "INSERT INTO new_form (name, surname, email, phone, intern, birth, verified) VALUES ('$name','$surname','$email','$phone','$intern','$birth', '$verified')";

        mysqli_query($connection, $request);

        header('location:../templates/new.html');
    }else{
        echo 'Error de solicitud. Por favor, intente de nuevo.';
    }
?>