<?php
class DatabaseConnection{
    private $_dbType;
    private $_dbName;
    private $_dbAddress;
    private $_dbUser;
    private $_dbPassword;
    private $_database;

    public function __construct($dbType, $dbName, $dbAddress, $dbUserName, $pwd){
        $this->_dbType = $dbType;
        $this->_dbName = $dbName;
        $this->_dbAddress = $dbAddress;
        $this->_dbUser = $dbUserName;
        $this->_dbPassword = $pwd;
        $this->connectToDatabase();
    }

    private function connectToDatabase(){
        try {
            if($this->_database === null){
                $this->_database = new PDO($this->_dbType.':dbname='. $this->_dbName.';host='.$this->_dbAddress, $this->_dbUser, $this->_dbPassword);
            }

        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit();
        }
    }

    public function getAllRows($tableName, $columns){
    	$rows = array();
        $request = "SELECT " . $columns . " FROM " . $tableName;

        foreach($this->_database->query($request) as $row){
            array_push($rows, $row[$columns]);
        }

        return $rows;
    }



}

?>