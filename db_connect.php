<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ALL);
$pdo = new PDO('mysql:host=localhost; dbname=mydb; charset=utf8','root','');


// if(isset($_SESSION['id'])) {
//     $user_id = $_SESSION['id'];
//     //ユーザーの取得
//     $sql = 'SELECT * FROM users WHERE id = :id';
//     //$sql = 'SELECT * FROM users LEFT JOIN follow ON follow.follower = users.id WHERE users.id = :id';
//     $statement = $pdo->prepare($sql);
//     $statement->bindValue(':id', $user_id);
//     $statement->execute();
//     $user = $statement->fetch(PDO::FETCH_ASSOC);
//     $sql = 'SELECT * FROM follow LEFT JOIN users ON follow.followed = users.id WHERE follower = :id';
//     $statement = $pdo->prepare($sql);
//     $statement->bindValue(':id', $user_id, PDO::PARAM_INT);
//     $statement->execute();
//     $following = [];
//     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
//         $following[] = $row;
//     }
//     $sql = 'SELECT * FROM faves LEFT JOIN users ON faves.faved = users.id WHERE fave = :id';
//     $statement = $pdo->prepare($sql);
//     $statement->bindValue(':id', $user_id, PDO::PARAM_INT);
//     $statement->execute();
//     $faving = [];
//     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
//         $faving[] = $row;
//     }
// }

