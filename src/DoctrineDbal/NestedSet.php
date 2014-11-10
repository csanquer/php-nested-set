<?php

namespace CSanquer\NestedSet\DoctrineDbal;

use Doctrine\DBAL\Connection;

class NestedSet
{
    /**
     * @var Connection
     */
    protected $connection;

    protected $table;

    protected $idColumn;

    protected $leftColumn;

    protected $rightColumn;

    protected $levelColumn;

    protected $scopeColumn;

    /**
     * @param $connection
     * @param $table
     * @param string $idColumn
     * @param string $leftColumn
     * @param string $rightColumn
     * @param string $levelColumn
     * @param string $scopeColumn
     */
    public function __construct(
        $connection,
        $table,
        $idColumn = 'id',
        $leftColumn = 'tree_left',
        $rightColumn = 'tree_right',
        $levelColumn = 'tree_level',
        $scopeColumn = 'tree_scope'
    )
    {
        $this->connection = $connection;
        $this->table = $table;
        $this->idColumn = $idColumn;
        $this->leftColumn = $leftColumn;
        $this->rightColumn = $rightColumn;
        $this->levelColumn = $levelColumn;
        $this->scopeColumn = $scopeColumn;
    }

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return string
     */
    public function getIdColumn()
    {
        return $this->idColumn;
    }

    /**
     * @return string
     */
    public function getLeftColumn()
    {
        return $this->leftColumn;
    }

    /**
     * @return string
     */
    public function getRightColumn()
    {
        return $this->rightColumn;
    }

    /**
     * @return string
     */
    public function getLevelColumn()
    {
        return $this->levelColumn;
    }

    /**
     * @return string
     */
    public function getScopeColumn()
    {
        return $this->scopeColumn;
    }

    /**
     * @param mixed $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * @param string $idColumn
     */
    public function setIdColumn($idColumn)
    {
        $this->idColumn = $idColumn;
    }

    /**
     * @param string $leftColumn
     */
    public function setLeftColumn($leftColumn)
    {
        $this->leftColumn = $leftColumn;
    }

    /**
     * @param string $rightColumn
     */
    public function setRightColumn($rightColumn)
    {
        $this->rightColumn = $rightColumn;
    }

    /**
     * @param string $levelColumn
     */
    public function setLevelColumn($levelColumn)
    {
        $this->levelColumn = $levelColumn;
    }

    /**
     * @param string $scopeColumn
     */
    public function setScopeColumn($scopeColumn)
    {
        $this->scopeColumn = $scopeColumn;
    }
}
