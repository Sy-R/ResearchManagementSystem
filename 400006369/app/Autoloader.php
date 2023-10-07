<?php
namespace app;
use Exception;
class MyAutoloader{

    public static function register(){
        spl_autoload_register([__CLASS__, 'autoloadFile']);
    }

    public static function autoloadFile($className){
        //convert class name to a file path
       $className = str_replace('\\', '/', $className);
       $filePath = __DIR__ .'/'. $className . '.php';

        if(file_exists($filePath)){
            require $filePath;
        }else
        throw new Exception("Autoloader Error: Class '$className' not found. File: $filePath");
    }

}

?>