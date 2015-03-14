<?php

class Product
{
    const MAX_IMAGE_SIZE = 10000000;            	// Maximum image size in bytes. 10 MB right now.
    const IMAGES_DIRECTORY = "img/content/item";	// The directory the images for the products are placed.

    public $id;
    public $colorCode;
    public $addedBy;
    public $name;
    public $description;
    public $price;
    public $isReserved;

    public function getImagePath()
    {
        $result = glob(Product::IMAGES_DIRECTORY. $this->id . '*');
        if ($result)
            return ROOT_DIR . "/" . $result[0];
        else
            return null;
    }
    
    public function update()
    {
    	$query = "UPDATE Product SET colorCode = ?, addedBy = ?, name = ?, description = ?, price = ?, isReserved = ? WHERE id = ?";
    
    	// Execute the update query.
    	Database::update($query, "isssdii", array($product->colorCode, $product->addedBy, $product->name, $product->description, $product->price, $product->isReserved, $product->id));
    }

    private static function createObjectFromDatabaseRow($row)
    {
        $product = new Product();
        $product->id = $row["id"];
        $product->colorCode = $row["colorCode"];
        $product->addedBy = $row["addedBy"];
        $product->name = $row["name"];
        $product->description = $row["description"];
        $product->price = $row["price"];
        $product->isReserved = $row["isReserved"];

        return $product;
    }

    public static function fetchAll()
    {
        $query = "SELECT * FROM Product";

        // Execute the query.
        $result = Database::fetch($query);

        // Put the results of the query into an array of Product objects.
        $products = array();

        for ($i = 0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
			
            $products[$i] = self::createObjectFromDatabaseRow($row);
        }

        // Free the result set.
        $result->close();

        return $products;
    }

    public static function fetchById($id)
    {
        $query = "SELECT * FROM Product WHERE id = ?";

        // Execute the query.
        $result = Database::fetch($query, "i", array($id));

        // Put the results of the query into a product object.
        $row = $result->fetch_assoc();

        $product = createObjectFromDatabaseRow($row);

        // Free the result set.
        $result->close();

        return $product;
    }

    public static function insert($colorCode, $addedBy, $name, $description, $price, $isReserved)
    {
        $query = "INSERT INTO Product (colorCode, addedBy, name, description, price, isReserved) VALUES (?, ?, ?, ?, ?, ?)";

        // Insert the product and get back the auto incremented key.
        $id = Database::insert($query, "isssdi", array($colorCode, $addedBy, $name, $description, $price, $isReserved));

        $product = new Product();
        $product->id = $id;
        $product->colorCode = $colorCode;
        $product->addedBy = $addedBy;
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->isReserved = $isReserved;

        // Return an object of the inserted product.
        return $product;
    }
}

?>