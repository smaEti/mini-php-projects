<?php 
    session_start();
    try {
        if(isset($_POST['username'])&&isset($_POST['password'])){
            $connection = new PDO("mysql:host=localhost;dbname=site", 'root', '');
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $loginquery = $connection->prepare("SELECT * FROM users where password = :password and username = :username");
            $loginquery->bindValue(':username' , $_POST['username']);
            $loginquery->bindValue(':password' , $_POST['password']);
            $loginquery->execute();
            $is_login = $loginquery->fetch(PDO::FETCH_ASSOC);
              if ($is_login !=null){
                  $_SESSION['id'] =$is_login['id'];
                  /*  $_SESSION['username'] = $_POST['username'];
                  $_SESSION['password'] = $_POST['password'];*/
                  header("location: main.php");
            }else {
                echo 'کاربر یافت نشد';
            };
        }
    } catch (PDOExcepti $e) {
        echo 'کاربر یافت نشد';
        echo $e->getMessage();
    };
    
    
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;
direction:rtl;
}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.password {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <div class="imgcontainer">
    <img src="hosein 234.JPG" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>نام کاربری</b></label>
    <input type="text" placeholder="نام کاربری را وارد کنید" name="username" required>

    <label><b>رمز</b></label>
    <input type="password" placeholder="رمز را وارد کنید" name="password" required>
        
    <button type="submit">Login</button>
  </div>
</form>

</body>

