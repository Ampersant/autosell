<?php

namespace App\Http\Controllers;

use App\Http\Resources\AutoResource;
use App\Models\Auto;
use App\Models\Fuel;
use App\Models\Type;
use App\Models\Chat;
use App\Models\User;
use App\Models\State;
use App\Models\Color;
use App\Models\Transmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;

class ViewController extends Controller
{
    public function index(){
        $data['autos'] = Auto::with(['mark', 'user', 'markmodel', 'type', 'techdata', 'autohistory', 'image'])->get();

        return view('index', compact('data'));
    }
    public function about(){
        return view('about');
    }
    public function blog(){
        return view('blog');
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
        $colors = Color::all();
        $transmissions = Transmission::all();
        return view('profile.advertisement_form', ['active_link' => 'adform', 
                                                    'types' => $types,
                                                    'states' => $states,
                                                    'colors' => $colors,
                                                    'transmissions' => $transmissions,
                                                    'fuels' => $fuels]);
    }
    public function singleitem($id){
        $item = Auto::find($id);
        return view('singleitem', ['item' => $item]);
    }
    public function showchat(){
        $user = Auth::user();
        $chats = $user->chats;
        // dd($chats);
        return view('layouts.errors.404', ['chats' => $chats,
                                  'active_link' => 'chats']);
    }
    public function adminpanel(){
        return view('profile.admin.index', ['acrive_link' => 'adminpanel']);
    }

   
}
