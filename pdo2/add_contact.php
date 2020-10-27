<?php
    session_start();
      $connection = new PDO("mysql:host=localhost;dbname=site", 'root', '');
       $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['name'], $_POST['phone'], $_POST['addres'],$_SESSION['id'])){
    $sql = "INSERT INTO contacs (name,phone,addres,user_id) VALUES (?,?,?,?)";
    $stmt= $connection->prepare($sql);
    $stmt->execute([$_POST['name'],$_POST['phone'],$_POST['addres'],$_SESSION['id']]);
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
  <a class="active" href="main.php">خانه</a>
  <a href="user_panel.php">پنل کاربری</a>
  <a href="add_contact.php">اضافه کردن</a>
  <a href="index.php">خروج</a>
</div>    
<form action = "" method ="POST">
    <fieldset>
        <legend>اضافه کردن</legend>
        <br><br>
        <label>نام :</label>
        <input type="text" name="name" value="">
        <br><br>
        <label>تلفن :</label>
        <input type="text" name="phone" value="">
        <br><br>
        <label>آدرس:</label>
        <input type="text" name="adress" value="">
        <br><br>
        <input type="submit" value="اضافه کردن">
</fieldset>
</form>
<?php print_r($_SESSION['id']);
?>