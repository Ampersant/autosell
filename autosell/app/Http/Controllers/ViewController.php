<?php

namespace App\Http\Controllers;

use App\Http\Resources\AutoResource;
use App\Models\Auto;
use App\Models\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function index(){
        // dd(Auth::check());
        $data['autos'] = Auto::with(['mark', 'user', 'markmodel', 'type', 'techdata', 'autohistory'])->get();
        // dd($data);
        return view('index', compact('data'));
    }
    public function profile(){
        return view('profile.profile');
    }
    public function register(){
        return view('auth.register_page');
    }
    public function login(){
        return view('auth.login_page');
    }
}
