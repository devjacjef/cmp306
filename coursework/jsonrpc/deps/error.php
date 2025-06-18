<?php

class RpcError
{
    private $code;
    private $message;

    public function __constructor($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    public function getError() {
        return [
            'code' => $this->code,
            'message' => $this->message
        ];
    }
}
