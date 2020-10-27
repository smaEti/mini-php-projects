<?php

namespace App\Http\Controllers;

class CarController extends Controller
{
    public function index()
    {

        $data['cars_name'] = 'suzukiiiiiii';
        return view('cars.index',Compact('data'));
    }

    public function create()
    {
        return 'gg';
    }
}
