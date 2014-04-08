<?php

namespace Lavoiesl\AbstractStructure\Test;

class GenericTest extends StructureTest
{
    protected function getStructure()
    {
        $structure = new Fixture\Generic;
        $structure->integer = 1;
        $structure->article = new Fixture\Article;

        return $structure;
    }

    public function getValidParams()
    {
        return array(
            array('integer', 2),
            array('article', new ArticleTwo),
        );
    }

    public function getInvalidParams()
    {
        return array(
            array('integer', 'bar'),
            array('article', 1),
            array('article', null),
        );
    }

    public function testFrozenType()
    {
        $this->structure->notset = 1;
        $this->assertEquals(1, $this->structure->notset);

        $this->setExpectedException('Lavoiesl\AbstractStructure\Exception\InvalidTypeException');
        $this->structure->notset = 'foo';
    }
}

class ArticleTwo extends Fixture\Article
{
}
