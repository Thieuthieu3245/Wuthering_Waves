<?php

namespace Services;

use Models\Users;
use Models\UsersDAO;

class UsersService {

    private $usersDAO;

    public function __construct() {
        $this->usersDAO = new UsersDAO();
    }
    
    /**
     * Retrieves all users from the database.
     * @return array An array of all users from the database.
     */
    public function getAllUsers() : array {
        $data = $this->usersDAO->getAll();
        $listUsers = [];

        foreach($data as $user) {
            $listUsers[] = $this->hydrate($user);
        }
        return $listUsers;
    }

    /**
     * Retrieves a user by its id.
     * @param string $id The id of the user to retrieve.
     * @return Users The user with the given id.
     */
    public function getUserById($id) : Users{
        $data = $this->usersDAO->getById($id);
        return $this->hydrate($data);
    }

    /**
     * Retrieves a user by its username.
     * @param string $username The username of the user to retrieve.
     * @return Users The user with the given username.
     */
    public function getUserByUsername($username) : Users{
        $data = $this->usersDAO->getByUsername($username);
        return $this->hydrate($data);
    }

    private function hydrate(array $array) : Users {
        $user = new Users($array['id'], $array['username'], $array['password']);
        return $user;
    }
}