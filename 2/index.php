
<?php 
	$car = [
	'khoob'=>[
		[
			'title' => 'zhian',
		],
		[
			'title' => 'samand',
		],
		],
	'bad'=>[	
		[
			'title' => 'pride',
		],
		[
			'title' => 'bmw',
		],
			]
	];
	
	

?>
<form action = "">
مدل<input type ="text" name="model">
<input type="submit" value="search">
</form>
<ul>
<?php if(isset($_GET['model'])&&isset($car[$_GET['model']])){
	foreach($car[$_GET['model']] as $key => $value){
		?>
		<li><?php echo $value['title']?></li>
		<?php
	}
}else{
		echo 'there is no';
		
} ?> 
	










