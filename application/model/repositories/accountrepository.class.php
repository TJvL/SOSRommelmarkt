<?php

class AccountRepository
{
	private static function createObjectFromArray($array)
	{
		$account = new Account();
		$account->name = $array["name"];
		$account->role = $array["role"];
		$account->passwordHash = $array["passwordHash"];
	
		return $account;
	}
	
	public static function insert($name, $role, $passwordHash)
	{
		$query = "INSERT INTO Account (name, passwordHash)
			VALUES (?, ?, ?)";
		
		Database::insert($query, "sss", array($name, $role, $passwordHash));
		
		$account = new Account();
		$account->name = $name;
		$account->role = $role;
		$account->passwordHash = $passwordHash;
		
		return $account;
	}
	
	public static function selectAll()
	{
		$query = "SELECT *
			FROM Account";
		
		$result = Database::select($query);
		
		$accounts = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
		
			$accounts[$i] = AccountRepository::createObjectFromArray($row);
		}
		
		$result->close();
	
		return $accounts;
	}
	
	public static function selectByName($name)
	{
		$query = "SELECT *
			FROM Account
			WHERE name = ?";
	
		$result = Database::select($query, "s", array($name));
	
		$row = $result->fetch_assoc();
		
		if ($row !== null)
			$account = AccountRepository::createObjectFromArray($row);
		else
			$account = null;
	
		$result->close();
	
		return $account;
	}
	
	public static function update($account)
	{
		$query = "UPDATE Account
			SET role = ?, passwordHash = ?
			WHERE name = ?";
		
		Database::update($query, "sss", array($account->role, $account->passwordHash, $account->name));
	}
	
	public static function deleteByName($name)
	{
		$query = "DELETE FROM Account WHERE name = ?";
		
		Database::update($query, "s", array($name));
	}
}

?>