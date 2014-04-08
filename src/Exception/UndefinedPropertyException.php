<?php

namespace Lavoiesl\AbstractStructure\Exception;

class UndefinedPropertyException extends StructureException
{
    public function __construct($class, $property)
    {
        parent::__construct("${class}::${property} is undefined");
    }
}
