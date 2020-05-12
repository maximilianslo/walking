<?php
class ModelBaseMain extends ModelBase {
	public $named;


	public function createTables($classname) {
			try {
				$table=strtolower($classname);
				//общая таблица
				$executing="CREATE Table IF NOT EXISTS `".$table."` (
					`id` INT(10) PRIMARY KEY AUTO_INCREMENT,
					`name` VARCHAR(50) NOT NULL collate utf8_unicode_ci default ''
			        )";
				$this->DH->exec($executing);
				//таблица about
				$executing="CREATE Table IF NOT EXISTS `towns_about` (
					`id` INT(10) PRIMARY KEY AUTO_INCREMENT,
					`name` VARCHAR(50) UNIQUE NOT NULL collate utf8_unicode_ci default '',
			        `description` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`story` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`story_foto` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`identity` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`identity_foto` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`locals` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`locals_foto` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`best` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`best_foto` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`cost` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`cost_foto` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '' )";
				$this->DH->exec($executing);
				$executing="CREATE Table IF NOT EXISTS `towns_sights` (
					`id` INT(10) PRIMARY KEY AUTO_INCREMENT,
					`name` VARCHAR(50) UNIQUE NOT NULL collate utf8_unicode_ci default '',
			        `description` VARCHAR(300) NOT NULL collate utf8_unicode_ci default ''
			         )";
				$this->DH->exec($executing);
			}catch(PDOException $e) {  
			    echo "Хьюстон, у нас проблемы. \n";  
			    echo $e->getMessage();  
			}
		}
			public function fieldsTable() {
									$arr1['name']=$this->named;
									return $arr1;
					}	
}