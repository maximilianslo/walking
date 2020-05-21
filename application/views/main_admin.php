<?
$select = array(
    'where' => 'id > 0', // условие
);
include "translit.php";


if(!empty($_POST['sub'])) {
	$save=new ModelBaseMain($fortable1);

	$result_name=$_POST['town'];

	$save->named=translit($result_name);
	$save->named_translit=$result_name;
	$save->save();
		unset($_POST);
}
	  if (!empty($_POST['delete-first'])) {
	echo "Обновите страницу. Данные успешно удалены";
	$button = new ModelBaseMain('alltowns');
	$id=$_POST['delete-first'];
	$select_delete = array(
    'where' => "id = '$id'" // условие
);
	$button->deleteBySelect($select_delete);
	unset($_POST);
}



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
	   echo "<td><div><form method='post' action='' ><input type='submit' name='delete-first' value='".$movie['id']."'></form>Удалить</div></td>";
	   echo "</tr>";
	}
echo "</tbody>
	  </table>";	







?>
<form method="post" action="">
<input type="text" name="town">
<input type="submit" name="sub">
	</form>