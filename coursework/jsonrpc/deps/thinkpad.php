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
   private float $price;
   private int $stock;

   public function __construct(?int $id, ?string $model, ?string $description, ?string $imageUrl, ?float $price, ?int $stock)
   {
      $this->id = $id;
      $this->model = $model;
      $this->description = $description;
      $this->imageUrl = $imageUrl;
      $this->price = $price;
      $this->stock = $stock;
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
      echo '<p>' . $this->price . '</p>';
      echo '<p>' . $this->stock . '</p>';
   }

   public function jsonSerialize(): mixed
   {
      return [
         'id' => $this->id,
         'name' => $this->model,
         'description' => $this->description,
         'image' => $this->imageUrl,
         'price' => $this->price,
         'stock' => $this->stock
      ];
   }

   public function toJson(): string
   {
      return json_encode($this);
   }

   public static function fromJson(string $json): self
   {
      $data = json_decode($json, true);
      return new self($data['id'], $data['model'], $data['description'], $data['imageUrl'], $data['price']);
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

   public function getPrice()
   {
      return $this->price;
   }

   public function getStock()
   {
      return $this->stock;
   }
}
