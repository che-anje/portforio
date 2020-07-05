<!DOCTYPE html>
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
	@if(app('env') == 'production')
		<script src="{{ secure_asset('js/slick.js') }}" type="text/javascript"></script>
		<script type="text/javascript" src="{{ secure_asset('js/slick.min.js') }}"></script>
		<script src="{{ secure_asset('js/app.js') }}" defer></script>
	@else
		<script src="{{ asset('js/slick.js') }}" type="text/javascript"></script>
		<script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
		<script src="{{ asset('js/app.js') }}" defer></script>
	@endif
	
	
	

	<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="//fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
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
	<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
</head>
<div>
    @foreach($circles as $circle)
    <div id="circle_item" class="bg-white search-shadow pt-3 mb-2">
        <div class="container col-md-8 col-lg-6">
            <div>
                <a href="{{ route('circle.show', [ $circle->id ]) }}" class="hov--default">
                    <div class="row">
                        <div class="col-8">
                            <h6 class="text-fw-bold mb-2 line-1 text-fz-14px false hov--default">
                                <span class="badge badge-light text-fw-normal">サークル</span>
                                {{ $circle->name }}
                            </h6>
                            <div class="scrollable-list">
                            @foreach($circle->genres as $genre)
                                <p class="btn btn-outline-success btn-sm btn-sm--expand mr-2 
                                d-inline-block text-tz-xs">{{ $genre->name }}</p>
                            @endforeach
                            </div>
                            <div class="row no-gutters">
                                <i class="fas fa-map-marker-alt mr-2 d-flex" style="font-size: 0.8em; color: mediumorchid;"><p class="ml-2 text-fz-small" style="font-weight:400; color:black;">{{ $circle->prefecture->name }}</p></i>
                                <i class="fas fa-user-friends mr-3 d-flex" style="font-size: 0.8em; color: mediumorchid;"><p class="ml-2 text-fz-small" style="font-weight:400; color:black;">{{ $circle->count }}</p></i>
                            </div>
                            <p class="text-black-50 line-2 mb-2_5 text-fz-14px">
                                {{ $circle->introduction }}
                            </p>
                        </div>
                        <div class="col-4 pl-0 mb-3">
                            <div class="adjust-box adjust-box-4x3" style="width:100%;">
                            @if($circle->image)
                                <img src="{{ $circle->image_path }}" class="rounded w-100 object-fit-cover adjust-box-inner">
                            @else
                                <img src="{{ Illuminate\Support\Facades\Storage::disk('s3')->url('UserImages/no_image.jpeg') }}" class="rounded w-100 object-fit-cover adjust-box-inner">
                            @endif
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<script>

</script>
</html>
