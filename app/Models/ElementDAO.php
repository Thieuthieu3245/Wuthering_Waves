<?php

namespace Models;

use Models\BasePDODAO;

class ElementDAO extends BasePDODAO{

    /**
     * Return all elements_
     * @return array All elements_
     */
    public function getAll() : array{
        $sql = "SELECT * FROM Element_";
        $stmt = $this->execRequest($sql);
        return $stmt->fetchAll();
    }

    /**
     * Return an element by its id
     * @param string $id The id of the element
     * @return array The element
     */
    public function getById(string $id) : array {
        $sql = "SELECT * FROM Element_ WHERE idElement = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt->fetch();
    }

    /**
     * Delete an element from the database
     * @param string $id The id of the element to delete
     * @return bool True, the element has been deleted, false otherwise
     */
    public function delete(string $id) : bool {
        $sql = "DELETE FROM Element_ WHERE idElement = ?";
        $stmt = $this->execRequest($sql, [$id]);
        return $stmt !== false;
    }

    /**
     * Creates an element in the database.
     * @param Element $element The element to create
     * @return bool True, the element has been created, false otherwise
     */
    public function create(Element $element) : bool {
        $sql = "INSERT INTO Element_ (idElement, Name, url_image) VALUES (?, ?, ?)";
        $stmt = $this->execRequest($sql, [
            $element->getId(),
            $element->getName(),
            $element->getUrlImg()
        ]);
        return $stmt !== false;
    }

    /**
     * Edits an element in the database.
     * @param Element $element The element to edit
     * @return bool True if the element has been edited, false otherwise
     */
    public function edit(Element $element) : bool {
        $sql = "UPDATE Element_ SET Name = ?, url_image = ? WHERE idElement = ?";
        $stmt = $this->execRequest($sql, [
            $element->getName(),
            $element->getUrlImg(),
            $element->getId()
        ]);
        return $stmt !== false;
    }
}