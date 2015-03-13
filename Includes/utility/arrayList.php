<?php
class ArrayList
{
    private $type;
    private $array;

    public function __construct($type)
    {
        $this->type = $type;
        $this->array = Array();
    }

    public function get($index)
    {
        return $this->array[$index];
    }
    public function add($obj)
    {
        if(!$obj instanceof $this->type)
        {
            throw new BadFunctionCallException("Cannot add " . get_class($obj) . " to arraylist, expecting: " . $this->type);
        }
        else
        {
            $this->array[] = $obj;
        }
    }
    public function addAll($objArray)
    {
        foreach($objArray as $toAdd)
        {
            if(!$toAdd instanceof $this->type)
            {
                throw new BadFunctionCallException("Cannot add " . get_class($toAdd) . " to arraylist, expecting: " . $this->type);
            }
            else
            {
                $this->array[] = $toAdd;
            }
        }
    }
    public function remove($index)
    {
        $this->array[$index] = null;
        $this->array = array_values($this->array);
    }
    public function removeAll($objArray)
    {
        foreach($objArray as $toRemove)
        {
            $result = array_search($toRemove, $this->array, true);
            if($result !== false)
            {
                $this->array[$result] = null;
            }
        }
        $this->array = array_values($this->array);
    }

    public function getType()
    {
        return $this->type;
    }
}