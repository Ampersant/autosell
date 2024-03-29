<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    public function index(){
        return json_encode(Role::all()->except(3));
    }
}
