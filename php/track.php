<?php
class Track {
	public function tracking($id){
		//BEGIN - Open connection
		$conn = mysql_connect('localhost', 'adminL5a3gMp', '9sSyZmcTsEYD');
		if (!$conn) {
		    die('Could not connect: ' . mysql_error());
		}
		//END - Open connection

		//BEGIN - Insert
		mysql_select_db('elecciones2014');
		$sql = "INSERT INTO `usage` (`id`,`date`) VALUES ('" . $id . "', NOW())";
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		//echo "Entered data successfully\n";
		//END - Insert
		
		//BEGIN - Close connection
		mysql_close($conn);
		//END - Close connection
	}
}
?>