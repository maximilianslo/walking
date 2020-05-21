<?php
ini_set('display_errors', 1);
    error_reporting(E_ALL);
    echo('foo');
$url='application/models/admin/ModelUpdate.php';
require_once '/var/www/walking/application/models/ModelBase.php';
require_once '/var/www/walking/application/models/admin/ModelUpdate.php';

$parts=explode("_", $_POST['row']);
if($parts[0]=='sights' or $parts[0]=='short') {
$town='townssights_'.$parts[2];
$row=$parts[0].'_'.$parts[1];
} else {
$town='townssights_'.$parts[1];
$row=$parts[0]; 
}

 $save=new ModelUpdate($town);
 $save->id=$_POST['id'];
  $save->{$row}=$_POST['new_val'];
 $save->update();