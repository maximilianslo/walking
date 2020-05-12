<?
$select = array(
    'where' => 'id > 0', // условие
);
$save= new ModelBaseMain($fortable1,$select);
$rows=$save->getAllRows();
$town=$_POST['town'];
$submit=$_POST['sub'];
if(!empty($submit)) {
	$save->named=$town;
	$save->save();
}
unset($_POST);



//Табличка
$show_images=new ModelBaseMain($fortable1,$select);
$all=$show_images->getAllRows();
echo "<table class='blueTable'>
<thead>
<tr>
<th>ID</th>
<th>CITY</th>
<th>DELETE</th>
</tr>
</thead>
<tbody>
";				
	foreach ( $all as $movie ) {
	   echo "<tr>";
	   echo "<td>";
	   echo $movie['id'];
	   echo "</td>";
	   echo "<td>";
	   echo $movie['name'];
	   echo "</td>";
	   echo "<td>";
	   echo "<div>Удаление</div>";
	   echo "</td>";
	   echo "</tr>";
	}
echo "</tbody>
	  </table>";	







?>
<form method="post" action="">
<input type="text" name="town">
<input type="submit" name="sub">
	</form>