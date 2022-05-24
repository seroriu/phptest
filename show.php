<?php
    require_once 'db_connect.php';
    if(isset($_REQUEST["id"])){
        $id = $_REQUEST["id"];
        $sql = 'SELECT * FROM kikaku WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $show = $statement->fetch(PDO::FETCH_ASSOC);
        $statement = null;
        $pdo = null;
    }

    if (isset($_POST['upload'])) {//送信ボタンが押された場合
        $dsn = "mysql:host=localhost; dbname=mydb; charset=utf8";
        $username = "root";
        $password = "";
        try {
            $dbh = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
            $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
            $file = "images/$image";
            $sql = "INSERT INTO images(name) VALUES (:image)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':image', $image, PDO::PARAM_STR);
            if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
                move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $image);//imagesディレクトリにファイル保存
                if (exif_imagetype($file)) {//画像ファイルかのチェック
                    $message = '画像をアップロードしました';
                $pdo = new PDO('mysql:host=localhost; dbname=mydb; charset=utf8','root','');
                $sql = 'UPDATE kikaku SET image = :pic WHERE id = :id';
                $statement = $pdo->prepare($sql);
                $statement->bindValue(':id', $id);
                $statement->bindValue(':pic', $image);
                $statement->execute();
                header('Location: ./setting.php');
                exit;
                    $stmt->execute();
                } else {
                    $message = '画像ファイルではありません';
                }
            }


        // $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        // $id = $_REQUEST["id"];
        // $extention = '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);
        // $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
        // $file = "images/$image";
        // $sql = "INSERT INTO images(name) VALUES (:image)";
        // $stmt = $dbh->prepare($sql);
        // $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        // if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
        //     move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $image);//imagesディレクトリにファイル保存
        //     //move_uploaded_file($_FILES['image']['tmp_name'], './images/' . 'aa' . $extention);//imagesディレクトリにファイル保存
        //     if (exif_imagetype($file)) {//画像ファイルかのチェック
        //         $message = '画像をアップロードしました';
        //         $pdo = new PDO('mysql:host=localhost; dbname=mydb; charset=utf8','root','root');
        //         $sql = 'UPDATE kikaku SET image = :pic WHERE id = :id';
        //         $statement = $pdo->prepare($sql);
        //         $statement->bindValue(':id', $id);
        //         $statement->bindValue(':pic', $image);
        //         $statement->execute();
        //         header('Location: ./setting.php');
        //         exit;
        //     } else {
        //         $message = '画像ファイルではありません';
        //     }
        // }
    }


    require_once 'views/show.tpl.php';
