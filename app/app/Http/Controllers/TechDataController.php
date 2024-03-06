<?php

namespace App\Http\Controllers;

use App\Models\tech_data;
use App\Http\Requests\Storetech_dataRequest;
use App\Http\Requests\Updatetech_dataRequest;

class TechDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storetech_dataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tech_data $tech_data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tech_data $tech_data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatetech_dataRequest $request, tech_data $tech_data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tech_data $tech_data)
    {
        //
    }
}
