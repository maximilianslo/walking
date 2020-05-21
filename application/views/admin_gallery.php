<?php
$select = array(
    'where' => "name = '$name_town'", // условие
);
$select1 = array(
    'where' => "id > 0", // условие
);
$check=new ModelBaseAdminTownsGallery('alltowns',$select);
if($check->getOneRow()==false) {
	header("Location: http://".$_SERVER['HTTP_HOST']
.dirname($_SERVER['PHP_SELF'])
."admin");
}
$delay=$fortable1.'_'.$name_town;
				$table=strtolower($delay);



//Табличка
$show_images=new ModelBaseAdminTownsGallery($table,$select1);
$all=$show_images->getAllRows();
echo "<table class='blueTable'>
<thead>
<tr>
<th>ID</th>
<th>IMAGE LINK</th>
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
	   echo $movie['images'];
	   echo "</td>";
	   echo "<td><div><form method='post' action='' ><input type='submit' name='delete-first' value='".$movie['id']."'></form>Удалить</div></td>";
	   echo "</tr>";
	}
echo "</tbody>
	  </table>";	
	  if (!empty($_POST['delete-first'])) {
	echo "Обновите страницу. Данные успешно удалены";
	$button = new ModelBaseAdminTownsGallery($table);
	$id=$_POST['delete-first'];
	$select_delete = array(
    'where' => "id = '$id'" // условие
);
	$button->deleteBySelect($select_delete);
	unset($_POST);
}
?>
<br>
<br>
<form method="post" action="" enctype = 'multipart/form-data'>
	<input type="file" name="arr-foto">
	<input type="submit" name="sub">
</form>
<?
include 'form_gallery.php';

?>


