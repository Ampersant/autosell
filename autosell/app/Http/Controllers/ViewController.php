<?php

namespace App\Http\Controllers;

use App\Http\Resources\AutoResource;
use App\Models\Auto;
use App\Models\Fuel;
use App\Models\Type;
use App\Models\State;
use App\Models\Transmission;
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
    public function register(){
        return view('auth.register_page');
    }
    public function login(){
        return view('auth.login_page');
    } 
    public function profile(){
        return view('profile.profile', ['active_link' => 'profile']);
    }
    public function dashboard(){
        return view('profile.dashboard', ['active_link' => 'dashboard']);
    }
    public function adform(){
        $types = Type::all();
        $fuels = Fuel::all();
        $states = State::all();
        $transmissions = Transmission::all();
        return view('profile.advertisement_form', ['active_link' => 'adform', 
                                                    'types' => $types,
                                                    'states' => $states,
                                                    'transmissions' => $transmissions,
                                                    'fuels' => $fuels]);
    }
   
}
