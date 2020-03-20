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
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
          <div class="create-table">
            
            @if (session()->has('alert'))
            <div style="margin-left: 10rem" class="alert alert-success">
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

          <a href="" type="button" class="btn btn-info" id="book" data-toggle="modal" data-target="#exampleModalCenter">Add Book</a></div>
         
            <table class="books-table">
                <thead>
                    <tr>
                    <th>Book ID</th>
                    <th>Title</th>
                    <th>Category name</th>
                    <th>Author</th>
                    <th>Copies</th>
                    <th>price</th>
                    <th>Picture</th>
                  
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                      @foreach ($books as $book)
                      <tr>
                        <td>{{$book->id}}</td>
                        <td>{{$book->title}}</td>
                        {{-- <td>{{$book->category->category_name}}</td> --}}
                      <td>{{$book->category->category_name}}</td>
                      <td>{{ $book->author }}</td>
                        <td>{{$book->copies}}</td>
                        <td>{{$book->price}}</td>
                      <td><img style="width: 95px; height: auto" src="{{asset('/bookimage').'/'.$book->pic_path}}" alt="not found"></td>
                        
                        <td>
                      
                          
                          {{-- <a  type="button" class="btn btn-info" href={{ route("books.edit",$book->id) }} >Edit</a>
                          <form action="{{ route('books.destroy', $book->id)}}" method="post">
                            
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                          </form> --}}
                          <form action="{{ route('books.destroy',$book->id) }}" method="POST">
   
            
            
                            <div class="row" style="width: 20rem">

                              <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}"><span class="fa fa-edit"></span> Edit</a>
           
                            @csrf
                            @method('DELETE')
              
                            <button type="submit" class="btn btn-danger"><span class="fa fa-remove"></span> Delete</button>
                            </div>
                        </form>
                        </td>
                      </tr>  
                      
                      @endforeach
                        
                    
                </tbody>
            </table>
          </div>
      </section>
    </section>
    <!-- Button trigger modal -->


<!-- Modal for inser data -->

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
       
          {!! Form::open(['route' => 'books.store','enctype'=>'multipart/form-data', 'files' => true ]) !!}
          {{-- {!! Form::open( [ 'route' =>'books.store' , 'files' => true ] ) !!} --}}

          <div class="input-group">
                <div class="input-group-prepend">
          <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="exampleDropdownFormEmail2">Title</label>
              <div class="col-sm-10">
                <input class="form-control" style="margin-top: 0" type="text" id="exampleDropdownFormEmail2" name ='title' placeholder="title">
              </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="exampleDropdownFormPassword2">Category</label>
            <div class="col-sm-10">
              {!! Form::select('category_id', \App\Category::pluck('category_name', 'id') , null,['placeholder' => 'Select categories...', 'class' => 'form-control', 'style' => 'margin-top: 0', 'required' => 'required'])!!}
              {{-- <input type="text" class="form-control" style="margin-top: 0" id="exampleDropdownFormPassword2"  name='category_id' placeholder="Category_id"> --}}
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="exampleDropdownFormPassword2">Author</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" style="margin-top: 0" id="exampleDropdownFormPassword2" name='author' placeholder="AuthorName">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="exampleDropdownFormPassword2">Price</label>
            <div class="col-sm-10"> 
              <input type="text" class="form-control" style="margin-top: 0" id="exampleDropdownFormPassword2" name='price' placeholder="price">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="exampleDropdownFormPassword2">Copies</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" style="margin-top: 0" id="exampleDropdownFormPassword2" name='copies'placeholder="Number of copies">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="exampleDropdownFormPassword2">Description</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="margin-top: 0" name='description'></textarea>
            </div>
          </div>

         
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="exampleDropdownFormPassword2">Picture</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" style="margin-top: 0" id="exampleDropdownFormPassword2"name='image' placeholder="book">
            </div>
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
 


     
    
    <!-- Button trigger modal -->

     
    <!--main content end-->
    <!--footer start-->
    <footer class="books-footer">
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

 

<!-- Modal -->

</body>


<script>

$(document).on('show.bs.modal','#exampleModalCenter2',function(event{
// var button=$(event.relatedTarget  )
// var title=button.data('title')
// var copies=button.data('copies')
// var book_id=button.data('book_id')
// var Category_id=button.data('category_id')
// var author=button.data('author')
// var price=button.data('price')
// var modal=$(this)
//  modal.find('.exampleModalCenter2').text('rrrrr')
//  modal.find('.modal-body #title').val($title)
alert('hi');


}))



</script>
</html>
