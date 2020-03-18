    @extends('layout')
    @section('mainContent')
    <h1>Create Admins</h1>
    @csrf
    <div class="form-group">
        <form action="/manager/public/managers/{{mgr->id}}" method="post">
        <label for="name" class="col-md-4 control-label">Name
        </label>
        <div class="col-md-4">
         <input id="name" name="name" type="text" placeholder="Enter Name" class="form-control input-md" value="{{$mgr->name}}"><br>
        </div>
       </div>

       <div class="form-group">
        <label for="password" class="col-md-4 control-label">password
        </label>
        <div class="col-md-4">
         <input id="password" name="password" type="password" placeholder="Enter password" class="form-control input-md" value="{{$mgr->password}}"> <br>
        </div>
       </div>

       <div class="form-group">
        <label for="email" class="col-md-4 control-label">Email
        </label>
        <div class="col-md-4">
         <input id="email" name="email" type="email" placeholder="Enter email" class="form-control input-md" value="{{$mgr->email}}"><br>
        </div>
       </div>

       <div class="form-group">
        <label for="isAdmin" class="col-md-4 control-label">isAdmin
        </label>
        <div class="col-md-4">
         <input id="isAdmin" name="isAdmin" type="number" min="0" max="1" placeholder="Is Admin" class="form-control input-md" value="{{$mgr->name}}"><br>
        </div>
       </div>
       
       <div class="form-group">
        <div class="col-md-4">
        <input type="submit" value="save">
        </div>
       </div>
          </form>
    </div>
    @endsection('mainContent')
   