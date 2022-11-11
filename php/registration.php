<?php
    if(!empty($_POST['kno'])){
        if(!empty($_POST['login']) && !empty($_POST['password'])){

            $ip = 'localhost';
            $database = 'stream';
            $user = 'root';
            $password = 'root';
            $mysqli = mysqli_connect($ip, $user, $password, $database);

            if (!$mysqli -> connect_error){

                $mysqli -> set_charset("utf-8");
                $login = $_POST['login'];
                $password = md5($_POST['password']);
                $name = $_POST['name'];
                $lastname = $_POST['lastname'];

                $mysqli -> query("INSERT INTO `account` VALUES (NULL, '$login','$password', '$name', '$lastname')");
                include('../html/autorization.html');
                mysqli_close($mysqli);
            }else{
                die ('Ошибка подключения');
            }
        }else{
            echo "Введены не все данные";
        }
    }
    
?>