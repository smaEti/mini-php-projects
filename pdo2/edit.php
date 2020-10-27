
<?php
    session_start();
try{
    $connection = new PDO("mysql:host=localhost;dbname=site", 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_GET['id'])){
    $query = $connection->prepare(
        "SELECT * FROM contacs where id = :id"
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

        
            if(isset($_POST['name'])&& isset($_POST['phone']) && isset($_POST['addres'])){
                $data = [
                    'id' => $_POST['id'],
                    'name' => $_POST['name'],
                    'phone' => $_POST['phone'],
                    'addres' => $_POST['addres'],
                ];
                $sql = "UPDATE contacs SET name=:name, phone=:phone, addres=:addres WHERE id=:id";
                $stmt= $connection->prepare($sql);
                // $stmt->bindValue(':id' , $_POST['id'] );
                $stmt->execute($data);
                header('Location: main.php');
                die();
            }
}catch(PDOException $e){
    echo 'با مدیریت تماس بگیرید';
    echo $e->getMessage();
}

?>
<html>
<head>
    <style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

<meta name="viewport" content="width=device-width, initial-scale=1">
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="main.php">خانه</a>
  <a href="user_panel.php">پنل کاربری</a>
  <a href="add_contact.php">اضافه کردن</a>
  <a href="index.php" name ="exit">خروج</a>
</div>    
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
        <input type="text" name="phone" value="<?php echo$user['phone']?>">
        <br><br>
        رمز:<input type="text" name="addres" value="<?php echo$user['addres']?>">
        <br><br>
        <input type="submit" value=" ویرایش کردن ">
</fieldset>
</form>
