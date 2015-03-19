<?php

abstract class Product
{
    // Maximum image size in bytes. 10 MB right now.
    const MAX_IMAGE_SIZE = 10000000;

    public $id;
    public $name;
    public $description;
    public $addedBy;

    abstract static public function getImagesDirectory();

    public function getImagePath()
    {
        $result = glob($this->getImagesDirectory(). $this->id . '*');
        if ($result)
            return ROOT_DIR . "/" . $result[0];
        else
            return null;
    }

    protected static function insert($name, $description, $addedBy)
    {
        $query = "INSERT INTO Product (name, description, addedBy)
                                VALUES (?, ?, ?)";

        // Insert the product and get back the auto incremented key.
        return Database::insert($query, "sss", array($name, $description, $addedBy));
    }

    protected function update()
    {
        $query = "UPDATE Product SET name = ?, description = ?, addedBy = ? WHERE id = ?";

        // Execute the update query.
        Database::update($query, "sssi", array($this->name, $this->description, $this->addedBy, $this->id));
    }


}

?>