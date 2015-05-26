<?php

class Database
{
    private $connectionContext;

    public function __construct($context)
    {
        $this->connectionContext = $context;
    }

	/**
	 * Helper method which returns a reference to the given array.
	 *
	 * @return A reference to the given array.
	 */
	private function makeValuesReferenced(&$arr)
	{
		$refs = array();
		foreach($arr as $key => $value)
			$refs[$key] = &$arr[$key];
		return $refs;
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
	public function select($query, $parameterTypes = null, $parameters = null)
	{
		// Create a connection to the database.
		$connection = $this->$connectionContext->connect();
		
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
        catch (Exception $e)
        {
            $connection->close();
            throw $e;
        }
        $connection->close();
		
		return $result;
	}
	
	/**
	 * Executes a given update or delete query (which it prepares based on the parameters) on the database.
	 *
	 * @param $query			The query to execute.
	 * @param $parameterTypes	The types of the parameters that are given.
	 * @param $parameters		An array of parameters to prepare into the query.
	 */
	public function update($query, $parameterTypes = null, $parameters = null)
	{
		// Create a connection to the database.
        $connection = $this->$connectionContext->connect();
		
		try
		{
			// Prepare the query.
			$preparedStatement = $connection->prepare($query);
		
			// If there are parameters.
			if ($parameters !== null)
			{
				// Bind the parameters.
				array_unshift($parameters, $parameterTypes);
				call_user_func_array(array($preparedStatement, "bind_param"), $this->makeValuesReferenced($parameters));
			}
				
			// Excecute the statement.
			$preparedStatement->execute();
			
			// Cleanup.
			$preparedStatement->close();
		}
        catch (Exception $e)
        {
            $connection->close();
            throw $e;
        }
        $connection->close();
	}
	
	/**
	 * Executes a given insert query (which it prepares based on the parameters) on the database and returns the auto incremented key if any.
	 * 
	 * @param $query String			    The query to execute.
	 * @param $parameterTypes array    	The types of the parameters that are given.
	 * @param $parameters array		    An array of parameters to prepare into the query.
	 * 
	 * @return The auto incremented ID of the new row in the table if any.
	 */
	public function insert($query, $parameterTypes = null, $parameters = null)
	{
		// Create a connection to the database.
        $connection = $this->$connectionContext->connect();
		
		try
		{
			// Prepare the query.
			$preparedStatement = $connection->prepare($query);
			
			// If there are parameters.
			if ($parameters !== null)
			{
				// Bind the parameters.
				array_unshift($parameters, $parameterTypes);
				call_user_func_array(array($preparedStatement, "bind_param"), $this->makeValuesReferenced($parameters));
			}
			
			// Excecute the statement.
			$preparedStatement->execute();
			
			// Get the ID of the inserted row so we can return it after cleanup.
			$insertId = $preparedStatement->insert_id;
			
			// Cleanup.
			$preparedStatement->close();
		}
        catch (Exception $e)
        {
            $connection->close();
            throw $e;
        }
        $connection->close();
		
		return $insertId;
	}
}