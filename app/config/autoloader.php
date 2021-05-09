<?php


spl_autoload_register(function ($class_name) {

    $path = initiateLocation();
    $fileList = flattenArray(getLocations($path));
    autoload_class($fileList, $class_name);
});

function autoload_class($list, $class){
    foreach($list as $value){
        if(strstr($value, $class)){
            return require_once($value);
        }
    } 
}

function flattenArray($input) {
    $res = array();
    foreach (new RecursiveIteratorIterator( new RecursiveArrayIterator($input)) as $val) {
        $res[] = $val;
    }
    return $res;
}

function getLocations($path = null)
{
    $data = new stdClass();
    $data = getScanDir($path);
    return $data;
}

function getScanDir($path)
{
    $res = array();
    $cdir = scandir($path);
    foreach ($cdir as $key => $value)
    {
       if (!in_array($value,array(".","..")))
       {
          if (is_dir($path.$value.'/'))
          {
            $res[$value] = getScanDir($path.$value.'/');
          }else{
            $res[] = $path.$value;
          }
       }
    }
    return $res;
}

function initiateLocation()
{
    $path = 'app/'
    return $path;
}