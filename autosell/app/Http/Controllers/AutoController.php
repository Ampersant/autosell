<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AutoHistory;
use App\Models\TechData;
use App\Models\Auto;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'transmission' => 'required|numeric',
            'description' => 'required|string',
            'state' => 'required|numeric',
            'fueltype.*' => 'required|',
            'fuelconsumption.*' => 'numeric|nullable',
            'year' => 'required|numeric',
            'mileage' => 'required|numeric',
            'numusr' => 'required|numeric',
            'date' => 'required|date',
        ]);
        $fuelcons = array_filter($request->fuelconsumption, function($value){
            return $value !== null;
        });
        $fuelcons = array_values($fuelcons);
        $consumption = implode(', ', $fuelcons);
        //creation 
        $auto_history = AutoHistory::create([
            'mileage' => $request->mileage,
            'num_users' => $request->numusr,
            'last_tech_insp' => $request->date,
        ]);

        $tech_data =TechData::create([
            'year' => $request->year,
            'state_id' => $request->state,
            'consumption' => $consumption,
            'form_id' => $request->form,
            'transmission_id' => $request->transmission
        ]);

        $fuels = $request->fueltype;
        foreach($fuels as $key => $value ){
            $tech_data->fuel()->attach($value);
        }

        $auto = Auto::create([
            'description' => $request->description,
            'mark_id' => $request->mark,
            'user_id' => $userID,
            'model_id' => $request->model,
            'type_id' => $request->type,
            'tech_data_id' => $tech_data->id,
            'auto_history_id' => $auto_history->id,
        ]);

        $files = $request->file('image');
        foreach ($files as $file) {
            $path = $file->store('public/images/autos');
            Image::create([
                'path' => $path,
                'name' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'mime_type' => $file->getMimeType(),
                'auto_id' => $auto->id
            ]);
        }
        return redirect()->route('profile.index');
    }

}
