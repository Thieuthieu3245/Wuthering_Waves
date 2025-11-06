<?php

namespace Models;

use Config\Config;
use PDO;

class BasePDODAO {
    private ?PDO $db = null;

    private function getPDO() : PDO {
        if ($this->db === null) {
            $this->db = new PDO(Config::get('dsn'), Config::get('user'), Config::get('pass'));
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->db;
    }

    protected function execRequest(string $sql, ?array $params = null) {
        $stmt = $this->getPDO()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}