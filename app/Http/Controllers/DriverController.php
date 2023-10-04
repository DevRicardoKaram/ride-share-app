<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function show(Request $request)
    {
        //return back the user and the associated driver model
        $user = $request->user();

        $user->load('driver');

        return $user;
    }

    public function update(Request $request)
    {

    }

    //Continue from 44:45 mins
}
