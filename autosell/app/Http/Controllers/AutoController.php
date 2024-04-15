<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AutoController extends Controller
{
    public function adform_store(Request $request){
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mark' => '',
            'model' => '',
            'description' => '',
            'state' => '',
            'fueltype' => '',
            'fuelconsumption' => '',
            'mileage' => '',
            'numusr' => '',
            'date' => '',
        ]);
        // dump($request->mark);
        // dump($request->model);
        // dump($request->description);
        // dump($request->state);
        // dump($request->fueltype);
        // dump($request->fuelconsumption);
        // dump($request->mileage);
        // dump($request->numusr);
        // dump($request->date);
        $files = $request->file('image');
        foreach ($files as $file) {
            $path = $file->store('public/images/autos');
            print($path);
        }
        // $paths = $request->file('image')->store('public/images/autos');
       
    }
}
