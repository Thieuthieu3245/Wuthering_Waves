<?php

namespace Models;

use Config\Config;
use PDO;
use Services\LogService;

class BasePDODAO {
    private ?PDO $db = null;

    private function getPDO() : PDO {
        if ($this->db === null) {
            $this->db = new PDO(Config::get('dsn'), Config::get('user'), Config::get('pass'));
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->db;
    }

    /**
     * Execute a SQL query and return the corresponding PDOStatement object.
     * @param string $sql The SQL query to execute.
     * @param array $params The parameters to bind to the query.
     * @return PDOStatement The executed PDOStatement object.
     */
    protected function execRequest(string $sql, ?array $params = null) {
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}