<?php
include_once("config_open_db.php");

//define index
isset( $_REQUEST['name'] ) ? $name=$_REQUEST['name'] : $name='';

// just to escape undesirable characters
$name = mysql_real_escape_string( $name );

if( empty( $name )){
	// this will be displayed if search value is blank
	echo "Please enter a name!";
}else{
	// this part will perform our database query
	$sql = "select * from sample where firstname like '%$name%'";

	$rs = mysql_query( $sql ) or die('Database Error: ' . mysql_error());
	$num = mysql_num_rows( $rs );
	
	if($num >= 1 ){
		// this will display how many records found
		// and also the actual record
		echo "<div style='margin: 0 0 10px 0; font-weight: bold;'>$num record(s) found!</div>";
		
		while($row = mysql_fetch_array( $rs )){
			echo "<div>" . $row['firstname'] . " " . $row['lastname'] ."</div>";
		}
	}else{
		// if no records found
		echo "<b>Name not found!</b>";
	}
}
?>