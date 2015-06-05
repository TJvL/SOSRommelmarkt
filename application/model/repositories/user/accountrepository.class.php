<?php

class AccountRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

	private function mapRowToModel($row)
	{
		$account = new Account();
        $account->id = $row["id"];
        $account->roleName = $row["roleName"];
		$account->username = $row["username"];
		$account->email = $row["email"];
		$account->passwordHash = $row["passwordHash"];
        $account->salt = $row["salt"];
        $account->lastLogin = $row["lastLogin"];
	
		return $account;
	}
	
	public function insert($account)
	{
		$query = "INSERT INTO Account (roleName, username, email, passwordHash, salt)
			VALUES (?, ?, ?, ?, ?)";
        $parameters = array($account->roleName, $account->username, $account->email, $account->passwordHash, $account->salt);
        $paramTypes = "sssss";

        $id = $this->database->insert($query, $paramTypes, $parameters);

		return $id;
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
		    $account = $this->mapRowToModel($row);
			$accounts[$account->id] = $account;
		}
		
		$result->close();
	
		return $accounts;
	}
	
	public function selectById($id)
	{
		$query = "SELECT *
			FROM Account
			WHERE id = ?";
	    $parameters = array($id);
        $paramTypes = "s";

		$result = $this->database->select($query, $paramTypes, $parameters);

        $account = null;
        if($result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            $account = $this->mapRowToModel($row);
        }
	
		$result->close();
	
		return $account;
	}
	
	public function update($account)
	{
		$query = "UPDATE Account
			SET roleName = ?, username = ?, email = ?, passwordHash = ?, salt = ?
			WHERE id = ?";
        $parameters = array($account->roleName, $account->username, $account->email, $account->passwordHash, $account->salt, $account->id);
        $paramTypes = "ssssss";

        $this->database->update($query, $paramTypes, $parameters);
	}
	
	public function deleteById($id)
	{
		$query = "DELETE FROM Account WHERE id = ?";
        $parameters = array($id);
        $paramTypes = "s";

        $this->database->update($query, $paramTypes, $parameters);
	}

    public function setLastLogin($id)
    {
        $query = "UPDATE Account
			SET lastLogin = NOW()
			WHERE id = ?";
        $parameters = array($id);
        $paramTypes = "s";

        $this->database->update($query, $paramTypes, $parameters);
    }
}