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
        <nav aria-label="breadcrumb" class="bg-gray">
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
        <div class="search-box bg-gray p-3 container col-md-8 col-lg-6">
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
    <div class="shadow-sm bg-white pt-3">
        <div class="position-relative container col-md-8 col-lg-6">
            <div class="row">
                <div class="col-9 pr-0">
                    <input type="text" class="form-control mb-2 pl-5" value placeholder="キーワードを入力">
                    <div class="input-icon position-absolute pl-3">
                        <i class="fas fa-search" style="font-size: 18px;"></i>
                    </div>
                </div>
                <div class="col-3 pl-2">
                    <button type="submit" class="btn btn-warning btn-warning--grad" 
                    id="keyword-submit-btn" style="width: 100%;">
                    検索</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="pb-3 d-none d-sm-block"></div>
<div>
    <div class="container col-md-8 col-lg-6">
        <h1 style="font-size:20px; padding-left:0px; margin-bottom:8px; font-family:HiraKakuProN-W6" class="left mt-4 h2--extend -event">
            大阪のサークル一覧（{{ $circles_count }}件）
        </h1>
        <div class="row justify-content-between">
            <div class="col">
                <ul class="list-unstyled d-flex">
                    <li class="list-link">
                        <a href="#" class="nav-link--gray link--active order" data-value="popular" data-url="/search/{{ $my_prefecture->id }}?order=popular">人気順</a>
                    </li>
                    <li class="list-link">
                        <a href="#" class="nav-link--gray order" data-value="new" data-url="/search/{{ $my_prefecture->id }}?order=new">新着順</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div>
        <div>
            @foreach($circles as $circle)
            <div class="bg-white search-shadow pt-3 mb-2">
                <div class="container col-md-8 col-lg-6">
                    <div>
                        <a href="{{ route('circle.show', [ $circle->id ]) }}" class="hov--default">
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="text-fw-bold mb-2 line-1 text-fz-14px false">
                                        <span class="badge badge-light text-fw-normal">サークル</span>
                                        {{ $circle->name }}
                                    </h6>
                                    <div class="scrollable-list">
                                    @foreach($circle->genres as $genre)
                                        <p class="btn btn-outline-primary btn-outline-blue btn-sm btn-sm--expand mr-2 
                                        d-inline-block text-tz-xs">{{ $genre->name }}</p>
                                    @endforeach
                                    </div>
                                    <div class="row no-gutters">
                                        <i class="fas fa-map-marker-alt mr-2 d-flex" style="font-size: 0.8em; color: #f6993f;"><p class="ml-2 text-fz-small" style="font-weight:400; color:black;">{{ $my_prefecture->name }}</p></i>
                                        <i class="fas fa-user-friends mr-3 d-flex" style="font-size: 0.8em; color: #f6993f;"><p class="ml-2 text-fz-small" style="font-weight:400; color:black;">{{ $circle->count }}</p></i>
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
        <a href="/{{ $category->id }}/{{ $my_prefecture->id }}" class="display-block">
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
            "今日のイチオシ情報"
        </h2>
        <div class="row pl-0 info-slide slider" style="justify-content: center; align-items: center;">
          <div class="mb-2 pl-1 pr-1">
            <a  href="https://tunagate.com/article/tunagate-patia01?=top0214patia"
              class="display-block"
              target=&quot;_blank&quot;
              onClick="gtag('event', '', {'event_category': '','event_label': '/'});">
              <div class="text-white text-center rounded border-0">
              <img src="/image/slide1.jpg" class="picture card-img" style="max-width: 350px; max-height: 138px; height: 30vw; object-fit: cover;">
              <div class="card-img-overlay--black">
              </div>
              </div>
              
            </a>
          </div>
          <div class="mb-2 pl-1 pr-1 ">
            <a  href="https://tunagate.com/article/tunagate-patia01?=top0214patia"
              class="display-block"
              target=&quot;_blank&quot;
              onClick="gtag('event', '', {'event_category': '','event_label': '/'});">
              <div class="text-white text-center rounded border-0">
              <img src="/image/slide2.jpg" class="picture card-img" style="max-width: 350px; max-height: 138px; height: 30vw; object-fit: cover;">
              <div class="card-img-overlay--black">
              </div>
              </div>
              
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.tunagate-featured .slick-dots {
  position: absolute;
  bottom: -20px;
  display: block;
  width: 100%;
  padding: 0;
  margin: 0;
  list-style: none;
  text-align: center;
}

.tunagate-featured .slick-dots li button:before {
  color: gray;
  opacity: 0.7;
}

.tunagate-featured .slick-dots li.slick-active button:before {
  color: black;
  opacity: 1;
}
</style>

<script>
$('.order').click(function () {
var params = getParameter();
    params['order'] = $(this).attr('data-value');
    window.location.href = setParameter(params);
});

//パラメータを設定したURLを返す
function setParameter( paramsArray ) {
    var resurl = location.href.replace(/\?.*$/,"");
    for ( key in paramsArray ) {
        resurl += (resurl.indexOf('?') == -1) ? '?':'&';
        resurl += key + '=' + paramsArray[key];
    }
    return resurl;
}
//パラメータを取得する
function getParameter(){
    var paramsArray = [];
    var url = location.href; 
    parameters = url.split("#");
    if( parameters.length > 1 ) {
        url = parameters[0];
    }
    parameters = url.split("?");
    if( parameters.length > 1 ) {
        var params   = parameters[1].split("&");
        for ( i = 0; i < params.length; i++ ) {
            var paramItem = params[i].split("=");
            paramsArray[paramItem[0]] = paramItem[1];
        }
    }
    return paramsArray;
};

    

    
</script>


@endsection