<?php

/**
 * Model for Thinkpad
 */
class Thinkpad implements JsonSerializable
{
    private int $id;
    private string $model;
    private string $description;
    private string $imageUrl;

    public function __construct(int $id, string $model, string $description, string $imageUrl)
    {
        $this->id = $id;
        $this->model = $model;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
    }

    /**
     * Just a output function to show this models data.
     */
    public function printModel()
    {
        echo '<p>' . $this->id . '</p>';
        echo '<p>' . $this->model . '</p>';
        echo '<p>' . $this->description . '</p>';
        echo '<p>' . $this->imageUrl . '</p>';
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'name' => $this->model,
            'grade' => $this->description,
            'image' => $this->imageUrl
        ];
    }

    public function toJson(): string {
        return json_encode($this);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }
}
