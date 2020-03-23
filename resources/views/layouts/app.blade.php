<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
</head>
<body style="word-break: break-all;">
	<div id="app" style="height: auto !important">
		<div id="boxed" style="height: auto !important">
			
			<header id="header">
				<div class="container">
					<div class="header-logo">
						<a class="link-header" href="{{ url('/') }}">
							つなげーと
						</a>
					</div>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<!-- Left Side Of Navbar -->
						<ul class="navbar-nav mr-auto">

						</ul>
												

						<!-- Right Side Of Navbar -->
						<ul class="navbar-nav ml-auto">
							<!-- Authentication Links -->
							
						</ul>
					</div>
				</div>
			</header>
			
		

			<main class="bg-gray" style="height: auto !important"> 
				@yield('content')
			</main>
			<!-- 画面下部固定のメニュー -->
			<nav class="bg-fixed-bottom">
					<div class="container-fixed-bottom">
						<ul class="items-center-fixed-bottom" style="list-style: none; padding-left: 0;">
							@guest
								<li class="item-fixed-bottom">
									<a href="/" class="link-item-fixed-bottom">
										<i class="fas fa-home fa-large"></i>
										<span class="text-item-fixed-bttom">ホーム</span>
									</a>
								</li>
								<li class="item-fixed-bottom">
									<a href="/" class="link-item-fixed-bottom">
										<i class="fas fa-search"></i>
										<span class="text-item-fixed-bttom">検索</span>
									</a>
								</li>
								<li class="item-fixed-bottom">
									<a href="{{ route('login') }}" class="link-item-fixed-bottom">
										<i class="fas fa-sign-in-alt"></i>
										<span class="text-item-fixed-bttom">ログイン</span>
									</a>
								</li>
								
								<li class="item-fixed-bottom">
									<a href="{{ route('register') }}" class="link-item-fixed-bottom">
										<i class="far fa-user"></i>
										<span class="text-item-fixed-bttom">新規登録</span>
									</a>
								</li>
							@else
								<li class="item-fixed-bottom">
									<a href="/" class="link-item-fixed-bottom">
										<i class="fas fa-home"></i>
										<span class="text-item-fixed-bttom">ホーム</span>
									</a>
								</li>
								<li class="item-fixed-bottom">
									<a href="/" class="link-item-fixed-bottom">
										<i class="far fa-bell"></i>
										<span class="text-item-fixed-bttom">お知らせ</span>
									</a>
								</li>
								<li class="item-fixed-bottom">
									<a href="/" class="link-item-fixed-bottom">
										<i class="fas fa-ticket-alt"></i>
										<span class="text-item-fixed-bttom">チケット</span>
									</a>
								</li>
								<li class="item-fixed-bottom">
									<a href="/" class="link-item-fixed-bottom">
										<i class="far fa-comment-alt"></i>
										<span class="text-item-fixed-bttom">メッセージ</span>
									</a>
								</li>
								<li class="item-fixed-bottom">
									<a href="/" class="link-item-fixed-bottom">
										<i class="far fa-user"></i>
										<span class="text-item-fixed-bttom">マイページ</span>
									</a>
								</li>
							@endguest
						</ul>
					</div>

				</nav>
			
			
			<footer id="footer" class="footer">
				<div class="container-footer">
					<h2 class="heading-footer">つなげーとについて</h2>
					<ul class="items-footer" style="list-style: none; padding-left: 0;">
						@guest
							<li class="item-footer">
								<a href="{{ route('register') }}" class="link-item-footer">新規登録</a>
							</li>
							<li class="item-footer">
								<a href="{{ route('login') }}" class="link-item-footer">ログイン</a>
							</li>
						@endguest
						<li class="item-footer">
							<a href="" class="link-item-footer">利用規約</a>
						</li>
						<li class="item-footer">
							<a href="" class="link-item-footer">コンテンツクオリティガイドライン</a>
						</li>
						<li class="item-footer">
							<a href="" class="link-item-footer">プライバシーポリシー</a>
						</li>
						<li class="item-footer">
							<a href="" class="link-item-footer">よくある質問</a>
						</li>
						<li class="item-footer">
							<a href="" class="link-item-footer">お問い合わせ</a>
						</li>
						<li class="item-footer">
							<a href="" class="link-item-footer">サイトマップ</a>
						</li>
					</ul>
				</div>
			</footer>
		</div>
    </div>
</body>
</html>
