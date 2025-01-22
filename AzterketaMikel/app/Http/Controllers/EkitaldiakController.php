<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEkitaldiakRequest;
use App\Http\Requests\UpdateEkitaldiakRequest;
use App\Models\Ekitaldiak;

class EkitaldiakController extends Controller
{
    //Ekitaldi guztiak ikusi
    public function index()
    {
        $ekitaldiak = Ekitaldia::all();
        return response()->json($ekitaldiak);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEkitaldiakRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ekitaldiak $ekitaldiak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEkitaldiakRequest $request, Ekitaldiak $ekitaldiak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ekitaldiak $ekitaldiak)
    {
        //
    }
}
