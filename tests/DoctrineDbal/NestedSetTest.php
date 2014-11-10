<?php

namespace CSanquer\NestedSet\tests\DoctrineDbal;

use CSanquer\NestedSet\DoctrineDbal\NestedSet;
use CSanquer\NestedSet\tests\DoctrineDbalPdoTestCase;

class NestedSetTest extends DoctrineDbalPdoTestCase
{
    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return new \PHPUnit_Extensions_Database_DataSet_YamlDataSet(
            __DIR__.'/../fixtures/tree.yml'
        );
    }
}