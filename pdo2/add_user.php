<?php
      $connection = new PDO("mysql:host=localhost;dbname=site", 'root', '');
       $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['name'], $_POST['username'], $_POST['password'],$_POST['phone'],$_POST['email'],$_POST['bio'])){
    $sql = "INSERT INTO users (name,username,password,phone,email,bio) VALUES (?,?,?,?,?,?)";
    $stmt= $connection->prepare($sql);
    $stmt->execute([$_POST['name'], $_POST['username'], $_POST['password'],$_POST['phone'],$_POST['email'],$_POST['bio']]);
    echo "کاربر ساخته شد";
}
?>
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
form{
    direction : rtl;
}
body {
  margin: 0;
  direction : rtl;
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
  <a class="active" href="index.php">خانه</a>
  <a href="login.php">ورود</a>
  <a href="add_user.php">ثبت نام</a>
</div>  
<form action = "" method ="POST">
    <fieldset>
        <legend>اضافه کردن</legend>
        <br><br>
        <label>نام :</label>
        <input type="text" name="name" value="">
        <br><br>
        <label>نام کاربری :</label>
        <input type="text" name="username" value="">
        <br><br>
        <label>رمز:</label>
        <input type="text" name="password" value="">
        <br><br>
        <label>تلفن:</label>
        <input type="text" name="phone" value="">
        <br><br>
        <label>پست الکترونیکی:</label>
        <input type="text" name="email" value="">
        <br><br>
        <label>بیو :</label>
        <input type="text" name="bio" value="">
        <br><br>
        <input type="submit" value="اضافه کردن">
</fieldset>
</form>
