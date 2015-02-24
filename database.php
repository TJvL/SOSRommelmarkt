<?php

include("product.php");

const HOST		= "samwise.technotive.nl";
const USERNAME	= "sosAdmin";
const PASSWORD	= "shadowrend";
const DATABASE	= "sosRommel";
const PORT		= 3306;

function makeValuesReferenced(&$arr)
{
	$refs = array();
	foreach($arr as $key => $value)
		$refs[$key] = &$arr[$key];
	return $refs;
}

function connect()
{
	// Connect to the database
	$connection = new mysqli(HOST, USERNAME, PASSWORD, DATABASE, PORT);
		
	// Check if it went alright. If not show an error message.
	if ($connection->connect_errno)
		die("Connection to the database failed with: " . $connection->connect_errno . ": " . $connection->connect_error);
	
	return $connection;
}

function fetch($query, $parameterTypes, $parameters)
{
	$connection = connect();
	
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
	
	return $result;
}

function insert($query, $parameterTypes, $parameters)
{
	$connection = connect();
	
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
	
	return $preparedStatement->insert_id;
}

function fetchProducts()
{
	$query = "SELECT * FROM Product";
	
	$result = fetch($query);
	
	$products = array();
	
	for ($i = 0; $i < $result->num_rows; $i++)
	{
		$row = $result->fetch_assoc();
		
		$products[$i] = new Product();
		$products[$i]->id = $row["id"];
		$products[$i]->colorCode = $row["colorCode"];
		$products[$i]->addedBy = $row["addedBy"];
		$products[$i]->name = $row["name"];
		$products[$i]->description = $row["description"];
		$products[$i]->image = $row["image"];
	}
	
	// Free the result set.
	$result->close();
	
	return $products;
}

function insertProduct($colorCode, $addedBy, $name, $description, $image)
{
	$query = "INSERT INTO Product (colorCode, addedBy, name, description, image) VALUES (?, ?, ?, ?, ?)";
	
	$id = insert($query, "isssb", $colorCode, $addedBy, $name, $description, $image);
	
	$product = new Product();
	$product->id = $id;
	$product->colorCode = $colorCode;
	$product->addedBy = $addedBy;
	$product->name = $name;
	$product->description = $description;
	$product->image = $image;
		
	return $product;
}

?>