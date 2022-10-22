<?php
/**
* Database class

**/

class Database {
   public $connection;

    /** 
    * Database constructore.
    * Creates a connection to database using
    * PDO methods and store it in an instance variable
    */

    public function __construct(){
        $this->connection = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
    }

//End of Databse Class

public function __destructor(){
    $connection=close();
}

/**
*Execute an SQL statement and return its results
*@param $sql
*@param null $bindval
*@return bool PDOStatement
*/

Public function sqlQuery($sql, $bindVal = null) {
	$statement = $this->connection->prepare($sql);
	if(is_array($bindVal)) {
		$statement->execute($bindVal);
	} else {
		$statement->execute();
	}
	return $statement;
	}
	
/**
*Execute an SQL statement and return an assoc. array
*/

public function fetchArray($sql, $bindVal = null) {
	$result = $this->sqlQuery($sql, $bindVal);
    if($result->rowCount() == 0) {
       return false;
	} else {
return $result->fetchAll(PDO::FETCH_ASSOC);
	}
}

} //End of Database class
$dbc = new Database();
?>