<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\MarkModel;
use Illuminate\Http\Request;

class AutoFilterController extends Controller
{
    public function getbymark(Request $request) {
        $mark_id = $request->query('selectedOption');
        $models = MarkModel::where('mark_id', $mark_id)->get();
        return $models;
    }
}
