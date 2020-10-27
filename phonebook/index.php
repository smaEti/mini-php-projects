<?php
    require_once 'inc/queries.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>سلام</h1>
    <a href="login.php">ورود</a>

    <?php $slideshows = select('slideshows',[['is_active', '=' , 1]]); ?>

    <div>
        <?php foreach($slideshows as $slideshow): ?>
            <img src="images/<?php echo $slideshow['image_path'] ?>">
        <?php endforeach; ?>
    </div>
</body>
</html>