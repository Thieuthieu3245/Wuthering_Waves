<?php

namespace Models;

class Message{
    const MESSAGE_COLOR_SUCCESS = "success-message";
    const MESSAGE_COLOR_ERROR = "error-message";

    private string $message;
    private string $color;
    private string $title;

    /**
     * Constructor for Message class.
     * @param string $message The message to be displayed.
     * @param string $color The css class color of the message.
     * @param string $title The title of the message.
     */
    public function __construct(string $message, string $color = "default-message", string $title = "Message") {
        $this->message = $message;
        $this->color = $color;
        $this->title = $title;
    }

    public function getMessage() : string { return $this->message; }
    public function getColor() : string { return $this->color; }
    public function getTitle() : string { return $this->title; }

    public function setMessage(string $message) { $this->message = $message; }
    public function setColor(string $color) { $this->color = $color; }
    public function setTitle(string $title) { $this->title = $title; }
}