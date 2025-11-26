<?php

namespace Models;

class Users
{
    private $id;
    private $name;
    private $password;

    public function __construct(string $id, string $name, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
    }

    public function getId() : ?string { return $this->id; }
    public function getName() : string { return $this->name; }
    public function getPassword() : string { return $this->password; }

    public function setId(string $id) { $this->id = $id; }
    public function setName(string $name) { $this->name = $name; }
    public function setPassword(string $password) { $this->password = $password; }
}