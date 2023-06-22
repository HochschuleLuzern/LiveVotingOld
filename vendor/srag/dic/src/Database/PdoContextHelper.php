<?php

namespace srag\DIC\LiveVoting\Database;

use ilDBPdo;
use ilDBPdoInterface;
use PDO;
use srag\DIC\LiveVoting\Exception\DICException;
use ilDBConstants;

/**
 * Class PdoContextHelper
 *
 * @package srag\DIC\LiveVoting\Database
 *
 * @internal
 */
final class PdoContextHelper extends ilDBPdo
{

    /**
     * PdoContextHelper constructor
     */
    private function __construct()
    {

    }


    /**
     * @param ilDBPdoInterface $db
     *
     * @return PDO
     *
     * @throws DICException PdoContextHelper only supports ilDBPdo!
     *
     * @internal
     */
    public static function getPdo(ilDBPdoInterface $db) : PDO
    {
        if (!($db instanceof ilDBPdo)) {
            throw new DICException("PdoContextHelper only supports ilDBPdo!");
        }

        return $db->pdo;
    }


    /**
     * @inheritDoc
     */
    public function initHelpers(): void
    {

    }

    public function nextId(string $table_name) : int
    {
        return $this->db->nextId($table_name);
    }

    public function migrateTableToEngine(string $table_name, string $engine = ilDBConstants::MYSQL_ENGINE_INNODB) : bool
    {
        return false;
    }

    public function migrateTableCollation(
        string $table_name,
        string $collation = ilDBConstants::MYSQL_COLLATION_UTF8MB4
    ) : bool {
        return false;
    }
}
