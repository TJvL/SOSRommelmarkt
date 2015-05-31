<?php

class ProjectAPIController extends APIController
{
    public $projectRepository;

    public function __construct()
    {
        Parent::__construct("projectapi");
    }

    public function editproject_POST(){

        // Check if everything needed is here.
        if (isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["description"]))
        {
            $project = new Project();
            $project->id = $_POST["id"];
            $project->title = $_POST["title"];
            $project->body = $_POST["description"];
            $this->projectRepository->update($project);

            $this->respondWithJSON(0);
        }

        $this->respondWithJSON(1);

    }

    public function deleteproject_POST(){

        if(isset($_POST["id"]))
        {
            $this->projectRepository->deleteById($_POST["id"]);
            $this->respondWithJSON(0);
        }
        $this->respondWithJSON(1);
    }

    public function addprojectimage_POST(){

        if (isset($_POST["projectId"]) && isset($_FILES["file"]))
        {
            // Generate number for projectimage.
            for ($i = 1; file_exists(Project::IMAGES_DIRECTORY . "/" . $_POST["projectId"] . "/" . $i . ".jpg"); $i++) {}

            $manipulator = new ImageManipulator($_FILES["file"]["tmp_name"]);
            $imageTargetFilePath = Project::IMAGES_DIRECTORY . "/" . $_POST["projectId"] . "/" . $i . ".jpg";
            $manipulator->save($imageTargetFilePath, IMAGETYPE_JPEG);

            header("content-Type: application/json");
            $this->respondWithJSON(0);
        }
        // TODO: Error or some shit
        $this->respondWithJSON(1);
    }

    public function deleteprojectimage_POST(){

        if (isset($_POST["projectId"]) && isset($_POST["imageName"]))
        {
            unlink(Project::IMAGES_DIRECTORY . "/" . $_POST["projectId"] . "/" . $_POST["imageName"]);

            header("content-Type: application/json");
            $this->respondWithJSON(0);
        }
        // TODO: Error or some shit
        $this->respondWithJSON(1);
    }

}

?>