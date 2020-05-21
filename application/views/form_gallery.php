<?php

if(!empty($_POST['sub'])) {
	$uploaddir = $_SERVER['DOCUMENT_ROOT']."/images/";
// это папка, в которую будет загружаться картинка
		if (empty($_FILES['arr-foto']['name'][0])) {
			$error[]="Незагруженных файлов - 1";
		}
		$apend=date('YmdHis').rand(100,1000).'.jpg'; 
// это имя, которое будет присвоенно изображению 
$uploadfile = "$uploaddir$apend"; 
//в переменную $uploadfile будет входить папка и имя изображения

// В данной строке самое важное - проверяем загружается ли изображение (а может вредоносный код?)
// И проходит ли изображение по весу. В нашем случае до 512 Кб
if(($_FILES['arr-foto']['type'][0] == 'image/gif' || $_FILES['arr-foto']['type'][0] == 'image/jpeg' || $_FILES['arr-foto']['type'][0] == 'image/png') && ($_FILES['arr-foto']['size'][0] != 0 and $_FILES['arr-foto']['size'][0]<=5120000)) 
{ 
// Указываем максимальный вес загружаемого файла. Сейчас до 512 Кб 
  if (move_uploaded_file($_FILES['arr-foto']['tmp_name'][0], $uploadfile)) 
   { 
     echo "Файл загружен. Путь к файлу: <b>http:/yoursite.ru/".$uploadfile."</b>"; 
   } else {
   echo "Файл не загружен, вернитеcь и попробуйте еще раз";
   } 
} else { 
echo "Размер файла не должен превышать 512Кб";
} 

	if(empty($error)) {	
	$about=new ModelBaseAdminTownsGallery($delay);
	$about->images=$uploadfile;
	$about->save();
	} else {
			echo "<h1>".end($error)."</h1>";
	}
	unset($_POST);
}