<?php

namespace Lavoiesl\AbstractStructure\Test;

abstract class StructureTest extends \PHPUnit_Framework_TestCase
{
    private $article;

    private $person;

    protected $structure;

    public function setUp()
    {
        $this->structure = $this->getStructure();
    }

    abstract protected function getStructure();

    abstract protected function getInvalidParams();

    abstract protected function getValidParams();

    /**
     * @expectedException Lavoiesl\AbstractStructure\Exception\InvalidTypeException
     * @dataProvider getInvalidParams
     */
    public function testInvalidParam($key, $value)
    {
        $this->structure->$key = $value;
    }

    /**
     * @dataProvider getValidParams
     */
    public function testValidParam($key, $value)
    {
        $this->structure->$key = $value;
    }

    /**
     * @expectedException Lavoiesl\AbstractStructure\Exception\UndefinedPropertyException
     */
    public function testSetUndefinedProperty()
    {
        $this->structure->foo = 'bar';
    }

    /**
     * @expectedException Lavoiesl\AbstractStructure\Exception\UndefinedPropertyException
     */
    public function testGetUndefinedProperty()
    {
        $foo = $this->structure->foo;
    }
}
