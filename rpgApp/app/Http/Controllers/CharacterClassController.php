<?php

namespace App\Http\Controllers;

use App\Models\Character_class;
use Illuminate\Http\Request;

class CharacterClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['classes'] = Character_class::all();
        
        return view('character_class/index',$data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('character_class/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $class = new Character_class($request->all());
         try{
             $class->save();
             return redirect("character_class");
         }catch(\Exception $e){
             return back()->withInput();
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character_class  $character_class
     * @return \Illuminate\Http\Response
     */
    public function show(Character_class $character_class)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character_class  $character_class
     * @return \Illuminate\Http\Response
     */
    public function edit(Character_class $character_class)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character_class  $character_class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character_class $character_class)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character_class  $character_class
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character_class $character_class)
    {
        if(Character_class::all()->count() != 1){
            try{
                $character_class->delete();
                return redirect("character_class");
            }catch(\Exception $e){
                return back();
            }
        }else{
            return back();
        }
    }
}
