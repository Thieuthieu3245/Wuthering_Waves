<?php

namespace Services;

use Models\Origin;
use Models\OriginDAO;

class OriginService{

    private $originDAO;

    public function __construct() {
        $this->originDAO = new OriginDAO();
    }

    /**
     * Retrieves all origins from the database.
     * @return Origin[] An array of origins.
     */
    public function getAllOrigins() : array {
        $data = $this->originDAO->getAll();
        $listOrigins = array_map([$this, 'hydrate'], $data);
        return $listOrigins;
    }

    /**
     * Retrieves an origin from the database by its id.
     * @param string $id The id of the origin to retrieve.
     * @return Origin The origin with the given id.
     * @throws \Exception If the origin cannot be found in the database.
     */
    public function getOriginById($id) : Origin {
        try{
            $data = $this->originDAO->getById($id);
            $origin = $this->hydrate($data);
        } catch (\Exception $e) {
            throw new \Exception("L'origine n'a pas pu étre chargé", 1);
        }
        return $origin;
    }

    /**
     * Deletes an origin from the database.
     * @param string $id The id of the origin to delete.
     * @return bool True if the origin has been deleted, false otherwise.
     * @throws \Exception If an error occurs during the deletion.
     */
    public function deleteOrigin($id) : bool {
        try{
            $result = $this->originDAO->delete($id);
        } catch (\Exception $e) {
            throw new \Exception("L'origine n'a pas pu étre modifié", 1);
        }
        return $result;
    }

    /**
     * Creates an origin in the database.
     * @param Origin $Origin The origin to create.
     * @return bool True if the origin has been created, false otherwise.
     * @throws \Exception If an error occurs during the creation.
     */
    public function createOrigin(Origin $Origin) : bool {
        $Origin->setId(uniqid());
        try{
            $result = $this->originDAO->create($Origin);
        } catch (\Exception $e) {
            throw new \Exception("L'origine n'a pas pu étre créé", 1);
        }
        return $result;
    }

    /**
     * Modifies an origin in the database.
     * @param Origin $Origin The origin to modify
     * @return bool True if the origin has been modified, false otherwise
     * @throws \Exception If an error occurs during the modification
     */
    public function editOrigin(Origin $Origin) : bool {
        try{
            $result = $this->originDAO->edit($Origin);
        } catch (\Exception $e) {
            throw new \Exception("L'origine n'a pas pu étre modifié", 1);
        }
        return $result;
    }

    private function hydrate(array $data) : Origin {
        $Origin = new Origin($data['idOrigin'], $data['Name'], $data['url_image']);
        return $Origin;
    }
}