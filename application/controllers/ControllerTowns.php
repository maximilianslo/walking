
<?php
class ControllerTowns extends Controller
{
	//require_once('application/models/ModelBase'.$nameof.'php');
	public $database;
	public $classname;
	public $nametown;
	public $namecontroller;
	public $template='template_view.php';
    function action_index()
    {
		require_once('application/models/admin/ModelBaseMain.php');
    	$tablename='alltowns';
    	$this->database=new ModelBaseMain($tablename);
        $this->database->createTables($tablename);
        $this->view->generate($this->template,'main.php','build/css/helpers/main.css',$tablename,'Main');


    }


    public function namecontroller() {
    	$this->namecontroller='Towns';
    }



    public function action_galleryTown($name_town) {
				$this->namecontroller();
		$this->classname=$this->namecontroller.'Gallery';
		require_once('application/models/ModelBase'.$this->classname.'.php');

		$this->nametown=$name_town;
		$classDB='ModelBase'.$this->classname;
		$this->database=new $classDB($this->classname);
		$this->database->createTables($this->classname,$this->nametown);
		$this->view->generate($this->template,'gallery.php','build/css/helpers/about.css',$this->classname,$this->nametown);
    }
    function action_sightsTown($name_town) {
		$this->namecontroller();
		$this->classname=$this->namecontroller.'Sights';
		require_once('application/models/ModelBase'.$this->classname.'.php');

		$this->nametown=$name_town;
		$classDB='ModelBase'.$this->classname;
		$this->view->generate($this->template,'sights.php','build/css/helpers/about.css',$this->classname,$this->nametown);
    }
    function action_aboutTown($name_town) {
		$this->namecontroller();
		$this->classname=$this->namecontroller.'About';
		require_once('application/models/ModelBase'.$this->classname.'.php');

		$this->nametown=$name_town;
		$classDB='ModelBase'.$this->classname;
		$this->database=new $classDB($this->classname);
		$this->view->generate($this->template,'about.php','build/css/helpers/about.css','towns_about',$this->nametown);
    }

    function action_Town($name_town) {
		$this->classname='Towns';
		require_once('application/models/ModelBase'.$this->classname.'.php');
		$this->nametown=$name_town;
		$classDB='ModelBase'.$this->classname;
		$this->database=new $classDB($this->classname);
		$this->view->generate($this->template,'towns.php','build/css/helpers/town.css','Main',$this->nametown);
    }

}