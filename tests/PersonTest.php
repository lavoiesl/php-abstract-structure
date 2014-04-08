<?php

namespace Lavoiesl\AbstractStructure\Test;

class PersonTest extends StructureTest
{
    protected function getStructure()
    {
        return new Fixture\Person;
    }

    public function getValidParams()
    {
        return array(
            array('id', 1),
            array('anything', 1),
            array('anything', false),
            array('anything', array()),
            array('anything', new \stdClass),
            array('isActive', true),
            array('isActive', false),
        );
    }

    public function getInvalidParams()
    {
        return array(
            array('id', 'foo'),
        );
    }
}
