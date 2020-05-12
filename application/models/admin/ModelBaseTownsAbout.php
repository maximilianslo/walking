<?php

class ModelBaseAdminTownsAbout extends ModelBase {
	public $description;
	public $story;
	public $story_foto;
	public $identity;
	public $identity_foto;
	public $locals;
	public $locals_foto;
	public $best;
	public $best_foto;
	public $cost;
	public $cost_foto;
	public $named;
			public function fieldsTable() {
									$arr1['name']=$this->named;
									$arr1['story']=$this->story;
									$arr1['story_foto']=$this->story_foto;
									$arr1['identity']=$this->identity;
									$arr1['identity_foto']=$this->identity_foto;
									$arr1['locals']=$this->locals;
									$arr1['locals_foto']=$this->locals_foto;
									$arr1['best']=$this->best;
									$arr1['best_foto']=$this->best_foto;
									$arr1['cost']=$this->cost;
									$arr1['cost_foto']=$this->cost_foto;
									$arr1['description']=$this->description;
									return $arr1;
					}	
}