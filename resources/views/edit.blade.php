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
          <li><a class="logout" href="/login">Logout</a></li>
        </ul>
      </div>
      <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
        <div class="header-top-menu tabl-d-n hd-search-rp">
            <div class="breadcome-heading">
                <form role="search" class="">
                    <div class="find">
                        <ul class="list">
                            <li><input type="text" placeholder="Search..." class="form-control"></li>
                            <li class="search"><a href=""><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                  </form>
            </div>
        </div>
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
          <p class="centered"><a href=""><i class="fas fa-user"></i></a></p>
          <h5 class="centered">Admin name</h5>
          <li class="mt">
            <a href="/admins">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="/showAdmins">
              <i class="fas fa-users"></i>
              <span>All admins</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="/users">
              <i class="fas fa-users"></i>
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
          <li class="sub-menu">
            <a href="">
              <i class=" fa fa-bar-chart-o"></i>
              <span>Charts</span>
              </a>
            <ul class="sub">
              <li><a href="morris.html">Morris</a></li>
              <li><a href="chartjs.html">Chartjs</a></li>
              <li><a href="flot_chart.html">Flot Charts</a></li>
              <li><a href="xchart.html">xChart</a></li>
            </ul>
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
      <section class="wrapper-update">
        <h1>Update Profile</h1>
          <div class="col-lg-9 main-chart">
            <div>
              @foreach ($errors->all() as $error)
              <li class="alert alert-danger">{{$error}}</li>            
              @endforeach
          </div>
            @if(session()->has('message'))
            <div class="alert alert-success">
              {{ session()->get('message') }}
            </div>
            @endif
            {!! Form::open(['route' => ['users.update',$users->id],'method'=>'put']) !!}
            <div class="form-group">  
              {{ Form::label('name')}}
              {{ Form::text('name' , $users->name,array('class' => 'awesome')) }}
              </div>
            <div class="form-group">  
            {{ Form::label('username')}}
            {{ Form::text('userName' , $users->userName ,array('class' => 'userAwesome')) }}
            </div>
            <div class="form-group">
              {{ Form::label('email') }}
              {{ Form::text('email' , $users->email,array('class' => 'emailAwesome')) }}
            </div>
            <div class="form-group">
              {{ Form::label('Password') }}
              {{ Form::input('password', 'password',null,array('class' => 'passwordAwesome')) }}
            </div>
            <div class="form-group">
              {{ Form::submit('update' ,["class"=>"btn btn-primary"])}}
            </div>
              {!! Form::close() !!}
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="update-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
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
</body>
</html>
