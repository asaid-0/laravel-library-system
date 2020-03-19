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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
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
      <a href="" class="logo"><b>ADM<span>IN</span></b></a>
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
            <a class="active" href="/admins">
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
    <section style="margin-left: 25%" id="main-content">
      <section class="wrapper">
          <div class="col-lg-9 main-chart">
            <div class="row mt">
              <!-- SERVER STATUS PANELS -->
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5>Books</h5>
                  </div>
                  <div class="chart mt">
                </div>
              <h1 class="counter-count">{{ \App\Book::count() }}</h1>
                  </div>
                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4-->
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>Members</h5>
                  </div>
                  <div class="chart mt">
                </div>
                    <h1 class="counter-count"> {{ \App\User::count() }} </h1>
                </div>
                <!--  /darkblue panel -->
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 col-sm-4 mb">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5>Admins</h5>
                  </div>
                  <div class="chart mt">
                  </div>
                  <h1 class="counter-count">{{ \App\User::where('isAdmin', 1)->count() }}</h1>
                </div>
              </div>
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>
     <!--CUSTOM CHART START -->

     <div style="margin: 0 10% 0 20%">
      {!! $chart->container() !!}
      {!! $chart->script() !!}
    </div>
  
    <!--custom chart end-->
    <!--main content end-->
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
  <script type="text/javascript">
    $('.counter-count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 5000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
  </script>
</body>
</html>
