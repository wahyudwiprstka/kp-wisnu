<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home(Request $request)
    {
        $keluhan = Keluhan::all();
        $user = $request->user();
        return view('dashboard', [
            'user' => $user,
            'keluhan' => $keluhan,
        ]);
    }
}
