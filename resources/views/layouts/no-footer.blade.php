<!doctype html>
<html lang="ja">
<head>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="js/slick.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/slick.min.js"></script>
	@if(app('env') == 'production')
		<script src="{{ secure_asset('js/app.js') }}" defer></script>
	@else
		<script src="{{ asset('js/app.js') }}" defer></script>
	@endif
	<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="//fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
	<link rel="stylesheet" type="text/css" href="css/slick.css"/>
	<link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
	
	@if(app('env') == 'production')
		<link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ secure_asset('css/remodal.css') }}" media="screen" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ secure_asset('css/remodal-default-theme.css') }}" media="screen" rel='stylesheet' type='text/css'>
	@else
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('css/remodal.css') }}" media="screen" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ asset('css/remodal-default-theme.css') }}" media="screen" rel='stylesheet' type='text/css'>
	@endif

	
	<!-- fontawesome -->
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
</head>
<body style="word-break: break-all;">

	<div id="app">
		<div class="boxed" style="height: auto !important">
			
			<header id="header" class="position-relative container col-lg-6 col-md-8">
				<div class="container d-flex">
					@section('edit-button')
					<div class="text-center header-logo">
						<a class="link-header" href="{{ url('/') }}">
							<div class="logo">
							<img class="w-100" src="{{ Illuminate\Support\Facades\Storage::disk('s3')->url('circle_app.png') }}" style="height: 95%;"/>
							</div>
						</a>
					</div>
					@show				
				</div>
			</header>
			
		

			<main class="bg-brown h-100"> 
				@yield('content')
			</main>
			<!-- 画面下部固定のメニュー -->
			<nav class="bg-brown fixed-bottom pt-2_5 pb-3">
				<div class="container col-md-8 col-lg-6">
					<ul class="nav align-items-center justify-content-between">
						@guest
							<li class="pr-3 pl-3 postion-relative active">
								<a href="/" class="nav-link nav-link_sp -home">
									<i class="fas fa-home" ></i>
									<span class="nav-item_text" style="font-weight:600;">ホーム</span>
								</a>
							</li>
							<li class="pr-1 pl-1 postion-relative">
								<a href="{{ route('circle.index', [ $my_prefecture->id ]) }}" class="nav-link nav-link_sp -aleart">
									<i class="fas fa-search" ></i>
									<span class="nav-item_text" style="font-weight:600;">検索</span>
								</a>
							</li>
							<li class="postion-relative">
								<a href="{{ route('login') }}" class="nav-link nav-link_sp -message">
									<i class="fas fa-sign-in-alt" style="font-size:35px;
									color:rgba(0,0,0,0.24);"></i>
									<span class="nav-item_text" style="font-weight:600;">ログイン</span>
								</a>
							</li>
							<li class="postion-relative">
								<a href="{{ route('register') }}" class="nav-link nav-link_sp -mypage">
									<i class="far fa-user" ></i>
									<span class="nav-item_text" style="font-weight:600;">新規登録</span>
								</a>
							</li>
						@else
							<li class="pr-3 pl-3 postion-relative active">
								<a href="/" class="nav-link nav-link_sp -home">
									<i class="fas fa-home" ></i>
									<span class="nav-item_text" style="font-weight:600;">ホーム</span>
								</a>
							</li>
							<li class="pr-1 pl-1 postion-relative">
								<a href="/etcetera?word=お知らせ" class="nav-link nav-link_sp -aleart">
									<i class="fas fa-bell" ></i>
									<span class="nav-item_text" style="font-weight:600;">お知らせ</span>
								</a>
							</li>
							
							<li class="postion-relative">
								<a href="/message" class="nav-link nav-link_sp -message">
									<i class="far fa-comment-alt" ></i>
									<span class="nav-item_text" style="font-weight:600;">メッセージ</span>
								</a>
							</li>
							<li class="postion-relative">
								<a href="{{ route('mypage.show') }}" class="nav-link nav-link_sp -mypage">
									<i class="fas fa-user" ></i>
									<span class="nav-item_text" style="font-weight:600;">マイページ</span>
								</a>
							</li>
						@endguest
					</ul>
				</div>
			</nav>
			<!-- footer -->
			<footer id="footer" class="bg-brown" 
				style="padding-bottom: 100px;">
			</footer>
		</div>
    </div>
</body>
</html>
