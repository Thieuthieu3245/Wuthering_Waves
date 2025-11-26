<?php

namespace Services;

use Models\Element;
use Models\Color;
use Models\ElementDAO;

class ElementService{

    private $elementDAO;

    public function __construct() {
        $this->elementDAO = new ElementDAO();
    }

    /**
     * Retrieves all elements from the database.
     * @return Element[] An array of elements.
     */
    public function getAllElements() : array {
        $data = $this->elementDAO->getAll();
        return array_map([$this, 'hydrate'], $data);
    }

    /**
     * Returns an element by its id.
     *
     * @param string $id
     * @return Element|null
     * @throws \Exception if the element is not found
     */
    public function getElementById($id) : Element {
        try {
            $data = $this->elementDAO->getById($id);
            $element = $this->hydrate($data);
        } catch (\Exception $e) {
            throw new \Exception("L'élément n'a pas pu étre chargé", 1);
        }
        return $element;
    }

    /**
     * Deletes an element from the database.
     * @param string $id The id of the element to delete
     * @return bool True, the element has been deleted, false otherwise
     * @throws \Exception If an error occurs during the deletion
     */
    public function deleteElement($id) : bool {
        try {
            $result = $this->elementDAO->delete($id);
        } catch (\Exception $e) {
            throw new \Exception("L'élément n'a pas pu étre supprimé", 1);
        }
        return $result;
    }

    /**
     * Creates an element in the database.
     *
     * @param Element $Element The element to create
     * @return bool True, the element has been created, false otherwise
     * @throws \Exception If an error occurs during the creation
     */
    public function createElement(Element $Element) : bool {
        try {
            $Element->setId(uniqid());
            $result = $this->elementDAO->create($Element);
        } catch (\Exception $e) {
            throw new \Exception("L'élément n'a pas pu étre créé", 1);
        }
        return $result;
    }

    /**
     * Modifies an element in the database.
     *
     * @param Element $Element The element to modify
     * @return bool True, the element has been modified, false otherwise
     * @throws \Exception If an error occurs during the modification
     */
    public function editElement(Element $Element) : bool {
        try {
            $result = $this->elementDAO->edit($Element);
        } catch (\Exception $e) {
            throw new \Exception("L'élément n'a pas pu étre modifié", 1);
        }
        return $result;
    }

    private function hydrate(array $data) : Element {
        $Element = new Element($data['idElement'], $data['Name'], Color::GRAY, $data['url_image']);
        return $Element;
    }
}