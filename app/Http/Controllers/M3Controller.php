<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Write static login information to the session.
 * Use for test purposes.
 */
class M3Controller extends Controller
{
    public function getMOTD(Request $request) {
        $motd = file_get_contents("static/message.json");
        $motdjson = json_decode($motd);
        return $motdjson;
    }
}
