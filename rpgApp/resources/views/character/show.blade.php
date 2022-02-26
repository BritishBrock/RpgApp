@extends('layouts.app')
<style type="text/css">
    
          *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710 !important;
}
    .card-body{
        display:flex;
        justify-content:center;
        align-items:center;
        flex-wrap:wrap;
        
    }

    .game-profile{
        width:400px;
        height:600px;
        background-color: rgba(255,255,255,0.13);
        border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
        display:flex;
        flex-direction:column;
        position:relative;
        margin:10px 50px;
    }
    .game-profile *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
    .bottom-profile{
        height:50px;
        position:absolute;
        bottom:0;
        left:0;
        width:100%;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .bottom-profile-icon{
        display:flex;
        justify-content:center;
        align-items:center;
        flex:1;
        height:100%;
        text-decoration:none;
        color:white;
        font-size:24px;
    }
    .button{
    margin: 50px auto;
    width: 300px;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    text-align:center;
    text-transform:uppercase;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
    text-decoration:none;
}
.cards{
    display:flex;
    flex-direction:column;
    align-items:center;
}
.btn{
    width:100%;
    height:100%;
    background-color:red;
    cursor:pointer;
}
.bottom-profile-icon > form{
    width:100%;
    height:100%;
}
</style>
@section('content')
<div class="containers">
    <div class="rows justify-content-centers">
        <div class="col-md-8s">
            <div class="cards">
                <a  class="button"href="{{url('/home')}}">Back</a><br>
                
                <div class="card-body">
                     
                    @foreach($characters as $character)
                            <div class="game-profile">
                                <h1>Name:{{$character->name}}</h1>
                                <h1>Class:{{$character->character_class->name}}</h1>
                                <h1>Level:{{$character->level}}</h1>
                                <h1>Gold:{{$character->gold}}</h1>
                                <h1>Xp:{{$character->xp}}</h1>
                                <h1>XpCap:{{$character->xpCap}}</h1>
                            </div>
                    @endforeach
                </div>
                <div style="display:flex;flex-direction:column">
                  <h1 style="color:white">Attributes</h1>
                  <div>
                      @foreach($character_attributes as $attribute)
                  <div style="display:flex;color:white;justify-content:center;">
                    {{$attribute->name}}: {{$attribute->value}}
                  </div>
                 
                  @endforeach
                  </div>
                  
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
