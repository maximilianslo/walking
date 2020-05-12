<?php
class ModelBaseAdminTowns extends ModelBase {
	public $named;



					public function fieldsTable() {
									$arr1['name']=$this->named;
									return $arr1;
						}	
}