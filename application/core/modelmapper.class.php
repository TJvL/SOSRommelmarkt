<?php

class ModelMapper
{
    private $strictRules; //Defines if strict rules are enforced in the application regarding mapping http request variables.

    public function __construct($strictRules)
    {
        $this->strictRules = $strictRules;
    }

    /**
     * Only if strict rules are enforced on this server!
     * Maps all POST data to a model class as long as the request contains the model class name in a variable named: "modelName"
     *
     * @returns Mixed           Returns null if nothing was mapped or an instance of the given model with all matched POST data mapped to it's variables.
     * @throws Exception        When no model class was found or when no model name was supplied in the http request.
     */
    public function mapToModel()
    {
        $model = null;

//        if($this->strictRules)
//        {
            if(isset($_POST["modelName"]))
            {
                $modelName = $_POST["modelName"];
                if(class_exists($modelName))
                {
                    $model = new $modelName();
                    $vars = get_class_vars($modelName);

                    for ($i = 0; $i < count($vars); $i++)
                    {
                        $var = key($vars);
                        if(array_key_exists($var, $_POST))
                        {
                            $model->$var = $_POST[$var];
                        }
                        else
                        {
                            $model->$var = null;
                        }
                        next($vars);
                    }
//                    unset($_POST);
                }
                else
                {
//                    throw new Exception("$modelName class not found.", 400);
                }
            }
            else
            {
//                throw new Exception("No model name was supplied.", 400);
            }
//        }

        return $model;
    }
}