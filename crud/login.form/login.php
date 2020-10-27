<?php

session_start();


try {
    $connection = new PDO ("mysql:host=localhost;dbname=classphp",'root','');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $connection->prepare("SELECT * FROM users where password = :password and username = :username");
    $query->bindValue(':username' , $_POST['username']);
    $query->bindValue(':password' , $_POST['password']);
    $query->execute();
    $x = $query->fetch(PDO::FETCH_ASSOC);

} catch (PDOExcepti $e) {
    echo 'کاربر یافت نشد';
    echo $e->getMessage();
};


if ($x !=null){
    header("location: login.view.html");
}

