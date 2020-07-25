@extends('layouts.app')

@section('edit-button')
    <a href="javascript:history.back()" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
    @if(Auth::check())
      @if(Auth::id() === $circle->admin_user_id)
      <a href="{{ route('my_circle.menu', [$circle->id]) }}" class="position-absolute position--headerright
      text-black-20 text-fz-18px">
          <i class="fa fa-bars"></i>
      </a>
      @endif
    @endif
@endsection


@section('content')
<nav aria-label="breadcrumb" class="bg-brown">
  <ul class="mb-0 rounded-0 scrollable-list breadcrumb--scroll pt-1 pb-1 container col-md-8 col-lg-6">
    <li class="breadcrumb-item breadcrumb-item--pattern text-fz-14px"><a href="/" class="nav-link--gray">TOP</a></li>
        <li class="pl-0 breadcrumb-item breadcrumb-item--pattern text-fz-14px">
          <a href="/circle/{{ $circle->category->id }}/{{ $my_prefecture->id }}" class="nav-link--gray">
            {{ $circle->category->name }}
          </a>
        </li>
      <li class="pl-0 breadcrumb-item breadcrumb-item--pattern text-fz-14px">
        <a href="{{ route('circle.index', ['pref_id'=>$my_prefecture->id, 'genre'=>$circle->genres[0]->id]) }}" class="nav-link--gray">
          {{ $circle->genres[0]->name }}
        </a>
      </li>
      <li class="pl-0 breadcrumb-item breadcrumb-item--pattern text-fz-14px">
        <a
          href="{{ route('circle.index', [ $circle->prefecture->id ]) }}" class="nav-link--gray"
        >
          {{ $circle->prefecture->name }}
        </a>
      </li>
    <li class="pl-0 breadcrumb-item breadcrumb-item--pattern text-fz-14px">
      <a href="{{ route('circle.show', [ $circle->id ]) }}" class="nav-link--gray">{{ $circle->name }}</a>
    </li>
  </ul>
</nav>
<div class="bg-white">
  <div class="container col-md-8 col-lg-6 pt-3">
    <div class="row">
      <div class="col-6">
        <p class="mb-0" style="font-weight: bold;font-size:13px;">
          <a href="/circle/{{ $circle->category->id }}/{{ $my_prefecture->id }}" style="color: green;">&lt;&nbsp;「{{ $circle->category->name }}」一覧へ戻る</a>
        </p>
      </div>
      <div class="col-6">
        <p class="mb-0" style="font-weight: bold;font-size:13px;">
          <a href="{{ route('circle.index', ['pref_id'=>$my_prefecture->id, 'genre'=>$circle->genres[0]->id]) }}" style="color: green;">&lt;&nbsp;「{{ $circle->prefecture->name }}の{{ $circle->genres[0]->name }}サークル」一覧へ戻る</a>
        </p>
      </div>
    </div>
  </div>
  <div class="container col-md-8 col-lg-6">
    <h1 style="font-size:18px;font-weight: bold;" class="m-0 pb-3 pt-3">【{{ $circle->prefecture->name }}】{{ $circle->genres[0]->name }}サークル</h1>
  </div>
  <div class="event-img-wrap container col-md-8 col-lg-6 pl-0 pr-0">
    <div  style="position: relative;">
      <div id="toast-premium-plan" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false" style="position: absolute; top: 8px; left: 8px; z-index: 1; min-width: 220px;">
        <div class="toast-header">
          <strong class="mr-auto">週間ランキング結果</strong>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body">
          {{ $circle->name }}は週間人気ランキング<br>全国&nbsp;<span style="font-size: 1.5em;">{{ $circle->rank }}</span>&nbsp;位です。<br><br>
        </div>
      </div>
    </div>
    <script>
      $(function() {
        $('#toast-premium-plan').toast('show');
      });
    </script>
    <figure class="position-relative m-0">
    @if($circle->image)
        <img
        src="{{ $circle->image_path }}"
        onerror="{{ 'Illuminate\Support\Facades\Storage'::disk('s3')->url('UserImages/no_image.jpeg') }}"
        alt="{{ Illuminate\Support\Facades\Storage::disk('s3')->url('UserImages/no_image.jpeg') }}"
        class="w-100 event-img">
    @else
        <img
        src="{{ Illuminate\Support\Facades\Storage::disk('s3')->url('UserImages/no_image.jpeg') }}"
        alt=""
        class="w-100 event-img">
    @endif
    </figure>
  </div>
  </div>

<div class="shadow-sm mb-3 bg-white pt-3 pb-3">
  <div class="container col-md-8 col-lg-6 h-100">
    <div class="scrollable-list mb-2">
      @foreach($circle->genres as $genre)
      <a href="/search/akita/346">
        <p class="btn btn-outline-success btn-sm btn-sm--expand mr-2 d-inline-block mb-0">
          {{ $genre->name }}
        </p>
      </a>
      @endforeach
    </div>
    <h2 id="circle-name" class="h5--20px mb-1">
      {{ $circle->name }}
    </h2>
    <div class="d-flex justify-content-end">
      <p class="twitter-share-btn d-flex justify-content-end">
        <a href="" rel="nofollow" target="_blank"><i class="fa fa-twitter twitter-icon" style="font-size:14px;">&nbsp;&nbsp;ツイート</i></a>
      </p>
    </div>
    <div class="row no-gutters">
      <i class="fas fa-user-friends mr-3 d-flex">
        <p class="mb-2 icon icon-member mr-3 ml-2">
          {{ $circle->count }}
          <span class="text-fz-small">人</span>
        </p>
      </i>
      <i class="fas fa-map-marker-alt mr-2 d-flex">
        <p class="mb-2 icon icon-area ml-2">
          {{ $circle->prefecture->name }}
        </p>
      </i>
    </div>
    <hr class="mb-4 mt-0">
    <div class="grad-wrap">
      <div class="content-txt grad-item">
        <p class="description" style="font-size:16px;">{{ $circle->introduction }}</p>
      </div>
      <p class="description-show grad-trigger" style="color:#2292a4;cursor:pointer"></p>
    </div>
    <div class="card mb-4">
      <table class="table mb-2_5">
        <tbody>
          <tr>
            <td class="border-0 pt-1_5 pb-0 text-fz-14px pr-0 pl-3 w-20" style="white-space: nowrap">活動日：</td>
            <td class="border-0 pt-1_5 pb-0 text-fz-14px pl-1">{{ $circle->activityDay }}</td>
          </tr>
          <tr>
            <td class="border-0 pt-1_5 pb-0 text-fz-14px pr-0 pl-3 w-20" style="white-space: nowrap">年齢層：</td>
            <td class="border-0 pt-1_5 pb-0 text-fz-14px pl-1">
              @if($circle->ageGroup)
                {{ \App\Models\Circle::AGEGROUP[$circle->ageGroup] }}
              @endif
            </td>
          </tr>
          <tr>
            <td class="border-0 pt-2 pb-0 text-fz-14px pr-0 pl-3 w-20">その他費用：</td>
            <td class="border-0 pt-2 pb-0 text-fz-14px pl-1">{{ $circle->cost }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<section class="bg-white shadow-sm mb-4 pt-4 pb-3">
  <div class="container col-md-8 col-lg-6">
    <h2 class="h2 h2--extend -member2">メンバー<span class="text-fz-14px">({{ $circle->count }}人)</span></h2>
  </div>
  <hr class="m-0">
  <div class="container col-md-8 col-lg-6">
    <ul class="scrollable-list list-group list-group--event mb-3_5 list-unstyled" style="max-height: 385px;">
    @foreach($members as $member) 
      @if($circle->admin_user_id == $member->id)
      <li>
        <div class="row align-items-start pt-3 pr-3 pl-3 pb-0">
          <div class="col-2 pl-0 pr-2">
          <img src="{{ $member->image_path }}" alt="" class="member-icon_48px rounded-circle">
          </div>
          <div class="row col border-bottom pb-2 align-items-start cricle-member-name">
          <div class="col pl-0">
              <p class="btn btn-outline-red  btn-sm--admin mr-2 d-inline-block text-center align-middle mb-2" style="pointer-events: none;">
                管理人</p>
            <a href="{{ route('profile.show', [ $member->profile->id ]) }}" style="text-decoration: none;">
                <p class="mb-0 text-fz-green text-fz-14px line-1">{{ $member->profile->name }}</p>
            </a>
          </div>
          <div class="col-7 p-0">
              <p class="card-text--ellipsis text-fz-14px text-black-50 mb-0" style="line-height: 1.71;">{{ $member->profile->introduction }}</p>
          </div>
          </div>
        </div>
      </li>
      @else
      <li>
        <div class="row align-items-start pt-3 pr-3 pl-3 pb-0">
          <div class="col-2 pl-0 pr-2">
            <img src="{{ $member->image_path }}" alt="" class="member-icon_48px rounded-circle">
          </div>
          <div class="row col border-bottom pb-2 align-items-center cricle-member-name">
            <div class="col pl-0">
              <a href="{{ route('profile.show', [ $member->profile->id ]) }}" style="text-decoration: none;">
                  <p class="mb-0 text-fz-green text-fz-14px line-1">{{ $member->profile->name }}</p>
              </a>
            </div>
            <div class="col-7 p-0">
              <p class="card-text--ellipsis text-fz-14px text-black-50 mb-0" style="line-height: 1.71;">{{ $member->profile->introduction }}</p>
            </div>
          </div>
        </div>
      </li>
      @endif
    @endforeach
    </ul>
  </div>
</section>
<section class="bg-white shadow-sm mb-3 pt-4 pb-3">
  <div class="container col-md-8 col-lg-6">
    <h2 class="h2 h2--extend -crown">あなたへのおすすめサークル</h2>
    <ul class="scrollable-list pl-0 ib-list d-flex">
    @foreach($circles as $circle)
    <li class="d-inline-block mr-2 ">
      <a href="{{ route('circle.show', [ $circle->id ]) }}" class="card card--circle hov--default border-0" >
        <h4 class="mb-2 line-1 hov--default" style="font-size: 13px; font-weight: bold;">{{ $circle->genres[0]->name }}サークル</h4>
        @if($circle->image)
          <img src="{{ $circle->image_path }}" class="card-img-top card-img-top--list">
        @else
          <img src="{{ Illuminate\Support\Facades\Storage::disk('s3')->url('UserImages/no_image.jpeg') }}" class="card-img-top card-img-top--list">
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
<!-- メンバー申請・フォロー -->
@if($approval!=2)
<section>
  <nav class="fixed-bottom" style="padding-bottom: 85px;">
    <div class="container col-md-8 col-lg-6">
      <div class="d-flex justify-content-around" style="margin-bottom:24px">
        @if($circle->request_required==0)
        <a id="apply_btn" class="btn btn-primary--grad text-white mr-2" @if(Auth::check()) data-toggle="modal" @else href="{{ route('login') }}" @endif 
        data-target="#application-modal" data-approval="{{ $approval }}">メンバー申請</a>
        @else
        <a id="apply_btn" class="btn btn-primary--grad text-white mr-2" @if(Auth::check()) data-toggle="modal" @else href="{{ route('login') }}" @endif 
        data-target="#application-modal" data-approval="{{ $approval }}">メンバーになる</a>
        @endif
        <a href="" class="btn btn-primary--grad btn-primary--grad--outline w-40">フォロー</a>
      </div>
    </div>
  </nav>

  
  <!-- モーダル -->
  <div class="modal fade " id="application-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog bg-gray h-" role="document">
      <div class="modal-content bg-gray border-0 h-100">
        <div class="modal-body card bg-gray h-100">
          <div class="bg-gray d-flex align-items-center">
            <button type="button" class="close pl-0 pr-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="font-size:30px;">&times;</span>
            </button>
            @if($circle->request_required==0)
              <h6 class="text-fw-bold text-center m-0 mx-auto align-middle" id="exampleModalLabel">メンバー申請</h6>
            @else
              <h6 class="text-fw-bold text-center m-0 mx-auto align-middle" id="exampleModalLabel">メンバーになる</h6>
            @endif
          </div>
          <form action="/circle_user/apply" class="create_circle" id="store_message" enctype="multipart/form-data"
          accept-charset="UTF-8" method="post" name="apply">
          {{ csrf_field() }}
          <textarea name="msg" id="application" class="border-0 rounded mt-3 mb-3 w-100" cols="30" rows="10" placeholder="{{ $circle->description_template }}"></textarea>
          <div class="align-items-center">
            <a href="javascript:apply.submit()" class="btn btn-primary--grad text-white mx-auto">メンバー申請を送信</a>
          </div>
          <input type="hidden" name="circle_id" value="{{ $circle->id }}" class="circle_id">
          <input type="hidden" name="user_id" value="{{ Auth::id() }}" class="user_id">
          <input type="hidden" name="msg_type" value="msg" class="msg_type">
          <input type="hidden" name="board_id" value="{{ $board->id }}" class="board_id">
          </form>
        </div>
      </div>
    </div>
</div>
</section>
@endif
<script>

$(window).on('load', function() {
  //必須項目をひとつずつチェック
  var approval = $('#apply_btn').attr('data-approval');
  //全て埋まっていたら
  if (approval == 1) {
    //送信ボタンを閉じる
    $('#apply_btn').addClass('disabled');
  }
  
});



</script>
@endsection