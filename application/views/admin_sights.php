<?php


$select = array(
    'where' => "name = '$name_town'", // условие
);
$select1 = array(
    'where' => "id > 0", // условие
);




$delay=strtolower($fortable1.'_'.$name_town); //название таблицы
$select = array(
    'where' => "name = '$name_town'", // условие
);
$select1 = array(
    'where' => "id > 0", // условие
);

$check=new ModelBaseAdminTownsSights('alltowns',$select);
if($check->getOneRow()==false) {
	header("Location: http://".$_SERVER['HTTP_HOST']
.dirname($_SERVER['PHP_SELF'])
."admin");
}

$save= new ModelBaseAdminTownsSights($delay,$select1);

if($save->getAllRows()==true) {
	$all=$save->getAllRows();
echo "<table class='blueTable'>
<thead>
<tr>
<th>SIGHT</th>
<th>PIC1</th>
<th>PIC2</th>
<th>PIC3</th>
<th>PIC4</th>
<th>SHORT_INFO</th>
<th>COST</th>
<th>PLACE</th>
<th>MAP</th>
<th>DELETE</th>
</tr>
</thead>
<tbody>
";				
	foreach ( $all as $movie ) {
	   echo "<tr>";
	   echo "<td>".$movie['sights_name']."</td>";
	   echo "<td>".$movie['pic1']."</td>";
	   echo "<td>".$movie['pic2']."</td>";
	   echo "<td>".$movie['pic3']."</td>";
	   echo "<td>".$movie['pic4']."</td>";
	   echo "<td>".$movie['short_info']."</td>";
	   echo "<td>".$movie['cost']."</td>";
	   echo "<td>".$movie['place']."</td>";
	   echo "<td>".$movie['map']."</td>";
	   echo "<td><div>Удаление</div></td>";
	   echo "</tr>";
	}
echo "</tbody>
	  </table>";	
} else {
 
?>
<br>
<br>
<form method="post" action="" enctype = 'multipart/form-data'>
	<input type="text" name="arr[]">
	<br>
	<input type="text" name="arr[]">
	<br>
	<br>
	<input type="text" name="arr[]">
	<br>
	<input type="text" name="arr[]">
	<br>
	<input type="text" name="arr[]">
	<br>
	<input type="text" name="arr[]">
	<br>
	<input type="text" name="arr[]">
	<br>
	<input type="text" name="arr[]">
	<br>
	<input type="text"name="arr[]">
	<br>
	<input type="submit" name="sub">
</form>



<? } 
require_once('/var/www/walking/application/models/admin/ModelBaseTownsSightsHelp.php');
$save_description= new ModelBaseAdminTownsSightsHelp('towns_sights',$select);
if($save_description->getOneRow()==true) {
	$all=$save_description->getAllRows();
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
	   echo "<td>".$movie['description']."</td>";
	   echo "<td><div>Удаление</div></td>";
	   echo "</tr>";
	}
echo "</tbody>
	  </table>";	
} else {
?>
<form method="post" action="" enctype = 'multipart/form-data'>
	<input type="text" name="description">
	<input type="submit" name="sub2">
</form>
<? }

// Обработка формы
	if(!empty($_POST['sub'])) {
	$save->sights_name=$_POST['arr'][0];	
	$save->pic1=$_POST['arr'][1];
	$save->pic2=$_POST['arr'][2];
	$save->pic3=$_POST['arr'][3];
	$save->pic4=$_POST['arr'][4];
	$save->short_info=$_POST['arr'][5];
	$save->cost=$_POST['arr'][6];
	$save->place=$_POST['arr'][7];
	$save->map=$_POST['arr'][8];
	$save->save();
		if(!empty($_POST['sub2'])) {
	$save_description->description=$_POST['description'];
	$save_description->named=$name_town;	
	$save_description->save();
}
}

//Конец обработки

 ?>