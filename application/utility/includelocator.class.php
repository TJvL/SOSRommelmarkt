<?php

class IncludeLocator
{
    public static function locateIncludes($type, $controller, $action)
    {
        $path = ROOT_DIR . SEPARATOR . $type . SEPARATOR;
        $includes = IncludeLocator::getIncludePaths($path);
        $path = ROOT_DIR . SEPARATOR . $type . SEPARATOR . $controller . SEPARATOR;
        $includes = array_merge($includes, IncludeLocator::getIncludePaths($path));
        $path = ROOT_DIR . SEPARATOR . $type . SEPARATOR . $controller . SEPARATOR . $action . SEPARATOR;
        $includes = array_merge($includes, IncludeLocator::getIncludePaths($path));

        switch($type)
        {
            case "php":
                IncludeLocator::outputPHPIncludes($includes);
                break;
            case "css":
                IncludeLocator::outputCSSIncludes($includes);
                break;
            case "js":
                IncludeLocator::outputJSIncludes($includes);
                break;
        }
    }

    private static function getIncludePaths($path)
    {
        $includeFiles = array();

        if(is_dir($path))
        {
            foreach(scandir($path) as $subPath)
            {
                if (is_file("$path$subPath"))
                {
                    $includeFiles[] = "$path$subPath";
                }
            }
        }

        return $includeFiles;
    }

    private static function outputPHPIncludes($includes)
    {
        if(!empty($includes))
        {
            $root = ROOT_DIR;
            for ($i = 0; $i < count($includes); $i++)
            {
                $include = str_replace($root, "", $includes[$i]);
                require_once($include);
            }
        }
    }

    private static function outputCSSIncludes($includes)
    {
        if(!empty($includes))
        {
            $root = $_SERVER["DOCUMENT_ROOT"];
            for ($i = 0; $i < count($includes); $i++)
            {
                $include = str_replace($root, "", $includes[$i]);
                echo "    <link href='$include' type='text/css' rel='stylesheet'>\n";
            }
        }
    }

    private static function outputJSIncludes($includes)
    {
        if(!empty($includes))
        {
            $root = $_SERVER["DOCUMENT_ROOT"];
            for ($i = 0; $i < count($includes); $i++)
            {
                $include = str_replace($root, "", $includes[$i]);

                if(strpos($include, "/1.11.3-jquery.min.js")  )
                {
                    echo "    <script src='$include' type='text/javascript'></script>\n";
                }
                else
                {
                    echo "    <script src='$include' type='text/javascript' defer></script>\n";
                }
            }
        }
    }
}