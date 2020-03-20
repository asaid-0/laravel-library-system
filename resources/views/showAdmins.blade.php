<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Admin page</title>

  <!-- Favicons -->
  <link href="/Dashio/img/favicon.png" rel="icon">
  <link href="/Dashio/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="/Dashio/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="/Dashio/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="/Dashio/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="/Dashio/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="/Dashio/css/style.css" rel="stylesheet">
  <link href="/Dashio/css/style-responsive.css" rel="stylesheet">
  <script src="/Dashio/lib/chart-master/Chart.js"></script>
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
            <a class="active" href="/showAdmins">
              <i class="fa fa-user-secret"></i>
              <span>All admins</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="/users">
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
        @if (session('status'))
        <div style="margin-left: 10rem" style="display: block; float: left; width: 100%" class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
        <div class="create-table">
          {{-- <h1>All Admins</h1> --}}
          {{-- <a href="" type="button" class="btn btn-primary" id="user" data-toggle="modal" data-target="#addAdminModal">Add Admin</a> --}}
          {{-- modal start --}}
          {{-- <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addNewAdmin"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add New Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form method="POST" action="{{ route('addAdmin') }}">
          @csrf
          <input id="isAdmin" name="isAdmin" type="hidden" value="1">
        <div class="form-group input-group">
          <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-user"></i> </span>
               </div>
               
               <input id="name" placeholder="Full Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
      
               @error('name')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
      
          </div> <!-- form-group// -->
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-user"></i> </span>
               </div>
               
               <input id="username" placeholder="Username" type="text"
                                             class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                             name="username" value="{{ old('username') }}" required>
                               
              @if ($errors->has('username'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('username') }}</strong>
                  </span>
              @endif
      
      
          </div> <!-- form-group// -->
          <div class="form-group input-group">
          <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
               </div>
               
      
               <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
      
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
      
          </div> <!-- form-group// -->
         
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
              </div>
              
              <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
      
          </div> <!-- form-group// -->
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
          </div>
              <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>  
          <div class="modal-footer d-flex justify-content-center">
            <button type=submit class="btn btn-unique">Add</button>
          </div>                                
      </form>
      </div>
      
    </div>
  </div>
</div> --}}


          {{-- modal end --}}
        <div class="admin-table">
          <h1>Admins</h1>
          <a href="" type="button" class="btn btn-info" id="user" data-toggle="modal" data-target="#admin">Add Admin</a>
          <table class="content-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($admins as $admin)
                <tr>
                <td>{{ $admin->id }}</td>
                  <td>{{ $admin->name }}</td>
                  <td>{{ $admin->userName }}</td>
                  <td>{{ $admin->email }}</td>
                  <td> 
                    <a href="{{ route('users.edit',$admin->id) }}"><button type="button" class="btn btn-primary"id="edit">Edit</button></a>
                    @can('isLastAdmin')
                    {!! Form::open(['route' => ['users.destroy', $admin->id], 'method' => 'delete', 'style' => 'display: inline-block']) !!}
                    <button type="submit" class="btn btn-danger"id="delete">Delete</button>
                    {!! Form::close() !!}
                    @endcan
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <div class="col-12 d-fles justify-content-center pt-4" style="margin-left:50% ;">
          {{$admins->links()}}
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->


    <div class="modal  fade right" id="admin" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLongTitle"><h3>Add Admin</h3></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           
            <form method="POST" action="{{ route('addAdmin') }}">
              @csrf
              <input id="isAdmin" name="isAdmin" type="hidden" value="1">
              <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="form-group">
                        <label for="name" class="col-md-6 col-form-label text-md-right">{{ __('Name') }}</label>
                        <input type="text" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="username" class="col-md-6 col-form-label text-md-right">{{ __('Admin name') }}</label>
                      <input type="text" name="username" value="{{ old('username') }}"> 
                        @if ($errors->has('username'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                  </div>
                  <div class="form-group">
                      <label for="email" class="col-md-6 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                      <input type="text" name="email" value="{{ old('email') }}">                        
                  </div>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  <div class="form-group">
                      <label for="password" class="col-md-6 col-form-label text-md-right">{{ __('Password') }}</label>
                      <input type="password" name="password">   
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror                     
                  </div>
                  <div class="form-group">
                      <label for="password-confirm" class="col-md-6 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                      <input type="password" name="password_confirmation"> 
                  </div>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Add</button>
           
          </div>
            </form>
        </div>
      </div>
    </div>  
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="/Dashio/lib/jquery/jquery.min.js"></script>

  <script src="/Dashio/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="/Dashio/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="/Dashio/lib/jquery.scrollTo.min.js"></script>
  <script src="/Dashio/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="/Dashio/lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="/Dashio/lib/common-scripts.js"></script>
  <script type="text/javascript" src="/Dashio/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="/Dashio/lib/gritter-conf.js"></script>

  <script type="text/javascript">
    @if($errors->count() > 0){
      $('#admin').modal('show');
    }
    @endif
  </script>
</body>
</html>
