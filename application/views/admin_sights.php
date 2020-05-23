<?php

$select = array(
    'where' => "name = '$name_town'", // условие
);
$select1 = array(
    'where' => "id > 0", // условие
);
 		  	   	  if (!empty($_POST['delete-desc'])) {
	echo "Обновите страницу. Данные успешно удалены";
	$button = new ModelBaseAdminTownsSights('towns_sights',$select);
	 	$all_first=$button->getAllRows();
		$id_num_desc=$all_first[0]['id'];
			$select_delete = array(
    'where' => "id = $id_num_desc" // условие
);
	$button->deleteBySelect($select_delete);
	unset($_POST);
	}


$delay=strtolower($fortable1.'_'.$name_town); //название таблицы


$check=new ModelBaseAdminTownsSights('alltowns',$select);
if($check->getOneRow()==false) {
	header("Location: http://".$_SERVER['HTTP_HOST']
.dirname($_SERVER['PHP_SELF'])
."admin");
} else {
}

$save= new ModelBaseAdminTownsSights($delay,$select1);

if($save->getAllRows()==true) {
	$all_first=$save->getAllRows();


echo "<table class='blueTable'>
<thead>
<tr>
<th>SIGHT</th>";
for($k=1;$k<21;$k++) {
	echo "<th>PIC".$k."</th>";
}
echo "<th>SHORT_INFO</th>
<th>COST</th>
<th>PLACE</th>
<th>MAP</th>
<th>DELETE</th>
</tr>
</thead>
<tbody>
";				

	   echo "<tr>";
			for($i=0;$i<count($all_first);$i++) {
				$id_num=$all_first[$i]['id'];
				foreach ($all_first[$i] as $key => $value) {
					if(is_string($key) and $key!='id' and $key!='name') {
					echo "<td><div style='height: 350px; width: 250px;' data-id='".$id_num."' class='edit_admin_about' id='".$key."_".$name_town."' contenteditable>".$value."</div></td>";
					}
				}
					   echo "<td><div><form method='post' action='' ><input type='submit' name='delete-first' value='".$id_num."'></form></div></td></tr>";
	   	    echo "<form method='post' action='' id='new-foto' enctype = 'multipart/form-data'></form>";
	   	   echo "<tr>";
				   echo "<td></td>";
	  for($j=0;$j<20;$j++) {
	  		   echo "<td><input type='file' name='arr-foto2".$id_num."[]' form='new-foto'></td>";
	  }
	   echo "<td></td>";
	   echo "<td></td>";
	   echo "<td></td>";
	   echo "<td></td>";
	   echo "<td><input type='submit' name='update_foto' form='new-foto' value='".$id_num."'>Обновить</td>";
	   echo "</tr>";
			}
	   	    if (!empty($_POST['delete-first'])) {
	echo "Обновите страницу. Данные успешно удалены";
	$button = new ModelBaseAdminTownsSights($delay);
	$id=$_POST['delete-first'];
	$select_delete = array(
    'where' => "id = '$id'" // условие
);
	$button->deleteBySelect($select_delete);
	unset($_POST);
}
echo "</tbody>
	  </table>";
	  ?>
	  <form method="post" action="" enctype = 'multipart/form-data'>


<?
$towns_names= array('Введите название достопримечательности',
					'Введите краткую информацию о городе',
					'Введите описание стоимости',
					'Введите описание места', 
					'Введите описание карты(или вбейте координаты)'
				);
$towns_photos = array(
				'Прикрепите фотографию 1',
				'Прикрепите фотографию 2',
				'Прикрепите фотографию 3',
				'Прикрепите фотографию 4',
				'Прикрепите фотографию 5',
				'Прикрепите фотографию 6',
				'Прикрепите фотографию 7',
				'Прикрепите фотографию 8',
				'Прикрепите фотографию 9',
				'Прикрепите фотографию 10',
				'Прикрепите фотографию 11',
				'Прикрепите фотографию 12',
				'Прикрепите фотографию 13',
				'Прикрепите фотографию 14',
				'Прикрепите фотографию 15',
				'Прикрепите фотографию 16',
				'Прикрепите фотографию 17',
				'Прикрепите фотографию 18',
				'Прикрепите фотографию 19',
				'Прикрепите фотографию 20'
				);


?>
	<div class="form-about">
<?

	for ($i=0;$i<5;$i++) {
		echo '	<div class="part-form-about">
	<h2>'.$towns_names[$i].'</h2>
	<textarea rows="30" cols="50" name="arr[]"></textarea>
	</div> ';
	}
?>
	</div>
	<div class="form-about">
<?
	for($i=0;$i<20;$i++) {
	echo '<div class="part-form-about">
	<h3>'.$towns_photos[$i].'</h3>
	<input  class="form-control" type="file" name="arr-foto[]">
	</div> ';
	}

?>
</div>
	<input style="margin: 60px auto; width: 200px; height: 70px; text-align: center;" type="submit" name="sub">
</form>
<?	

include "form_sights.php";
} else {

include "form_sights.php";

?>


<br>
<br>
	  <form method="post" action="" enctype = 'multipart/form-data'>


<?
$towns_names= array('Введите название достопримечательности',
					'Введите краткую информацию о городе',
					'Введите описание стоимости',
					'Введите описание места', 
					'Введите описание карты(или вбейте координаты)'
				);
$towns_photos = array(
				'Прикрепите фотографию 1',
				'Прикрепите фотографию 2',
				'Прикрепите фотографию 3',
				'Прикрепите фотографию 4',
				'Прикрепите фотографию 5',
				'Прикрепите фотографию 6',
				'Прикрепите фотографию 7',
				'Прикрепите фотографию 8',
				'Прикрепите фотографию 9',
				'Прикрепите фотографию 10',
				'Прикрепите фотографию 11',
				'Прикрепите фотографию 12',
				'Прикрепите фотографию 13',
				'Прикрепите фотографию 14',
				'Прикрепите фотографию 15',
				'Прикрепите фотографию 16',
				'Прикрепите фотографию 17',
				'Прикрепите фотографию 18',
				'Прикрепите фотографию 19',
				'Прикрепите фотографию 20'
				);


?>
	<div class="form-about">
<?

	for ($i=0;$i<5;$i++) {
		echo '	<div class="part-form-about">
	<h2>'.$towns_names[$i].'</h2>
	<textarea rows="30" cols="50" name="arr[]"></textarea>
	</div> ';
	}
?>
	</div>
	<div class="form-about">
<?
	for($i=0;$i<20;$i++) {
	echo '<div class="part-form-about">
	<h3>'.$towns_photos[$i].'</h3>
	<input  class="form-control" type="file" name="arr-foto[]">
	</div> ';
	}

?>
</div>
	<input style="margin: 60px auto; width: 200px; height: 70px; text-align: center;" type="submit" name="sub">
</form>



<? } 
require_once $_SERVER['DOCUMENT_ROOT'].'/application/models/admin/ModelBaseTownsSightsHelp.php';
$save_description= new ModelBaseAdminTownsSightsHelp('towns_sights',$select);

if($save_description->getOneRow()==true) {
	$all=$save_description->getAllRows();
	$id_num_desc=$all[0]['id'];
echo "<table class='blueTable'>
<thead>
<tr>
<th>DESCRIPTION</th>
<th>DELETE</th>
</tr>
</thead>
<tbody>
";				
	foreach ( $all as $movie ) {
	   echo "<tr>";
			for($i=0;$i<count($all)/2;$i++) {
				foreach ($all[$i] as $key => $value) {
					if(is_string($key) and $key!='id' and $key!='name') {
					echo "<td><div style='height: 350px; width: 250px;' data-id='".$id_num_desc."' class='edit_admin_about' id='".$key."' contenteditable>".$value."</div></td>";
					}
				}
			}
		}
	   echo "<td><div><form method='post' action='' ><input type='submit' name='delete-desc' value='Удалить'></form>Удаление</div></td></tr>";

echo "</tbody>
	  </table>";
	  ?>
<?	

}

 else {

?>
<form method="post" action="" enctype = 'multipart/form-data'>
	<textarea rows="30" cols="50"  name="description"></textarea>
	<input type="submit" name="sub2">
</form>
<? 

		if(!empty($_POST['sub2'])) {
	$save_description->description=$_POST['description'];
	$save_description->named=$name_town;	
	$save_description->save();
}

}

// Обработка формы


//Конец обработки

 ?>
 <script src="/build/js/edit_admin_sights.js"></script>
  <script src="/build/js/edit_admin_sights_help.js"></script>