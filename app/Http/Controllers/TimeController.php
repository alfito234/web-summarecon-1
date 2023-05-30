<?php

namespace App\Http\Controllers;

use App\Http\Resources\TimeResource;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $time = Time::all();

        return new TimeResource(true, 'data', $time);
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
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'Pintu'=> 'required',
            'RuangTamuDepan'=> 'required',
            'RuangMakan'=> 'required',
            'HalamanDepan'=> 'required',
            'Lantai2'=> 'required',
            'Balkon'=> 'required',
            'Kamar'=> 'required',
            'Toilet'=> 'required'
        ]);

        if($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }
        $menit = 60;
        $time = Time::create($request->all());

        return new TimeResource(true, "Data berhasil ditambahkan", $time);
    }

    /**
     * Display the specified resource.
     */
    public function show(Time $time)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Time $time)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Time $time)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Time $time)
    {
        //
    }
}
