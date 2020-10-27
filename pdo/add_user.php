<?php
/*try{*/
      $connection = new PDO("mysql:host=localhost;dbname=site", 'root', '');
       $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*
      $data = [
              'name' => $_POST['name'],
              'username' => $_POST['username'],
               'password' => $_POST['password'],
              ];[$_POST['name'], $_POST['username'], $_POST['password']

      $sql = "INSERT INTO users (name, username, password) VALUES (:name, :username, :password)";

      $stmt= $connection->prepare($sql);

    $stmt->execute($data);
}catch{
  echo asghar;
}*/
if(isset($_POST['name'], $_POST['username'], $_POST['password'])){
    $sql = "INSERT INTO users (name, username, password) VALUES (?,?,?)";
    $stmt= $connection->prepare($sql);
    $stmt->execute([$_POST['name'], $_POST['username'], $_POST['password']]);
}




?>

<form action = "" method ="POST">
    <fieldset>
        <legend>اضافه کردن</legend>
        <br><br>
        <label>نام :</label>
        <input type="text" name="name" value="">
    </div> <br><br>
    <div>
        <label>نام کاربری :</label>
        <input type="text" name="username" value="">
        <br><br>
        رمز:<input type="text" name="password" value="">
        <br><br>
        <input type="submit" value="اضافه کردن">
</fieldset>
<a href="index.php">برگشت به صفحه اصلی </a>
</form>
