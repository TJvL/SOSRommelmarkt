<?php
class Type
{
    public static function check($type, $model)
    {
        if(!isset($model))
        {
            echo "ERROR: no model was detected for strongly typed view. Please use the 'renderStrongView(\$action, \$model)' function to generate this view.";
            throw new Exception("Failed to detect model.");
        }
        if(isset($model) && !$model instanceof $type)
        {
            echo "ERROR: " . $type . " object expected for strongly typed view, but input was " . get_class($model);
            throw new Exception("Failed to verify model.");
        }
    }
}
?>