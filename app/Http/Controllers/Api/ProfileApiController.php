<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileApiController extends Controller
{
    public function getdataprofile() {
        $data_profile = User::where('id', Auth::user()->id)->first();

        return response()->json($data_profile);
    }
}
