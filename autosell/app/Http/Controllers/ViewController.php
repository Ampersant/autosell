<?php

namespace App\Http\Controllers;

use App\Http\Resources\AutoResource;
use App\Models\Auto;
use App\Models\Fuel;
use App\Models\Type;
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
    public function resizingImg(array $images, $width, $height){
        $resizedImages = [];
        $manager = new ImageManager(Driver::class); 
        foreach($images as $image){
            $imagePath = str_replace('/', '\\', public_path($image['p_path']));
            // dd($imagePath);
            $img = $manager->read($imagePath);
            $img->resize($width, $height);
            $resizedImages[] = $img;
        }
        return $resizedImages;
    }

    public function index(){
        $encoder = new AutoEncoder();
        // dd(Auth::check());
        $data['autos'] = Auto::with(['mark', 'user', 'markmodel', 'type', 'techdata', 'autohistory', 'image'])->get();
        foreach($data['autos'] as $auto){
            // dd($auto->image->toArray());
            $auto->image = $this->resizingImg($auto->image->toArray(), 500, 500);
        }
        dd(base64_encode($data['autos'][0]->image[0]->encode($encoder)));
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

   
}
