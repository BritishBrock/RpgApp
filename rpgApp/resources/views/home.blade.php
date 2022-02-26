@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  <!--  if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    endif

                    {{ __('You are logged in!') }}-->
                    @if(auth()->user()->rol == "user")
                                 <a href="{{url('/character/create')}}">create Character</a>
                        <table>
                            <tr>
                                <th>
                                    id
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    class
                                </th>
                            </tr>
                            @foreach($characters as $character)
                            <tr>
                                <td>
                                    {{$character->id}}
                                </td>
                                <td>
                                     {{$character->name}}
                                </td>
                                <td>
                                    {{$character->character_class->name}}
                                </td>
                    
                                  <td>
                                      <a href="{{url('/character/'.$character->id)}}">show</a>
                                  </td>
                    
                                  <td>
                                      <a href="{{url('/character/game/'.$character->id)}}">play game</a>
                                  </td>
                                  <td>
                                <form action="{{ url('/character/'.$character->id)}}" method="post">
                                    <input class="btn btn-default" type="submit" value="Delete" />
                                    @method('delete')
                                @csrf
                            </form>
                                  </td>
                    
                            </tr>
                            @endforeach
                          
                            
                        </table>
                    @endif
                    @if(auth()->user()->rol == "admin")
                                 <a href="{{url('/character/create')}}">create Character</a>
                        <table>
                            <tr>
                                <th>
                                    id
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    class
                                </th>
                            </tr>
                            @foreach($characters as $character)
                            <tr>
                                <td>
                                    {{$character->user->name}}
                                </td>
                                <td>
                                    {{$character->id}}
                                </td>
                                <td>
                                     {{$character->name}}
                                </td>
                                <td>
                                    {{$character->character_class->name}}
                                </td>
                    
                                  <td>
                                      <a href="{{url('/character/'.$character->id)}}">show</a>
                                  </td>
                    
                                  <td>
                                      <a href="{{url('/character/game/'.$character->id)}}">play game</a>
                                  </td>
                                  <td>
                                <form action="{{ url('/character/'.$character->id)}}" method="post">
                                    <input class="btn btn-default" type="submit" value="Delete" />
                                    @method('delete')
                                @csrf
                            </form>
                                  </td>
                    
                            </tr>
                            
                            @endforeach
                          
                            
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
