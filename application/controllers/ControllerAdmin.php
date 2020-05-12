<?php
class ControllerAdmin extends Controller
{
	//require_once('application/models/ModelBase'.$nameof.'php');
	public $database;
	public $classname;
	public $nametown;
	public $namecontroller;
    function action_index()
    {
    	require_once('application/models/admin/ModelBaseMain.php');
    	$tablename='alltowns';
    	$this->database=new ModelBaseMain($tablename);
        $this->database->createTables($tablename);
        $this->view->generate('main_admin.php','build/css/helpers/main.css',$tablename,'Main');

    }


    public function namecontroller() {
    	$this->namecontroller='Towns';
    }



    public function action_galleryAdmin($name_town) {
				$this->namecontroller();
		$this->classname=$this->namecontroller.'Gallery';
		require_once('application/models/admin/ModelBase'.$this->classname.'.php');

		$this->nametown=$name_town;
		$classDB='ModelBaseAdmin'.$this->classname;
		$this->database=new $classDB($this->classname);
		$this->database->createTables($this->classname,$this->nametown);
		$this->view->generate('admin_gallery.php','build/css/helpers/about.css',$this->classname,$this->nametown);
    }
    function action_sightsAdmin($name_town) {
		$this->namecontroller();
		$this->classname=$this->namecontroller.'Sights';
		require_once('application/models/admin/ModelBase'.$this->classname.'.php');

		$this->nametown=$name_town;
		$classDB='ModelBaseAdmin'.$this->classname;
		$this->database=new $classDB($this->classname);
		$this->database->createTables($this->classname,$this->nametown);
		$this->view->generate('admin_sights.php','build/css/helpers/about.css',$this->classname,$this->nametown);
    }
    function action_aboutAdmin($name_town) {
		$this->namecontroller();
		$this->classname=$this->namecontroller.'About';
		require_once('application/models/admin/ModelBase'.$this->classname.'.php');

		$this->nametown=$name_town;
		$classDB='ModelBaseAdmin'.$this->classname;
		$this->database=new $classDB($this->classname);
		$this->view->generate('admin_about.php','build/css/helpers/about.css','towns_about',$this->nametown);
    }

    function action_Admin($name_town) {
		$this->classname='Towns';
		require_once('application/models/admin/ModelBase'.$this->classname.'.php');
		$this->nametown=$name_town;
		$classDB='ModelBaseAdmin'.$this->classname;
		$this->database=new $classDB($this->classname);
		$this->view->generate('admin_towns.php','build/css/helpers/about.css',$this->classname,$this->nametown);
    }

}