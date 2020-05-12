<?php

$select = array(
    'where' => "name = '$name_town'", // условие
);


$check=new ModelBaseAdminTowns('alltowns',$select);
if($check->getOneRow()==false) {
	header("Location: http://".$_SERVER['HTTP_HOST']
.dirname($_SERVER['PHP_SELF'])
."admin");
}

?>

<div>
	<div>
		<a href=<? echo "http://".$_SERVER['HTTP_HOST']
.dirname($_SERVER['PHP_SELF'])."admin/".$name_town."/about"?>>ОБО</a>
	</div>
		<div>
		<a href=<? echo "http://".$_SERVER['HTTP_HOST']
.dirname($_SERVER['PHP_SELF'])."admin/".$name_town."/sights"?>>Достопримечательности</a>
	</div>
		<div>
		<a href=<? echo "http://".$_SERVER['HTTP_HOST']
.dirname($_SERVER['PHP_SELF'])."admin/".$name_town."/gallery"?>>Галерея</a>
	</div>
	<div>
		
	</div>
</div>