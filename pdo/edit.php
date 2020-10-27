<html>
    <head>
        <style>
            html{
                direction :rtl;
            }
        </style>
    </head>
    
<?php

try{
    $connection = new PDO("mysql:host=localhost;dbname=site", 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_GET['id'])){
    $query = $connection->prepare(
        "SELECT * FROM users where id = :id"
    );
    $query->bindValue(':id', $_GET['id']);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

   if($user === false){
       // set session error : کاربر یافت نشد
       header('Location: 404.php');
       die();
   }
}else{}

        
            if(isset($_POST['name'])&& isset($_POST['username']) && isset($_POST['password'])){
                $data = [
                    'name' => $_POST['name'],
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                ];
              $id = $_POST['id'];
                $sql = "UPDATE users SET name=:name, username=:username, password=:password WHERE id=$id";
      
             $stmt= $connection->prepare($sql);
              $stmt->execute($data);
              header('Location: index.php');
              die();
    }
}catch(PDOException $e){
    echo 'با مدیریت تماس بگیرید';
    echo $e->getMessage();
}

?>
<form action = "" method ="POST">
    <fieldset>
        <legend>ویرایش</legend>
        شناسه:
        <input type="text" name="id" value="<?php echo $user['id']?>">
        <br><br>
        <label>نام :</label>
        <input type="text" name="name" value="<?php echo $user['name']?>">
    </div> <br><br>
    <div>
        <label>نام کاربری :</label>
        <input type="text" name="username" value="<?php echo$user['username']?>">
        <br><br>
        رمز:<input type="text" name="password" value="<?php echo$user['password']?>">
        <br><br>
        <input type="submit" value=" ویرایش کردن ">
</fieldset>
</form>
