<?php
if(!empty($_POST['sub'])) {
	$uploaddir = $_SERVER['DOCUMENT_ROOT']."/images/";
// это папка, в которую будет загружаться картинка
	for($i=0;$i<count($_FILES['arr-foto']['name']);$i++) {
		if (empty($_FILES['arr-foto']['name'][$i])) {
			$error[]="Незагруженных файлов - ".$i;
		}
		$apend=date('YmdHis').rand(100,1000).'.jpg'; 
// это имя, которое будет присвоенно изображению 
$uploadfile[$i] = "$uploaddir$apend"; 
//в переменную $uploadfile будет входить папка и имя изображения

// В данной строке самое важное - проверяем загружается ли изображение (а может вредоносный код?)
// И проходит ли изображение по весу. В нашем случае до 512 Кб
if(($_FILES['arr-foto']['type'][$i] == 'image/gif' || $_FILES['arr-foto']['type'][$i] == 'image/jpeg' || $_FILES['arr-foto']['type'][$i] == 'image/png') && ($_FILES['arr-foto']['size'][$i] != 0 and $_FILES['arr-foto']['size'][$i]<=5120000)) 
{ 
// Указываем максимальный вес загружаемого файла. Сейчас до 512 Кб 
  if (move_uploaded_file($_FILES['arr-foto']['tmp_name'][$i], $uploadfile[$i])) 
   { 
   //Здесь идет процесс загрузки изображения 
   $size = getimagesize($uploadfile[$i]); 
   // с помощью этой функции мы можем получить размер пикселей изображения 
     if ($size[0] < 501 && $size[1]<1501) 
     { 
     // если размер изображения не более 500 пикселей по ширине и не более 1500 по  высоте 
     echo "Файл загружен. Путь к файлу: <b>http:/yoursite.ru/".$uploadfile[$i]."</b>"; 
     } else {
     echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 500; высота не более 1500)"; 
     // удаление файла 
     } 
   } else {
   echo "Файл не загружен, вернитеcь и попробуйте еще раз";
   } 
} else { 
echo "Размер файла не должен превышать 512Кб";
} 
	}
	for($i=0;$i<count($_POST['arr']);$i++) {
		if (empty($_POST['arr'][$i])) {
			$error[]="Незаполненных текстов - ".$i;
		}
	}

	if(empty($error)) {	
	$save->sights_name=$_POST['arr'][0];
	$save->pic1=$uploadfile[0];
	$save->pic2=$uploadfile[1];
	$save->pic3=$uploadfile[2];
	$save->pic4=$uploadfile[3];
	$save->short_info=$_POST['arr'][1];
	$save->cost=$_POST['arr'][2];
	$save->place=$_POST['arr'][3];
	$save->map=$_POST['arr'][4];
	$save->save();
	} else {
			echo "<h1>".end($error)."</h1>";
	}
	unset($_POST);
}
if(!empty($_POST['update_foto'])) {
	$j=0;
	$nim=0;
	$id=$_POST['update_foto'];
	$name_arr='arr-foto2'.$id;
	//
	for($i=0;$i<count($_FILES[$name_arr]['name']);$i++) {
		if(!empty($_FILES[$name_arr]['name'][$i])) {
			$nim++;
		}
	}	while(empty($_FILES[$name_arr]['name'][$j])) {
		$j++;
	}
	//
	 if ($nim==1) {

		//первый свитч
	switch ($j) {
		case (0):
			$row_name='pic1';
			break;
		case (1):
			$row_name='pic2';
			break;
		case (2):
			$row_name='pic3';
			break;
		case (3):
			$row_name='pic4';
			break;
		
		default:
			break;
			// конец свитч
	}
		require_once '/var/www/walking/application/models/admin/ModelUpdate.php';
		$update_foto=new ModelUpdate($delay);

		$uploaddir = $_SERVER['DOCUMENT_ROOT']."/images/";	
		$apend=date('YmdHis').rand(100,1000).'.jpg'; 
		$uploadfile = "$uploaddir$apend"; 

if(($_FILES[$name_arr]['type'][$j] == 'image/gif' || $_FILES[$name_arr]['type'][$j] == 'image/jpeg' || $_FILES[$name_arr]['type'][$j] == 'image/png') && ($_FILES[$name_arr]['size'][$j] != 0 and $_FILES[$name_arr]['size'][$j]<=5120000)) { 
	if (move_uploaded_file($_FILES[$name_arr]['tmp_name'][$j], $uploadfile)) { 
	     echo "Файл загружен. Путь к файлу: <b>http:/yoursite.ru/".$uploadfile."</b>"; 
	} else {
	     echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 500; высота не более 1500)"; 
	} 
} else {
   echo "Файл не загружен, вернитеcь и попробуйте еще раз";
} 
$id=$_POST['update_foto'];
			$update_foto->id=$id;
				$update_foto->{$row_name}=$uploadfile;
				$update_foto->update();
	header("Location: http://".$_SERVER['HTTP_HOST']
.dirname($_SERVER['PHP_SELF'])
."admin");
}
$_POST['update_foto']='';
}



?>