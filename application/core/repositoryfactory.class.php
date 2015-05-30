<?php

class RepositoryFactory
{
    private $dbCons; //All databases connection parameters configured inside config.inc.php

    public function __construct($dbCons)
    {
        $this->dbCons = $dbCons;
    }

    /**
     * @param $name String              The name of the to be created repository.
     * @return Mixed                    Returns an instance of the requested repository type
     * @throws ReflectionException      When the repository was not located in the right directory.
     */
    public function createRepository($name)
    {
        $repositoryReflection = new ReflectionClass($name);

        //Look where the repository class FILE is located.
        //Get the directory name of the repository .class.php file.
        $classDirName = $this->getClassDirName(dirname($repositoryReflection->getFileName()));

        //The directory name must match one of the keys in the dbCons collection.
        if(array_key_exists($classDirName, $this->dbCons))
        {
            //If it does then create a database object with a connection context configured to connect to the found db connection config.
            $config = $this->dbCons[$classDirName];
            $context = new ConnectionContext($config['host'], $config['username'], $config['password'], $config['database'], $config['port']);
            $database = new Database($context);
            return $repositoryReflection->newInstance($database);
        }
        else
        {
            //Else something went wrong, the dbCons collection did not contain a key matching the name of the directory the repository's .class.php file is located.
            throw new ReflectionException("The repository class is not located in the proper directory. It must be located either in application/model/repositories/" . MAIN_DB . " or in application/model/repositories/" . USER_DB);
        }
    }

    /**
     * Supply a path string (like "this/is/a/path") and return the last directory in the path
     * (last example that would be "this/is/a/>>path<<", so this function would return: "path")
     *
     * @param $classDirPath String  Path string to extract last directory name from.
     * @return String               Returns the name of the directory at the end of given path string.
     */
    private function getClassDirName($classDirPath)
    {
        $temp = null;
        if(strpos($classDirPath, "\\"))//Check if windows type path separators are used.
        {
            $temp = explode("\\", $classDirPath);
        }
        else //Else use unix path separator.
        {
            $temp = explode("/", $classDirPath);
        }
        end($temp);//Move the resulting arrays internal index pointer to the last index.
        $classDirName = $temp[key($temp)]; //Get the array entry that the internal index pointer is pointing to.
        reset($temp); //Reset the internal index pointer.
        return $classDirName;
    }
}