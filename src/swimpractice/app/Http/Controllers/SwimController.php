<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HTTP\Requests\SwimRequest;

class SwimController extends Controller
{
    public function index() {
        return view('Swim.index');
    }

    public function practice() {
        return view('Swim.create_practice');
    }

    public function post(SwimRequest $request) {
        return view ('Swim.create_practice');
    }
}
