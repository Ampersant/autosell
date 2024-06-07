<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\AutoHistory;
use App\Models\Form;
use App\Models\Fuel;
use App\Models\Auto;
use App\Models\MarkModel;
use App\Models\State;
use App\Models\TechData;
use App\Models\Transmission;
use App\Models\Type;
use Illuminate\Http\Request;

class AutoFilterController extends Controller
{
    public function getbymark(Request $request) {
        $mark_id = $request->query('selectedOption');
        $models = MarkModel::where('mark_id', $mark_id)->get();
        return $models;
    }
    public function allfilters(){
        $transmissions = Transmission::all();
        $states = State::all();
        $types = Type::all();
        $forms = Form::all();
        $fuels = Fuel::all();
        $years = $this->getyears();
        $mileages = $this->getmileages();
        $data = [
            'transmissions' => $transmissions,
            'states' => $states,
            'fuels' => $fuels,
            'years' => $years,
            'mileages' => $mileages,
            'types' => $types
        ];
        return response()->json($data);
    }
    public function applyfilters(Request $request){
        $validated = $request->validate([
            'transmission' => 'nullable|string',
            'state' => 'nullable|array',
            'state.*' => 'integer',
            'year_from' => 'nullable|integer',
            'year_to' => 'nullable|integer',
            'form' => 'nullable|string',
            'mileage_from' => 'nullable|integer',
            'mileage_to' => 'nullable|integer',
            'num_of_users' => 'nullable|integer|min:0|max:5',
            'last_tech_insp' => 'nullable|date',
            'fuel' => 'nullable|array',
            'fuel.*' => 'integer',
        ]);
        $autos = Auto::with(['markmodel', 'mark', 'image'])->get();
        $filtered = $this->get_filtered_autos($autos, $validated);
        return response()->json($filtered);
    }
    //funcs
    public function getmileages(){
        $max_mil = AutoHistory::min('mileage');

        $min_mil = 0;
        $temp = $min_mil;
        $mils = [];
        while($temp <= $max_mil){
            $mils[] = $temp;
            if($temp < 10000){
                $temp += 1000;
            }else if($temp > 10000 && $temp < 100000){
                $temp += 10000;
            }else{
                $temp += 100000;
            }
        }
        $mils[] = (int)$max_mil;
        return $mils;
    }
    public function getyears(){
        $min_year = TechData::min('year');
        $cur_year = date('Y');
        $temp = $min_year;
        $years = [];
        while($temp <= $cur_year){
            $years[] = $temp;
            $temp++;
        }
        return $years;
    }
    public function get_filtered_autos($autos, $validated){
       return $autos->filter(function($auto) use ($validated){
            if (!empty($validated['transmission']) && $auto->techdata->transmission->id != $validated['transmission']) {
                return false;
            }
            if (!empty($validated['state']) && !in_array($auto->techdata->state->id, $validated['state'])) {
                return false;
            }
            if (!empty($validated['year_from']) && $auto->techdata->year < $validated['year_from']) {
                return false;
            }
            if (!empty($validated['year_to']) && $auto->techdata->year > $validated['year_to']) {
                return false;
            }
            if (!empty($validated['form']) && $auto->techdata->form_id != $validated['form']) {
                return false;
            }
            if (!empty($validated['mileage_from']) && $auto->autohistory->mileage <= $validated['mileage_from']) {
                return false;
            }
            if (!empty($validated['mileage_to']) && $auto->autohistory->mileage >= $validated['mileage_to']) {
                return false;
            }
            if (!empty($validated['num_of_users']) && $auto->autohistory->num_users != $validated['num_of_users']) {
                return false;
            }
            if (!empty($validated['last_tech_insp']) && $auto->autohistory->last_tech_insp < $validated['last_tech_insp']) {
                return false;
            }
            if (!empty($validated['fuel']) && !in_array($auto->techdata->fuel, $validated['fuel'])) {
                return false;
            }
            return true;
        });
    }
}

