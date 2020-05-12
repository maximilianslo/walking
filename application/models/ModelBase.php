<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/inc/libs.php');
class ModelBase {
	public $db;
	public $name;
	public $password;
	public $host;
	public $DH;
	public $table;
	public $dataResult;


	function __construct($classname, $select=false) {
			$this->db=getenv('DB_NAME');
			$this->host=getenv('DB_HOST');
			$this->name=getenv('DB_USER');
			$this->password=getenv('DB_PASSWORD');		

			try {  
 			 $this->DH = new PDO("mysql:host=$this->host;dbname=$this->db", $this->name, $this->password);  
  			 $this->DH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
  			
     
        // имя таблицы
		$table=strtolower($classname);
        $this->table = $table;
        // обработка запроса, если нужно
        $sql = $this->_getSelect($select);
        $test="SELECT * FROM $this->table" . $sql;
        if($sql) $this->_getResult("SELECT * FROM $this->table" . $sql);	 
   			 } 	catch(PDOException $e) {  
			    echo "Хьюстон, у нас проблемы. \n";  
			    echo $e->getMessage();  
			}
		}   
     
    // получить имя таблицы
 	public function getTableName() {
        return $this->table;
    }
     
    // получить все записи
    public function getAllRows(){
        if(!isset($this->dataResult) OR empty($this->dataResult)) return false;
        return $this->dataResult;
    }
     
    // получить одну запись
    public function getOneRow(){
        if(!isset($this->dataResult) OR empty($this->dataResult)) return false;
        return $this->dataResult[0];
    }   
     
    // извлечь из базы данных одну запись
    function fetchOne(){
        if(!isset($this->dataResult) OR empty($this->dataResult)) return false;
        foreach($this->dataResult[0] as $key => $val){
            $this->$key = $val;
        }
        return true;
    }
     
    // получить запись по id
    function getRowById($id){
        try{
            $db = $this->DH;
            $stmt = $db->query("SELECT * from $this->table WHERE id = $id");
            $row = $stmt->fetch();
        }catch(PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return $row;
    }
     
    // запись в базу данных
    public function save() {
        $arrayAllFields = $this->fieldsTable();
        $arraySetFields = array();
        $arrayData = array();
        foreach($arrayAllFields as $field => $value){
            if(!empty($field)){
                $arraySetFields[] = $field;
                $arrayData[] = $value;

            }
        }
        $forQueryFields =  implode(', ', $arraySetFields);
         $forQueryData =  implode(', ', $arrayData);
        $rangePlace = array_fill(0, count($arraySetFields), '?');
        $forQueryPlace = implode(', ', $rangePlace);
        try {
            $db = $this->DH;
            $stmt = $db->prepare("INSERT INTO $this->table ($forQueryFields) values ($forQueryPlace)");  
            $result = $stmt->execute($arrayData);
        }catch(PDOException $e){
            echo 'Error : '.$e->getMessage();
            echo '<br/>Error sql : ' . "'INSERT INTO $this->table ($forQueryFields) values ($forQueryPlace)'"; 
            exit();
        }
         
        return $result;
    }
     
    // составление запроса к базе данных
    private function _getSelect($select) {
        if(is_array($select)){
            $allQuery = array_keys($select);
            array_walk($allQuery, function(&$val){
                $val = strtoupper($val);
            });
             
            $querySql = "";
            if(in_array("WHERE", $allQuery)){
                foreach($select as $key => $val){
                    if(strtoupper($key) == "WHERE"){
                        $querySql .= " WHERE " . $val;                  
                    }
                }
            }
             
            if(in_array("GROUP", $allQuery)){
                foreach($select as $key => $val){
                    if(strtoupper($key) == "GROUP"){
                        $querySql .= " GROUP BY " . $val;                   
                    }
                }
            }
             
            if(in_array("ORDER", $allQuery)){
                foreach($select as $key => $val){
                    if(strtoupper($key) == "ORDER"){
                        $querySql .= " ORDER BY " . $val;                   
                    }
                }
            }
             
            if(in_array("LIMIT", $allQuery)){
                foreach($select as $key => $val){
                    if(strtoupper($key) == "LIMIT"){
                        $querySql .= " LIMIT " . $val;                  
                    }
                }
            }
             
            return $querySql;
        }       
        return false;
    }
     
    // выполнение запроса к базе данных
    private function _getResult($sql){
        try{
            $db = $this->DH;
            $stmt = $db->query($sql);
            $rows = $stmt->fetchAll();
            $this->dataResult = $rows;
        }catch(PDOException $e) {
            echo $e->getMessage();
            exit;
        }
         
        return $rows;
    }
     
    // уделение записей из базы данных по условию
    public function deleteBySelect($select){
        $sql = $this->_getSelect($select);
        try {
            $db = $this->DH;
            $result = $db->exec("DELETE FROM $this->table " . $sql);
        }catch(PDOException $e){
            echo 'Error : '.$e->getMessage();
            echo '<br/>Error sql : ' . "'DELETE FROM $this->table " . $sql . "'"; 
            exit();
        }
        return $result;
    }
     
    // уделение строки из базы данных
    public function deleteRow(){
        $arrayAllFields = array_keys($this->fieldsTable());
        array_walk($arrayAllFields, function(&$val){
            $val = strtoupper($val);
        });
        if(in_array('ID', $arrayAllFields)){            
            try {
                $db = $this->DH;
                $result = $db->exec("DELETE FROM $this->table WHERE `id` = $this->id");
                foreach($arrayAllFields as $one){
                    unset($this->$one);
                }
            }catch(PDOException $e){
                echo 'Error : '.$e->getMessage();
                echo '<br/>Error sql : ' . "'DELETE FROM $this->table WHERE `id` = $this->id'"; 
                exit();
            }           
        }else{
            echo "ID table `$this->table` not found!";
            exit;
        }
        return $result;
    }
     
    // обновление записи. Происходит по ID
    public function update(){
        $arrayAllFields = $this->fieldsTable();
        $arrayForSet = array();
        foreach($arrayAllFields as $field => $value){
            if(!empty($field)){
                if(strtoupper($field) != 'ID'){
                    $arrayForSet[] = $field . ' = "' . $value . '"';
                }else{
                    $whereID = $value;
                }
            }
        }
        if(!isset($arrayForSet) OR empty($arrayForSet)){
            echo "Array data table `$this->table` empty!";
            exit;
        }
        if(!isset($whereID) OR empty($whereID)){
            echo "ID table `$this->table` not found!";
            exit;
        }
         
        $strForSet = implode(', ', $arrayForSet);
         
        try {
            $db = $this->DH;
            $stmt = $db->prepare("UPDATE $this->table SET $strForSet WHERE `id` = $whereID");  
            $result = $stmt->execute();
        }catch(PDOException $e){
            echo 'Error : '.$e->getMessage();
            echo '<br/>Error sql : ' . "'UPDATE $this->table SET $strForSet WHERE `id` = $whereID'"; 
            exit();
        }
        return $result;
    }
}
			
