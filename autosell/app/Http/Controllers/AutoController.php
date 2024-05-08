<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AutoHistory;
use App\Models\TechData;
use App\Models\Auto;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;


class AutoController extends Controller
{
    public function adform_store(Request $request){
        $userID = auth()->id();
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|numeric',
            'mark' => 'required|numeric',
            'model' => 'required|numeric',
            'form' => 'required|numeric',
            'color' => 'required|numeric',
            'transmission' => 'required|numeric',
            'description' => 'required|string',
            'state' => 'required|numeric',
            'fueltype.*' => 'required|',
            'fuelconsumption.*' => 'numeric|nullable',
            'year' => 'required|integer|digits:4|between:1930,' . date('Y'),
            'mileage' => 'required|numeric',
            'numusr' => 'required|numeric',
            'date' => 'required|date',
            'price' => 'required|numeric'
        ]);
        
        $fuelcons = array_filter($request->fuelconsumption, function($value){
            return $value !== null;
        });
        $fuelcons = array_values($fuelcons);
        // $consumption = implode(', ', $fuelcons);
        //creation 
        $auto_history = AutoHistory::create([
            'mileage' => $request->mileage,
            'num_users' => $request->numusr,
            'last_tech_insp' => $request->date,
        ]);

        $tech_data =TechData::create([
            'year' => $request->year,
            'state_id' => $request->state,
            'form_id' => $request->form,
            'transmission_id' => $request->transmission
        ]);
        $fuels = $request->fueltype;
        $dataToAttach = [];
        foreach ($fuels as $index => $fuel_id) {
            $dataToAttach[$fuel_id] = ['consumption' => $fuelcons[$index]];
        }
        $tech_data->fuel()->attach($dataToAttach);
        // foreach($fuels as $key => $value ){
        //     $tech_data->fuel()->attach($value);
        // }

        $auto = Auto::create([
            'description' => $request->description,
            'price' => $request->price,
            'color_id' => $request->color,
            'mark_id' => $request->mark,
            'user_id' => $userID,
            'model_id' => $request->model,
            'type_id' => $request->type,
            'tech_data_id' => $tech_data->id,
            'auto_history_id' => $auto_history->id,
        ]);

        $files = $request->file('image');
        foreach ($files as $key => $file) {
            $is_thumb = false;
            $path = $file->store('public/images/autos');
            $p_path = str_replace('public', 'storage', $path);
            $carousel_path = str_replace('autos', 'carousels', $p_path);

            $manager = new ImageManager(Driver::class); 
            if ($key === 0) {
                $is_thumb = true;
                $thumb_path = str_replace('autos', 'thumbnails', $p_path);
                $thumbnail = $manager->read($file)->resize(500,500)->save($thumb_path);
            }else{
                $thumb_path = null;
            }
            

            $carousel = $manager->read($file)->resize(1024,700)->save($carousel_path);

            // $thumbnailPath =   
            Image::create([
                'path' => $path,
                'p_path' => $p_path,
                'is_thumb' => $is_thumb,
                'thumb_path' => $thumb_path,
                'carousel_path' => $carousel_path,
                'name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'mime_type' => $file->getMimeType(),
                'auto_id' => $auto->id
            ]);
        }
        
        return redirect()->route('index');
    }
    public function destroy($id){
        $images = Image::where('auto_id', $id)->get();
        foreach($images as $image){
            Storage::delete('app/'.$image->path);
            $image->delete();
        }
        
        Auto::destroy($id);
        return redirect('/');
    }
    public function update($id){
        
    }

}
