<?php

namespace PHPMVC\LIB;

trait InputFilter
{
    public function filterInt($input)
    {
        return filter_var($input , FILTER_SANITIZE_NUMBER_INT);
    }

    public function filterString($input)
    {
        return filter_var($input , FILTER_SANITIZE_STRING);
    }
}