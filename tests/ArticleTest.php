<?php

namespace Lavoiesl\AbstractStructure\Test;

class ArticleTest extends StructureTest
{
    protected function getStructure()
    {
        return new Fixture\Article;
    }

    public function getValidParams()
    {
        return array(
            array('id', 1),
            array('title', 'foo'),
            array('person', new Fixture\Person),
        );
    }

    public function getInvalidParams()
    {
        return array(
            array('id', 'foo'),
            array('title', 1),
            array('person', 1),
        );
    }
}
