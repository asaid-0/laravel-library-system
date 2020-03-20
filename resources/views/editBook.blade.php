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
  <link href="/Dashio/img/favicon.png" rel="icon">
  <link href="/Dashio/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="/Dashio/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="/Dashio/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="Dashio/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="Dashio/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="/Dashio/css/style.css" rel="stylesheet">
  <link href="/Dashio/css/style-responsive.css" rel="stylesheet">
  <script src="/Dashio/lib/chart-master/Chart.js"></script>

</head>
<body>
  <section id="container">
    <!--  TOP BAR CONTENT & NOTIFICATIONS
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
            <a href="/users">
              <i class="fa fa-user"></i>
              <span>All Users</span>
              </a>
          </li>
          <li class="sub-menu">
            <a class="active" href="/books">
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
    <section style="margin-left: 25%" id="main-content">
      <section class="wrapper">
    <div id="editcategoryModal">
      
      <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update a book</h1>
            <section class="wrapper">
              <div class="create-table">
                
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
          
            <form method="post" action="{{ route('books.update', $book->id) }}">
                @method('PATCH') 
                @csrf
                
                <div class="form-group">
    
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" value={{ $book->title}} />
                </div>
                <div class="form-group">
    
                  <label for="category">Category:</label>
              {!! Form::select('category_id', \App\Category::pluck('category_name', 'id') , $book->category_id  ,['placeholder' => 'Select categories...', 'class' => 'form-control', 'style' => 'margin-top: 0', 'required' => 'required'])!!}

                  {{-- <input type="text" class="form-control" name="category_id" value={{ $book->category_id }} /> --}}
              </div>
                <div class="form-group">
    
                    <label for="Author">Author</label>
                    <input type="text" class="form-control" name="author" value={{ $book->author}} />
                </div>
                <div class="form-group">
    
                    <label for="first_name">copies:</label>
                    <input type="text" class="form-control" name="copies" value={{ $book->copies }} />
                </div>

                <div class="form-group">
                    <label>Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="margin-top: 0" name='description'>{{ $book->description }}</textarea>
                </div>

                <div class="form-group">
    
                    <label for="price">price:</label>
                    <input type="text" class="form-control" name="price" value={{ $book->price }} />
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
  </div>
</section>
</section>
  </body>

   <!--footer start-->
   <footer class="category-footer">
    <div class="text-center">
      
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
<script class="include" type="text/javascript" src="Dashio/lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="/Dashio/lib/jquery.scrollTo.min.js"></script>
<script src="/Dashio/lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="/Dashio/lib/jquery.sparkline.js"></script>
<!--common script for all pages-->
<script src="/Dashio/lib/common-scripts.js"></script>
<script type="text/javascript" src="Dashio/lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="Dashio/lib/gritter-conf.js"></script>
</html>
