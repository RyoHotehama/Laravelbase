<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('Top.index');
    }
    
    /**
     * ログアウト処理
     *
     * @return void
     */
    public function logout() {
        Auth::logout();

        return redirect()->route('login');
    }
}
