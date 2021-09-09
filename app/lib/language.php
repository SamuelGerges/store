<?php
namespace PHPMVC\LIB;

class Language 
{
    private $dictionary = [];
    public function load($path)
    {
        $defaultLanguage = APP_DEFAULT_LANGUAGE ;
        if(isset($_SESSION['language']))
        {
            $defaultLanguage = $_SESSION['language'];
        }
        $pathArray = explode('.' , $path);
        $languageFileToLoad = LANGUAGE_PATH . $defaultLanguage . DS . $pathArray[0] . DS . $pathArray[1] . '.lang.php';

        if(file_exists($languageFileToLoad))
        {
            require $languageFileToLoad;
            if(is_array($_) && !empty($_))
            {
                foreach ($_ as $key => $value)
                {
                    $this->dictionary[$key] = $value;
                }
            }
        }
        else
        {
            trigger_error('Sorry The Language ' . $path . 'doesn\'t Exists', E_USER_WARNING);
        }

    }


    public function getDictionary()
    {
        return $this->dictionary;
    }


}