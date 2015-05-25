<?php

class ModelMapper
{
    public function mapToModel()
    {
        $model = null;

        if(STRICT_RULES)
        {
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
                    unset($_POST);
                }
                else
                {
                    throw new Exception("$modelName class not found.", 400);
                }
            }
            else
            {
                throw new Exception("No model name was supplied.", 400);
            }
        }

        return $model;
    }
}