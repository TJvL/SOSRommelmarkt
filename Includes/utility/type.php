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

        if(is_array($model))
        {
            echo "ERROR: arrays are not allowed in strongly typed environments. Please use ArrayList class";
            throw new Exception("Failed to ensure model integrity");
        }

        if(isset($model) && $model instanceof ArrayList && !(explode(":",$type)[1] == $model->getType()))
        {
            echo "ERROR: " . explode(":",$type)[1]  . " [listed] object expected for strongly typed view, but input was " . $model->getType() . ".";
            throw new Exception("Failed to verify model.");
        }

        if(isset($model) && !$model instanceof $type && !$model instanceof ArrayList)
        {
            echo "ERROR: " . $type . " object expected for strongly typed view, but input was " . get_class($model) . ".";
            throw new Exception("Failed to verify model.");
        }
    }
}
?>