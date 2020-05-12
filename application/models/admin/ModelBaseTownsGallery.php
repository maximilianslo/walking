<?php

class ModelBaseAdminTownsGallery extends ModelBase {
	public $sights_name;
	public $images;

			public function createTables($classname,$townname) {
			try {
				$delay=$classname.'_'.$townname;
				$table=strtolower($delay);
				//таблица about
				$executing="CREATE Table IF NOT EXISTS `".$table."` (
					`id` INT(10) PRIMARY KEY AUTO_INCREMENT,
			        `images` VARCHAR(300) NOT NULL collate utf8_unicode_ci default ''
        		
        		)";
				$this->DH->exec($executing);
			}catch(PDOException $e) {  
			    echo "Хьюстон, у нас проблемы. \n";  
			    echo $e->getMessage();  
			}
		}
			public function fieldsTable() {
									$arr1['images']=$this->images;
									return $arr1;
					}	
}