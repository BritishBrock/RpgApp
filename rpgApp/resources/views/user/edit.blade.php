
<style type="text/css">

          *,
*:before,
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
    font-size: 28px;
    font-weight: 500;
    line-height: 30px;
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

.checker{
    width:30px;
    height:30px;
    float:right;
}
.navbar-toggler{
    display:none;
}
.nav-item{
    display:none;
}
.navbar-brand{
    display:none;
}
option{
    background-color:#080710;
}
select{
    background-color:#080710;
}.errormessage{
    width:100%;
    font-size:30px;
    background-color:#ff7878;
    border:2px solid red;
    padding:8px 10px;
    text-align:center;
    color:white;
}
    </style>
 @error('name')
     <div class="errormessage">{{$message}}</div>
 @enderror
  @error('email')
     <div class="errormessage">{{$message}}</div>
 @enderror
 @error('rol')
     <div class="errormessage">{{$message}}</div>
 @enderror
 @error('password')
     <div class="errormessage">{{$message}}</div>
 @enderror
  @error('password_confirmation')
     <div class="errormessage">{{$message}}</div>
 @enderror
<div class="card-body card-block">
        <form action="{{url('user/' . $user->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label"> User Name:</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="name" value="{{old('name', $user->name) }}" class="form-control">
                    <small class="form-text text-muted">Edit the username</small>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">User Email:</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="email" id="text-input" name="email" value="{{ old('email', $user->email)}}" class="form-control">
                    <small class="form-text text-muted">Edit the email</small>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Change password:</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" id="text-input" name="password"  class="form-control">
                    
                    <small class="form-text text-muted">Edit The password</small>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Type new password:</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" id="text-input" name="password_confirmation" class="form-control">
                    
                    <small class="form-text text-muted"Edit The password</small>
                </div>
            </div>
            @if(auth()->user()->rol == ('admin'))
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">New role:</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="rol" id="select" class="form-control">
                        
                        <option value="admin">admin</option>
                        <option value="user">user</option>
 
                    </select>
                    <small class="form-text text-muted">Edit Role</small>
                </div>
            </div>
            @endif

             <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Enviar
        </button>
    </div>
        </form>
    </div>
