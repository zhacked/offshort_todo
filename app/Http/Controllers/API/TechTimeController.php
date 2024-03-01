<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\techtime;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class TechTimeController extends Controller
{
    public function timeStamp(Request $request)
    {
        // $id = $request->search;
        // $time = $request->input('timeNow');
        // $date = $request->input('dateNow');

        $user = User::find($request->search);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'No user found!'
            ], 404);
        }



    }
}

