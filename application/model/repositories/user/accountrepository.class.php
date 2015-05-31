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
        $account->id = $array["id"];
        $account->roleName = $array["roleName"];
		$account->username = $array["username"];
		$account->email = $array["email"];
		$account->passwordHash = $array["passwordHash"];
        $account->salt = $array["salt"];
	
		return $account;
	}
	
	public function insert($account)
	{
		$query = "INSERT INTO Account (roleName, username, email, passwordHash, salt)
			VALUES (?, ?, ?)";

        $id = $this->database->insert($query, "sss", array($account->role, $account->username, $account->email, $account->passwordHash, $account->salt));

        $account->id = $id;

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
	
	public function selectById($id)
	{
		$query = "SELECT *
			FROM Account
			WHERE id = ?";
	
		$result = $this->database->select($query, "s", array($id));
	
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
			SET roleName = ?, username = ?, email = ?, passwordHash = ?, salt = ?
			WHERE id = ?";

        $this->database->update($query, "sss", array($account->role, $account->passwordHash, $account->name));
	}
	
	public function deleteById($id)
	{
		$query = "DELETE FROM Account WHERE id = ?";

        $this->database->update($query, "s", array($id));
	}
}