<?php

class Payment implements JsonSerializable
{
   private $vendor;
   private $transaction;
   private $amount;
   private $card;

   public function __construct($amount, $card)
   {
      $this->vendor = "2207061";
      $this->transaction = "jj334455";
      $this->amount = $amount;
      $this->card = $card;
   }

   // Needs some sort of validation
   public function makePayment()
   {
      $request = json_encode($this);
      $url = "https://mayar.abertay.ac.uk/~r517126/aberpay/v3/";

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json',
         'Content-Length: ' . strlen($request)
      ));
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      return curl_exec($ch);
   }

   public function jsonSerialize(): mixed
   {
      return [
         'vendor' => $this->vendor,
         'transaction' => $this->transaction,
         'amount' => $this->amount,
         'card' => $this->card
      ];
   }
}
