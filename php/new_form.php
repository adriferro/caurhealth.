<?php
    $connection = mysqli_connect('localhost', 'root', '', 'new_db');

    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $intern = $_POST['intern'];
        $birth = $_POST['birth'];

        $request = "insert into new_form(name, surname, email, phone, intern, birth) values ('$name','$surname','$email','$phone','$intern','$birth')";

        mysqli_query($connection, $request);

        header('location:new.html');
    }else{
        echo 'Error de solicitud. Por favor, intente de nuevo.';
    }
?>