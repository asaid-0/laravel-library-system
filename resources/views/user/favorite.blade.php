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
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
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
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
                                    <a class="menu-item menu-item-active tg-btnthemedropdown selected-menu" href="/favorite" id="tg-wishlisst" aria-haspopup="true" aria-expanded="false">
									<span class="tg-themebadge">{{ $books->count() }}</span>
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

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
		<!--************************************
				Header End
		*************************************-->
		<div style="width: 100%; display: block; float: left; text-align: center; margin: 0; padding: 0">
			{{$books->links()}}
		</div>
		<!--************************************
				Main Start
		*************************************-->
		<main style="margin-top: 2rem" id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					News Grid Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div id="tg-twocolumns" class="tg-twocolumns">
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
								<div id="tg-content" class="tg-content">
									<div class="tg-products">
										<div class="tg-productgrid">
											<div class="tg-refinesearch">
												<span>showing {{$books->count()}} of {{$books->total()}} total</span>
												<form class="tg-formtheme tg-formsortshoitems">
													<fieldset>
														<div class="form-group">
															<label>sort by:</label>
															<span class="tg-select">
																<select onchange="window.location.replace(this.value);">
																<option hidden disabled selected value>Sort</option>
																<option value={{ route(Route::currentRouteName(), ['cat' => Request::route('cat'), 'sort'=>"title"]) }}>Title</option>
																<option value={{ route(Route::currentRouteName(), ['cat' => Request::route('cat'), 'sort'=>"author"]) }}>Author</option>
																<option value={{ route(Route::currentRouteName(), ['cat' => Request::route('cat')])  }}>None</option>
																</select>
															</span>
														</div>
														{{-- <div class="form-group">
															<label>show:</label>
															<span class="tg-select">
																<select>
																	<option>8</option>
																	<option>16</option>
																	<option>20</option>
																</select>
															</span>
														</div> --}}
													</fieldset>
												</form>
											</div>
											@forelse ($books as $book)
											<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
												<div class="tg-postbook">
													<figure class="tg-featureimg" style="position: relative">


														@if ($book->isFavorite())
															<i class="fa fa-heart love-btn-active" style="position: absolute; top: 0; right: 0; z-index: 3; font-size: 3rem"></i>
														@endif

														
														<div class="tg-bookimg">
															<div class="tg-frontcover"><img style="min-height: 248px; background: #e3e3e3" src="/bookimage/{{$book->pic_path}}" onerror="this.onerror=null;this.src='/images/books/img-04.jpg';" alt="image description"></div>
															<div class="tg-backcover"><img style="min-height: 248px; background: #e3e3e3" src="/bookimage/{{$book->pic_path}}" onerror="this.onerror=null;this.src='/images/books/img-04.jpg';" alt="image description"></div>
														</div>
														@if ($book->isFavorite())
															{!! Form::open(['route' => ['favorite.destroy','favorite' => $book->id],'method' => 'delete']) !!}
																<a class="tg-btnaddtowishlist" href="#" onclick="$(this).closest('form').submit();">
																<i class="icon-heart"></i>
																<button style="display: inline; background: none;" type="submit">unlike</button>
																</a>
															{!! Form::close() !!}
															@else
															{!! Form::open(['route' => ['favorite.store','id' => $book->id],'method' => 'post']) !!}
																<a class="tg-btnaddtowishlist" href="#" onclick="$(this).closest('form').submit();" >	
																<i class="icon-heart"></i>
																<button style="display: inline; background: none;" type="submit">like</button>
																</a>
															{!! Form::close() !!}
														@endif
													</figure>
													<div class="tg-postbookcontent">
														<ul class="tg-bookscategories">
														<li><a href="javascript:void(0);"> <i class="fa fa-folder"></i> {!! $book->getCategory() !!}</a></li>
														</ul>
														<div class="tg-themetagbox">
															{{-- <span class="tg-themetag">{!! max($book->copies - $bookLeased->where('book_id',$book->id)->count(), 0) !!} copies</span> --}}
															<span class="tg-themetag">{!! $book->getCopies() !!} copies</span>
															
														</div>
														

														
														<div class="tg-booktitle">
															<h3><a href="/userbooks/{{$book->id}}" data-toggle="tooltip" data-placement="top" title="{!! $book->title !!}">{!! Str::limit($book->title, 24) !!}</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">{!! $book->author !!}</a></span>
														@for ($i = 0; $i < 5; ++$i)
															<i style="color: #fcd01e" class="fa fa-star{{ $book->rating()<=$i?'-o':'' }}" aria-hidden="true"></i>
														@endfor
														<span class="tg-bookprice">
															<ins>${!! $book->price !!}</ins>
														</span>

														@if ($book->getCopies() == 0)
															<button class="tg-btn-disabled tg-btnstyletwo" href="javascript:void(0);">
																<i class="fa fa-shopping-basket"></i>
																<em>Unaviable</em>
															</button>
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

													</div>
												</div>
											</div>
											@empty
												<p>No Books</p>
											@endforelse


										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					News Grid End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
		
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="/js/vendor/jquery-library.js"></script>
	<script src="/js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&language=en"></script>
	<script src="/js/owl.carousel.min.js"></script>
	<script src="/js/jquery.vide.min.js"></script>
	<script src="/js/countdown.js"></script>
	<script src="/js/jquery-ui.js"></script>
	<script src="/js/parallax.js"></script>
	<script src="/js/countTo.js"></script>
	<script src="/js/appear.js"></script>
	<script src="/js/gmap3.js"></script>
	<script src="/js/main.js"></script>
</body>
</html>