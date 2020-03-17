<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Book page</title>

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
          <li><a class="logout" href="">Logout</a></li>
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
            <a class="active" href="/admins">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a class="active" href="/users">
              <i class="fas fa-users"></i>
              <span>All categories</span>
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
      <section class="wrapper">
          <div class="create-table">
            <a href=""><button type="button" class="btn btn-primary" id="category">Add category</button></a>
            @if (session()->has('alert'))
                <div class="alert alert-success">
                {{session()->get('alert')}}
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
            <div><a href="" type="button" class="btn btn-info" style="margin-left:70%" id="category" data-toggle="modal" data-target="#exampleModalCenter">Add new category</a></div>
            <table class="category-table">
                <thead>
                    <tr>
                    <th>Category ID</th>
                    <th>Category name</th>
                    <th>No. of books</th>
                    <th>Picture</th>
                    
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <td>{{$category->id}}</td>
                    
                    <td>{{$category->category_name}}</td>
                  
                    <td >
              
                      <form action="{{ route('categories.destroy',$category->id) }}" method="POST">

        
        
                        <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
       
                        @csrf
                        @method('DELETE')
          
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                  </tr>  
                  
                  @endforeach
                </tbody>
            </table>
          </div>
      </section>
    </section>
    <!--main content end-->


    <div class="modal  fade right" id="exampleModalCenter" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle"><h3>Add Book</h3></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
          {!! Form::open(['route' => 'categories.store']) !!}
          <div class="input-group">
                <div class="input-group-prepend">
          <div class="form-group">
            <label for="exampleDropdownFormEmail2">categoryName</label>
            <input type="text" class="form-control" id="exampleDropdownFormEmail2" name ='category_name' placeholder="categoryname">
          </div>
          <div class="form-group">
            <label for="exampleDropdownFormPassword2">category_id</label>
            <input type="text" class="form-control" id="exampleDropdownFormPassword2"  name='id' placeholder="Category_id">
          </div>
         
         
         
          
             {{-- <label for="exampleFormControlFile1">Example file input</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1"> 
             --}}
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save Book</button>
       
      </div>
       {!! Form::close() !!}
    
    </div>
  </div>
</div>  
 
    <!--footer start-->
    <footer class="category-footer">
      <div class="text-center">
<<<<<<< HEAD
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
=======
        
>>>>>>> 6b52520a29c68f83756602b0bc9140c83c473c5d
        <a href="index.html#" class="go-top">
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
</body>
</html>
