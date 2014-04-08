<?php

namespace Lavoiesl\AbstractStructure\Test\Fixture;

use Lavoiesl\AbstractStructure\AbstractStructure;

class Person extends AbstractStructure
{
    protected $id;
    protected $anything;
    protected $isActive;

    public function getPropertyType($property)
    {
        switch ($property) {
            case 'id': return 'integer|null';
            case 'anything': return 'mixed';
            case 'isActive': return 'true|false';
        }
    }
}
