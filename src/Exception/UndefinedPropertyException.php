<?php

namespace Lavoiesl\AbstractStructure\Exception;

class UndefinedPropertyException extends StructureException
{
    /**
     * @param string $class
     * @param string $property
     */
    public function __construct($class, $property)
    {
        parent::__construct("${class}::${property} is undefined");
    }
}
