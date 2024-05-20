<?php
    $connection = mysqli_connect('localhost', 'root', '', 'new_db');

    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $intern = $_POST['intern'];
        $birth = $_POST['birth'];
    }
?>