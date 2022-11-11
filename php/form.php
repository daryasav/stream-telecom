<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stream Telecom</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/script.js"></script>
    <style>
        .menu{
            margin: 20px;
        }
        .all{
            text-align: center;
            margin-top: 70px;
        }
        .input-text{
            margin-top: 30px;
            width: 360px;
            background: #fff;
            font: inherit;
            box-shadow: 0 2px 10px 0 rgba(0, 0, 0 , .3);
            border: 0;
            outline: 0;
            padding: 22px 18px;
        }
        .button{
            margin-top: 50px;
            width: 200px;
            height: 40px;
        }
    </style>
</head>
<body>
    <div class="menu">
        <?php
        if (!isset($_SESSION['user'])){
            echo '<h4><a href="/html/autorization.html">Авторизация </a> / <a href="/html/reg.html"> Регистрация</a></h4>';
        }else{
            echo "<h4><a href='/php/logout.php'>Выход</a><h5>";
        }
        ?>
    </div>
    <div class="all">
        <h1>Короткая ссылка</h1>
        <form method="post" name="form" action="link.php">
            <input class="input-text" type="text" name="link" placeholder="http://site.ru"><br>
            <input type="submit" class="button" value="Сгенерировать">
        </form>
    </div>
</body>
</html>