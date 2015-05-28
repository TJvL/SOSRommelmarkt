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

        //Look in it's __construct function for parameters.
        //The name of these parameters must match the desired class name that it wants as value.
        $controllerDependencyNames = $controllerReflection->getConstructor()->getParameters();

        //Create a collection to hold all the dependencies.
        $controllerDependencies = array();

        //Iterate through the dependency class names.
        foreach ($controllerDependencyNames AS $dependency)
        {
            try
            {
                //If the dependency name contains Repository.
                if (strpos($dependency->name, "Repository"))
                {
                    //Create a repository using the RepositoryFactory set in __construct.
                    //This is needed because a repository needs a database object to execute it's queries.
                    $controllerDependencies[$dependency->name] = $this->repositoryFactory->createRepository($dependency->name);
                } else
                {
                    //Else just find the desired class and post a new instance of it inside the collection.
                    $reflectionClass = new ReflectionClass($dependency->name);
                    $controllerDependencies[$dependency->name] = $reflectionClass->newInstance();
                }
            }
            catch (Exception $ex)
            {
                //When something went wrong trying to create a dependency throw an exception.
                $exception = new Exception("Something went wrong while trying to create the controller class, check inner exception.", 500, $ex);
                throw $exception;
            }
        }

        //Return a new instance of the controller class with all needed dependencies set through it __construct function.
        return $controllerReflection->newInstanceArgs($controllerDependencies);
    }
}