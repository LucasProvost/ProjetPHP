<?php

/**
 * Class DatabaseConnection
 */
class DatabaseConnection{
    /**
     * @var
     */
    private $_dbType;
    /**
     * @var
     */
    private $_dbName;
    /**
     * @var
     */
    private $_dbAddress;
    /**
     * @var
     */
    private $_dbUser;
    /**
     * @var
     */
    private $_dbPassword;
    /**
     * @var
     */
    public $_database;

    /**
     * DatabaseConnection constructor.
     * @param $dbType
     * @param $dbName
     * @param $dbAddress
     * @param $dbUserName
     * @param $pwd
     */
    public function __construct($dbType, $dbName, $dbAddress, $dbUserName, $pwd){
        $this->_dbType = $dbType;
        $this->_dbName = $dbName;
        $this->_dbAddress = $dbAddress;
        $this->_dbUser = $dbUserName;
        $this->_dbPassword = $pwd;
        $this->connectToDatabase();
    }

    /**
     *With this function we connected our script on the database PhpMyAdmin
     */
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

    /**
     * The function getAllRows allows us to show the differents rows of our database
     * @param $tableName
     * @param $columns
     * @return array
     */
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