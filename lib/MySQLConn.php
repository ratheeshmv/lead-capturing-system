<?php
//==================================================================
//
//  Author: Ratheesh M V
//  email: ratheeshmvcool@gmail.com
//  Name: A Simple MySQLI Class
//  Description: This class is written to make it easy to use mysqli
//  with array variables.
//
//===================================================================
define('DB_SERVER', 'localhost');
define('DB_NAME', 'test');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

class MySQLConn 
{
    public $db, $conn;
	
    public function __construct()
	{
		$hostname = DB_SERVER;
    	$username = DB_USERNAME;
    	$password = DB_PASSWORD;
		$database = DB_NAME;
		
        $this->conn = mysqli_connect($hostname, $username, $password,$database);
		if(! $this->conn ) {
            die('Could not connect: ' . mysqli_error());
         }
         //echo 'Connected successfully';
    }
	
	public function insertArray($table, $insert_values) 
	{
        foreach($insert_values as $key=>$value) {
            $keys[] = $key;
            $insertvalues[] = '\''.$value.'\'';
        }

        $keys = implode(',', $keys);
        $insertvalues = implode(',', $insertvalues);

        $sql = "INSERT INTO $table ($keys) VALUES ($insertvalues)";
	
        $this->sqlORDie($sql);
		
		return mysqli_insert_id($this->conn);
    }
	
	public function updateArray($table, $keyColumnName, $id, $update_values) 
	{
        foreach($update_values as $key=>$value) {

            $sets[] = $key.'=\''.$value.'\'';

        }
        $sets = implode(',', $sets);

        $sql = "UPDATE $table SET $sets WHERE $keyColumnName = '$id'";
		
        $this->sqlORDie($sql);
    }
	
	public function getRecordBy_ID($table, $keyColumnName, $id, $fields = "*")
	{
        $sql = "SELECT $fields FROM $table WHERE $keyColumnName = '$id'";

        $result = $this->sqlORDie($sql);
        
        return mysqli_fetch_assoc($result);
    }
	
	public function getAllRecord($table, $fields = "*")
	{
        $sql = "SELECT $fields FROM $table";

        $result = $this->sqlORDie($sql);
		
		while($row = mysqli_fetch_assoc($result)) {

            $records[] = $row;
        }
        
        return $records;
    }
	
	public function getRecordsBy_group($table, $groupKeyName, $groupID, $orderKeyName = '', $order = 'ASC', $fields = '*')
	{
        $orderSql = '';
        if($orderKeyName != '') $orderSql = " ORDER BY $orderKeyName $order";
        $sql = "SELECT * FROM $table WHERE $groupKeyName = '$groupID'" . $orderSql;

        $result = $this->sqlORDie($sql);

        while($row = mysqli_fetch_assoc($result)) {

            $records[] = $row;
        }

        return $records;
    }
	
	public function deleteRecordBy_ID($table, $keyColumnName, $id)
	{
        $sql = "DELETE FROM $table WHERE $keyColumnName = '$id'";

        $result = $this->sqlORDie($sql);
        
        return $result;
    }
	
	public function deleteAllRecord($table)
	{
        $sql = "DELETE FROM $table";

        $result = $this->sqlORDie($sql);
		
		return $result;
    }
	
	public function getJoinRecord($sql)
	{
    	$result = $this->sqlORDie($sql);
		
		while($row = mysqli_fetch_assoc($result)) {

            $records[] = $row;
        }
        
        return $records;
    }
	
	public function putJoinRecord($sql)
	{
    	$this->sqlORDie($sql);
	}
	public function con_close()
	{
		@mysqli_close( $this->conn );
	}
	
	private function sqlORDie($sql) 
	{    
        $return_result = mysqli_query($this->conn, $sql);
        if($return_result) {
            return $return_result;
        } else {
            $this->sqlError($sql);
        }
    }
	
	private function sqlError($sql) {
        echo mysqli_error($this->conn).'<br>';
        die('error: '. $sql);
    }
	
}

?>