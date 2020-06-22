@extends('layouts.app')

@section('content')
<div class="bg-white">
<ul id="carouselTopIndicators" class="carousel slide container col-md-8 col-lg-6 p-0 mb-0" 
data-ride="carousel" data-interval="4000" data-touch="true">
    <div class="carousel-inner">
        <li class="carousel-item active">
            <div class="adjust-box adjust-box-2x1 d-block w-100" style="width: 100%;">
                <div class="adjust-box-inner top-black-opacity"
                    style="background-image: url('image/slide1.jpg');
                    background-size: cover;
                    background-position: center center;
                    background-repeat: no-repeat;
                    background-color: #f1f1f1;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    ">
                    <p class="text-center h4 text-white" style="font-size: .875rem;"></p>
                    <p class="mv-copy text-center h4 ">サークルを作って仲間を集めよう！</p>
                </div>
            </div>
        </li>
        

        

        <li class="carousel-item">
            <div class="adjust-box adjust-box-2x1 d-block w-100" style="width: 100%;">
                <div class="adjust-box-inner top-black-opacity"
                    style="background-image: url('image/slide2.jpg');
                    background-size: cover;
                    background-position: center center;
                    background-repeat: no-repeat;
                    background-color: #f1f1f1;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    ">
                    <p class="text-center h4 text-white" style="font-size: .875rem;"></p>
                    <p class="mv-copy text-center h4 ">仲間を見つけて趣味を楽しもう！</p>
                </div>
            </div>
        </li>
        <ol class="carousel-indicators">
        <li data-target="#carouselTopIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselTopIndicators" data-slide-to="1"></li>
        </ol>
        
        <a class="carousel-control-prev" href="#carouselTopIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselTopIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>

    </div>
</ul>
</div>
<div class="">
    <div class="cursor-pointer">
        <div class="search-box bg-brown p-3 container col-md-8 col-lg-6">
            <div class="row align-items-center justify-content-between 
            line-height-1 cursor-pointer">
                
                <a  href="javascript:void(0);" class="text-black-50 col-auto mb-0 nav-link--gray" style="font-size: .875rem;" 
                data-toggle="modal" data-target="#myAreaModal">
                    自分の地域を設定する
                    
                </a>
                <div class="modal fade" id="myAreaModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-gray d-flex align-items-center">
                                <button type="button" class="close pl-0 pr-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                <h6 class="text-fw-bold text-center m-0 mx-auto align-middle" id="exampleModalLabel">地域を選択してください</h6>
                            </div>
                            
                            <div class="modal-body card bg-white h-100">
                                <ul class="nav flex-column modal-pref">
                                    @foreach($prefectures as $prefecture)
                                        <li class="border-bottom nav-item p-3">
                                            <input type="radio" name="prefectureOfInterest" id="{{ $prefecture->id }}" data-url="{{ route('prefecture.change', [ $prefecture->id ]) }}"
                                            class="d-none checkbox__input checkbox__area" value="{{ $prefecture->id }}">
                                            <label class="d-flex justify-content-between align-items-center 
                                            mb-0 position-relative" for="{{ $prefecture->id }}">
                                            <span class="p-0 line-height-2 pl-3 mb-0">{{ $prefecture->name }}</span>
                                            <span class="checkbox__lg checkbox__noborder"></span>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                @if($my_prefecture)
                <p class="text-black-80 text-reset col-auto mb-0 icon icon-area icon-area-gray" id="my_prefecture" 
                value="{{  $my_prefecture->name  }}">
                    {{ $my_prefecture->name }}
                </p>
                @else
                <p class="text-black-80 text-reset col-auto mb-0 icon icon-area icon-area-gray" id="my_prefecture" 
                value="0">
                    全国
                </p>
                @endif
            </div>
        </div>
    </div>    
</div>
<!-- 新規登録・ログイン -->
@guest
<section class="bg-white shadow-sm mb-3 pb-3">
    <div class="container col-md-8 col-lg-6">
        <h1 class="mv-copy-black h4 bg-white pt-3 pb-0 mb-0 text-center">
            "サークル探しと仲間づくりのサイト"<br>
            <span style="font-size: .9rem;">まずは会員登録から!!</span>
        </h1>
        <a href="{{ route('register') }}" class="btn btn-primary btn-primary--grad 
        mx-auto mb-1 text-fw-bold mt-3">新規登録・ログイン</a>
    </div>
</section>
@endguest
<!-- 興味のあることから探す -->
<section class="bg-white shadow-sm mb-3 pt-4 pb-3">
    <div class="container col-md-8 col-lg-6">
        <h2 class="h2 h2--extend">
            「興味・趣味からサークルを探す
        </h2>
        <section class="pb-3">
            <div class="position-relative">
                <div class="row">
                    <div class="col-9 pr-0">
                        <input class="form-control mb-2 pl-5 search_form" 
                        type="text" placeholder="キーワードを入力" 
                        id="keyword-text" data-pref="{{ $my_prefecture->id }}">
                        <div class="input-icon position-absolute pl-3">
                            <i class="fas fa-search" style="font-size: 18px;"></i>
                        </div>
                    </div>
                    <div class="col-3 pl-2">
                        <button type="submit" class="btn btn-success btn-success--grad" 
                        id="keyword-submit-btn" style="width: 100%;" data-url="/index/{{ $my_prefecture->id }}">
                        検索</button>
                    </div>
                </div>
            </div>
        </section>
        <div class="row pl-2 pr-2">
            @foreach($categories as $category)
            <div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-2 pl-1 pr-1">
                <a href="/circle/{{ $category->id }}/{{ $my_prefecture->id }}" class="display-block">
                    <div class="card text-white text-center 
                    rounded border-0 ">
                    @if($category->image)
                        <img class="picture card-img" src="/storage/CategoryImages/{{ $category->image }}" style="height: 90px">
                    @else
                        <img class="picture card-img" src="/storage/UserImages/no_image.jpeg" style="height: 90px; filter:brightness(10%);">
                    @endif
                        <div class="card-img-overlay card-img-overlay--black" style="height: 90px;">
                            <h3 class="card-title card-title--extend mb-0 text-in-image">{{ $category->name }}<br>
                            <span class="text-fz-small">サークルを探す</span></h3>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-12 mb-2">
                <h2 class="h2 h2--extend mt-4 mb-3">
                    ピックアップ情報!!
                </h2>
                <div class="row pl-0 info-slide slider display-block" style="justify-content: center; align-items: center;">
                    <div class="mb-2 pl-1 pr-1">
                        <a  href="{{ route('circle.show', [ $recent->circle->id ]) }}" class="display-block" >
                            <div class="card text-white text-center rounded border-0 position-relative">
                                <img src="/storage/CircleImages/{{ $recent->circle->image }}" class="picture card-img" style="max-width: 350px; max-height: 138px; height: 30vw; object-fit: cover;">
                                <div class="card-img-overlay--black card-img-overlay d-flex align-items-center justify-content-center shadow" style="max-width: 350px; max-height: 138px; height: 30vw; object-fit: cover; ">
                                    <h2 class="card-title card-title--extend mb-0 text-in-image" ><span class="text-fz-small">{{ $recent->circle->user->profile->familyName }}{{ $recent->circle->user->profile->firstName }}さんが</span>「{{ $recent->circle->name }}」<br>
                                    <span class="text-fz-small" >を作成しました</span></h2>
                                </div>
                            </div>
                            
                        </a>
                    </div>
                    <div class="mb-2 pl-1 pr-1">
                        <a  href="{{ route('circle.show', [ $recent->Circle->id ]) }}" class="display-block" >
                            <div class="card text-white text-center rounded border-0 position-relative">
                                <img src="/storage/CircleImages/{{ $recent->Circle->image }}" class="picture card-img" style="max-width: 350px; max-height: 138px; height: 30vw; object-fit: cover;">
                                <div class="card-img-overlay--black card-img-overlay d-flex align-items-center justify-content-center shadow" style="max-width: 350px; max-height: 138px; height: 30vw; object-fit: cover; ">
                                    <h2 class="card-title card-title--extend mb-0 text-in-image" ><span class="text-fz-small">{{ $recent->user->profile->familyName }}{{ $recent->user->profile->firstName }}さんが</span>「{{ $recent->Circle->name }}」<br>
                                    <span class="text-fz-small" >に参加しました</span></h2>
                                </div>
                            </div>
                            
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- 人気のサークルから探す -->
<section class="bg-white shadow-sm mb-3 pt-4 pb-3">
    <div class="container col-md-8 col-lg-6">
        <h2 class="h2 h2--extend -crown">「人気順」からサークルを探す</h2>
        <ul class="scrollable-list pl-0 ib-list d-flex circle_card">
            @foreach($p_circles as $circle)
            <li class="d-inline-block mr-2 ">
                <a href="{{ route('circle.show', [ $circle->id ]) }}" class="card card--circle hov--default border-0" >
                    <h4 class="mb-2 line-1 hov--default" style="font-size: 13px; font-weight: bold;">{{ $circle->genres[0]->name }}サークル</h4>
                    @if($circle->image)
                        <img src="/storage/CircleImages/{{ $circle->image }}" class="card-img-top card-img-top--list">
                    @else
                        <img src="/storage/UserImages/no_image.jpeg" class="card-img-top card-img-top--list">
                    @endif
                    <div class="card-body card-body--narrow border rounded-bottom border-top-0 pb-4">
                        <div class="d-flex scrollable-list">
                        @foreach($circle->genres as $genre)
                            <p class="btn btn-outline-success 
                            btn-sm btn-sm--expand mr-2">{{ $genre->name }}</p>
                        @endforeach
                        </div>
                        <div class="row no-gutters">
                            <i class="fas fa-map-marker-alt mr-2 hov--default" style="color: mediumorchid;"><p>{{ $circle->prefecture->name }}</p></i>
                            <i class="fas fa-user-friends mr-3 d-flex hov--default" style="color: mediumorchid;"><p>{{ $circle->count }}</p></i>
                        </div>
                        <p class="card-text card-text--ellipsis mb-2 hov--default" style="min-height: 50px;">
                            {{ $circle->introduction }}
                        </p>
                        <p class="text-black-20 text-fz-small mb-0 card-bottommeta card-text--ellipsis_1">
                            {{ $circle->name }}
                        </p>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        <p class="text-center mb-0"><a href="{{ route('circle.index', [ $my_prefecture->id ]) }}" class="btn btn-outline-success w-100 
        text-fw-bold mb-2" style="font-size: 15px;">「人気順」のサークルをもっと見る</a></p>
    </div>
</section>

<!-- 新着のサークルから探す -->
<section class="bg-white shadow-sm mb-3 pt-4 pb-3">
    <div class="container col-md-8 col-lg-6">
        <h2 class="h2 h2--extend -new">「新着順」からサークルを探す</h2>
        <ul class="scrollable-list pl-0 ib-list d-flex">
            @foreach($n_circles as $circle)
            <li class="d-inline-block mr-2">
                <a href="{{ route('circle.show', [ $circle->id ]) }}" class="card card--circle hov--default border-0">
                    <h4 class="mb-2 line-1 hov--default" style="font-size: 13px; font-weight: bold;">{{ $circle->genres[0]->name }}サークル</h4>
                    @if($circle->image)
                        <img src="/storage/CircleImages/{{ $circle->image }}" class="card-img-top card-img-top--list">
                    @else
                        <img src="/storage/UserImages/no_image.jpeg" class="card-img-top card-img-top--list">
                    @endif
                    <div class="card-body card-body--narrow border 
                    rounded-bottom border-top-0 pb-4">
                        <div class="d-flex scrollable-list">
                        @foreach($circle->genres as $genre)
                            <p class="btn btn-outline-success 
                            btn-sm btn-sm--expand mr-2">{{ $genre->name }}</p>
                        @endforeach
                        </div>
                        <div class="row no-gutters">
                            <i class="fas fa-map-marker-alt mr-2 hov--default" style="color: mediumorchid;"><p>{{ $circle->prefecture->name }}</p></i>
                            <i class="fas fa-user-friends mr-3 d-flex hov--default" style="color: mediumorchid;"><p>{{ $circle->count }}</p></i>
                        </div>
                        <p class="card-text card-text--ellipsis mb-2 hov--default" style="min-height: 50px;">
                            {{ $circle->introduction }}
                        </p>
                        <p class="text-black-20 text-fz-small mb-0 card-bottommeta card-text--ellipsis_1">
                            {{ $circle->name }}
                        </p>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        <p class="text-center mb-0"><a href="{{ route('circle.index', [ $my_prefecture->id ]) }}" class="btn btn-outline-success w-100 
        text-fw-bold mb-2" style="font-size: 15px;">「新着順」のサークルをもっと見る</a></p>
    </div>
</section>

<!-- サークルを作る -->
<section class="bg-white shadow-sm mb-0 pt-4 pb-4">
    <div class="container col-md-8 col-lg-6">
        <h2 class="h2 h2--extend -plus mb-4">サークルを作ろう！</h2>
        <a href="circles/new" class="btn btn-primary btn-primary--grad 
        mx-auto text-fw-bold line-height-2_45 mt-2"><span class="text-fz-24px 
        position-relative">+</span>サークル作成へ進む</a>
    </div>
</section>
<script>
$('#keyword-submit-btn').on('click',function(e) {
    var val = $('.search_form').val();
    if(val) {
        var url = $(e.target).attr('data-url')+'?&keyword='+val;
    }else{
        var url = $(e.target).attr('data-url');
    }
    location.href = url;
});
</script>
@endsection
