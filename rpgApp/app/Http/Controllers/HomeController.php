<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Character;
use App\Models\Character_attribute;
use App\Models\User;
use App\Models\Attribute;
use App\Models\Character_class;
use Illuminate\Pagination\Paginator;
class HomeController extends Controller 
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified')->only('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $data = [];
        if(auth()->user()->rol == 'user'){
            $data['characters'] = Character::all()->where('user_id',auth()->user()->id);
            $data['users'] = User::all()->where('id',auth()->user()->id);
            return view('user',$data);
        }else{
            $data['users'] = User::all();
            $data['characters'] = Character::paginate(5);
            $data['deletedCharacters'] = Character::onlyTrashed()->paginate(5);
            return view('admin',$data);
        }
        
    }
    
    public function orderByInput(String $order, $busqueda = null){
        $orderBys=["user_id","name","id"];
        $orders = ["asc","desc"];
        if($order != null){
            $data['users'] = User::all();
            try{
                $data['characters'] = Character::orderBy($orderBys[$order[0]],$orders[$order[1]])->paginate(5);
                $data['deletedCharacters'] = Character::onlyTrashed()->orderBy($orderBys[$order[0]],$orders[$order[1]])->paginate(5);
            }catch(\Exception $e){
                return back();
            }
            
            return view('admin',$data);
        }else{
        
        $data['users'] = User::all();
        $data['characters'] = Character::paginate(5);
        $data['deletedCharacters'] = Character::onlyTrashed()-paginate(5);
        return view('admin',$data);
        }
    }
    
    
    public function search(Request $request){
         $data =[];
         if($request->input('search') != null){
            $busqueda = trim($request->input('search'));
            $data['characters'] = Character::select('*')->where('name','LIKE','%'. $busqueda .'%')->orWhere('user_id','LIKE','%'. $busqueda .'%')->orderBy('name', 'desc')->paginate(10);
            $data['deletedCharacters'] = Character::onlyTrashed()->select('*')->where('name','LIKE','%'. $busqueda .'%')->orWhere('user_id','LIKE','%'. $busqueda .'%')->orderBy('name', 'desc')->paginate(10);
             
         } else {
            $data['characters'] = Character::select('*')->orderBy('name', 'desc')->paginate(10);
             $data['deletedCharacters'] = Character::onlyTrashed()->get();
        }
        
        return view('admin',$data);
}
    
}

