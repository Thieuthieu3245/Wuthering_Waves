<?php

namespace Models;

use Models\Users;

class UsersDAO extends BasePDODAO{

    /**
     * Return all users in the database.
     * @return array All users in the database.
     */
    public function getAll() : array {
        $sql = "SELECT * FROM Users";
        $stmt = $this->execRequest($sql);
        return $stmt->fetchAll();
    }

    /**
     * Return a user by its id.
     * @param string $id The id of the user to retrieve.
     * @return array The user with the given id.
     */
    public function getById($id) : array {
        $sql = "SELECT * FROM Users WHERE id = :id";
        $stmt = $this->execRequest($sql, ['id' => $id]);
        return $stmt->fetch();
    }

    /**
     * Return a user by its username.
     * @param string $username The username of the user to retrieve.
     * @return array The user with the given username.
     */
    public function getByUsername($username) : array {
        $sql = "SELECT * FROM Users WHERE username = :username";
        $stmt = $this->execRequest($sql, ['username' => $username]);
        return $stmt->fetch();
    }
}