<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Character;
use App\Models\Character_attribute;
use App\Models\User;
use App\Models\Attribute;
use App\Models\Character_class;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = [];
       $data['users'] = User::all();
       
       return view('user/index',$data);
    }
    
    public function orderByInput(String $order, $busqueda = null){
        
        $orderBys=["id","email","name"];
        $orders = ["asc","desc"];
        if($order != null){
            try{
                $data['users'] = User::orderBy($orderBys[$order[0]],$orders[$order[1]])->get();
            }catch(\Exception $e){
                return back();
            }
            return view('user/index',$data);
        }else{
        
        $data['users'] = User::all();
        return view('user/index',$data);
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
        $data = [];
        $data['user']= User::find($id);
        $data['characters']= Character::all()->where('user_id',$id);
   
        return view('user.show', $data);
    }

public function showorderByInput(String $order, $busqueda = null){
    
        $orderBys=["id","name","level","gold","xp","xpCap"];
        $orders = ["asc","desc"];
        if($order != null){
            $data['user'] = User::find($busqueda);
            try{
                $data['characters'] = Character::orderBy($orderBys[$order[0]],$orders[$order[1]])->get()->where('user_id',$busqueda);
                return view('user.show',$data);
            }catch(\Exception $e){
                return back();
            }
            return view('user.show',$data);
        }else{
        return view('user.show',$data);
        }
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data['user']= User::find($id);
        if(auth()->user()->rol != 'admin'){
                return view('404');
        }
        
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $rules=[
        
            "name"                  => "required|string|min:2|max:150",
            "email"                 => "required|email:rfc",
            "rol"                   => "required|exists:users,rol|string",
            "password"              => "nullable|string|min:8",
            "password_confirmation" => "nullable|same:password",
        
        ];
        
        $message=[
            'name.required'             =>'Cant add empty field',
            'nombre.string'             =>'Name should be a field',
            'nombre.min'                =>'Name to short',
            'nombre.max'                =>'Name to long',
            
            'email.required'            =>'Email Requeired',
            'email.email'               =>'Please use a valid Email',
            
            'rol.required'              =>'Role cant be empty',
            'rol.exists'                =>'The Role used doent exist',
            'rol.string'                =>'Role should be string',
            
            'password.string'           =>'Pasword should be string',
            'password.min'              =>'Pasword should be higher than 8',
            
            'password_confirmation.same' =>'This password is the same as the previous'
        ];
        
        $validator = Validator::make($request->all(), $rules, $message);
        
        if($validator->messages()->messages()){
           
            return back()
                ->withInput()
                ->withErrors($validator->messages());
        }
        
        
        $user= User::find($id);
        if($request->input('password') == '' ){
            
        }else{
            $data['password'] =  Hash::make($request->input('password'));
            $user->update($data);
        }
        
        $data['rol'] =  $request->input('rol');
        $data['name']= $request->input('name');
        $data['email']= $request->input('email');
        
        
        
        try{
            
            $mensaje['message']='El usuario'. $user->name . 'ha sido editado correctamente';
            $user->update($data);
        
        }catch(\Exception $e){
            $mensaje['message']='El usuario no ha podido ser editado';
            $mensaje['type']= 'danger';
            
            return redirect('user/' . $user->id. '/edit')->with($mensaje);
            
        }
        return redirect('user')->with($data, $mensaje);
        
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        if(auth()->user()->rol != 'admin'){
            
                return back();
            
        }
        try{
            $user->delete();
        }catch(\Exception $e){
             return back();
        }
        
        return back();
    }
}