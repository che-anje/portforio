<!DOCTYPE html>
<html lang="ja">
	<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- CSRF Token -->
			<meta name="csrf-token" content="{{ csrf_token() }}">

			<title>{{ config('app.name', 'Laravel') }}</title>
			<!-- Scripts -->
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
			<script src="http://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			@if(app('env') == 'production')
				<script src="{{ secure_asset('js/slick.js') }}" type="text/javascript"></script>
				<script type="text/javascript" src="{{ secure_asset('js/slick.min.js') }}"></script>
				<script src="{{ secure_asset('js/app.js') }}" defer></script>
			@else
				<script src="{{ asset('js/slick.js') }}" type="text/javascript"></script>
				<script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
				<script src="{{ asset('js/app.js') }}" defer></script>
			@endif
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<!-- Fonts -->
			<link rel="dns-prefetch" href="//fonts.gstatic.com">
			<link href="http://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
			<!-- Styles -->
			
			
			@if(app('env') == 'production')
			<link rel="stylesheet" type="text/css" href="{{ secure_asset('css/slick.css') }}"/>
			<link rel="stylesheet" type="text/css" href="{{ secure_asset('css/slick-theme.css') }}"/>
			<link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
			<link rel="stylesheet" href="{{ secure_asset('css/remodal.css') }}" media="screen" rel='stylesheet' type='text/css'>
			<link rel="stylesheet" href="{{ secure_asset('css/remodal-default-theme.css') }}" media="screen" rel='stylesheet' type='text/css'>
			@else
			<link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}"/>
			<link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}"/>
			<link href="{{ asset('css/app.css') }}" rel="stylesheet">
			<link rel="stylesheet" href="{{ asset('css/remodal.css') }}" media="screen" rel='stylesheet' type='text/css'>
			<link rel="stylesheet" href="{{ asset('css/remodal-default-theme.css') }}" media="screen" rel='stylesheet' type='text/css'>
			@endif
			<!-- fontawesome -->
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">

			<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:400,700,900|Roboto:400,700,900&display=swap&subset=japanese" rel="stylesheet">
	</head>
	<body role="document" style="word-break: break-all;" class="royal_preloader scrollreveal" style="height: 100%;">
		<div id="bg-boxed" style="height: 100%;">
			<div class="boxed bg-gray" style="padding-top: 60px;height: 100%;">
				<div class="fixed-top bg-white">
					<header id="header" class="container col-lg-6 col-md-6">
					<a href="/message" class="position-absolute position--backbtn text-black-20 text-fz-18px">
							<i class="fas fa-chevron-left"></i>
					</a>
					@if($board->type == 'circle')
						<div class="container">
							<div class="text-center p-3">
								<p id="circle_name" class="text-fw-bold mb-0 mb-1 line-1 position-relative pr-4">{{ $board->circle->name }}({{ $board->users->count() }})<span class="position-absolute position--messagenum"><a href="/message/circle_menu/34439"><img src="/aseets2019/img/icon_reader.svg" alt=""></a></span></p>
							</div>
						</div>
						<a href="{{ route('circle.menu', [$board->circle->id]) }}" class="position-absolute position--headerright text-black-20 text-fz-18px">
							<i class="fas fa-ellipsis-v"></i>
						</a>
					@elseif($board->type == 'user')
						<div class="container">
							<div class="text-center p-3">
									<p class="text-fw-bold mb-0 mb-1 line-1 position-relative pr-4">{{ $board->otherUser->profile->familyName }}{{ $board->otherUser->profile->firstName }},{{ Auth::user()->profile->familyName }}{{ Auth::user()->profile->firstName }}<span class="position-absolute position--messagenum"><a href="/message/circle_menu/34439"><img src="/aseets2019/img/icon_reader.svg" alt=""></a></span></p>
							</div>
						</div>
							<p class="position-absolute position--headerright text-fw-bold mb-1 pb-1 line-1 position-relative pr-4">({{ $board->count }})</p>
					@endif
					</header>
				</div>
				@if(session()->has('message'))
				<div class="modal-view" id="sampleModal" style="position: relative; z-index: 10001;">
					<div class="modal-view-fade-in">
						<div class="modal-view-overAll">
							<div class="modal-view-overlay">
							</div>
							<div class="modal-view-dialog">
								<div class="modal-view-content">
									<div class="modal-view-header" style="position: relative; z-index: 10001;">
									</div>
									<div class="modal-view-body">
										<p class="mt-3">{{ session('message') }}</p>
									</div>
									<div class="modal-view-footer">
										<a class="modal-view-button-center-12">OK</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endif
				<form action="{{ route('message.store') }}" class="create_circle" id="store_message" enctype="multipart/form-data"
				accept-charset="UTF-8" method="post">
				{{ csrf_field() }}
				<div style="height: auto;min-height: 100%;">
					<div id="test" class="bg-gray h-main100vh">
						<div class="pb-5" style="pdding-bottom:0px;">
							<div class="block-messageList container col-md-8 col-lg-6">
								<ul id="message_list" class="list-unstyled mb-2 pt-3">
									@foreach($messages as $msg)
										@if($msg->type==='entry')
											<!-- 参加メッセージ -->
											<li>
												<div class="card bg-gray text-center border-0 bg-graydark pt-2_5 pb-3_5 mb-3 container col-10">
													<p class="text-fz-xs text-black-20 mb-2_5">{{ $msg->date }}</p>
													<p class="text-black-50 mb-0 text-fz-14px">{!! $msg->msg !!}</p>
												</div>
											</li>
										@elseif($msg->user_id!==Auth::id())
											<!-- 相手のメッセージ -->
											<li>
												<div class="row justify-content-around align-items-start mb-3">
													<div class="col-2 pr-1">
														@if($msg->user->profile->user_image)
														<img src="/storage/UserImages/{{ $msg->user->profile->user_image }}" alt="" class="rounded-circle member-icon_48px">
														@else
														<img src="/storage/UserImages/no_image.jpeg" alt="" class="rounded-circle member-icon_48px">
														@endif
													</div>
													<div class="col-7 pl-0 pr-1">
														<div class="d-flex justify-content-between pl-1">
															<a href="">
																<div class="mb-0 pl-0">
																	<p class="text-fz-xs text-black-20 mb-0 line-1 p-0">
																		{{ $msg->user->profile->familyName }} {{ $msg->user->profile->firstName }}
																	</p>
																	<p class="m-0 p-0 line-1" style="color: rgb(123, 176, 188); font-size: 9px;"><span >@</span>{{ $msg->user->profile->name }}</p>
																</div>
															</a>
															<p class="text-fz-xs text-black-20 mb-0">{{ $msg->date }}</p>
														</div>
														<div class="card border-0 shadow-sm bg-white mb-0 pt-3 pb-3 pr-2 pl-2 text-fz-14px">
															<p class="mb-0">
																{!! $msg->msg!!}
															</p>
														</div>
													</div>
													<div class="col-2 p-0 align-self-end">
														<p class="text-fz-xs mb-0 text-green">
															<span class="block-message-icon2 glyphicon glyphicon-check icon-message-ok">
																既読２
															</span>
														</p>
													</div>
												</div>
											</li>
										@else
										<!-- 自分のメッセージ -->
											<li>
												<div class="row justify-content-around align-items-start mb-3">
													<div class="col-2 pr-1 p-0"></div>
													<div class="col-2 p-0 align-self-end">
														<p class="text-fz-xs mb-0 text-green">
															<span class="block-message-icon2 glyphicon glyphicon-check icon-message-ok">
																既読２
															</span>
														</p>
													</div>
													<div class="col-7 pl-0 pr-1">
														<p class="text-fz-xs text-black-20 mb-0" >{{ $msg->date }}</p>
														<div class="card border-0 shadow-sm bg-white mb-0 pt-3 pb-3 pr-2 pl-2 text-fz-14px">
															<p class="mb-0" id="my_msg">
																{!! $msg->msg !!}
															</p>
														</div>
													</div>
												</div>
											</li>
										@endif
									@endforeach
								</ul>
								<div id="ancLatestMessage"></div>
							</div>
						</div>
						<div class="fixed-bottom bg-graydark">
							<div class="container col-md-8 col-lg-6 pr-0">
								<div class="input-group pt-2 pb-2">
									<div class="input-grroup-append p-0" style="max-height:38px;">
										<label for="message-photo" class="mt-1 pr-2">
											<i class="fas fa-camera " style="font-size:24px;"></i>
											<input type="file" id="message-photo" style="display: none;">
										</label>
									</div>
									
										<textarea type="text" id="ta-message" name="msg" cols="1" rows="1" class="form-control border-0 rounded h-1em" placeholder="メッセージ" style="max-height: 108px;"></textarea>
										<input type="hidden" name="board_id" value="{{ $board->id }}" class="board_id">
										<input type="hidden" name="msg_type" value="msg" class="msg_type">
										<input type="hidden" name="user_id" value="{{ Auth::id() }}" class="user_id">
									</form>
									<div class="input-group-append" style="max-height:38px;">
										<button type="submit" id="btnMessageSubmit" class="btn text-black-50 text-fw-bold" style="height: 38px;">送信</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div data-react-class="page_view_counter" data-react-props="{}"></div>
	</body>
	<footer>
		<script>
			$(function(){
				
				$('#btnMessageSubmit').click(function(event){
					event.preventDefault();
					var msg = $('textarea[name=msg]').val();
					var board_id = $('input[name=board_id]').val();
					var msg_type = $('input[name=msg_type]').val();
					var user_id = $('input[name=user_id]').val();
					var url = 'http://127.0.0.1:8000/message/store';
					$.ajaxSetup({  /* ①-追加 */
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
							url: url,
							type: 'POST',
							data: {
								msg: msg,
								board_id: board_id,
								msg_type: msg_type,
								user_id: user_id,
							},
							dataType: 'json',
					})
					.done(function(data) {
						$('#message_list').append('<li><div class="row justify-content-around align-items-start mb-3"><div class="col-2 pr-1 p-0"></div><div class="col-2 p-0 align-self-end"><p class="text-fz-xs mb-0 text-green"><span class="block-message-icon2 glyphicon glyphicon-check icon-message-ok">既読２</span></p></div><div class="col-7 pl-0 pr-1"><p class="text-fz-xs text-black-20 mb-0">' + data.created_at + '</p><div class="card border-0 shadow-sm bg-white mb-0 pt-3 pb-3 pr-2 pl-2 text-fz-14px"><p class="mb-0">' + msg + '</p></div></div></div></li>');
						window.scrollTo(0,document.body.scrollHeight);
					})
					.fail(function (data) { 
						alert('失敗');
					});
				});	
				
			}); 
			window.scrollTo(0,document.body.scrollHeight);
				
							
			
			
		</script>
	</footer>
</html>