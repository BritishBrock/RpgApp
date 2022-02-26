<?php

namespace App\Http\Controllers;
use App\Models\Character;
use App\Models\Character_attribute;
use App\Models\User;
use App\Models\Attribute;
use App\Models\Character_class;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        
        $data['character_class'] = Character_class::all();
        $data['users'] = User::all();
        $data['attributes'] = Attribute::all();
        return view('character/create', $data);
    }
    public function createU(int $userId){
        $data = [];
        
        $data['character_class'] = Character_class::all();
        $data['users'] = User::all()->where('id',$userId);
        $data['attributes'] = Attribute::all();
        return view('character/createU', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $rules=[
        
            "name"                  => "required|string|min:2|max:150",
            "stats.*"               =>"min:0|max:100|integer",
        
        ];
        
        $message=[
            'name.required'             =>'Name Cant be empty field',
            'nombre.string'             =>'Name should be a field',
            'nombre.min'                =>'Name to short',
            'nombre.max'                =>'Name to long',
            
            
            'stats.*.min' => 'Needs to be higher than 0',
            'stats.*.max' => 'needs to be less than 100',
           
        ];
        
        $validator = Validator::make($request->all(), $rules, $message);
        
        if($validator->messages()->messages()){
            return back()
                ->withInput()
                ->withErrors($validator->messages());
        }


        $character = new Character($request->all());
        
        try{
           $result = $character->save();
           try{
               $thekeys = array_keys($request->input('stats'));
                foreach($thekeys as $stats){
               $data = [];
               $data['name'] = $stats;
               $data['character_id'] = $character->id;
               $data['value'] = intval($request->input('stats')[$stats]);
               $character_attribute = new Character_attribute($data);
               try{
                   $result = $character_attribute->save();
                   
               }catch(\Exception $e){
                     return back();
                }
           }
           }catch(\Exception $e){
               $thekeys =Attribute::all();
                foreach($thekeys as $stats){
                   $data = [];
                   $data['name'] = $stats->name;
                   $data['character_id'] = $character->id;
                   $character_attribute = new Character_attribute($data);
                   try{
                       $result = $character_attribute->save();
                       
                   }catch(\Exception $e){
                         return back();
                    }
             }
               
           }
          
           return redirect("home");
        }catch(\Exception $e){
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
       
        $data = [];
        $data['characters'] = Character::all()->where('id',$character->id);
        $data['character_class'] = Character_class::all()->where('character_id',$character->id);
        $data['character_attributes'] = character_attribute::all()->where('character_id',$character->id);

        return view('character/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        $data = [];
        $data['characters'] = Character::all()->where('id',$character->id);
        $data['character_class'] = Character_class::all();
        $data['character_attributes'] = character_attribute::all();

        return view('character/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character)
    {
        
         try{
             $result = $character->update($request->all());
        }catch(\Exception $e){
            return back();
        }
        return redirect("home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        if(isset($character)){
            try{
                $character->delete();
                return redirect("home");
            }catch(\Exception $e){
                return back();
            }
        }else{
            return redirect("home");
        }
    }
    
    
    
    
    
    
    public function permaDelete(int $deletedCharacter){
         try{
         Character::withTrashed()->find($deletedCharacter)->forceDelete();
         
        }catch(\Exception $e){
            return back();
        }
        return back();
    }
    
    
    public function recover(int $delId){
        try{
         Character::withTrashed()->find($delId)->restore();
        }catch(\Exception $e){
            return back();
        }
        return redirect("home");
    }
    
    
    
    public function sendToGame(Character $character){
        $data = [];
        $data['characters'] = Character::all()->where('id',$character->id);
        $data['character_class'] = Character_class::all();
        $data['character_attribute'] = character_attribute::all()->where('character_id',$character->id);
       
        return view('game/game', $data);
    }
    
    public function saveGameData(Request $request, Character $character){
        try{
        $result = $character->update($request->all());
        $thekeys = array_keys($request->input('stats'));
         foreach($thekeys as $stats){
               $characterAttr = character_attribute::where('character_id',$character->id)->where('name',$stats)->update(['value' =>intval($request->input('stats')[$stats])]);
         }
        return redirect("home");
        }catch(\Exception $e){
            
            return back();
        }
    }
    
}
