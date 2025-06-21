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
   /**
    * TODO Implement this as part of data.
    */
   private $price;

   /**
    * Refactor this 
    * https://stevegrunwell.com/blog/factory-methods-json/
    */
   public function __construct(?int $id, ?string $model, ?string $description, ?string $imageUrl)
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
      /* TODO add price here*/
   }

   public function jsonSerialize(): mixed
   {
      return [
         'id' => $this->id,
         'model' => $this->model,
         'description' => $this->description,
         'imageUrl' => $this->imageUrl
         /* TODO add price here*/
      ];
   }

   public function toJson(): string
   {
      return json_encode($this);
   }

   public static function fromJson(string $json): self
   {
      $data = json_decode($json, true);
      /* TODO add price here*/
      return new self($data['ID'], $data['Model'], $data['Description'], $data['ImageUrl']);
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

   /* TODO add price here*/
}
