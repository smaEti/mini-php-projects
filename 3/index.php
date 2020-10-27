<!DOCTYPE HTML>  
<html>
	<head>
		<style>
			body{
				margin:3 auto;
				direction : rtl;
			}
			.error {color: #FF0000;}
		</style>
	</head>
<body>  
<?php
	$year = "";
	$nameErr = $s_nameErr= "";
	$name = $s_name = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
    $nameErr = "عنوان الزامی است";
	} else {
    $name = test_input($_POST["name"]);
    
	}
  
	if (empty($_POST["s_name"])) {
    $s_nameErr = "نام خواننده الزامی است";
	}else {
    $s_name = test_input($_POST["s_name"]);
   
	}
  if (empty($_POST["year"])) {
		
  }else {
    $year = test_input($_POST["year"]);
   
  }
}
function test_input($data) {
	//$data = trim($data);
  //$data = stripslashes($data); 
  //$data = htmlspecialchars($data);
  return $data;
}
?>

		<h2>فرم ثبت آهنگ</h2>
		
		<p><span class="error">*فیلد الزامی </span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
		عنوان آهنگ : <input type="text" name="name" value="<?php echo $name;?>">
  
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>
  
		نام خواننده : <input type="text" name="s_name" value="<?php echo $s_name;?>">
  
		<span class="error">* <?php echo $s_nameErr;?></span>
		<br><br>
 
		سال انتشار : <input type="text" name="year" value="">
		<br><br>
 
		<label for="albumpic">یک فایل را انتخاب کنید :</label>
 
		<input type="file" id="albumpic" name="albumpic"><br><br>
  
		<br><br>
  
		<input type="submit" name="submit" value="ثبت">  
</form>



</body>
</html>