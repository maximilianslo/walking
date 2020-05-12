<?php

class ModelUpdate extends ModelBase {

	public $id;
	public $cost;
	public $pop;

			public function fieldsTable() {

									$arr1['id']=$this->id;
								if($this->pop) {
									$arr1['pop']=$this->pop;
								}
									$arr1['cost']=$this->cost;
									return $arr1;
					}	
}