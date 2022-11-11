<?php
session_start();
    if(!empty($_POST['button'])){
        if(!empty($_POST['login']) && !empty($_POST['password'])){
            $ip = 'localhost';
            $database = 'stream';
            $user = 'root';
            $pass= 'root';
            $mysqli = mysqli_connect($ip, $user, $pass, $database);
            $mysqli->set_charset("utf-8");

            if (!$mysqli->connect_error){
                $login = $_POST['login'];
                $password = md5($_POST['password']);

                $info = $mysqli->query("SELECT * FROM `account` WHERE login = '$login' AND password = '$password'");

                if($info->num_rows == 1){
                    $_SESSION['user'] = $info->fetch_assoc();
                    include('form.php');
                }else{
                    echo "Неверный логин или пароль";
                }
                mysqli_close($mysqli);
            }else{
                die ('Ошибка подключения');
            }
        }else{
            echo "Введены не все данные";
        }
    }
