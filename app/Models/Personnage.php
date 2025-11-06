<?php

namespace Models;

class Personnage{
    private ?string $id;
    private string $name;
    private string $element;
    private string $unitclass;
    private string $weapon;
    private int $rarity;
    private ?string $origin;
    private string $urlImg;

    public function __construct()
    {
    }

    public function createWithParameters(
        string $name,
        string $element,
        string $unitclass,
        string $weapon,
        int $rarity,
        string $urlImg,
        ?string $origin = null
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

    public function getElement(): string
    {
        return $this->element;
    }

    public function setElement(string $element): self
    {
        $this->element = $element;

        return $this;
    }

    public function getUnitclass(): string
    {
        return $this->unitclass;
    }

    public function setUnitclass(string $unitclass): self
    {
        $this->unitclass = $unitclass;

        return $this;
    }

    public function getWeapon(): string
    {
        return $this->weapon;
    }

    public function setWeapon(string $weapon): self
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

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(?string $origin): self
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