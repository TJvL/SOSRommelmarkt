<?php

class AccountRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

	private function createObjectFromArray($array)
	{
		$account = new Account();
		$account->name = $array["name"];
		$account->role = $array["role"];
		$account->passwordHash = $array["passwordHash"];
	
		return $account;
	}
	
	public function insert($name, $role, $passwordHash)
	{
		$query = "INSERT INTO Account (name, passwordHash)
			VALUES (?, ?, ?)";

        $this->database->insert($query, "sss", array($name, $role, $passwordHash));
		
		$account = new Account();
		$account->name = $name;
		$account->role = $role;
		$account->passwordHash = $passwordHash;
		
		return $account;
	}
	
	public function selectAll()
	{
		$query = "SELECT *
			FROM Account";
		
		$result = $this->database->select($query);
		
		$accounts = array();
		
		for ($i = 0; $i < $result->num_rows; $i++)
		{
			$row = $result->fetch_assoc();
		
			$accounts[$i] = $this->createObjectFromArray($row);
		}
		
		$result->close();
	
		return $accounts;
	}
	
	public function selectByName($name)
	{
		$query = "SELECT *
			FROM Account
			WHERE name = ?";
	
		$result = $this->database->select($query, "s", array($name));
	
		$row = $result->fetch_assoc();
		
		if ($row !== null)
			$account = $this->createObjectFromArray($row);
		else
			$account = null;
	
		$result->close();
	
		return $account;
	}
	
	public function update($account)
	{
		$query = "UPDATE Account
			SET role = ?, passwordHash = ?
			WHERE name = ?";

        $this->database->update($query, "sss", array($account->role, $account->passwordHash, $account->name));
	}
	
	public function deleteByName($name)
	{
		$query = "DELETE FROM Account WHERE name = ?";

        $this->database->update($query, "s", array($name));
	}
}