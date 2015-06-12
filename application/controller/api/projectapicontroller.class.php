<?php

class ProjectAPIController extends APIController
{
    public $projectRepository;

    public function __construct()
    {
        Parent::__construct("projectapi");
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function update_POST($project){

        if (isset($project->id)&&(isset($project->body)))
        {
            $this->projectRepository->update($project);
            $this->respondOK();
        }
        throw new Exception("Resource not found.", 404);
    }

    /**
     *{{Role=Administrator;}}
     */
    public function delete_POST($project){

        if(isset($project->id))
        {
            $this->projectRepository->deleteById($project->id);

            // Delete the project images recursively.
            $dir = Project::IMAGES_DIRECTORY . "/" . $project->id;
            if (is_dir($dir))
            {
                $objects = scandir($dir);
                foreach ($objects as $object)
                {
                    if ($object != "." && $object != "..")
                    {
                        if (filetype($dir . "/" . $object) == "dir")
                            rrmdir($dir . "/" . $object);
                        else
                            unlink($dir . "/" . $object);
                    }
                }
                reset($objects);
                rmdir($dir);
            }

            $this->respondOK();
        }
        throw new Exception("Resource not found.", 404);
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function add_POST($project)
    {
        if((isset($project->title))&&(isset($project->body)))
        {
            $this->projectRepository->insert($project);
            $this->respondOK();
        }
        else
        {
            throw new Exception("Not all required data was provided", 400);
        }
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function addimage_POST(){

        if (isset($_POST["projectId"]) && isset($_FILES["file"]))
        {
            // Generate number for projectimage.
            for ($i = 1; file_exists(Project::IMAGES_DIRECTORY . "/" . $_POST["projectId"] . "/" . $i . ".jpg"); $i++) {}

            $manipulator = new ImageManipulator($_FILES["file"]["tmp_name"]);
            $imageTargetFilePath = Project::IMAGES_DIRECTORY . "/" . $_POST["projectId"] . "/" . $i . ".jpg";
            $manipulator->save($imageTargetFilePath, IMAGETYPE_JPEG);

            $this->respondOK();
        }
        throw new Exception("Resource not found.", 404);
    }

    /**
     *{{Permission=Tekst;}}
     */
    public function deleteimage_POST(){

        if (isset($_POST["projectId"]) && isset($_POST["imageName"]))
        {
            unlink(Project::IMAGES_DIRECTORY . "/" . $_POST["projectId"] . "/" . $_POST["imageName"]);

            $this->respondOK();
        }
        throw new Exception("Resource not found.", 404);
    }
}
?>