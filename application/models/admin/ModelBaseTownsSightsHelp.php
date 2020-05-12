<?php

class ModelBaseAdminTownsSightsHelp extends ModelBase {

	public $description;
	public $named;

			public function fieldsTable() {
									$arr1['description']=$this->description;
									$arr1['name']=$this->named;
									return $arr1;
					}	
}