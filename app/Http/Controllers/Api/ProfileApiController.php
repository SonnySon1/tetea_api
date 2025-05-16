<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormater;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileApiController extends Controller
{
    public function getdataprofile() {
        $data_profile = User::where('id', Auth::user()->id)->first();

        if ($data_profile) {
            return ResponseFormater::success($data_profile, 'Get data profile success', 200);
        } else {
            return ResponseFormater::error('Get data profile failed', 500);
        }
    }
}
