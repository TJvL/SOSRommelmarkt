<?php

class Database
{
	const HOST		= "samwise.technotive.nl";
	const USERNAME	= "sosAdmin";
	const PASSWORD	= "shadowrend";
	const DATABASE	= "sosRommel";
	const PORT		= 3306;
	
	/**
	 * Helper method which returns a reference to the given array.
	 *
	 * @return A reference to the given array.
	 */
	private static function makeValuesReferenced(&$arr)
	{
		$refs = array();
		foreach($arr as $key => $value)
			$refs[$key] = &$arr[$key];
		return $refs;
	}
	
	/**
	 * Makes a connection with the database and returns it.
	 *
	 * @return A mysqli object with a valid connection to the database.
	 */
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
	/**
	 * Executes a given select query (which it prepares based on the parameters) on the database and returns the resultset.
	 *
	 * @param $query			The query to execute.
	 * @param $parameterTypes	The types of the parameters that are given.
	 * @param $parameters		An array of parameters to prepare into the query.
	 * @return A mysqli_result object with the results.
	 */
	public static function fetch($query, $parameterTypes = null, $parameters = null)
	{
		$connection = Database::connect();
		
		// Prepare the query.
		$preparedStatement = $connection->stmt_init();
		if (!$preparedStatement->prepare($query))
			die("Preparing the query failed with: " . $preparedStatement->errno . ": " . $preparedStatement->error);
		
		// If there are parameters.
		if ($parameters !== null)
		{
			// Bind the parameters.
			array_unshift($parameters, $parameterTypes);
			
			if (!call_user_func_array(array($preparedStatement, 'bind_param'), Database::makeValuesReferenced($parameters)))
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
	/**
	 * Executes a given update query (which it prepares based on the parameters) on the database.
	 *
	 * @param $query			The query to execute.
	 * @param $parameterTypes	The types of the parameters that are given.
	 * @param $parameters		An array of parameters to prepare into the query.
	 * @return The auto incremented ID of the new row in the table if any.
	 */
	public static function update($query, $parameterTypes = null, $parameters = null)
	{
		$connection = Database::connect();
	
		// Prepare the query.
		$preparedStatement = $connection->stmt_init();
		if (!$preparedStatement->prepare($query))
			die("Preparing the query failed with: " . $preparedStatement->errno . ": " . $preparedStatement->error);
	
		// If there are parameters.
		if ($parameters !== null)
		{
			// Bind the parameters.
			array_unshift($parameters, $parameterTypes);
			
			if (!call_user_func_array(array($preparedStatement, 'bind_param'), Database::makeValuesReferenced($parameters)))
				die("Binding parameters to the prepared statement failed with: " . $preparedStatement->errno . ": " . $preparedStatement->error);
		}
			
		// Excecute the statement
		if (!$preparedStatement->execute())
			die("Executing the prepared statement failed with: " . $preparedStatement->errno . ": " . $preparedStatement->error);
		
		$preparedStatement->close();
		$connection->close();
	}
	
	// TODO: Cleanly close mysql connection after error.
	/**
	 * Executes a given insert query (which it prepares based on the parameters) on the database and returns the auto incremented key if any.
	 * 
	 * @param $query			The query to execute.
	 * @param $parameterTypes	The types of the parameters that are given.
	 * @param $parameters		An array of parameters to prepare into the query.
	 * @return The auto incremented ID of the new row in the table if any.
	 */
	public static function insert($query, $parameterTypes = null, $parameters = null)
	{
		$connection = Database::connect();
		
		// Prepare the query.
		$preparedStatement = $connection->stmt_init();
		if (!$preparedStatement->prepare($query))
			die("Preparing the query failed with: " . $preparedStatement->errno . ": " . $preparedStatement->error);
		
		// If there are parameters.
		if ($parameters !== null)
		{
			// Bind the parameters.
			array_unshift($parameters, $parameterTypes);
			
			if (!call_user_func_array(array($preparedStatement, 'bind_param'), Database::makeValuesReferenced($parameters)))
				die("Binding parameters to the prepared statement failed with: " . $preparedStatement->errno . ": " . $preparedStatement->error);
		}
		
		// Excecute the statement
		if (!$preparedStatement->execute())
			die("Executing the prepared statement failed with: " . $preparedStatement->errno . ": " . $preparedStatement->error);
		
		$insertId = $preparedStatement->insert_id;
		
		$preparedStatement->close();
		$connection->close();
		
		return $insertId;
	}
}

?>