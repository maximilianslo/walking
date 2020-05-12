<?php
class ModelBaseTownsAbout extends ModelBase {
	public function createTable($classname, $name_town) {
			try {
				$table=$classname.'_'.$name_town;

			}catch(PDOException $e) {  
			    echo "Хьюстон, у нас проблемы. \n";  
			    echo $e->getMessage();  
			}
		}	
}