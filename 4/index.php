<!DOCTYPE HTML>  
<html>
	<head>
		<style>
			body{
				margin:3 auto;
				direction : rtl;
			}
			.error {color: #FF0000;}
			
			
			input[type=text], select, textarea {
  width: 20%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size : 20px;
}
input[type=submit]:hover {
  background-color: #45a049;
}
		</style>
	</head>
<body>  
<?php
//                   START INPUTS
	$year = "";
	$nameErr = $s_nameErr= "";
	$name = $s_name = $s_yearErr = $genderErr ="";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//number_format($_POST["year"], 2); 
		if (empty($_POST["name"])) {
		$nameErr = "نام الزامی است ";
		} else {
			$name = $_POST["name"];
		
			if (!preg_match("/^[\x{0600}-\x{06FF}]*$/u",$name)) {
			$nameErr = "نام باید فارسی باشد";
				}
		
		}
  
		if (empty($_POST["s_name"])) {
		$s_nameErr = "نام خانوادگی الزامی است ";
		}else {
			$s_name = $_POST["s_name"];
		
			if (!preg_match("/^[\x{0600}-\x{06FF}]*$/u",$s_name)) {
			$s_nameErr = "نام خانوادگی باید فارسی باشد ";
				}
		
		}
	
		if (empty($_POST["gender"])) {
		$genderErr = "جنسیت الزامی است";
		} else {
		$gender = $_POST["gender"];
		}
		
	//	$year1;
		
		if (empty($_POST["year"] )) {
				$s_yearErr = "سن الزامی است !";
		}elseif (!preg_match("/^[1-9]*$/",$_POST["year"])) {
				$s_yearErr = "عدد وارد کنید !";
			}else {// if(!is_int($_POST["year"])) 
			$_POST["year"] = intval($_POST["year"]);
				$year =$_POST["year"];
				
			}
		
		
}
//                       END INPUTS
//                       START SAVE DATA IN .TXT FILE 


if(isset($_POST['name'])&& isset($_POST['s_name']) && isset($_POST['year']) && isset($_POST['gender']) )
{
//	$_POST = array_pop($_POST);
	
	foreach($_POST as $key => $value ){
			
		
	$fp = fopen('data.txt', 'a');
	fwrite($fp, $value);
	fclose($fp);
		$dash = "-";
		$fp = fopen('data.txt', 'a');
	fwrite($fp, $dash);
	fclose($fp);
	}
	
}
//                        END SAVE DATA IN .TXT FILE 
//                        START  UPLOAD PDF

if(isset($_FILES["fileToUpload"])){
	$targetf_dir = "uploads/pdfs/";
	$targetf_file = $targetf_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$pdfFileType = strtolower(pathinfo($targetf_file,PATHINFO_EXTENSION));
	
		if($pdfFileType != "pdf") {
			
				echo "فایل pdf آپلود کنید ";
				$uploadOk = 0;
	
		}else if (file_exists($targetf_file)) {
	
				echo "فایل". basename( $_FILES["fileToUpload"]["name"])."از قبل وجود دارد";
				$uploadOk = 0;
  
		}else if ($uploadOk == 0) {
			
				echo "رزومه خود را اپلود کنید";

		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetf_file)) {
				
					echo "فایل ". basename( $_FILES["fileToUpload"]["name"]). " اپلود شد";
					
			} else {
				
					echo "مشکلی در اپلود کردن فایل شما ایجاد شده";
					
				}
		}

}else {}


//                        END UPLOAD PDF
//                        START UPLOAD JPG


if(isset($_FILES["imageToUpload"])){
		$targeti_dir = "uploads/image/";
		$targeti_file = $targeti_dir . basename($_FILES["imageToUpload"]["name"]);
		$imageFileType = strtolower(pathinfo($targeti_file,PATHINFO_EXTENSION));

	if (file_exists($targeti_file)) {
		
				//echo " عکس". basename( $_FILES["imageToUpload"]["name"])."از قبل وجود دارد";
				echo " عکس خود را آپلود کنید ";
			
		}else if($imageFileType != "jpg"&& $imageFileType != "jpeg") {
			
				echo "فقط پسوند jpg آپلود کنید";
			
		}else   if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $targeti_file)) {
	
				echo "فایل ". basename( $_FILES["imageToUpload"]["name"]). " آپلود شد";
	
		} else if ($_FILES["imageToUpload"]["name"] == ""){
	  
				echo " عکس خود را آپلود کنید ";
  }

}else {}




//   :)    OSTAD KHEILI BAHAL BOOD TAKALIF - SIC.PARVIS.MAGNA
?>
		<fieldset>
		<legend>فرم استخدام</legend>
		<p><span class="error">*فیلد الزامی </span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">  
  
		نام : <input type="text" name="name" value="<?php echo $name;?>">
  
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>
  
		نام خانوادگی : <input type="text" name="s_name" value="<?php echo $s_name;?>">
  
		<span class="error">* <?php echo $s_nameErr;?></span>
		<br><br>
 
		سن : <input type="text" name="year" value="<?php echo $year;?>">
  
		<span class="error">* <?php echo $s_yearErr;?></span>
		<br><br>
		جنسیت:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">زن
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">مرد
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
		<br><br>
		
		 عکس خود را آپلود کنید :
		<input type="file" name="imageToUpload" id="imageToUpload">
		
		<br><br>
		
		رزومه خود را ارسال کنید :
		<input type="file" name="fileToUpload" id="fileToUpload">
		
		<br><br> 
  
		<input type="submit" name="submit" value="ثبت">  
</form>
</fieldset>
</body>
</html>