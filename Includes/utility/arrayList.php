<?php
class ArrayList implements Iterator
{
    //Iterator implementation variables
    private $curr;

    //Arraylist variables
    private $type;
    private $array;
    private $size;

    public function __construct($type)
    {
        $this->type = $type;
        $this->array = Array();
        $this->curr = 0;
        $this->size = 0;
    }

    public function size()
    {
        return count($this->array);
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
            $this->size = $this->size+1;
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
                $this->size = $this->size+1;
            }
        }
    }
    public function remove($index)
    {
        if($this->array[$index] != null){ $this->size = $this->size-1; }
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
                $this->size = $this->size-1;
            }
        }
        $this->array = array_values($this->array);
    }

    public function getType()
    {
        return $this->type;
    }

    //Iteraror Implementation Classes
    public function current()
    {
        return $this->array[$this->curr];
    }

    public function next()
    {
        $this->curr = $this->curr + 1;
    }

    public function key()
    {
        return $this->curr;
    }

    public function valid()
    {
        return isset($this->array[$this->curr]);
    }

    public function rewind()
    {
        $this->curr = 0;
    }
}