<?php

class RepositoryFactory
{
    private $dbCons;

    public function __construct($dbCons)
    {
        $this->dbCons = $dbCons;
    }

    public function createRepository($name)
    {
        $repositoryReflection = new ReflectionClass($name);

        $classDirName = $this->getClassDirName(dirname($repositoryReflection->getFileName()));

        if(array_key_exists($classDirName, $this->dbCons))
        {
            $config = $this->dbCons[$classDirName];
            $context = new ConnectionContext($config['host'], $config['username'], $config['password'], $config['database'], $config['port']);
            $database = new Database($context);
            return $repositoryReflection->newInstance($database);
        }
        else
        {
            throw new ReflectionException("The repository class is not located in the proper directory. It must be located either in application/model/repositories/" . MAIN_DB . " or in application/model/repositories/" . USER_DB);
        }
    }

    private function getClassDirName($classDirPath)
    {
        $temp = null;
        if(strpos($classDirPath, "\\"))
        {
            $temp = explode("\\", $classDirPath);
        }
        else
        {
            $temp = explode("/", $classDirPath);
        }
        end($temp);
        $classDirName = $temp[key($temp)];
        reset($temp);
        return $classDirName;
    }
}