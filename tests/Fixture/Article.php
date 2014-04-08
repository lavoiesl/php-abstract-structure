<?php

namespace Lavoiesl\AbstractStructure\Test\Fixture;

use Lavoiesl\AbstractStructure\AbstractStructure;

class Article extends AbstractStructure
{
    protected $id;
    protected $title;
    protected $person;

    public function getPropertyType($property)
    {
        switch ($property) {
            case 'id': return 'integer|null';
            case 'title': return 'string';
            case 'person': return 'Lavoiesl\AbstractStructure\Test\Fixture\Person|null';
        }
    }
}
