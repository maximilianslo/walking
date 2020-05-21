<?php

class ModelUpdate extends ModelBase {

	public $id;
	public $cost_foto;
	public $identity;
	public $identity_foto;
	public $story;
	public $story_foto;
	public $locals;
	public $locals_foto;
	public $cost;
	public $best;
	public $best_foto;
	public $sights_name;
	public $pic1;
	public $pic2;
	public $pic3;
	public $pic4;
	public $short_info;
	public $place;
	public $map;
	public $description;

			public function fieldsTable() {
								if(!empty($this->id)) {
									$arr1['id']=$this->id;
								}
								if(!empty($this->cost)) {
									$arr1['cost']=$this->cost;
								}
								if(!empty($this->cost_foto)) {
									$arr1['cost_foto']=$this->cost_foto;
								}
								if(!empty($this->identity)) {
									$arr1['identity']=$this->identity;
								}
								if(!empty($this->identity_foto)) {
									$arr1['identity_foto']=$this->identity_foto;
								}
								if(!empty($this->story)) {
									$arr1['story']=$this->story;
								}
								if(!empty($this->story_foto)) {
									$arr1['story_foto']=$this->story_foto;
								}
								if(!empty($this->locals)) {
									$arr1['locals']=$this->locals;
								}
								if(!empty($this->locals_foto)) {
									$arr1['locals_foto']=$this->locals_foto;
								}
								if(!empty($this->best)) {
									$arr1['best']=$this->best;
								}
								if(!empty($this->best_foto)) {
									$arr1['best_foto']=$this->best_foto;
								}
								if(!empty($this->sights_name)) {
									$arr1['sights_name']=$this->sights_name;
								}	
								if(!empty($this->pic1)) {	
									$arr1['pic1']=$this->pic1;
								}
								if(!empty($this->pic2)) {
									$arr1['pic2']=$this->pic2;
								}
								if(!empty($this->pic3)) {
									$arr1['pic3']=$this->pic3;
								}
								if(!empty($this->pic4)) {	
									$arr1['pic4']=$this->pic4;
								}
								if(!empty($this->short_info)) {	
									$arr1['short_info']=$this->short_info;
								}
								if(!empty($this->place)) {	
									$arr1['place']=$this->place;
								}
								if(!empty($this->map)) {	
									$arr1['map']=$this->map;
								}
								if(!empty($this->description)) {	
									$arr1['description']=$this->description;
								}
									return $arr1;
					}	
}