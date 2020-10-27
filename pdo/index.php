<?php

try{
    $connection = new PDO("mysql:host=localhost;dbname=site", 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $connection->prepare(
        "SELECT * FROM users"
    );
  //  $query->bindValue(':id', 1);

    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);

}catch(PDOException $e){
    echo 'با مدیریت تماس بگیرید';
    echo $e->getMessage();
}
?>

<table>
    <thead>
        <tr>
            <th>شناسه</th>
            <th>نام</th>
            <th>نام کاربری</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><a href="edit.php?id=<?php echo $user['id']; ?>">ویرایش</a></td>
                <td><a href="delete.php?id=<?php echo $user['id']; ?>">حذف</a></td>
            </tr>
        <?php endforeach; ?>
      
    </tbody>
</table>
<a href="add_user.php">اضافه کردن</a>