<?php
    session_start();
try{
    $connection = new PDO("mysql:host=localhost;dbname=site", 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $connection->prepare(
        "SELECT * FROM contacs WHERE user_id =:user_id"
    );
    $query->BindValue(':user_id',$_SESSION['id']);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    
}catch(PDOException $e){
    echo 'با مدیریت تماس بگیرید';
    echo $e->getMessage();
}
/*if(array_key_exists('exit', $_GET)) {
    session_end();
} */
/*<td><?php echo $user['birthday']; ?></td>
                <td><?php echo $user['gender']; ?></td>*/
?>
<head>
    <style>
    table {
        direction : rtl;
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
html{
    direction : rtl;
}
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
  <a href="logout.php">خروج</a>
</div>    

<table>
    <thead>
        <tr>
            <th>شناسه</th>
            <th>نام</th>
            <th>شماره تلفن </th>
            <th>آدرس </th>
            <th>ویرایش</th>
            <th>حذف</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['phone']; ?></td>
                <td><?php echo $user['addres']; ?></td>
                <td><a href="edit.php?id=<?php echo $user['id']; ?>">ویرایش</a></td>
                <td><a href="delete.php?id=<?php echo $user['id']; ?>">حذف</a></td>
            </tr>
        <?php endforeach; ?>
      
    </tbody>
</table>
<?php print_r($_SESSION['id']);
?>