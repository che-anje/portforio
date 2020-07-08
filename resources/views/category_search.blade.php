@extends('layouts.app')

@section('edit-button')
    <a href="javascript:history.back()" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
@endsection
@section('content')
<div class="bg-white">
    <div class="top-mv top-mv--moving pb-4_5 pt-5 container col-md-8 col-lg-6 text-in-image" style="background: url('{{ $my_category->image_path }}'); background-size: cover;">
      <h1 class="mv-copy text-center h4 mb-3 pt-3">{{ $my_category->name }}
        <div class="container col-md-10 col-lg-8 mt-3 mb-3 pt-4 ml-10 mr-10" style="border: 1px solid #fff;">
        <p class="text-center text-white text-fz-small">登録サークル数：<span class="text-fz-24px">{{ $circles->count() }}</span> <span class="text-fz-xs">* {{ $my_prefecture->name }}</span></p>
        </div>
      </h1>
      <p class="text-center text-fz-14px mb-4_5 text-white">安心・信頼できるサークルのみを厳選！</p>
    </div>
  </div>
  <div class="bg-brown">
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
                                            <input type="radio" name="prefectureOfInterest" id="{{ $prefecture->id }}" data-url="/category_pref/{{ $prefecture->id }}/{{ $my_category->id }}"
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

  <section class="bg-white shadow-sm mb-3 pt-4 pb-3">
    <div class="container col-md-8 col-lg-6">
        <h2 class="h2 h2--extend -crown mb-3_5">人気のジャンル</h2>
        @if($pop_genres)
            @foreach($pop_genres as $pop_genre)
            <a href="{{ route('circle.index', ['pref_id'=>$my_prefecture->id, 'genre'=>$pop_genre->id]) }}" >
                <p class="btn btn-outline-success btn-sm mr-2 rounded-1000 mb-2_5 pl-2_5 pr-2_5">
                    {{ $pop_genre->name }}
                </p>
            </a>
            @endforeach
        @endif
        
    </div>
  </section>

  <!-- 人気のサークル -->
  <section class="bg-white shadow-sm mb-3 pt-4 pb-3">
    <div class="container col-md-8 col-lg-6">
        <h2 class="h2 h2--extend -crown">人気の「{{ $my_category->name }}」サークルから探す</h2>
        <ul class="scrollable-list pl-0 ib-list d-flex">
        @foreach($circles as $circle)
            <li class="d-inline-block mr-2">
                <a class="card card--circle hov--default border-0" href="{{ route('circle.show', [ $circle->id ]) }}">
                    <h4 class="mb-2 line-1 hov--default" style="font-size: 13px;font-weight: bold;">{{ $circle->genres[0]->name }}サークル</h4>
                    @if($circle->image)
                        <img src="{{ $circle->image_path }}" class="card-img-top card-img-top--list">
                    @else
                        <img src="{{ Illuminate\Support\Facades\Storage::disk('s3')->url('UserImages/no_image.jpeg') }}" class="card-img-top card-img-top--list">
                    @endif
                    <div class="card-body card-body--narrow border rounded-bottom border-top-0 pb-4 ">
                        <div class="d-flex scrollable-list">
                        @foreach($circle->genres as $genre)
                            <p class="btn btn-outline-success btn-sm btn-sm--expand mr-2">
                                {{ $genre->name }}
                            </p>
                        @endforeach
                        </div>
                        <div class="row no-gutters">
                            <i class="fas fa-map-marker-alt mr-2 hov--default" style="color: mediumorchid;"><p>{{ $my_prefecture->name }}</p></i>
                            <i class="fas fa-user-friends mr-3 d-flex hov--default" style="color: mediumorchid;"><p>{{ $circle->count }}</p></i>
                        </div>
                        <p class="card-text card-text--ellipsis mb-2 hov--default" style="min-height: 50px;">
                            {{ $circle->introduction }}
                        </p>
                        <p class="text-black-20 text-fz-small mb-0 card-bottommeta card-text--ellipsis_1 ">{{ $circle->name }}</p>
                    </div>
                </a>
            </li>
        @endforeach
        </ul>
        <p class="text-center mb-0"><a href="/index/{{ $my_prefecture->id }}?category={{ $my_category->id }}" class="btn btn-outline-success w-100 text-fw-bold">人気のサークルをもっと見る</a></p>
    </div>
</section>

<section class="bg-white shadow-sm mb-3 pt-4 pb-3">
    <div class="container col-md-8 col-lg-6">
      <h2 class="h2 h2--extend -new">新着の「{{ $my_category->name }}」サークルから探す</h2>
      <ul class="scrollable-list pl-0  ib-list">
      @foreach($circles as $circle)
            <li class="d-inline-block mr-2">
                <a class="card card--circle hov--default border-0" href="{{ route('circle.show', [ $circle->id ]) }}">
                    <h4 class="mb-2 line-1 hov--default" style="font-size: 13px;font-weight: bold;">{{ $circle->genres[0]->name }}サークル</h4>
                    @if($circle->image)
                        <img src="{{ $circle->image_path }}" class="card-img-top card-img-top--list">
                    @else
                        <img src="{{ Illuminate\Support\Facades\Storage::disk('s3')->url('UserImages/no_image.jpeg') }}" class="card-img-top card-img-top--list">
                    @endif
                    <div class="card-body card-body--narrow border rounded-bottom border-top-0 pb-4 ">
                        <div class="d-flex scrollable-list">
                        @foreach($circle->genres as $genre)
                            <p class="btn btn-outline-success btn-sm btn-sm--expand mr-2">
                                {{ $genre->name }}
                            </p>
                        @endforeach
                        </div>
                        <div class="row no-gutters">
                            <i class="fas fa-map-marker-alt mr-2 hov--default" style="color: mediumorchid;"><p>{{ $my_prefecture->name }}</p></i>
                            <i class="fas fa-user-friends mr-3 d-flex hov--default" style="color: mediumorchid;"><p>{{ $circle->count }}</p></i>
                        </div>
                        <p class="card-text card-text--ellipsis mb-2 hov--default" style="min-height: 50px;">
                            {{ $circle->introduction }}
                        </p>
                        <p class="text-black-20 text-fz-small mb-0 card-bottommeta card-text--ellipsis_1 ">{{ $circle->name }}</p>
                    </div>
                </a>
            </li>
        @endforeach
      </ul>
      <p class="text-center mb-0"><a href="/index/{{ $my_prefecture->id }}?category={{ $my_category->id }}" class="btn btn-outline-success w-100 text-fw-bold">新着のサークルをもっと見る</a></p>
    </div>
  </section>
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
            <img class="picture card-img" src="{{ $category->image_path }}" style="height: 90px">
          @else
            <img class="picture card-img" src="{{ Illuminate\Support\Facades\Storage::disk('s3')->url('UserImages/no_image.jpeg') }}" style="height: 90px; filter:brightness(10%);">
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
                <img src="{{ $recent->circle->image_path }}" class="picture card-img" style="max-width: 350px; max-height: 138px; height: 30vw; object-fit: cover;">
                <div class="card-img-overlay--black card-img-overlay d-flex align-items-center justify-content-center shadow" style="max-width: 350px; max-height: 138px; height: 30vw; object-fit: cover; ">
                  <h2 class="card-title card-title--extend mb-0 text-in-image" ><span class="text-fz-small">{{ $recent->circle->user->profile->familyName }}{{ $recent->circle->user->profile->firstName }}さんが</span>「{{ $recent->circle->name }}」<br>
                  <span class="text-fz-small" >を作成しました</span></h2>
                </div>
                <h3 class="card-title card-title--extend-s mb-0" style="position: absolute; bottom: 0; left: 0; right: 0;">
                <span class="badge badge-danger mb-0 border border-white" style="font-size: .7rem;">最新サークルをチェック</span></h3>
              </div>
            </a>
          </div>
          <div class="mb-2 pl-1 pr-1">
            <a  href="{{ route('circle.show', [ $recent->Circle->id ]) }}" class="display-block" >
              <div class="card text-white text-center rounded border-0 position-relative">
                <img src="{{ $recent->Circle->image_path }}" class="picture card-img" style="max-width: 350px; max-height: 138px; height: 30vw; object-fit: cover;">
                <div class="card-img-overlay--black card-img-overlay d-flex align-items-center justify-content-center shadow" style="max-width: 350px; max-height: 138px; height: 30vw; object-fit: cover; ">
                  <h2 class="card-title card-title--extend mb-0 text-in-image" ><span class="text-fz-small">{{ $recent->user->profile->familyName }}{{ $recent->user->profile->firstName }}さんが</span>「{{ $recent->Circle->name }}」<br>
                  <span class="text-fz-small" >に参加しました</span></h2>
                </div>
                <h3 class="card-title card-title--extend-s mb-0" style="position: absolute; bottom: 0; left: 0; right: 0;">
                <span class="badge badge-danger mb-0 border border-white" style="font-size: .7rem;">最新サークルをチェック</span></h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
$('.modal-pref').on('change',function(e) {
  var key = $(e.target).val();
  var url = $(e.target).attr('data-url');
  
  location.href = url;
  
});
</script>


@endsection