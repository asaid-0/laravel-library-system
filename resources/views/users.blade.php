<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>User page</title>

  <!-- Favicons -->
  <link href="Dashio/img/favicon.png" rel="icon">
  <link href="Dashio/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="Dashio/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="Dashio/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="Dashio/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="Dashio/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="Dashio/css/style.css" rel="stylesheet">
  <link href="Dashio/css/style-responsive.css" rel="stylesheet">
  <script src="Dashio/lib/chart-master/Chart.js"></script>
  <!---- bootstap and jquery---->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="/admins" class="logo"><b>ADM<span>IN</span></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form></li>
        </ul>
      </div>
      
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href=""><i class="fa fa-user"></i></a></p>
          <h5 class="centered">{{ Auth::user()->name }}</h5>
          <li class="mt">
            <a href="/admins">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="/showAdmins">
              <i class="fa fa-user-secret"></i>
              <span>All admins</span>
              </a>
          </li>
          <li class="sub-menu">
            <a class="active" href="/users">
              <i class="fa fa-user"></i>
              <span>All Users</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="/books">
              <i class="fa fa-book"></i>
              <span>All Books</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="/categories">
              <i class="fa fa-book"></i>
              <span>Category</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class ="userAlert" style="z-inbox:10000; display:none; background:green; font-weight:450;width:35px ; position:fixed; top:10%; left:5%; color:white; padding:5px 20px"></div>
          <div class="create-table">
            @csrf
            @if (session('status'))
            <div style="margin-left: 10rem" class="alert alert-success">
              {{ session('status') }}
            </div>
            @endif
            @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <h1>All Users</h1>
            <a href="" type="button" class="btn btn-info" id="user" data-toggle="modal" data-target="#users">Add User</a></div>
            <table class="content-table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>user name</th>
                    <th>Email</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($users as $member)
                  <tr>
                    <td>{{$member->id}}</td>
                    <td>{{$member->userName}}</td>
                    <td>{{$member->email}}</td>
                    <td> 
                      <a href=""><button type="button" class="btn btn-primary btn-sm active_deactive_users" id="{{$member->id }}"> {{ $member->isActive == 1 ? 'Active': 'Deactive' }}</button></a>
                      <a href="{{ route('users.edit',$member->id) }}"><button type="button" class="btn btn-primary"id="edit">Edit</button></a>
                      {{Form::open(['method'  => 'DELETE', 'route' => ['users.destroy', $member->id], 'style' => 'display: inline-block'])}}
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                      {{Form::close()}}
                    </td>
                  </tr>
                  @endforeach 
                </tbody>
            </table>
            <div class="col-12 d-fles justify-content-center pt-4" style="margin-left:50% ;">
              {{$users->links()}}
            </div>
          </div>
      </section>
    </section>
    <!--main content end-->


    <div class="modal  fade right" id="users" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLongTitle"><h3>Add User</h3></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           
              {!! Form::open(['route' => 'users.store']) !!}
              <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="form-group">
                        <label for="exampleDropdownFormPassword2" class="col-md-6 col-form-label text-md-right">{{ __('Name') }}</label>
                        <input type="text" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleDropdownFormPassword2" class="col-md-6 col-form-label text-md-right">{{ __('Username') }}</label>
                      <input type="text" name="userName" value="{{ old('userName') }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleDropdownFormPassword2" class="col-md-6 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}">                    
                </div>
                <div class="form-group">
                  <label for="exampleDropdownFormPassword2" class="col-md-6 col-form-label text-md-right">{{ __('Password') }}</label>
                  <input type="password" name="password">                        
              </div>
              <div class="form-group">
                <label for="exampleDropdownFormPassword2" class="col-md-6 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                <input type="password" name="password_confirmation" id="exampleDropdownFormPassword2"> 
            </div>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Add</button>
           
          </div>
           {!! Form::close() !!}
        
        </div>
      </div>
    </div>
    <!--footer start-->
    <footer class="users-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="/users" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="Dashio/lib/jquery/jquery.min.js"></script>
  <script src="Dashio/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="Dashio/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="Dashio/lib/jquery.scrollTo.min.js"></script>
  <script src="Dashio/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="Dashio/lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="Dashio/lib/common-scripts.js"></script>
  <script type="text/javascript" src="Dashio/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="Dashio/lib/gritter-conf.js"></script>
  <!-- javascript to active and deactive user-->
  <script src="/js/changeStatus.js"></script>
</body>
</html>

