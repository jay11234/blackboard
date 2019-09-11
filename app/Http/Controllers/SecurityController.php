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
    public function store(Request $request)
    {
        
        $security = new Security([
            'state'=>$request->get('state')
        ]);
        $security->save();

        return response()->json($security, 200);

    }
    public function sampledata()
    {
        $security = new Security([
            'state'=>False
        ]);
        $security->save();
    }
}
