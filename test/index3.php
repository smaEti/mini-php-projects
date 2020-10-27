<?php 

$users  = [
	[
		'name' => 'ali',
		'last_name' => 'salsali',
		'age' => '3',	
	],
		[
		'name' => 'mohammad',
		'last_name' => 'kamalian',
		'age' => '17',	
	],
		[
		'name' => 'sajjad',
		'last_name' => 'oliaee',
		'age' => '19',	
	],
		[
		'name' => 'asghar',
		'last_name' => 'mohammadi',
		'age' => '7',	
	],
		
]
?>
<table style="border : 1px solid black; ">
	<tr>
	
		<th>name</th>
		<th>last name</th>
		<th>age</th>
	</tr>
	<tbody>	
		<?php foreach($users as $key => $value){
			
			if($value['age']<10){
			?>
			<tr>
				<td><?php echo $value['name']?></td>
				<td><?php echo $value['last_name']?></td>
				<td><?php echo $value['age']?></td>
			</tr>
			
			
			
			
			<?php }} ?>
		
	
	
	</tbody>


</table>

<?php 
$i = 0;
do{
	echo 'asghar';
}while($i = 0);




?>