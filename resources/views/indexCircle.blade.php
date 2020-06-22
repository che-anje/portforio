@extends('layouts.app')

@section('edit-button')
    <a href="javascript:history.back()" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
@endsection
@section('content')
<div>
    <div>
        <nav aria-label="breadcrumb" class="bg-brown">
            <ul class="mb-0 rounded-0 scrollable-list breadcrumb--scroll pt-1 pb-1 container col-md-8 col-lg-6">
                <li class="breadcrumb-item breadcrumb-item--pattern text-fz-14px">
                    <a href="" class="nav-link--gray">TOP</a>
                </li>
                <li class="breadcrumb-item breadcrumb-item--pattern text-fz-14px">
                    <a href="" class="nav-link--gray">カテゴリー名ジャンル名</a>
                </li>
                <li class="breadcrumb-item breadcrumb-item--pattern text-fz-14px">
                    <a href="" class="nav-link--gray">全国</a>
                </li>
                <li class="breadcrumb-item breadcrumb-item--pattern text-fz-14px">
                    <a href="" class="nav-link--gray">都道府県名</a>
                </li>
            </ul>
        </nav>
    </div>
    <hr class="m-0">
    <div class="cursor-pointer">
        <div class="search-box bg-brown p-3 container col-md-8 col-lg-6">
            <div class="row align-items-center justify-content-between 
            line-height-1 cursor-pointer">
                
                <a  href="javascript:void(0);" class="text-black-50 col-auto mb-0" style="font-size: .875rem;" 
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
                                                <input type="radio" name="prefectureOfInterest" id="{{ $prefecture->id }}" 
                                                class="d-none checkbox__input checkbox__area" value="{{ $prefecture->id }}" 
                                                @if($my_category) data-category="{{ $my_category->id }}" data-url="/circles_pref/{{ $prefecture->id }}/{{ $my_category->id }}" 
                                                @else data-category="" data-url="/circles_pref/{{ $prefecture->id }}" @endif
                                                @if($my_genre) data-genre="{{ $my_genre->id }}" @else data-genre="" @endif>
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
    <div class="shadow-sm bg-white pt-3">
        <div class="position-relative container col-md-8 col-lg-6">
            <div class="row">
                <div class="col-9 pr-0">
                    <input type="text" class="form-control mb-2 pl-5 keyword" data-old="" value placeholder="キーワードを入力">
                    <div class="input-icon position-absolute pl-3">
                        <i class="fas fa-search" style="font-size: 18px;"></i>
                    </div>
                </div>
                <div class="col-3 pl-2">
                    <button type="submit" class="btn btn-success btn-success--grad" 
                    id="keyword-submit-btn" data-value="popular" style="width: 100%;">
                    検索</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="pb-3 d-none d-sm-block"></div>
<div>
    <div class="container col-md-8 col-lg-6">
        <h1 style="font-size:20px; padding-left:0px; margin-bottom:8px; font-family:HiraKakuProN-W6" id="circles_count" class="left mt-4 h2--extend -event">
        @if($my_category)
            {{ $my_prefecture->name }}の{{ $my_category->name }}サークル一覧（{{ $circles->count() }}件）
        @elseif($my_genre)
            {{ $my_prefecture->name }}の{{ $my_genre->name }}サークル一覧（{{ $circles->count() }}件）
        @else
            {{ $my_prefecture->name }}のサークル一覧（{{ $circles->count() }}件）
        @endif
        </h1>
        <div class="row justify-content-between">
            <div class="col">
                <ul id="sample" class="list-unstyled d-flex">
                    <li class="list-link">
                        <a id="" href="/index/{{ $my_prefecture->id }}?order=popular" class="nav-link--gray link--active order" data-value="popular" data-url="/index/{{ $my_prefecture->id }}?order=popular">人気順</a>
                    </li>
                    <li class="list-link">
                        <a id="" href="/index/{{ $my_prefecture->id }}?order=newer" class="nav-link--gray order" data-value="new" data-url="/index/{{ $my_prefecture->id }}?order=new">新着順</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="circle-list">
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
                                        <p class="btn btn-outline-success btn-sm btn-sm--expand mr-2 ">{{ $genre->name }}</p>
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
                                        <img src="/storage/CircleImages/{{ $circle->image }}" class="rounded w-100 object-fit-cover adjust-box-inner">
                                    @else
                                        <img src="/storage/UserImages/no_image.jpeg" class="rounded w-100 object-fit-cover adjust-box-inner">
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
    </div>
</div>
<!-- 興味のあることから探す -->
<section class="bg-white mb-3 pt-4 pb-3">
  <div class="container col-md-8 col-lg-6">
    <h2 class="h2 h2--extend">「興味・趣味」からサークルを探す</h2>
    <div class="row pl-2 pr-2">
      @foreach($categories as $category)
      <div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-2 pl-1 pr-1">
        <a href="/circle/{{ $category->id }}/{{ $my_prefecture->id }}" class="display-block">
          <div class="card text-white text-center rounded border-0 ">
          @if($category->image)
            <img class="picture card-img" src="/storage/CategoryImages/{{ $category->image }}" style="height: 90px">
          @else
            <img class="picture card-img" src="/storage/UserImages/no_image.jpeg" style="height: 90px; filter:brightness(10%);">
          @endif
            <div class="card-img-overlay card-img-overlay--black" style="height: 90px;">
              <h3 class="card-title card-title--extend mb-0">{{ $category->name }}<br>
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
<script>
$(function(){
    
    $('.order').click(function(event){
      event.preventDefault();
      var orderType = $(this).attr('data-value');
      switch(orderType){
          case 'new':
              $(this).addClass('link--active');
              $('.order[data-value=popular]').removeClass('link--active');
              break;
          case 'popular':
            $(this).addClass('link--active');
              $('.order[data-value=new]').removeClass('link--active');
              break;
      }
      var pref_id = '{{$my_prefecture->id}}';
      var keyword = $('.keyword').attr('data-old');
      var category = $('input[name=prefectureOfInterest]').attr('data-category');
      var genre = $('input[name=prefectureOfInterest]').attr('data-genre');
      if(category){
        var url = 'http://127.0.0.1:8000/index/'+pref_id+'?category='+category;
      }else if(genre){
        var url = 'http://127.0.0.1:8000/index/'+pref_id+'/'+genre;
      }else{
          var url = 'http://127.0.0.1:8000/index/'+pref_id;
      }

      $.ajax({
          url: url,
          type: 'GET',
          data: {
              order: orderType,
              keyword: keyword,
          },
          dataType: 'html',
      })
      .done(function(response) {
        $('.circle-list').html(response);
        var count = $(response).find('#circle_item').length;
        if(keyword){
            $('#circles_count').text('\n{{$my_prefecture->name}}の'+keyword+'サークル一覧（'+count+'件）');
        }else if(category){
            $('#circles_count').text('\n{{$my_prefecture->name}}の@if($my_category){{ $my_category->name }}@endifサークル一覧（'+count+'件）');
        }else if(genre){
            $('#circles_count').text('\n{{$my_prefecture->name}}の@if($my_genre){{ $my_genre->name }}@endifサークル一覧（'+count+'件）');
        }else{
            $('#circles_count').text('\n{{$my_prefecture->name}}のサークル一覧（'+count+'件）');
        }
            
      })
      .fail(function (response) { 
          alert('失敗');
      });
  });
}); 

$(function(){
  $('#keyword-submit-btn').click(function(event){
      event.preventDefault();
      var orderType = $(this).attr('data-value');
      if($('.order[data-value=new]').hasClass('link--active')){
        $('.order[data-value=new]').removeClass('link--active');
        $('.order[data-value=popular]').addClass('link--active');
      }
      var pref_id = '{{$my_prefecture->id}}';
      var keyword = $('.keyword').val();
      var category = $('input[name=prefectureOfInterest]').attr('data-category');
      var genre = $('input[name=prefectureOfInterest]').attr('data-genre');
      if(category){
        var url = 'http://127.0.0.1:8000/index/'+pref_id+'?category='+category;
      }else if(genre){
        var url = 'http://127.0.0.1:8000/index/'+pref_id+'/'+genre;
      }else{
          var url = 'http://127.0.0.1:8000/index/'+pref_id;
      }
      $.ajax({
          url: url,
          type: 'GET',
          data: {
              order: orderType,
              keyword: keyword,
          },
          dataType: 'html',
      })
      .done(function(response) {
        $('.circle-list').html(response);
        var count = $(response).find('#circle_item').length;
        if(keyword){
            $('#circles_count').text('\n{{$my_prefecture->name}}の'+keyword+'サークル一覧（'+count+'件）');
            $('.keyword').attr('data-old',keyword);
        }else{
            $('#circles_count').text('\n{{$my_prefecture->name}}のサークル一覧（'+count+'件）');
            $('.keyword').attr('data-old','');
        }
      })
      .fail(function (response) { 
          alert('失敗');
      });
      
  });
}); 

$('.modal-pref').on('change',function(e) {
  var key = $(e.target).val();
  var url = $(e.target).attr('data-url');
  
  location.href = url;
  
});


</script>


@endsection