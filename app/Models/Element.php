<?php

namespace Models;

enum Color: string {
    case RED = '#FF0000';
    case GREEN = '#00FF00';
    case BLUE = '#0000FF';
    case YELLOW = '#FFFF00';
    case MAGENTA = '#FF0FFF';
    case PURPLE = '#FF00FF';
    case ORANGE = '#FFA500';
    case PINK = '#FFC0CB';
    case BROWN = '#A52A2A';
    case GRAY = '#808080';
    case BLACK = '#000000';
    case WHITE = '#FFFFFF';
    case CYAN = '#00FFFF';
}

class Element{
    private ?string $id;
    private string $name;
    private Color $color;
    private string $urlImg;

    public function __construct(?string $id, string $name, Color $color, string $urlImg){
        $this->id = $id;
        $this->name = $name;
        $this->color = $color;
        $this->urlImg = $urlImg;
    }

    public function getId() : ?string { return $this->id; }
    public function getName() : string { return $this->name; }
    public function getColor() : Color { return $this->color; }
    public function getUrlImg() : string { return $this->urlImg; }

    public function setId(string $id) { $this->id = $id; }
    public function setName(string $name) { $this->name = $name; }
    public function setColor(Color $color) { $this->color = $color; }
    public function setUrlImg(string $urlImg) { $this->urlImg = $urlImg; }
}