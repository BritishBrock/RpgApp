<style type="text/css">

*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: auto;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
select{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
input[type="submit"]{
     margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
    transition:all 0.3s ease;
}
input[type="submit"]:hover{
    filter:invert(100%);
    border:1px solid black;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
option{
    background-color:gray;
}
.errormessage{
    width:100%;
    font-size:30px;
    background-color:#ff7878;
    border:2px solid red;
    padding:8px 10px;
    text-align:center;
    color:white;
}.button{
    margin: 50px auto;
    width: 300px !important;
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
    </style>
 @error('name')
     <div class="errormessage">{{$message}}</div>
 @enderror
  @error('stats.*')
     <div class="errormessage">{{$message}}</div>
 @enderror
 <a  class="button"href="{{url('/home')}}">Back</a><br>
<form action="{{url('character')}}" method="post">
    @method('POST')
    @csrf
    <select name="user_id" id="user">
      @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
    </select>
    <input type="text" name="name" value="{{old('name')}}"/>
    

    <select name="character_class_id" id="class">
      @foreach($character_class as $class)
          <option value="{{$class->id}}">{{$class->name}}</option>
      @endforeach
    </select>
    @foreach($attributes as $attribute)
        <label for="character_attribute">{{$attribute->name}}</label>
        <input type="number" name="stats[{{$attribute->name}}]"/>
        
    @endforeach
    <input type="submit" value="Submit"/>
</form>