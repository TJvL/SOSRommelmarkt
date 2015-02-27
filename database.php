<?php

class Database
{
	const HOST		= "samwise.technotive.nl";
	const USERNAME	= "sosAdmin";
	const PASSWORD	= "shadowrend";
	const DATABASE	= "sosRommel";
	const PORT		= 3306;
	
	private static function makeValuesReferenced(&$arr)
	{
		$refs = array();
		foreach($arr as $key => $value)
			$refs[$key] = &$arr[$key];
		return $refs;
	}
	
	private static function connect()
	{
		// Connect to the database
		$connection = new mysqli(Database::HOST, Database::USERNAME, Database::PASSWORD, Database::DATABASE, Database::PORT);
		
		// Check if it went alright. If not show an error message.
		if ($connection->connect_errno)
			die("Connection to the database failed with: " . $connection->connect_errno . ": " . $connection->connect_error);
		
		return $connection;
	}
	
	// TODO: Cleanly close mysql connection after error.
	public static function fetch($query, $parameterTypes, $parameters)
	{
		$connection = Database::connect();
		
		// Prepare the query.
		$preparedStatement = $connection->stmt_init();
		if (!$preparedStatement->prepare($query))
			die("Preparing the query failed with: " . $preparedStatement->errno . ": " . $preparedStatement->error);
		
		// If there are parameters.
		if (func_num_args() > 1)
		{
			// Bind the parameters.
			array_unshift($parameters, $parameterTypes);
			
			if (!call_user_func_array(array($preparedStatement, 'bind_param'), makeValuesReferenced($parameters)))
				die("Binding parameters to the prepared statement failed with: " . $preparedStatement->errno . ": " . $preparedStatement->error);
		}
	
		// Excecute the statement
		if (!$preparedStatement->execute())
			die("Executing the prepared statement failed with: " . $preparedStatement->errno . ": " . $preparedStatement->error);
		
		// Get the results.
		if (!$result = $preparedStatement->get_result())
			die("Binding the results failed with: " . $preparedStatement->errno . ": " . $preparedStatement->error);
		
		$preparedStatement->close();
		$connection->close();
		
		return $result;
	}
	
	// TODO: Cleanly close mysql connection after error.
	public static function insert($query, $parameterTypes, $parameters)
	{
		$connection = Database::connect();
		
		// Prepare the query.
		$preparedStatement = $connection->stmt_init();
		if (!$preparedStatement->prepare($query))
			die("Preparing the query failed with: " . $preparedStatement->errno . ": " . $preparedStatement->error);
		
		// Bind the parameters.
		array_unshift($parameters, $parameterTypes);
		
		if (!call_user_func_array(array($preparedStatement, 'bind_param'), makeValuesReferenced($parameters)))
			die("Binding parameters to the prepared statement failed with: " . $preparedStatement->errno . ": " . $preparedStatement->error);
		
		// Excecute the statement
		if (!$preparedStatement->execute())
			die("Executing the prepared statement failed with: " . $preparedStatement->errno . ": " . $preparedStatement->error);
		
		$connection->close();
		
		return $preparedStatement->insert_id;
	}
}

?>