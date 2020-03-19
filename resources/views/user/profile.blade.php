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
                                    <a class="menu-item tg-btnthemedropdown" href="/favorite" id="tg-wishlisst" aria-haspopup="true" aria-expanded="false">
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
											<div>
												@foreach ($errors->all() as $error)
												<li class="alert alert-danger">{{$error}}</li>            
												@endforeach
											</div>
											
											{{ Form::open(array('url' => '/profile', 'method' => 'PUT', 'class'=>'col-md-12', 'autocomplete' => 'off')) }}
											@php
												$user = Auth::user();
												
											@endphp
												<div class="form-group">  
													{!! Form::label('name','Name',['class'=>'col-md-2 col-form-label text-md-right']) !!}
													{!! Form::text('name' , $user->name) !!}
													</div>
												<div class="form-group">  
												{!! Form::label('userName', 'Username' ,['class'=>'col-md-2 col-form-label text-md-right']) !!}
												{!! Form::text('userName' , $user->userName ) !!}
												</div>
												<div class="form-group">
													{!! Form::label('email','E-mail' ,['class'=>'col-md-2 col-form-label text-md-right']) !!}
													{!! Form::text('email' , $user->email) !!}
												</div>
												<div class="form-group">
													{!! Form::label('password','Password' ,['class'=>'col-md-2 col-form-label text-md-right']) !!}
													{{ Form::input('password', 'password','oldpwd',array('class' => 'passwordAwesome', 'autocomplete' => 'off')) }}
													<span class="text-primary">Leave for old password</span>

												</div>
												<div class="form-group">
													{!! Form::label('password_confirmation','Confirm Password' ,['class'=>'col-md-2 col-form-label text-md-right']) !!}
													{{ Form::input('password', 'password_confirmation','oldpwd',array('class' => 'passwordAwesome')) }}
												</div>
												<div class="form-group">
													{!! Form::label('', '', ['class'=>'col-md-2 col-form-label text-md-right']) !!}
													{!! Form::submit('update' ,['class'=>'btn btn-primary']) !!}
												</div>

											{{ Form::close() }}

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