<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwimController extends Controller
{
    public function index() {
        return view('Swim.index');
    }

    public function practice() {
        return view('Swim.create_practice');
    }
}
