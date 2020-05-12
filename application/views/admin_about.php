<?php

$select = array(
    'where' => "name = '$name_town'", // условие
);


$check=new ModelBaseAdminTownsAbout('alltowns',$select);
if($check->getOneRow()==false) {
	header("Location: http://".$_SERVER['HTTP_HOST']
.dirname($_SERVER['PHP_SELF'])
."admin");
}
$save= new ModelBaseAdminTownsAbout('towns_about',$select);
if($save->getOneRow()==true) {
	$all=$save->getAllRows();
echo "<table class='blueTable'>
<thead>
<tr>
<th>DESCRIPTION</th>
<th>STORY</th>
<th>STORY_FOTO</th>
<th>IDENTITY</th>
<th>IDENTITY_FOTO</th>
<th>LOCALS</th>
<th>LOCALS_FOTO</th>
<th>BEST</th>
<th>BEST_FOTO</th>
<th>COST</th>
<th>COST_FOTO</th>
<th>DELETE</th>
</tr>
</thead>
<tbody>
";				
	foreach ( $all as $movie ) {
	   echo "<tr>";
	   echo "<td><div contenteditable='true'>".$movie['description']."</div></td>";
	   echo "<td>".$movie['story']."</td>";
	   echo "<td>".$movie['story_foto']."</td>";
	   echo "<td>".$movie['identity']."</td>";
	   echo "<td>".$movie['identity_foto']."</td>";
	   echo "<td>".$movie['locals']."</td>";
	   echo "<td>".$movie['locals_foto']."</td>";
	   echo "<td>".$movie['best']."</td>";
	   echo "<td>".$movie['best_foto']."</td>";
	   echo "<td><div data-id='".$movie['id']."' class='edit_admin_about' id='cost' contenteditable>".$movie['cost']."</td>";
	   echo "<td>".$movie['cost_foto']."</td>";
	   echo "<td>";
	   echo "<div><form method='post' action='' ><input type='submit' name='delete' value='1'></form>Удаление</div>";
	   echo "</td>";
	   echo "</tr>";
	   $delete_id=$movie['id'];
	}
echo "</tbody>
	  </table>";
	  if (!empty($_POST['delete'])) {
	echo "Обновите страницу. Данные успешно удалены";
	$select_delete = array(
    'where' => "id = $delete_id", // условие
);
	$button = new ModelBaseAdminTownsAbout('towns_about');
	$button->deleteBySelect($select_delete);
}

} else {
include "form_about.php";


?>


<br>
<br>
<form method="post" action="" enctype = 'multipart/form-data'>
	<input type="text" name="arr[]">
	<br>
	<br>
	<input type="text" name="arr[]">
	<br>
	<input type="file" name="arr-foto[]">
	<br>
	<input type="text" name="arr[]">
	<br>
	<input type="file" name="arr-foto[]">
	<br>
	<input type="text" name="arr[]">
	<br>
	<input type="file" name="arr-foto[]">
	<br>
	<input type="text"name="arr[]">
	<br>
	<input type="file" name="arr-foto[]">
	<br>
	<input type="text" name="arr[]">
	<br>
	<input type="file" name="arr-foto[]">
	<br>
	<input type="submit" name="sub">
</form>
<?
}

?>
<script src="/build/js/edit_admin_about.js"></script>
