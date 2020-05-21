<?
$select = array(
    'where' => 'id > 0', // условие
);


$show_images=new ModelBaseMain($fortable1,$select);
$all=$show_images->getAllRows();

?>

<div class="container">
	<h1 class="main-header">Онлайн-экскурсии по городам мира</h1>
	<h1 class="main-header-desc">На нашем сайте вы можете ознакомиться с архитектурой и достопримечательностями красивейших городов мира, узнать об их местных жителях, кулинарии и лучших местах, которые вы можете посетить во время своего путешествия</h1>
	<hr class="hr-shelf-mini">
	<h1 class="list-main">Список доступных городов</h1>



<?


foreach ( $all as $movie ) {
	?>
		<div class="row">
		<div class='theme-town'><a href="<?echo '/towns/'.$movie['name']; ?>"><? echo strtoupper($movie['name_translit']); ?></a></div>
	  	</div>
	  <? 

	}



	?>

	</div>