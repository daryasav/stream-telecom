<?php
    session_start();
    include('form.php');

    if(!empty($_POST['link']))
    {
        $ip = 'localhost';
        $database = 'stream';
        $user = 'root';
        $password = 'root';
        $mysqli = mysqli_connect($ip, $user, $password, $database);

        $chars = "123456789bcdfghjkmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ";

        if(!$mysqli->connect_error) {
            $mysqli->set_charset('UTF-8');
            $link = $_POST['link'];

            if (!isset($_SESSION['user'])){
                $user_id = null;
            }else{
                $user_id = $_SESSION['user']['id'];
            }

            $length = strlen($link);
            if ($length < 10) {
                echo "Длина ссылки мала";
            }
            $rand = substr(str_shuffle($chars), 0, 5);
            $code = 'https://link/'. $rand;

            $info = $mysqli->query("SELECT * FROM `links` WHERE old_link = '$link'");
            if($info->num_rows > 0){
                $res = $info->fetch_assoc();
                $id = $res['id'];
                echo "<h2 align='center'><a target='_ blank' data-id='". $id ."' href='". $link ."'>" . $res['new_link'] . "</a></h2>";
            }else{
                $mysqli->query("INSERT INTO `links` VALUES (NULL, '$link',' $code', '$user_id')");
                $id = $mysqli->insert_id;
                echo "<h2 align='center'><a target='_ blank' data-id='". $id ."' href='". $link ."'>" . $code . "</a></h2>";
            }
            mysqli_close($mysqli);
        }else{
            die('Connection error');
        }
    }