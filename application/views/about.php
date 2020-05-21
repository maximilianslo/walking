<?php
$select = array(
    'where' => "name = '$name_town'", // условие
);


$check=new ModelBaseTownsAbout('alltowns',$select);
if($check->getOneRow()==false) {
	header("Location: http://".$_SERVER['HTTP_HOST']
.dirname($_SERVER['PHP_SELF'])
);
}
$save= new ModelBaseTownsAbout('towns_about',$select);
if($save->getOneRow()==true) {
		$all=$save->getAllRows();
		?>

<div  class="container">
	<h1 class="main-text">Город <?echo $name_town.' '; ?></h1>
	<div class="description">

		<? 
		$description=str_replace('[]','<br>', $all[0]['description']);

		echo $description; ?>
	</div>
	<hr class="hr-shelf-mini">

<? 

$titles=array('Краткая история города',
			  'Колорит',
			  'Местные жители',
			  'Лучшие места и заведения',
			  'Стоимость проживания'

);
$keys=array('story',
			'identity',
			'locals',
			'best',
			'cost'
);
$images_keys=array('story_foto',
			'identity_foto',
			'locals_foto',
			'best_foto',
			'cost_foto'
);
for ($i=0;$i<5;$i++) {
?>




	<h1 class="title-about"><? echo $titles[$i]; ?></h1>
		<div class="row">
	<div class="col-lg-8 text-place">
				<? 
				$hard_key=$keys[$i];
				$hard_key_images=$images_keys[$i];
		$prepare_title=str_replace('[]','<br><br>', $all[0][$hard_key]);

		echo $prepare_title; ?>
	</div>
	<div class="col-lg-4 photo-place">
		<? 
			$link_image=str_replace($_SERVER['DOCUMENT_ROOT'], '', $all[0][$hard_key_images]);
			echo "<img style='width: 75%;' src='".$link_image."'>";
		?>
	</div>
	<hr class="hr-shelf-mini">
</div>

		<?
	}

	?>

</div>
	<?

}