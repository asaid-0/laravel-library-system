<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laravel Library</title>
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/icomoon.css">
	<link rel="stylesheet" href="/css/jquery-ui.css">
	<link rel="stylesheet" href="/css/owl.carousel.css">
	<link rel="stylesheet" href="/css/transitions.css">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/color.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link rel="stylesheet" href="/css/slider.css">
    <link rel="stylesheet" href="/css/comments.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Wrapper Start
	*************************************-->
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<header id="tg-header" class="tg-header tg-haslayout">
			<div class="tg-topbar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="tg-addnav">
                                <li>
									<a>
										<i style="font-size: 4rem; color: #3e3e3e" class="icon-book"></i>
									</a>
								</li>
							
								<li>
									<a class="menu-item" href="/userbooks">
										<i class="icon-books"></i>
										<em>Books</em>
									</a>
                                </li>
                                <li>
                                    <a class="menu-item tg-btnthemedropdown selected-menu" href="/favorite" id="tg-wishlisst" aria-haspopup="true" aria-expanded="false">
									<span class="tg-themebadge">{{ Auth::user()->favoriteBooks()->count() }}</span>
									<i class="icon-heart"></i>
									<em>Favorites</em>
								</a>


							</li>
							</ul>
							<div class="tg-userlogin">
								<a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									<figure><img style="height: 30px" src="/images/users/img-01.jpg" alt="user"></figure>
									<span>Hi, {{ Auth::user()->name }} </span>								
								</a>

								<div style="font-size: 14px" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="/profile">
                                        My Profile
                                    </a>
									<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
		</header>
        
        @if (session('status'))
            <div style="display: block; float: left; width: 100%" class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <div style="padding: 2rem" class="tg-middlecontainer">
            <div class="container">
                <div class="row book-details">
                    <div style="display: inline-block; float: left">
                        <img src="/bookimage/{{$book->pic_path}}" onerror="this.onerror=null;this.src='/images/books/img-04.jpg';" alt="title" />

                    </div>
                    <div style="display: inline-block; width: 50%; padding: 0 2rem">
                            <div>
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);"><i class="fa fa-folder"></i> {!! $book->getCategory() !!}</a></li>
                                    @if ($book->isFavorite())
                                    {!! Form::open(['route' => ['favorite.destroy','favorite' => $book->id],'method' => 'delete']) !!}
                                        <button type="submit" class="fa fa-heart love-btn love-btn-active"></button>
                                    {!! Form::close() !!}
                                    @else
                                    {!! Form::open(['route' => ['favorite.store','id' => $book->id],'method' => 'post']) !!}
                                        <button type="submit" class="fa fa-heart love-btn"></button>
                                    {!! Form::close() !!}
                                    @endif
                                </ul>
                            </div>
                            
                            <div class="tg-themetagbox"><span class="tg-themetag">{{ $book->getCopies() }} copies</span></div>
                            
                            <div class="tg-booktitle">
                                <h3><a href="javascript:void(0);">{!! $book->title !!}</a></h3>
                            </div>
                            

                            <div>
                                <p class="book-sample"><a href="javascript:void(0);">{!! $book->description !!}</a></p>
                            </div>


                            @for ($i = 0; $i < 5; ++$i)
                                <i style="color: #fcd01e" class="fa fa-star{{ $book->rating()<=$i?'-o':'' }}" aria-hidden="true"></i>
                            @endfor
                            <div>
                            <span class="tg-bookwriter">By: <a href="javascript:void(0);">{!! $book->author !!}</a></span>
                            </div>
                            <span class="tg-bookprice">
                            <ins>{{ $book->price }}</ins>
                                {{-- <del>$27.20</del> --}}
                            </span>
                            
                            
                            <div>
                                {{-- START LEASE BLOCK --}}
                                @if ($book->getCopies() == 0)
                                    <button class="tg-btn-disabled tg-btnstyletwo" href="javascript:void(0);">
                                        <i class="fa fa-shopping-basket"></i>
                                        <em>Unaviable</em>
                                    </button>
                                    {{-- what if need to re-lease ? --}}
                                @elseif (!$book->isLeaseable())
                                <button class="tg-btn-disabled tg-btnstyletwo" href="javascript:void(0);">
                                    <em>leased</em>
                                </button>
                                @else
                                    <button class="tg-btn tg-btnstyletwo"  data-toggle="modal" data-target={{ '#book'.$book->id }}>
                                        <i class="fa fa-shopping-basket"></i>
                                        <em>Lease</em>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id={{ 'book'.$book->id }} role="dialog">
                                        <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Book lease</h4>
                                            </div>
                                            <div class="modal-body">
                                            <p>How many days you would lease the book?</p>
                                        {{-- <form> --}}
                                        {!! Form::open(['route' => ['UserLeasedBook.store','id'=>$book],'method' => 'post']) !!}
                                            <div class="form-group">
                                                {!! Form::number('NumofDays',null,$attributes = ['required','min'=>'0']) !!}
                                                {{-- <input type="number" class="form-control" id="numberOfDays" placeholder="specify number of days" required> --}}
                                            </div>
                                            <button type="submit" class="tg-btn tg-btnstyletwo">
                                                <i class="fa fa-shopping-basket"></i>
                                                <em>Lease</em>
                                                </button>
                                        {!! Form::close() !!}		
                                        {{-- </form> --}}
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                @endif
                                {{-- END LEASE BLOCK --}}

                            </div>

                    </div>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="col-sm-4">
                            <img src="images/books/img-04.jpg" alt="title" />
                        </div>
                        <div class="book-image col-sm-8">
                            sdgsdg
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>


        <div class="tg-middlecontainer">
            <div class="container">



                <div class="post-outer-container">
                    <div class="post-container">
                        
                        <div class="text-right">
                            <div>
                                @foreach ($errors->all() as $error)
                                <li style="text-align: left" class="alert alert-danger">{{$error}}</li>            
                                @endforeach
                            </div>
                            @if ($book->canComment())
                                <a class="btn btn-primary" href="#reviews-anchor" id="open-review-box">Leave Comment</a>
                            @else
                                <a class="btn btn-secondary tg-btn-disabled" href="javascript:void(0);">Leave Comment</a>
                            @endif
                        </div>
                    
                        <div class="row" id="post-review-box" style="display:none;">
                            <div class="col-md-12">
                                <form accept-charset="UTF-8" action="" method="post">
                                    @csrf
                                    <input id="ratings-hidden" name="rating" value="1" type="hidden"> 
                                    <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your comment here..." rows="5"></textarea>
                    
                                    <div class="text-right">
                                        
                                        <div class="stars">
                                            <input type="radio" name="difficulty" id="difficulty-5" hidden>
                                            <label for="difficulty-5">
                                                <i class="fa fa-star"></i>
                                                 <i class="fa fa-star-o"></i>
                                            </label>
                                            <input type="radio" name="difficulty" id="difficulty-4" hidden>
                                            <label for="difficulty-4">
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star-o"></i>
                                          </label>
                                            <input type="radio" name="difficulty" id="difficulty-3" hidden>
                                            <label for="difficulty-3">
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star-o"></i>
                                          </label>
                                            <input type="radio" name="difficulty" id="difficulty-2" hidden>
                                            <label for="difficulty-2">
                                               <i class="fa fa-star"></i>
                                             <i class="fa fa-star-o"></i>
                                          </label>
                                            <input type="radio" name="difficulty" id="difficulty-1" hidden checked>
                                            <label for="difficulty-1">
                                               <i class="fa fa-star"></i>
                                          </label>
                                        </div>



                                        <a class="btn btn-danger btn-md" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                        <i style="padding-right: 1rem" class="fa fa-remove"></i>Cancel</a>
                                        <button class="btn btn-success btn-md" type="submit"><i style="padding-right: 1rem" class="fa fa-comment"></i>Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>



                
                @forelse ($book->BookComments()->get() as $comment)
                    <div class="post-outer-container">
                        @if ($comment->id == Auth::id())
                            {!! Form::open(['route' => ['userbooks.delete','book'=>$book],'method' => 'post']) !!}
                                        <button style="margin: 1rem; float: right; font-size: 16px" type="submit" class="text-danger"><i class="fa fa-remove text-danger"></i></button>
                            {!! Form::close() !!}
                        @endif
                        <div class="post-container">
                            <div class="post-details">
                                <img src="/images/users/img-01.jpg" style="border: 1.5px dashed #f16945; border-radius: 50%" alt="user" class="user-image"/>
                                <div class="user-container">
                                    @for ($i = 0; $i < 5; ++$i)
                                                    <i style="color: #fcd01e" class="fa fa-star{{ $comment->pivot->rank<=$i?'-o':'' }}" aria-hidden="true"></i>
                                    @endfor
                                <h3 class="user-container__user"><a href="javascript:;">{!! $comment->name !!}</a></h3>
                                    <div class="user-container__details">
                                        <span class="timing"><a href="javascript:;">{!! $comment->pivot->created_at !!}</a></span>
                                        {{-- <span class="delimiter"> · </span> --}}
                                        {{-- <span class="location"><a href="javascript:;">Goa</a></span> --}}
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <p style="overflow-wrap: break-word;" class="post-content">{!! $comment->pivot->comment !!}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No Comments Yet!!</p>
                @endforelse

            </div>
        </div>





<footer>
        <h3 style="padding-left: 2rem">Related Books</h3>
        <div class="carousel-wrapper" id="products">
            <ul class="carousel-inner clearfix">
                @forelse ($book->getRelatedBooks() as $related)
                <li class="item">
                    <div class="col-md-12">
                        <div class="col-md-4 image-container">
                        <img src="/bookimage/{{$related->pic_path}}" onerror="this.onerror=null;this.src='/images/books/img-04.jpg';" alt="{!! $related->title !!}" />
                        </div>
                        
                        <div class="col-md-8 book-info">
                            <div>
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">{!! $related->getCategory() !!}</a></li>
                                </ul>
                            </div>
                            
                            <div class="tg-themetagbox"><span class="tg-themetag">{{ $related->getCopies() }} copies</span></div>
                            
                            <div class="tg-booktitle">
                                <h3><a href="/userbooks/{{$related->id}}" data-toggle="tooltip" data-placement="top" title="{!! $related->title !!}">{!! Str::limit($related->title, 24) !!}</a></h3>
                            </div>
                            
                            <div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">{!! $related->author !!}</a></span>
                            </div>                            
                        </div>
                    </div>
                </li>
                @empty

                @endforelse

                
            </ul>
            <a href="#" class="carousel-left">
                <i class="fa fa-chevron-left slider-btn"></i>
            </a>
            <a href="#" class="carousel-right">
                <i class="fa fa-chevron-right slider-btn"></i>
            </a>
          </div>
</footer>


        
          
		
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="/js/vendor/jquery-library.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&language=en"></script>
	{{-- <script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.vide.min.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/parallax.js"></script>
	<script src="js/countTo.js"></script>
	<script src="js/appear.js"></script>
	<script src="js/gmap3.js"></script>
    <script src="js/main.js"></script> --}}
    <script src="/js/slider.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="/js/comment.js"></script>
</body>
</html>