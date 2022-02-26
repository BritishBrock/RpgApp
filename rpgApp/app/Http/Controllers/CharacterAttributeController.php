<?php

namespace App\Http\Controllers;
use App\Models\Character;
use App\Models\Character_class;
use App\Models\Character_attribute;
use Illuminate\Http\Request;

class CharacterAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character_attribute  $character_attribute
     * @return \Illuminate\Http\Response
     */
    public function show(int $character_attribute)
    {
        $data = [];
        $data['characters'] = Character::all()->where('id',$character_attribute);
        $data['character_class'] = Character_class::all();
        $data['character_attribute'] = character_attribute::all();
        return view('character_Attribute/index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character_attribute  $character_attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Character_attribute $character_attribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character_attribute  $character_attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character_attribute $character_attribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character_attribute  $character_attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character_attribute $character_attribute)
    {
        //
    }
}
