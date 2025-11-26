<?php

namespace Models;

use Models\BasePDODAO;

class OriginDAO extends BasePDODAO{

    /**
     * Return all origins in the database.
     * @return array All origins.
     */
    public function getAll() : array{
        $sql = "SELECT * FROM Origin";
        $stmt = $this->execRequest($sql);
        return $stmt->fetchAll();
    }

    /**
     * Return an origin by its id
     * @param string $id The id of the origin
     * @return array The origin
     */
    public function getById(string $id) : array{
        $sql = "SELECT * FROM Origin WHERE idOrigin = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt->fetch();
    }

    /**
     * Deletes an origin from the database.
     * @param string $id The id of the origin to delete.
     * @return bool True if the origin has been deleted, false otherwise.
     */
    public function delete(string $id) : bool{
        $sql = "DELETE FROM Origin WHERE idOrigin = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt !== false;
    }

    /**
     * Creates an origin in the database.
     * @param Origin $origin The origin to create
     * @return bool True if the origin has been created, false otherwise
     */
    public function create(Origin $origin) : bool{
        $sql = "INSERT INTO Origin (idOrigin, Name, url_image) VALUES (?, ?, ?)";
        $stmt = $this->execRequest($sql, [
            $origin->getId(),
            $origin->getName(),
            $origin->getUrlImg()
        ]);
        return $stmt !== false;
    }

    /**
     * Edits an origin in the database.
     * @param Origin $origin The origin to edit
     * @return bool True if the origin has been edited, false otherwise
     */
    public function edit(Origin $origin) : bool{
        $sql = "UPDATE Origin SET Name = ?, url_image = ? WHERE idOrigin = ?";
        $stmt = $this->execRequest($sql, [
            $origin->getName(),
            $origin->getUrlImg(),
            $origin->getId()
        ]);
        return $stmt !== false;
    }
}