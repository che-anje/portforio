@extends('layouts.no-footer')

@section('edit-button')
    <a href="javascript:history.back()" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
@endsection

@section('content')
<div class="bg-white shadow-sm mb-4">
    <div class="container col-md-8 col-lg-6">
      <div class="row align-items-center p-3">
        <div class="col-3 pl-0 pr-2">
          <img class="member-icon_72px" alt="User Image" src="/storage/UserImages/{{ $profile->user_image }}" />
        </div>
        <div class="col align-items-center cricle-member-name">
          <div class="col p-0">
            <p class="text-fw-bold text-fz-18px mb-2_5">{{ $profile->familyName }} {{$profile->firstName}}</p>
            <p class="text-fz-green text-fz-14px mb-2_5">{{ $profile->name }}</p>
            <a href="{{ route('profile.show', ['id' => $profile->id]) }}" class="text-black-20">プロフィールをもっと見る</a>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div class="container col-md-8 col-lg-6">
      <h6 class="h6--list-title text-fz-14px text-black-50">サークル</h6>
    </div>
    <section class="bg-white shadow-sm mb-3">
      <div class="container col-md-8 col-lg-6">
        <ul class="list-unstyled row mb-0 nav nav-pills" id="pills-tab2" role="tablist">
          <li class="col text-center show-tab-circle mypage__event active"><a class="pt-3 active d-block pb-2_5 nav-link--gray-soft" id="pills-circle-tab" data-toggle="pill" href="#pills-circle" aria-selected="true" role="tab" aria-controls="pills-circle">マイサークル</a></li>
          <li class="col text-center show-tab-circle mypage__event"><a class="pt-3 pb-2_5 d-block nav-link--gray-soft" id="pills-followcircle-tab" data-toggle="pill" href="#pills-followcircle" aria-selected="false" role="tab" aria-controls="pills-followcircle">フォロー中</a></li>
        </ul>
        <div class="tab-content" id="pills-tabContent--circle">
            <div class="tab-pane fade show active" id="pills-circle" role="tabpanel" aria-labelledby="pills-circle">
              <ul class="list-group list-group--event pt-3">
                  <li class="list-group-item list-group--item-event border-top-0 pt-2 pr-0 pl-0">
  <a href="/circle/34196" class="hov--default">
    <div class="row align-items-center">
      <div class="col-6">
        <img class="card-img-top w-100 card-img-top--list_profileevent" alt="A" onerror="/images/ja2/img_noimage.gif" src="https://image.tunagate.com/circles/main_images/000/034/196/medium/70E7600A-D2A8-4E2E-B9F8-75A54476229F.jpeg?1583924940" />
      </div>
      <div class="col pl-0 position-relative">
        <p class="btn-sm text-fz-xs bg-orange text-white mb-0 float-right">管理者</p>
        
        
        <h6 class="h6--list-title position-relative mb-2 profile-event__title line-2">A</h6>
        <div class="row no-gutters">
          <p class="mb-2 icon icon-area mr-2_5">秋田県</p>
          <p class="mb-2 icon icon-member">2</p>
        </div>
      </div>
    </div>
  </a>
</li>
                  <li class="list-group-item list-group--item-event border-top-0 pt-2 pr-0 pl-0">
  <a href="/circle/34439" class="hov--default">
    <div class="row align-items-center">
      <div class="col-6">
        <img class="card-img-top w-100 card-img-top--list_profileevent" alt="B" onerror="/images/ja2/img_noimage.gif" src="https://image.tunagate.com/circles/main_images/000/034/439/medium/56FD519E-07A9-40F5-AD31-24EA0CDEE68E.jpeg?1584348029" />
      </div>
      <div class="col pl-0 position-relative">
        <p class="btn-sm text-fz-xs bg-orange text-white mb-0 float-right">管理者</p>
        
        
        <h6 class="h6--list-title position-relative mb-2 profile-event__title line-2">B</h6>
        <div class="row no-gutters">
          <p class="mb-2 icon icon-area mr-2_5">北海道</p>
          <p class="mb-2 icon icon-member">1</p>
        </div>
      </div>
    </div>
  </a>
</li>
                  <li class="list-group-item list-group--item-event border-top-0 pt-2 pr-0 pl-0">
  <a href="/circle/34099" class="hov--default">
    <div class="row align-items-center">
      <div class="col-6">
        <img class="card-img-top w-100 card-img-top--list_profileevent" onerror="/images/ja2/img_noimage.gif" src="https://tunagate.com/images/ja2/img_noimage.gif" />
      </div>
      <div class="col pl-0 position-relative">
        <p class="btn-sm text-fz-xs bg-orange text-white mb-0 float-right">管理者</p>
        <p class="mr-2 btn-sm text-fz-xs bg-orange text-white mb-0 float-right">下書き</p>
        
        <h6 class="h6--list-title position-relative mb-2 profile-event__title line-2"></h6>
        <div class="row no-gutters">
          <p class="mb-2 icon icon-area mr-2_5"></p>
          <p class="mb-2 icon icon-member">1</p>
        </div>
      </div>
    </div>
  </a>
</li>
              </ul>
                  <hr class="mt-0 mb-3">
                  <p class="text-center mb-0 pb-3"><a href="my/circles" class="link--next text-black-20">マイサークルをもっと見る</a></p>
            </div>
        </div>

      </div>
    </section>

    <div class="container col-md-8 col-lg-6">
      <h6 class="h6--list-title text-fz-14px text-black-50">イベント</h6>
    </div>
    <section class="bg-white shadow-sm mb-4">
      <div class="container col-md-8 col-lg-6">
        <ul class="list-unstyled row mb-0 nav nav-pills" id="pills-tab" role="tablist">
          <li class="col text-center show-tab-event mypage__event active"><a class="pt-3 d-block pb-2_5 nav-link--gray-soft" id="pills-circle-event-tab" data-toggle="pill" href="#pills-circle-event" aria-selected="true" role="tab" aria-controls="pills-circle-event">マイサークル</a></li>
          <li class="col text-center show-tab-event mypage__event"><a class="pt-3 d-block pb-2_5 nav-link--gray-soft" id="pills-follow-circle-event-tab" data-toggle="pill" href="#pills-follow-circle-event" aria-selected="true" role="tab" aria-controls="pills-follow-circle-event">フォロー</a></li>
          <li class="col text-center show-tab-event mypage__event"><a class="pt-3 d-block pb-2_5 nav-link--gray-soft" id="pills-event-tab" data-toggle="pill" href="#pills-event" aria-selected="false" role="tab" aria-controls="pills-event">参加予定</a></li>
          <li class="col text-center show-tab-event mypage__event"><a class="pt-3 pb-2_5 d-block nav-link--gray-soft" id="pills-pastevent-tab" data-toggle="pill" href="#pills-pastevent" aria-selected="false" role="tab" aria-controls="pills-pastevent">過去に参加</a></li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-circle-event" role="tabpanel" aria-labelledby="pills-circle-event">
              <li class="list-group-item list-group--item-event border-top-0 pr-0 pl-0 pt-0">
              <p class="text-center pt-5 pb-2" style="color:rgba(0, 0, 0, 0.54);">マイサークルはありません。</p>
              <p class="text-center pt-2 pb-2" style="color:rgba(0, 0, 0, 0.54);"><a href="/search/aichi">興味のあるサークルを検索してみよう！！</a></p>
              </li>
            </div>
            <div class="tab-pane fade" id="pills-follow-circle-event" role="tabpanel" aria-labelledby="pills-circle-event">
              <ul class="list-group list-group--event">
                  <li class="list-group-item list-group--item-event border-top-0 pr-0 pl-0 pt-0 " style="margin-top: 16px;">

  <div class="p-0" style="float: right;">
    <div style="color: black;">
    </div>
  </div>
    <a class="hov--default display-block" href="/circle/7986/events/92184">
    <div class="row">
      <div class="col-8">
        <h6 class="h6--list-title mb-1 position-relative line-2" style="top: -6px;"><span class="badge badge-light">イベント</span> 22-34歳！名古屋友達作りサークルうぃんぐ交流会！1人参加が90％！</h6>
        <div class="d-flex scrollable-list">
              <p class="btn btn-outline-primary btn-outline-blue btn-sm btn-sm--expand mr-2 d-inline-block text-fz-xs">友達づくり</p>
              <p class="btn btn-outline-primary btn-outline-blue btn-sm btn-sm--expand mr-2 d-inline-block text-fz-xs">飲み会</p>
              <p class="btn btn-outline-primary btn-outline-blue btn-sm btn-sm--expand mr-2 d-inline-block text-fz-xs">雑談</p>
        </div>
        <div class="row no-gutters">
            <p class="mb-2 icon icon-area mr-2_5">愛知県</p>
          
            <p class="mb-2 icon icon-member">0</p>
        </div>
        <p class="icon icon-carender mb-0">6/20(土) 17:00~</p>
        <p class="text-black-50 text-fz-small mt-2 mb-0 line-1">[サークル] 新規設立！名古屋友達作り社会人サークルうぃんぐ/すぴか/りーぷ/じゃんぷ</p>
      </div>

      <div class="col-4 pl-0">
        <div class="adjust-box adjust-box-4x3">
          <img
            class="object-fit-cover w-100 rounded adjust-box-inner"
            src="https://image.tunagate.com/events/main_images/000/092/184/medium/5CCAF7CD-2711-4B33-AE3E-FEDBE7843759.jpeg?1583481993"
            alt="新規設立！名古屋友達作り社会人サークルうぃんぐ/すぴか/りーぷ/じゃんぷ"
            onerror="this.src='/images/ja2/img_noimage.gif'"
          >
            <!-- <h2>募集中</h2> 募集中のバナーがあれば良いかも -->
        </div>
      </div>
    </div>
  </a>
</li>
                  <li class="list-group-item list-group--item-event border-top-0 pr-0 pl-0 pt-3 " style="">

  <div class="p-0" style="float: right;">
    <div style="color: black;">
    </div>
  </div>
    <a class="hov--default display-block" href="/circle/7986/events/90996">
    <div class="row">
      <div class="col-8">
        <h6 class="h6--list-title mb-1 position-relative line-2" style="top: -6px;"><span class="badge badge-light">イベント</span> 30-38歳！名古屋友達作りサークルりーぷ交流会！1人参加が90％！</h6>
        <div class="d-flex scrollable-list">
              <p class="btn btn-outline-primary btn-outline-blue btn-sm btn-sm--expand mr-2 d-inline-block text-fz-xs">友達づくり</p>
              <p class="btn btn-outline-primary btn-outline-blue btn-sm btn-sm--expand mr-2 d-inline-block text-fz-xs">飲み会</p>
              <p class="btn btn-outline-primary btn-outline-blue btn-sm btn-sm--expand mr-2 d-inline-block text-fz-xs">雑談</p>
        </div>
        <div class="row no-gutters">
            <p class="mb-2 icon icon-area mr-2_5">愛知県</p>
          
            <p class="mb-2 icon icon-member">0</p>
        </div>
        <p class="icon icon-carender mb-0">6/7(日) 17:00~</p>
        <p class="text-black-50 text-fz-small mt-2 mb-0 line-1">[サークル] 新規設立！名古屋友達作り社会人サークルうぃんぐ/すぴか/りーぷ/じゃんぷ</p>
      </div>

      <div class="col-4 pl-0">
        <div class="adjust-box adjust-box-4x3">
          <img
            class="object-fit-cover w-100 rounded adjust-box-inner"
            src="https://image.tunagate.com/events/main_images/000/090/996/medium/DD92D115-6853-42CC-B206-076342EBBE30.jpg?1582273167"
            alt="新規設立！名古屋友達作り社会人サークルうぃんぐ/すぴか/りーぷ/じゃんぷ"
            onerror="this.src='/images/ja2/img_noimage.gif'"
          >
            <!-- <h2>募集中</h2> 募集中のバナーがあれば良いかも -->
        </div>
      </div>
    </div>
  </a>
</li>
                  <li class="list-group-item list-group--item-event border-top-0 pr-0 pl-0 pt-3 " style="">

  <div class="p-0" style="float: right;">
    <div style="color: black;">
    </div>
  </div>
    <a class="hov--default display-block" href="/circle/7986/events/90997">
    <div class="row">
      <div class="col-8">
        <h6 class="h6--list-title mb-1 position-relative line-2" style="top: -6px;"><span class="badge badge-light">イベント</span> 他県出身者限定！22-34歳！名古屋友達作りサークルすぴか交流会！1人参加が90％！</h6>
        <div class="d-flex scrollable-list">
              <p class="btn btn-outline-primary btn-outline-blue btn-sm btn-sm--expand mr-2 d-inline-block text-fz-xs">友達づくり</p>
              <p class="btn btn-outline-primary btn-outline-blue btn-sm btn-sm--expand mr-2 d-inline-block text-fz-xs">飲み会</p>
              <p class="btn btn-outline-primary btn-outline-blue btn-sm btn-sm--expand mr-2 d-inline-block text-fz-xs">雑談</p>
        </div>
        <div class="row no-gutters">
            <p class="mb-2 icon icon-area mr-2_5">愛知県</p>
          
            <p class="mb-2 icon icon-member">0</p>
        </div>
        <p class="icon icon-carender mb-0">6/7(日) 16:00~</p>
        <p class="text-black-50 text-fz-small mt-2 mb-0 line-1">[サークル] 新規設立！名古屋友達作り社会人サークルうぃんぐ/すぴか/りーぷ/じゃんぷ</p>
      </div>

      <div class="col-4 pl-0">
        <div class="adjust-box adjust-box-4x3">
          <img
            class="object-fit-cover w-100 rounded adjust-box-inner"
            src="https://image.tunagate.com/events/main_images/000/090/997/medium/DD92D115-6853-42CC-B206-076342EBBE30.jpg?1582273218"
            alt="新規設立！名古屋友達作り社会人サークルうぃんぐ/すぴか/りーぷ/じゃんぷ"
            onerror="this.src='/images/ja2/img_noimage.gif'"
          >
            <!-- <h2>募集中</h2> 募集中のバナーがあれば良いかも -->
        </div>
      </div>
    </div>
  </a>
</li>
              </ul>
                <hr class="mt-0 mb-3">
                <p class="text-center mb-0 pb-3"><a href="following_circle/events" class="link--next text-black-20">フォローサークルのイベントをもっと見る</a></p>
            </div>
            <div class="tab-pane fade" id="pills-event" role="tabpanel" aria-labelledby="pills-event">
              <li class="list-group-item list-group--item-event border-top-0 pr-0 pl-0 pt-0">
              <p class="text-center pt-5 pb-2" style="color:rgba(0, 0, 0, 0.54);">参加予定イベントはありません。</p>
              <p class="text-center pt-2 pb-2" style="color:rgba(0, 0, 0, 0.54);"><a href="#pills-circle-tab">マイサークルからイベントに参加してみよう！！</a></p>
              </li>
            </div>
            <div class="tab-pane fade" id="pills-pastevent" role="tabpanel" aria-labelledby="pills-pastevent">
              <li class="list-group-item list-group--item-event border-top-0 pr-0 pl-0 pt-0">
              <p class="text-center pt-5 pb-2" style="color:rgba(0, 0, 0, 0.54);">過去に参加したイベントはありません。</p>
              <p class="text-center pt-2 pb-2" style="color:rgba(0, 0, 0, 0.54);"><a href="#pills-circle-tab">マイサークルからイベントに参加してみよう！！</a></p>
              </li>
            </div>
        </div>
      </div>
    </section>

  

  <div class="bg-white shadow-sm">
    <div class="container col-md-8 col-lg-6 p-0">
      <ul class="nav flex-column">
        <li class="nav-item p-3"><a href="/circles/new" class="nav-link text-dark p-0 line-height-2  text-fz-18px">サークルをつくる</a></li>
        <li class="nav-item p-3"><a href="/member/profile/1812366064815" class="nav-link text-dark p-0 line-height-2  text-fz-18px">マイプロフィール</a></li>
        <li class="nav-item p-3"><a href="/mypage/management" class="nav-link text-dark p-0 line-height-2  text-fz-18px">サークル・アカウント管理</a></li>
        <li class="nav-item p-3"><a class="nav-link text-dark p-0 line-height-2  text-fz-18px" href="/users/edit">プロフィール設定</a></li>
        <li class="nav-item p-3"><a href="/inquiry" class="nav-link text-dark p-0 line-height-2  text-fz-18px">お問い合わせ・ご要望</a></li>
        <li class="nav-item p-3">
            <a href="#" class="nav-link text-dark p-0 line-height-2  text-fz-18px" rel="nofollow"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                ログアウト
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
      </ul>
    </div>
  </div>

@endsection