<?php

class ModelBaseAdminTownsSights extends ModelBase {
	public $sights_name;
		public $short_info;
	public $cost;
	public $place;
	public $map;
	public $pic1;
	public $pic2;
	public $pic3;
	public $pic4;
	public $pic5;
	public $pic6;
	public $pic7;
	public $pic8;
	public $pic9;
	public $pic10;
	public $pic11;
	public $pic12;
	public $pic13;
	public $pic14;
	public $pic15;
	public $pic16;
	public $pic17;
	public $pic18;
	public $pic19;
	public $pic20;



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
          			`pic5` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic6` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic7` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic8` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
           			`pic9` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic10` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic11` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic12` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
           			`pic13` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic14` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic15` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic16` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
          			`pic17` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic18` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic19` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
        			`pic20` VARCHAR(300) NOT NULL collate utf8_unicode_ci default '',
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

									for($j=1;$j<21;$j++) {
										$pic_name='pic'.$j;
										if(!empty($this->{$pic_name})) {
											$arr1[$pic_name]=$this->{$pic_name};
										}
									}
									$arr1['sights_name']=$this->sights_name;
									$arr1['short_info']=$this->short_info;
									$arr1['cost']=$this->cost;
									$arr1['place']=$this->place;
									$arr1['map']=$this->map;
									return $arr1;
					}	
}