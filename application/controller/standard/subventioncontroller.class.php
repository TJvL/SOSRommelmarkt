<?php

class SubventionController extends Controller
{
    public function __construct()
    {
        parent::__construct("subvention");
    }

    /**
     *{{Permission=Formulier;}}
     */
    public function downloadattachedfile_POST()
    {
        if (isset($_POST["id"]) && isset($_POST["filename"])) {
            $filepath = "files/subventions/" . $_POST["id"] . "/" . $_POST["filename"];

            if (file_exists($filepath)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($_POST["filename"]));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filepath));
                readfile($filepath);
                exit;
            }

        }

        throw new Exception("Resource not found.", 404);
    }
}