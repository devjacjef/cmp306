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

// TODO: test this function. Something tells me its going to break... a lot.
function checkMethodParams($method, $params)
{
    // FIXME: Possibly remove this as it may cause issuse in future.
    $return = 0;

    switch ($method) {
        case "getAllThinkpads":
            if ($params != null) {
                $return - 32602;
            } else {
                $return = 1;
            }
            break;
        case "getThinkpadById":
            if ($params->id != null) {
                $return - 32602;
            } else {
                $return = 1;
            }
            break;
        case "createThinkpad":
            if ($params->txt != null) {
                $return - 32602;
            } else {
                $return = 1;
            }
            break;
        case "updateThinkpad":
            if ($params->txt != null) {
                $return - 32602;
            } else {
                $return = 1;
            }
            break;
        case "deleteThinkpad":
            if ($params->id != null) {
                $return - 32602;
            } else {
                $return = 1;
            }
            break;
        default:
            $return = -32601;
            break;
    }

    return $return;
}
