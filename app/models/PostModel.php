<?php

require_once '../config/db_config.php';

class PostModel
{
    private $user_id;
    private $title;
    private $description;
    private $uuid;

    public function __construct($user_id, $title, $description, $uuid) {
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description;
        $this->uuid = $uuid;
    }

    public function getUserId()
    {

        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

}
