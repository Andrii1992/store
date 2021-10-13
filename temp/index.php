<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <?php

    $db  = new PDO('mysql:host=localhost;dbname=db_lesson_security_php', 'root', '');
    $db->exec("SET NAMES UTF8");

    if (count($_POST) > 0) { // count dla tego że isset nie zadziała bo post set zawsze
        //  $name = htmlspecialchars(trim($_POST['name'])); // trim obcina spacje z lewa i prawa
        //  $text = htmlspecialchars(trim($_POST['text'])); // htmlspecialchars funkcja zamienia zanki 
        $name = strip_tags(trim($_POST['name'])); // trim obcina spacje z lewa i prawa
        $text = strip_tags(trim($_POST['text'])); // strip_tags funkcja wycina tagi lepiej używać htmlspecialchars
        /*
        mysqli_escape_string()
        mysqli_real_escape_string()
        */
        //  ->quote; -- nie wyjdzie z cuzyslowa

        if ($name != '' && $text != '') {

            //  $query = $db->prepare("INSERT INTO comments SET name='$name', text='$text'");
            //  $query = $db->prepare("INSERT INTO comments SET name='$name', text='$text 1', is_moderate=1'");

            $query = $db->prepare("INSERT INTO comments SET name=:name, text=:text"); // poprawne wstawianie wartości
            $params = ['name' => $name, 'text' => $text]; // wtedy funkcja ekranuje czyli dopisuje \' \" ztakimi znakami 
            $query->execute($params);                     // [ tam jakby  mysqli_escape_string() jest wbudowana ]

            header("Location: index.php");
            exit();
        }
    }

    // $query = $db->prepare("SELECT * FROM comments WHERE is_moderate='1' ORDER BY dt DESC");
    $query = $db->prepare("SELECT * FROM comments ORDER BY dt DESC");
    $query->execute();
    $comments = $query->fetchAll(); // konwertuje wszystko w jako tablice

    ?>

    <div class="container">
        <form method="post" class="form-group">
            Name <br>
            <input class="form-control" type="text" name="name" value="<?php /* echo $name; */ ?>"> <br>
            Comment <br>
            <textarea class="form-control" name="text" cols="30" rows="10"> <?php /* echo $text; */ ?> </textarea> <br>
            <input class="btn btn-secondary" type="submit" value="Send">
        </form>

        <div>
            <?php foreach ($comments as $comment) : ?>
                <div class="media">
                    <div class="media-body">
                        <span class="badge badge-pill badge-info"><?= $comment['dt']; ?></span>
                        <h5> <?= $comment['name']; ?> </h5>
                        <p> <?= $comment['text']; ?> </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
-->
</body>

</html>