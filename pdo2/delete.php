
<?php

    $connection = new PDO("mysql:host=localhost;dbname=site", 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   /* $data = [
        'id' => $_GET['id']
    ];*/
    //$id = $_GET['id'];
   /* $delq = "DELETE FROM users WHERE id=:id";
    $delq->bindValue(':id' , $_GET['id']);
    $connection->exec($delq);
    echo "کاربر حذف شد";*/

    $count=$connection->prepare("DELETE FROM contacs WHERE id=:id");
    $count->bindValue(":id",$_GET['id']);
    $count->execute();
    echo "کاربر حذف شد";
         ?>
         <br>
         <a href="main.php">برگشت به صفحه اصلی </a>