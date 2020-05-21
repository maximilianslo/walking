<?php
$select = array(
    'where' => "name = '$name_town'", // условие
);
$select_text = array(
    'where' => "id > 0", // условие
);



$check=new ModelBaseTownsSights('alltowns',$select);
if($check->getOneRow()==false) {
	header("Location: http://".$_SERVER['HTTP_HOST']
.dirname($_SERVER['PHP_SELF'])
);
}



$save= new ModelBaseTownsSights('towns_sights',$select);
if($save->getOneRow()==true) {
		$all=$save->getAllRows();
	}
		?>

<div  class="container">
	<h1 class="main-text">Достопримечательности города <?echo $name_town.' '; ?></h1>
	<div class="description">

		<? 
		$description=str_replace('[]','<br>', $all[0]['description']);

		echo $description; ?>
	</div>
	<?
	$main_request='townssights_'.$name_town;
	$content= new ModelBaseTownsSights($main_request,$select_text);
if($content->getOneRow()==true) {
		$all_content=$content->getAllRows();
	}
for($i=0;$i<count($all_content);$i++) {
				

	?>
		<hr class="hr-shelf-mini">
<h1 class="sight"><? echo $all_content[$i]['sights_name']; ?></h1>
<h1 class="sight-title-discription">Описание</h1>
<h1 class="sight-info"><? echo $all_content[$i]['short_info']; ?></h1>
<div class="row">
<div class="mini-gallery">
<? 

	for($j=1;$j<5;$j++) {
		$name_image='pic'.$j;
$link_image=str_replace($_SERVER['DOCUMENT_ROOT'], '', $all_content[$i][$name_image]);
echo "<img class='block-photos' src=".$link_image.">";
}
?>
</div>
</div>
<h1 class="little-attantion">Нажмите, чтобы увидеть больше</h1>
		<div class="row">
		<div class='theme-town'><a href="<?echo '/towns/'.$name_town.'/gallery'; ?>">Галерея</a></div>
	  	</div>
	  	<h1 class="sight-title-place">Место и стоимость</h1>
		<h1 class="sight-info"><? echo $all_content[$i]['map']; ?></h1>
		<h1 class="main-info">Стоимость :<? echo $all_content[$i]['cost']; ?></h1>
		<h1 class="main-info">Адрес :<? echo $all_content[$i]['place']; ?></h1>
	<?
}
?>
</div>
