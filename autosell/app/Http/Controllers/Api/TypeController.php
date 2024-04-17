<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Mark;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function getmarks(Request $request)
    {
        $type_id = $request->query('selectedOption');
        $marks = Mark::where('type_id', $type_id)->get();
        return $marks;
    }
    public function getforms(Request $request)
    {
        $type_id = $request->query('selectedOption');
        $forms = Form::where('type_id', $type_id)->get();
        return $forms;
    }
}
