<?php

namespace Models;

use UnitEnum;

class Personnage{
    private ?string $id;
    private string $name;
    private Element $element;
    private UnitClass $unitclass;
    private Weapon $weapon;
    private int $rarity;
    private ?Origin $origin;
    private string $urlImg;

    public function __construct()
    {
    }

    public function createWithParameters(
        string $name,
        Element $element,
        UnitClass $unitclass,
        Weapon $weapon,
        int $rarity,
        string $urlImg,
        ?Origin $origin = null
    ) {
        $this->name = $name;
        $this->element = $element;
        $this->unitclass = $unitclass;
        $this->weapon = $weapon;
        $this->rarity = $rarity;
        $this->origin = $origin;
        $this->urlImg = $urlImg;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getElement(): Element
    {
        return $this->element;
    }

    public function setElement(Element $element): self
    {
        $this->element = $element;

        return $this;
    }

    public function getUnitclass(): UnitClass
    {
        return $this->unitclass;
    }

    public function setUnitclass(UnitClass $unitclass): self
    {
        $this->unitclass = $unitclass;

        return $this;
    }

    public function getWeapon(): Weapon
    {
        return $this->weapon;
    }

    public function setWeapon(Weapon $weapon): self
    {
        $this->weapon = $weapon;

        return $this;
    }

    public function getRarity(): int
    {
        return $this->rarity;
    }

    public function setRarity(int $rarity): self
    {
        $this->rarity = $rarity;

        return $this;
    }

    public function getOrigin(): ?Origin
    {
        return $this->origin;
    }

    public function setOrigin(?Origin $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getUrlImg(): string
    {
        return $this->urlImg;
    }

    public function setUrlImg(string $urlImg): self
    {
        $this->urlImg = $urlImg;

        return $this;
    }
}