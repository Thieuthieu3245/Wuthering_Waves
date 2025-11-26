<?php

namespace Models;

class UnitClass {
    public ?string $id;
    public string $name;
    public string $urlImg;

    public function __construct(?string $id, string $name, string $urlImg) {
        $this->id = $id;
        $this->name = $name;
        $this->urlImg = $urlImg;
    }

    public function getId() : ?string { return $this->id; }
    public function getName() : string { return $this->name; }
    public function getUrlImg() : string { return $this->urlImg; }

    public function setId(string $id) { $this->id = $id; }
    public function setName(string $name) { $this->name = $name; }
    public function setUrlImg(string $urlImg) { $this->urlImg = $urlImg; }
}