<?php
    $ip = 'localhost';
    $database = 'stream';
    $user = 'root';
    $password = 'root';
    $mysqli = mysqli_connect($ip, $user, $password, $database);

    if(!$mysqli->connect_error) {
        $mysqli->set_charset('UTF-8');

        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i:s');
        $browser = get_browser(null, true);
        $agent = $browser['parent'];
        $link = $_POST['id'];

        $mysqli->query("INSERT INTO `user` VALUES (NULL, '$ip',' $date', '$agent', '$link')");

        mysqli_close($mysqli);
    }
