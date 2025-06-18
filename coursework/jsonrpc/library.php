<?php


function jsonRpcFormatCheck($request)
{
    $jsonrpc = $request->jsonrpc;
    $method = $request->method;
    $id = $request->id;

    if (($jsonrpc != "2.0") or ($method == NULL) or ($id == NULL)) {
        $return = 0;
    } else {
        $return = 1;
    }
    return $return;
}
