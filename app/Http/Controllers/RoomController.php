<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room = Room::all();

        return new RoomResource(true, "data", $room);
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

        $room = Room::create($request->all());

        return new RoomResource(true, "Data berhasil ditambahkan", $room);

    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
