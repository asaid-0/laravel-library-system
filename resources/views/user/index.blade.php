<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BootStrap HTML5 CSS3 Theme</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
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
									<a href="javascript:void(0);">
										<i style="font-size: 4rem; color: #3e3e3e" class="icon-book"></i>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);">
										<i class="icon-home"></i>
										<em>Home</em>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);">
										<i class="icon-books"></i>
										<em>My Books</em>
									</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" id="tg-wishlisst" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="tg-themebadge">3</span>
										<i class="icon-heart"></i>
										<span>Favorites</span>
									</a>


                                </li>
							</ul>
							<div class="tg-userlogin">
								<figure><a href="javascript:void(0);"><img style="height: 30px" src="images/users/img-01.jpg" alt="user"></a></figure>
								<span>Hi, User</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
		</header>
		<!--************************************
				Header End
		*************************************-->
		
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
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
																<select>
																	<option>name</option>
																	<option>name</option>
																	<option>name</option>
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
															<div class="tg-frontcover"><img src="images/books/img-04.jpg" alt="image description"></div>
															<div class="tg-backcover"><img src="images/books/img-04.jpg" alt="image description"></div>
														</div>
														<a class="tg-btnaddtowishlist" href="javascript:void(0);">
															<i class="icon-heart"></i>
															@if ($book->isFavorite())
																<span>unlike</span>
															@else
																<span>Like</span>
															@endif
														</a>
													</figure>
													<div class="tg-postbookcontent">
														<ul class="tg-bookscategories">
														<li><a href="javascript:void(0);">{!! $book->getCategory() !!}</a></li>
														</ul>
														<div class="tg-themetagbox">
															<span class="tg-themetag">{!! $book->copies !!} copies</span>
														</div>
														

														
														<div class="tg-booktitle">
															<h3><a href="/book" data-toggle="tooltip" data-placement="top" title="{!! $book->title !!}">{!! Str::limit($book->title, 24) !!}</a></h3>
														</div>
														<span class="tg-bookwriter">By: <a href="javascript:void(0);">{!! $book->auther !!}</a></span>
														<span class="tg-stars"><span></span></span>
														<span class="tg-bookprice">
															<ins>${!! $book->price !!}</ins>
														</span>
														<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
															<i class="fa fa-shopping-basket"></i>
															<em>Lease</em>
														</a>
													</div>
												</div>
											</div>
											@empty
												<p>No Books</p>
											@endforelse
											<div>
												{{$books->links()}}
											</div>


										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
								<aside id="tg-sidebar" class="tg-sidebar">
									<div class="tg-widget tg-widgetsearch">
										<form class="tg-formtheme tg-formsearch">
											<div class="form-group">
												<button type="submit"><i class="icon-magnifier"></i></button>
												<input type="search" name="search" class="form-group" placeholder="Search by title, author, key...">
											</div>
										</form>
									</div>
									<div class="tg-widget tg-catagories">
										<div class="tg-widgettitle">
											<h3>Categories</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												@forelse ($categories as $cat)
											<li><a href="javascript:void(0);"><span>{{$cat->category_name}}</span><em>{{$cat->books()->count()}}</em></a></li>
												@empty
													<p>No categories</p>
												@endforelse
											</ul>
										</div>
									</div>
								</aside>
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
	<script src="js/vendor/jquery-library.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&language=en"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.vide.min.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/parallax.js"></script>
	<script src="js/countTo.js"></script>
	<script src="js/appear.js"></script>
	<script src="js/gmap3.js"></script>
	<script src="js/main.js"></script>
</body>
</html>