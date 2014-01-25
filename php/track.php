<?php
class Track {
	public function tracking($id){
		//BEGIN - Open connection
		$conn = mysql_connect('localhost', 'adminAxdwb5l', 'adI-YrkldDCK');
		if (!$conn) {
		    die('Could not connect: ' . mysql_error());
		}
		//END - Open connection

		//BEGIN - Exists id?
		$sql = "SELECT `count` FROM `usage` WHERE `id` = '" . $id . "'";
		mysql_select_db('recinto');
		$exists = mysql_query( $sql, $conn );
		if(! $exists )
		{
		  die('Could not do select query: ' . mysql_error());
		}
		$counts = mysql_result($exists, 0);
		//END - Exists id?

		//BEGIN - Insert
		if($exists == null){
			$sql = "INSERT INTO `usage` (`id`,`count`) VALUES ('" . $id . "', 1)";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
			  die('Could not enter data: ' . mysql_error());
			}
			//echo "Entered data successfully\n"; //END - Insert
		} else { //BEGIN - Update
			$counts = $counts + 1;
			$sql = "UPDATE `usage` SET `count`= " . $counts . " WHERE `id` = '" . $id . "'";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
			  die('Could not update row: ' . mysql_error());
			}
			//echo "Updated data successfully\n"; //END - Insert
		}
		//END - Update
		
		//BEGIN - Close connection
		mysql_close($conn);
		//END - Close connection
	}
}
?>