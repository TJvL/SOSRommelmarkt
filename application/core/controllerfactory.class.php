<?php

class ControllerFactory
{
    private $repositoryFactory;

    public function __construct($repositoryFactory)
    {
        $this->repositoryFactory = $repositoryFactory;
    }

    /**
     * @param $routeObject RouteObject      An object used in the core application when routing a client request. Will be used to know what controller to create.
     * @return Mixed                        Returns the newly created controller with all it's dependencies, set for use.
     * @throws Exception                    Us thrown when something went wrong trying to create the controllers dependencies.
     */
    public function createController($routeObject)
    {
        //Get a reflection class of the desired controller.
        $controllerReflection =  new ReflectionClass($routeObject->controller);

        //Reflect the class' properties
        //The name of these properties must match the desired type it wants as value.
        $controllerProperties = $controllerReflection->getProperties();

        //Create the controller.
        $controller = $controllerReflection->newInstance();

        //Iterate through the properties.
        foreach ($controllerProperties AS $property)
        {
            $propertyName = $property->getName();
            if(class_exists($propertyName))//The property name must be a class name.
            {
                try
                {
                    //If the dependency name contains Repository.
                    if (strpos($propertyName, "Repository"))
                    {
                        //Create a repository using the RepositoryFactory
                        //This is needed because a repository needs a database object to execute it's queries.
                        $controller->$propertyName = $this->repositoryFactory->createRepository($propertyName);
                    }
                    else
                    {
                        //Else just find the desired class and post a new instance of it inside the collection.
                        $reflectionClass = new ReflectionClass($propertyName);
                        $controller->$propertyName = $reflectionClass->newInstance();
                    }
                }
                catch (Exception $ex)
                {
                    //When something went wrong trying to create a dependency throw an exception.
                    $exception = new Exception("Something went wrong while trying to create the controller class, check inner exception.", 500, $ex);
                    throw $exception;
                }
            }
        }

        //Return a new instance of the controller class with all needed dependencies set.
        return $controller;
    }
}