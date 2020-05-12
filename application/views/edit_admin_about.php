<?php
ini_set('display_errors', 1);
    error_reporting(E_ALL);
    echo('foo');
$url='application/models/admin/ModelUpdate.php';
require_once '/var/www/walking/application/models/ModelBase.php';
require_once '/var/www/walking/application/models/admin/ModelUpdate.php';

 $save=new ModelUpdate('towns_about');
 $save->id=$_POST['id'];
  $save->{$_POST['row']}=$_POST['new_val'];
 $save->update();