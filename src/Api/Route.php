<?php


namespace App\Api;


class Route
{
    public
        $className,
        $methodName
    ;

    function __construct($className, $methodName)
    {
        $this->className = $className;
        $this->methodName = $methodName;
    }
}