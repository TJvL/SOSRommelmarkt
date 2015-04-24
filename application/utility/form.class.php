<?php
class Form
{
    //This was cool when we used razor, so I re-made it

    //open form that posts to the same controller/page
    public static function start()
    {
        echo '<form action="' . $_SERVER['REQUEST_URI'] . '" method="POST">';
    }

    //no hassling with the selectlist.
    public static function dropDownFor($target, $target_prop, $elements, $element_prop, $element_display)
    {
        echo '<select name="' . $target_prop . '">';
        foreach($elements as $element)
        {
            $selected = "";
            if($target->{"get" . ucfirst($target_prop)}() == $element->{"get" . ucfirst($element_prop)}())
            {
                $selected = "selected";
            }
            echo '<option ' . $selected . ' value="' . $element->{"get" . ucfirst($element_prop)}() . '">' . $element->{"get" . ucfirst($element_display)}() . '</option>';
        }
        echo '</select>';
    }
    public static function dropDown($name, $elements, $element_prop, $element_display)
    {
        echo '<select name="' . $name . '">';
        foreach($elements as $element)
        {
            echo '<option value="' . $element->{"get" . ucfirst($element_prop)}() . '">' . $element->{"get" . ucfirst($element_display)}() . '</option>';
        }
        echo '</select>';
    }

    //just pass value through unchanged
    public static function hiddenFor($target, $target_prop)
    {
        echo '<input type="hidden" name="' . $target_prop . '" value="' . $target->{"get" . ucfirst($target_prop)}(). '">';
    }
    public static function hidden($name, $value)
    {
        echo '<input type="hidden" name="' . $name . '" value="' . $value . '">';
    }

    //generic entry
    public static function inputFor($target, $target_prop)
    {
        echo '<input type="text" name="' . $target_prop . '" value="' . $target->{"get" . ucfirst($target_prop)}() . '" />';
    }
    public static function input($name)
    {
        echo '<input type="text" name="' . $name . '" value="" />';
    }

    //long texts
    public static function textAreaFor($target, $target_prop)
    {
        echo '<textarea name="' . $target_prop . '">' . $target->{"get" . ucfirst($target_prop)}() . '</textarea>';
    }
    public static function textArea($name)
    {
        echo '<textarea name="' . $name . '"></textarea>';
    }

    //close form + required button
    public static function end($button)
    {
        echo '<input type="submit" value="' . $button . '">';
        echo "</form>";
    }
}
?>