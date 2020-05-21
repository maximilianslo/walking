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
	$id_num=$all[0]['id'];
			
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
	   echo "<tr>";
			for($i=0;$i<count($all);$i++) {
				foreach ($all[$i] as $key => $value) {
					if(is_string($key) and $key!='id' and $key!='name') {
					echo "<td><div style='height: 350px; width: 250px;' class='edit_admin_about' data-id='".$id_num."' class='edit_admin_about' id='".$key."' contenteditable>".$value."</div></td>";
					}
				}
			}
	   echo "<td><div><form method='post' action='' ><input type='submit' name='delete' value='Удалить'></form>Удаление</div></td></tr>";
	   echo "<form method='post' action='' id='new-foto' enctype = 'multipart/form-data'></form>";
	   echo "<tr>";
	   echo "<td></td>";
	   echo "<td></td>";
	   echo "<td><input type='file' name='arr-foto2[]' form='new-foto'></td>";
	   echo "<td></td>";
	   echo "<td><input type='file' name='arr-foto2[]' form='new-foto'></td>";
	   echo "<td></td>";
	   echo "<td><input type='file' name='arr-foto2[]' form='new-foto'></td>";
	   echo "<td></td>";
	   echo "<td><input type='file' name='arr-foto2[]' form='new-foto'></td>";
	   echo "<td></td>";
	   echo "<td><input type='file' name='arr-foto2[]' form='new-foto'></td>";
	   echo "<td><input type='submit' name='update_foto' form='new-foto' value='Удалить'></td>";
	   echo "</tr>";
	   include "form_about.php";
echo "</tbody>
	  </table>";


} else {
include "form_about.php";


?>


<br>
<br>
<form method="post" action="" enctype = 'multipart/form-data'>
	<div class="form-about">
<?

$towns_names= array('Введите описание города',
					'Введите краткую историю города',
					'Введите описание колорита',
					'Введите описание жителей', 
					'Введите описание лучших мест',
					'Введите описание цен'
				);
$towns_photos = array(
				'Прикрепите фотографию для краткой истории города',
				'Прикрепите фотографию для колорита',
				'Прикрепите фотографию для жителей',
				'Прикрепите фотографию для лучших мест',
				'Прикрепите фотографию для цен'
				);

	for ($i=0;$i<6;$i++) {
		echo '	<div class="part-form-about">
	<h2>'.$towns_names[$i].'</h2>
	<textarea rows="30" cols="50" name="arr[]"></textarea>
	</div> ';
	}
	for($i=0;$i<5;$i++) {
	echo '<div class="part-form-about">
	<h3>'.$towns_photos[$i].'</h3>
	<input  class="form-control" type="file" name="arr-foto[]">
	</div> ';
	}

?>
	<input class="btn btn-primary" type="submit" name="sub">
</div>
</form>
<?
}

?>
<script src="/build/js/edit_admin_about.js"></script>
