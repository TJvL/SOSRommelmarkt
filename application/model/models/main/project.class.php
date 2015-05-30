<?php
class Project
{
    // The directory the images for the products are placed.
    const IMAGES_DIRECTORY = "img/projects";

    public $id;
    public $title;
    public $body;

    public function getImagePaths()
    {
        $result = glob(Project::IMAGES_DIRECTORY . "/" . $this->id . "/" . "*");
        if ($result)
        {
            $imagePaths = array();

            foreach ($result as $key => $imagePath)
            {
                $imagePaths[$key] = ROOT_PATH . "/" . $imagePath;
            }

            return $imagePaths;
        }
        else
            return array();
    }

}
?>