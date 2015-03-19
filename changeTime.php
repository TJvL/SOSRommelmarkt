<?php require "database.php" ?>


<?php




	// $data = mysqli_query("SELECT * FROM changeTime")  or die(mysql_error());
	// $info = mysql_fetch_array( $data );

// $aVar = mysqli_connect('localhost','tdoylex1_dork','dorkk','tdoylex1_dork');

	$query1 = mysqli_query( "SELECT Maandag FROM changeTime");
	$maandag1 = $query1;




	var_dump($maandag1)


?>