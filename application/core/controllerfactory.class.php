<?php

class ControllerFactory
{
    private $repositoryFactory;

    public function __construct($repositoryFactory)
    {
        $this->repositoryFactory = $repositoryFactory;
    }

    public function createController($routeObject)
    {
        $controllerReflection =  new ReflectionClass($routeObject->controller);
        $controllerDependencyNames = $controllerReflection->getConstructor()->getParameters();
        $controllerDependencies = array();

        foreach ($controllerDependencyNames AS $dependency)
        {
            try
            {
                if (strpos($dependency->name, "Repository"))
                {
                    $controllerDependencies[$dependency->name] = $this->repositoryFactory->createRepository($dependency->name);
                } else
                {
                    $reflectionClass = new ReflectionClass($dependency->name);
                    $controllerDependencies[$dependency->name] = $reflectionClass->newInstance();
                }
            }
            catch (Exception $ex)
            {
                $exception = new Exception("Something went wrong while trying to create the controller class, check inner exception.", 500, $ex);
                throw $exception;
            }
        }

        return $controllerReflection->newInstanceArgs($controllerDependencies);;
    }
}