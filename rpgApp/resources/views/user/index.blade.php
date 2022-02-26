@extends('layouts.app')

<style type="text/css">
    
@font-face {
  font-family: OpenSans-Regular;
  src: url(../fonts/OpenSans/OpenSans-Regular.ttf);
}
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body,
html {
  height: 100%;
  font-family: sans-serif;
}


h1,
h2,
h3,
h4,
h5,
h6 {
  margin: 0;
}
p {
  margin: 0;
}
ul,
li {
  margin: 0;
  list-style-type: none;
}
input {
  display: block;
  outline: none;
  border: none !important;
}
textarea {
  display: block;
  outline: none;
}
textarea:focus,
input:focus {
  border-color: transparent !important;
}
button {
  outline: none !important;
  border: none;
  background: 0 0;
}
button:hover {
  cursor: pointer;
}
iframe {
  border: none !important;
}
.limiter {
  width: 100%;
  margin: 0 auto;
}
.container-table100 {
  width: 100%;
  min-height: 100vh;
  background: #c850c0;
  background: -webkit-linear-gradient(45deg, #4158d0, #c850c0);
  background: -o-linear-gradient(45deg, #4158d0, #c850c0);
  background: -moz-linear-gradient(45deg, #4158d0, #c850c0);
  background: linear-gradient(45deg, #4158d0, #c850c0);
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  padding: 33px 30px;
}
.wrap-table100 {
  width: 1170px;
}
table {
  border-spacing: 1;
  border-collapse: collapse;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
  width: 100%;
  margin: 0 auto;
  position: relative;
}
table * {
  position: relative;
}
table td,
table th {
  padding-left: 8px;
}
table thead tr {
  height: 60px;
  background: #36304a;
}
table tbody tr {
  height: 50px;
}
table tbody tr:last-child {
  border: 0;
}
table td,
table th {
  text-align: left;
}
table td.l,
table th.l {
  text-align: right;
}
table td.c,
table th.c {
  text-align: center;
}
table td.r,
table th.r {
  text-align: center;
}
.table100-head th {
  font-family: OpenSans-Regular;
  font-size: 18px;
  color: #fff;
  line-height: 1.2;
  font-weight: unset;
}
tbody tr:nth-child(even) {
  background-color: #f5f5f5;
}
tbody tr {
  font-family: OpenSans-Regular;
  font-size: 15px;
  color: gray;
  line-height: 1.2;
  font-weight: unset;
}
tbody tr:hover {
  color: #555;
  background-color: #f5f5f5;
  cursor: pointer;
}
.column1 {
  width: 260px;
  padding-left: 40px;
  height:100%;
}
.column2 {
  width: 160px;
  height:100%;
}
.column3 {
  width: 245px;
  height:100%;
}
.column4 {
  width: 110px;
  height:100%;
  text-align: right;
}
.column5 {
  width: 170px;
  height:100%;
  text-align: right;
}
.column6 {
  width: 222px;
  height:100%;
  text-align: right;
  padding-right: 62px;
}
@media screen and (max-width: 992px) {
  table {
    display: block;
  }
  table > *,
  table tr,
  table td,
  table th {
    display: block;
  }
  table thead {
    display: none;
  }
  table tbody tr {
    height: auto;
    padding: 37px 0;
  }
  table tbody tr td {
    padding-left: 40% !important;
    margin-bottom: 24px;
  }
  table tbody tr td:last-child {
    margin-bottom: 0;
  }
  table tbody tr td:before {
    font-family: OpenSans-Regular;
    font-size: 14px;
    color: #999;
    line-height: 1.2;
    font-weight: unset;
    position: absolute;
    width: 40%;
    left: 30px;
    top: 0;
  }
  table tbody tr td:nth-child(1):before {
    content: "Date";
  }
  table tbody tr td:nth-child(2):before {
    content: "Order ID";
  }
  table tbody tr td:nth-child(3):before {
    content: "Name";
  }
  table tbody tr td:nth-child(4):before {
    content: "Price";
  }
  table tbody tr td:nth-child(5):before {
    content: "Quantity";
  }
  table tbody tr td:nth-child(6):before {
    content: "Total";
  }
  .column4,
  .column5,
  .column6 {
    text-align: left;
  }
  .column4,
  .column5,
  .column6,
  .column1,
  .column2,
  .column3 {
    width: 100%;
    height:100%;
  }
  tbody tr {
    font-size: 14px;
  }
}
@media (max-width: 576px) {
  .container-table100 {
    padding-left: 15px;
    padding-right: 15px;
  }
}
.fooorm{
    width:100% !important;
    height:100% !important;
    display:inline-block !important;
    height:50px!important;
}
    .limiter a{
        text-decoration:none;
        color:white;
    }
  .but a{
       width:100% !important;
       height:50px!important;
       
       display:flex;
       justify-content:center;
       align-items:center;
   } 
   .btn{
    text-align:center;
    display:inline-block !important;
    height:50px!important;
    width:100%;
    cursor:pointer;
}
.py-4{
  width:100%;
}
.containers{
  width:100%;
  padding:0;
  margin:0;
}
.row{
   width:100%;
}
.col-md-8{
  max-width:none;
}
.card > a{
  width:150px;
  text-decoration:none;
  color:black;
  background-color:white;
  border:2px solid black;
  padding:5px 20px;
  transition:all 0.3s ease;
}
.card > a:hover{
  text-decoration:none;
  color:white;
  background-color:black;
  border:2px solid white                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ;
  padding:5px 20px;
}
</style>

@section('content')

<div class="containers">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


 <a  class="button"href="{{url('/home')}}">Back</a><br>
                <div class="card-body">
                    <div class="limiter">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100">
                                    <table>
                                    <thead>
                                    <tr class="table100-head">
                                    <th class="column1"><a href="{{url('/userOrder/00/')}}">&uarr;</a>User_id<a href="{{url('/userOrder/01/')}}">&darr;</a></th>
                                    <th class="column2"><a href="{{url('/userOrder/10')}}">&uarr;</a>User Email<a href="{{url('/userOrder/11')}}">&darr;</a></th>
                                    <th class="column2"><a href="{{url('/userOrder/20')}}">&uarr;</a> User Name<a href="{{url('/userOrder/21')}}">&darr;</a></th>
                                    <th class="column3">Show User Characters</th>
                                    <th class="column4">Edit</th>
                                    <th class="column6">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($users as $user)
                                    <tr>
                                    <td class="column1">{{$user->id}}</td>
                                    <td class="column1">{{$user->email}}</td>
                                    <td class="column2">{{$user->name}}</td>
                                    <td class="column4 but" style="background-color:blue"><a href="{{url('/user/'.$user->id)}}"  style="background-color:blue">Characters</a></td>
                                    <td class="column5 but" style="background-color:blue"><a href="{{url('/user/'.$user->id.'/edit')}}"  style="background-color:blue">Edit</a></td>
                                     @if($user->rol == 'user')<td class="column6 but" style="background-color:red">
                                        <form style="background-color:red"class="fooorm" action="{{ url('/user/'.$user->id)}}" method="post">
                                            <input  style="background-color:red"class="btn btn-default" type="submit" value="X" />
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                    @endif
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        
                    </div>
                    
                    
                   </div>
                   
                   
                       
                     
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
@endsection


