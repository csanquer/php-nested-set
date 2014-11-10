<?php

namespace CSanquer\NestedSet\tests;

abstract class PdoTestCase extends \PHPUnit_Extensions_Database_TestCase
{
    /**
     * @var \PDO
     */
    private static $pdo = null;

    /**
     * @var \PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
     */
    private $connection = null;

    /**
     * @return \PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection
     */
    public function getConnection()
    {
        if ($this->connection === null) {
            $options = static::getDbOptions();
            $this->connection = $this->createDefaultDBConnection(static::getPdo(), $options['name']);
        }

        return $this->connection;
    }

    /**
     * @return array
     */
    protected static function getDbOptions()
    {
        return array(
            'type' => $GLOBALS['DB_TYPE'],
            'dsn' => $GLOBALS['DB_DSN'],
            'name' => $GLOBALS['DB_DBNAME'],
            'user' => $GLOBALS['DB_USER'],
            'passwd' => $GLOBALS['DB_PASSWD'],
        );
    }

    /**
     * @return \PDO
     */
    protected static function getPdo()
    {
        if (static::$pdo === null) {
            $options = static::getDbOptions();
            static::$pdo = new \PDO($options['dsn'], $options['user'], $options['passwd'] );
        }

        return static::$pdo;
    }

    /**
     * @return \PDO
     */
    protected function getCurrentPdo()
    {
        return $this->getConnection()->getConnection();
    }
}
