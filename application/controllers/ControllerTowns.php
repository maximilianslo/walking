<?php
class ControllerTowns extends Controller
{
	//require_once('application/models/ModelBase'.$nameof.'php');
	public $database;
	public $classname;
	public $nametown;
	public $namecontroller;
    function action_index()
    {
        $this->view->generate('main_view.php','build/css/helpers/about.css');
    }

    public function makeExec() {
    	$classDB='ModelBase'.$this->classname;
		$this->database=new $classDB();
		$this->database->createTable($this->classname, $this->nametown);
    }
    public function namecontroller() {
    	$this->namecontroller=substr(get_class($this),10);
    }



    public function action_galleryTown($name_town) {
		$this->namecontroller();
		$this->classname=$this->namecontroller.'Gallery';
		require_once('application/models/ModelBase'.$this->classname.'.php');
		$this->nametown=$name_town;
		$this->makeExec();
    }
    function action_sightsTown($name_town) {
		$this->namecontroller();
		$this->classname=$this->namecontroller.'Sights';
		require_once('application/models/ModelBase'.$this->classname.'.php');
		$this->nametown=$name_town;
		$this->makeExec();
    }
    function action_aboutTown($name_town) {
		$this->namecontroller();
		$this->classname=$this->namecontroller.'About';
		require_once('application/models/ModelBase'.$this->classname.'.php');
		$this->nametown=$name_town;
		$this->makeExec();
    }

    function action_Town($name_town) {
		$this->namecontroller();
		$this->classname=$this->namecontroller;
		require_once('application/models/ModelBase'.$this->classname.'.php');
		$this->nametown=$name_town;
		$this->makeExec();
    }

}