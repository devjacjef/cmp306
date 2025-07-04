<?php

class User implements JsonSerializable
{
   private int $id;
   private string $username;
   private string $password;

   public function __construct(?int $id = null, string $username, string $password)
   {
      $this->id = $id;
      $this->username = $username;
      $this->password = password_hash($password, PASSWORD_DEFAULT);
   }

   public function getId()
   {
      return $this->id;
   }

   public function getUsername()
   {
      return $this->username;
   }

   public function checkPassword($password): bool
   {
      return $this->password == password_hash($password, PASSWORD_DEFAULT);
   }

   public function jsonSerialize(): mixed
   {
      return [
         'id' => $this->id,
         'username' => $this->username,
         'password' => $this->password
      ];
   }

   public function toJson(): string
   {
      return json_encode($this);
   }

   public static function fromJson(string $json): self
   {
      $data = json_decode($json, true);
      return new self($data['ID'], $data['Username'], $data['Password']);
   }
}
