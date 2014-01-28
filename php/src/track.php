<?php
class Track {
	var $userDb = "adminL5a3gMp";
	var $passwordDb = "9sSyZmcTsEYD";
	var $hostDb = "127.10.115.2";
	var $db = "elecciones2014";
	
	public function tracking($id){
		//BEGIN - Open connection
		$conn = mysql_connect($this->hostDb, $this->userDb, $this->passwordDb);
		if (!$conn) {
		    die('Could not connect: ' . mysql_error());
		}
		//END - Open connection

		//BEGIN - Insert
		mysql_select_db($this->db);
		$sql = "INSERT INTO `usage` (`id`,`date`) VALUES ('" . $id . "', NOW())";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		//END - Insert
		
		//BEGIN - Close connection
		mysql_close($conn);
		//END - Close connection
	}
	
	public function comment($id, $comment){
		//BEGIN - Open connection
		$conn = mysql_connect($this->hostDb, $this->userDb, $this->passwordDb);
		if (!$conn) {
		    die('Could not connect: ' . mysql_error());
		}
		//END - Open connection

		//BEGIN - Insert
		mysql_select_db($this->db);
		$sql = "INSERT INTO `comment` (`id`,`comment`,`date`) VALUES ('" . $id . "','" . $comment . "', NOW())";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		//END - Insert
		
		//BEGIN - Close connection
		mysql_close($conn);
		//END - Close connection
	}
}
?>