<?php

class ModelMapper
{
    private $strictRules; //Defines if strict rules are enforced in the application regarding mapping http request variables.

    public function __construct($strictRules)
    {
        $this->strictRules = $strictRules;
    }


    /**
     * @return mixed|null   If the modelName variable was set in the post request it will attempt to bind the post variable to that class.
     *                      If no modelName was set then the post variables will be returned as an array or if it is just one value that value is returned.
     * @throws Exception    Is thrown when a modelName was defined but no such class is found to bind to.
     */
    public function mapToModel()
    {
        $model = null;

        if($this->strictRules)
        {
            if(isset($_POST["modelName"]))
            {
                $modelName = $_POST["modelName"];
                if(class_exists($modelName))
                {
                    $model = new $modelName();
                    $vars = get_class_vars($modelName);

                    foreach ($vars as $name=>$value)
                    {
                        if((array_key_exists($name, $_POST))&&(!empty($_POST[$name])))
                        {
                            $model->$name = $_POST[$name];
                        }
                        else
                        {
                            $model->$name = null;
                        }
                    }
                }
                else
                {
                    throw new Exception("$modelName class not found.", 400);
                }
            }
            else
            {
                if(count($_POST) == 1)
                {
                    $model = current($_POST);
                }
                elseif(count($_POST) > 1)
                {
                    $model = $_POST;
                }
            }
        }
//        unset($_POST);
        return $model;
    }
}