<?php
    require_once 'db_connect.php';
    ini_set("display_errors", 1);
    error_reporting(E_ALL);
    
    $sql = 'SELECT * FROM kikaku';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $results = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $results[] = $row;
    }
    $statement = null;
    $pdo = null;

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $dsn = "mysql:dbname=mydb;host=localhost;charset=utf8";
        $username = "root";
        $password = "";
        try {
            $dbh = new PDO('mysql:dbname=mydb;host=localhost;charset=utf8','root', '');
            //$dbh = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            $msg = $e->getMessage();
        }
        $sql = 'INSERT INTO kikaku (name,color,size) VALUES (:name,:color,:size)';
        $statement = $dbh->prepare($sql);
        $statement->bindValue(':name', $name, PDO::PARAM_STR);
        $statement->bindValue(':color', $color, PDO::PARAM_STR);
        $statement->bindValue(':size', $size, PDO::PARAM_INT);
        $statement->execute();
        header('Location: ./');
        exit;
    }



    require_once 'views/index.tpl.php';
