щ<?php

class ModelBaseAdminTownsSights extends ModelBase {
	public $sights_name;
	public $pic1;
	public $pic2;
	public $pic3;
	public $pic4;
	public $short_info;
	public $cost;
	public $place;
	public $map;


			public function createTables($classname,$townname) {
			try {
				$delay=$classname.'_'.$townname;
				$table=strtolower($delay);
				//таблица about
				$executing="CREATE Table IF NOT EXISTS `".$table."` (
					`id` INT(10) PRIMARY KEY AUTO_INCREMENT,
			        `sights_name` VARCHAR(3000) NOT NULL collate utf8_unicode_ci default '',
        			`pic1` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic2` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic3` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic4` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`short_info` VARCHAR(3000) NOT NULL collate utf8_unicode_ci default '',
        			`cost` VARCHAR(3000) NOT NULL collate utf8_unicode_ci default '',
        			`place` VARCHAR(3000) NOT NULL collate utf8_unicode_ci default '',
        			`map` VARCHAR(3000) NOT NULL collate utf8_unicode_ci default ''
        		)";
				$this->DH->exec($executing);
			}catch(PDOException $e) {  
			    echo "Хьюстон, у нас проблемы. \n";  
			    echo $e->getMessage();  
			}
		}
			public function fieldsTable() {
									$arr1['sights_name']=$this->sights_name;
									$arr1['pic1']=$this->pic1;
									$arr1['pic2']=$this->pic2;
									$arr1['pic3']=$this->pic3;
									$arr1['pic4']=$this->pic4;
									$arr1['short_info']=$this->short_info;
									$arr1['cost']=$this->cost;
									$arr1['place']=$this->place;
									$arr1['map']=$this->map;
									return $arr1;
					}	
}