<?php

namespace App\Http\Controllers;

use App\Http\Resources\AutoResource;
use App\Models\Auto;
use App\Models\Mark;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        $data['autos'] = Auto::with(['mark', 'user', 'markmodel', 'type', 'techdata', 'autohistory'])->get();
        // dd($data);
        return view('index', compact('data'));
    }
}
