<?php

class AccountHelper
{
    /**
     * @return string       Returns a randomly generated 16 character string.
     */
    public static function getNewSalt()
    {
        return dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
    }

    /**
     * @param $password string          The password to be hashed.
     * @param $salt string              A string to be included in the password when hashed.
     * @return null|string              Returns the hashed password or null when one or both of the parameters where not set.
     */
    public static function hashPassword($password, $salt)
    {
        if((!empty($password))&&(!empty($salt)))
        {
            $hashedPassword = hash('sha256', $password . $salt);
            //Hash password 65536 more times.
            for ($i = 0; $i < 65536; $i++)
            {
                $hashedPassword = hash('sha256', $hashedPassword . $salt);
            }
            return $hashedPassword;
        }
        return null;
    }

    /**
     * Checks if a user is logged in currently.
     *
     * @return null|AccountViewModel        Returns user information when logged in else it returns null.
     */
    public static function getUserInfo()
    {
        if(array_key_exists("user", $_SESSION))
        {
            if (isset($_SESSION["user"]))
            {
                return $_SESSION["user"];
            }
        }
        return null;
    }
}