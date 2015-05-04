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
	 * Makes a connection to the database and returns it.
	 *
	 * @return A mysqli object with a valid connection to the database.
	 */
	private static function connect()
	{
		// Throw exceptions on error.
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		
		// Connect to the database
		$connection = new mysqli(Database::HOST, Database::USERNAME, Database::PASSWORD, Database::DATABASE, Database::PORT);
		
		// Return the connection.
		return $connection;
	}
	
	/**
	 * Executes a given select query (which it prepares based on the parameters) on the database and returns the resultset.
	 *
	 * @param $query			The query to execute.
	 * @param $parameterTypes	The types of the parameters that are given.
	 * @param $parameters		An array of parameters to prepare into the query.
	 * 
	 * @return A mysqli_result object with the results.
	 */
	public static function select($query, $parameterTypes = null, $parameters = null)
	{
		// Create a connection to the database.
		$connection = Database::connect();
		
		try
		{
			// Prepare the query.
			$preparedStatement = $connection->prepare($query);
			
			// If there are parameters.
			if ($parameters !== null)
			{
				// Bind the parameters.
				array_unshift($parameters, $parameterTypes);
				call_user_func_array(array($preparedStatement, "bind_param"), Database::makeValuesReferenced($parameters));
			}
		
			// Excecute the statement.
			$preparedStatement->execute();
	
			// Get the results.
			$result = $preparedStatement->get_result();
			
			// Cleanup.
			$preparedStatement->close();
		}
		finally
		{
			// Close database connection even if an exception occurs.
			$connection->close();
		}
		
		return $result;
	}
	
	/**
	 * Executes a given update or delete query (which it prepares based on the parameters) on the database.
	 *
	 * @param $query			The query to execute.
	 * @param $parameterTypes	The types of the parameters that are given.
	 * @param $parameters		An array of parameters to prepare into the query.
	 */
	public static function update($query, $parameterTypes = null, $parameters = null)
	{
		// Create a connection to the database.
		$connection = Database::connect();
		
		try
		{
			// Prepare the query.
			$preparedStatement = $connection->prepare($query);
		
			// If there are parameters.
			if ($parameters !== null)
			{
				// Bind the parameters.
				array_unshift($parameters, $parameterTypes);
				call_user_func_array(array($preparedStatement, "bind_param"), Database::makeValuesReferenced($parameters));
			}
				
			// Excecute the statement.
			$preparedStatement->execute();
			
			// Cleanup.
			$preparedStatement->close();
		}
		finally
		{
			// Close database connection even if an exception occurs.
			$connection->close();
		}
	}
	
	/**
	 * Executes a given insert query (which it prepares based on the parameters) on the database and returns the auto incremented key if any.
	 * 
	 * @param $query			The query to execute.
	 * @param $parameterTypes	The types of the parameters that are given.
	 * @param $parameters		An array of parameters to prepare into the query.
	 * 
	 * @return The auto incremented ID of the new row in the table if any.
	 */
	public static function insert($query, $parameterTypes = null, $parameters = null)
	{
		// Create a connection to the database.
		$connection = Database::connect();
		
		try
		{
			// Prepare the query.
			$preparedStatement = $connection->prepare($query);
			
			// If there are parameters.
			if ($parameters !== null)
			{
				// Bind the parameters.
				array_unshift($parameters, $parameterTypes);
				call_user_func_array(array($preparedStatement, "bind_param"), Database::makeValuesReferenced($parameters));
			}
			
			// Excecute the statement.
			$preparedStatement->execute();
			
			// Get the ID of the inserted row so we can return it after cleanup.
			$insertId = $preparedStatement->insert_id;
			
			// Cleanup.
			$preparedStatement->close();
		}
		finally
		{
			// Close database connection even if an exception occurs.
			$connection->close();
		}
		
		return $insertId;
	}
}

?>