<?php
$select = array(
    'where' => "name = '$name_town'", // условие
);


$check=new ModelBaseTowns('alltowns',$select);
if($check->getOneRow()==false) {
	header("Location: http://".$_SERVER['HTTP_HOST']
.dirname($_SERVER['PHP_SELF'])
);
} else {
	$name_operation=$check->getAllRows();
	$result_name=$name_operation[0]['name_translit'];
}


?>
<div class="container">
	<h1 class="main-header">Город <? echo $result_name;?></h1>
		<div class="row">
		<div class='theme-town'><a href="<?echo '/towns/'.$name_town.'/about'; ?>">О городе</a></div>
		</div>
		<div class="row">
		<div class='theme-town'><a href="<?echo '/towns/'.$name_town.'/sights'; ?>">Досто-сти</a></div>
		</div>
		<div class="row">
		<div class='theme-town'><a href="<?echo '/towns/'.$name_town.'/gallery'; ?>">Галерея</a></div>
	  	</div>
</div>