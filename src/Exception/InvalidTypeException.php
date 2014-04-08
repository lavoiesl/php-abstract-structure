<?php

namespace Lavoiesl\AbstractStructure\Exception;

class InvalidTypeException extends StructureException
{
    public function __construct($class, $property, $expected)
    {
        parent::__construct("${class}::${property} must be of type '${expected}'");
    }
}
