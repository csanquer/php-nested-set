<?php

namespace CSanquer\NestedSet\tests;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Platforms\MySQL57Platform;
use Doctrine\DBAL\Platforms\MySqlPlatform;
use Doctrine\DBAL\Schema\Schema;

abstract class DoctrineDbalPdoTestCase extends PdoTestCase
{
    /**
     * @var Connection
     */
    private static $dbal = null;

    /**
     * @return Connection
     */
    protected static function getDbal()
    {
        if (static::$dbal === null) {
            static::$dbal = DriverManager::getConnection(array('pdo' => static::getPdo()));
        }

        return static::$dbal;
    }

    /**
     * non-static alias for static::getDbal()
     *
     * @return Connection
     */
    protected function getCurrentDbal()
    {
        return static::getDbal();
    }

    /**
     * @param Schema $schema
     * @throws DBALException
     */
    protected static function createSchema(Schema $schema)
    {
        $dbal = static::getDbal();
        $platform = $dbal->getDatabasePlatform();

        $dropSql = $schema->toDropSql($platform);
        $createSql = $schema->toSql($platform);

        foreach($dropSql as $sql) {
            $dbal->query($sql);
        }

        foreach($createSql as $sql) {
            $dbal->query($sql);
        }
    }

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $platform = $this->getCurrentDbal()->getDatabasePlatform();
        // disable foreign key check before truncating with mysql
        if ($platform instanceof MySqlPlatform || $platform instanceof MySQL57Platform) {
            $this->getCurrentPdo()->query("set foreign_key_checks=0");
            parent::setUp();
            $this->getCurrentPdo()->query("set foreign_key_checks=1");
        } else {
            parent::getCurrentPdo();
        }
    }
}
