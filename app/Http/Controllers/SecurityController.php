<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Security;

class SecurityController extends Controller
{
    public function getState()
    {
        $security = Security::latest()->first();
        $state = $security->state;
        return response()->json($state,200);
    }
}
