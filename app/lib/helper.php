<?php

namespace PHPMVC\LIB;

trait Helper
{
    public function redirect($path)
    {
        session_write_close();
        header('Location: ' . $path);
        exit;
    }

    public  function  redirectAfterSecond($input)
    {
        session_write_close();
        header("refresh:0; url=".$input);

    }




}