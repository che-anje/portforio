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
        @if($profile->user_image)
            <img class="member-icon_72px" alt="User Image" src="{{ $profile->image_path }}" />
        @else
            <img class="member-icon_72px" alt="User Image" src="{{ Illuminate\Support\Facades\Storage::disk('s3')->url('UserImages/no_image.jpeg') }}" />
        @endif
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
          <li class="col text-center show-tab-circle mypage__event active"><a class="pt-3 active d-block pb-2_5 nav-link--gray-soft text-black-20" id="pills-circle-tab" data-toggle="pill" href="#pills-circle" aria-selected="true" role="tab" aria-controls="pills-circle">マイサークル</a></li>
          <li class="col text-center show-tab-circle mypage__event"><a class="pt-3 pb-2_5 d-block nav-link--gray-soft text-black-20" id="pills-followcircle-tab" data-toggle="pill" href="#pills-followcircle" aria-selected="false" role="tab" aria-controls="pills-followcircle">フォロー中</a></li>
        </ul>
        <div class="tab-content" id="pills-tabContent--circle">
          <div class="tab-pane fade show active" id="pills-circle" role="tabpanel" aria-labelledby="pills-circle">
            <ul class="scrollable-list list-group list-group--event pt-3" style="max-height:650px;">
            @if(!empty($circles[0]))
              @foreach($circles as $circle)
                <li class="list-group-item list-group--item-event border-top-0 pt-2 pr-0 pl-0">
                  <a href="{{ route('circle.show',$circle->id) }}" class="hov--default">
                    <div class="row align-items-center">
                      <div class="col-6">
                        <img class="card-img-top w-100 card-img-top--list_profileevent" alt="A"  src="{{ $circle->image_path }}" />
                      </div>
                      <div class="col pl-0 position-relative">
                        @if($user->id == $circle->admin_user_id)
                        <p class="btn-sm text-fz-xs bg-orange text-white mb-0 float-right">管理者</p>
                        @endif
                        <h6 class="h6--list-title position-relative mb-2 profile-event__title line-2">{{ $circle->name }}</h6>
                        <div class="row no-gutters">
                        <i class="fas fa-map-marker-alt mr-2 d-flex" style="font-size: 0.8em; color: mediumorchid;">
                        <p class="ml-2 mb-2 icon icon-area mr-2_5 hov--default">{{ $circle->prefecture->name }}</p></i>
                        <i class="fas fa-user-friends mr-3 d-flex" style="font-size: 0.8em; color: mediumorchid;">
                        <p class="ml-2 mb-2 icon icon-member hov--default">{{ $circle->count }}</p></i>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
              @endforeach
            @else
                <li>
                    <div class="row justify-content-around align-items-center pt-3 pb-3 border-bottom">
                        <div class="col-8 pl-3 pr-2 text-center">
                            <p class="mb-0 line-1 position-relative mr-3 font-weight-bold">
                                参加サークルはまだありません
                            </p>
                        </div>
                    </div>
                </li>
            @endif
            </ul>
          </div>
        </div>
      </div>
    </section>
  <div class="bg-white shadow-sm">
    <div class="container col-md-8 col-lg-6 p-0">
      <ul class="nav flex-column">
        <li class="nav-item p-3"><a href="/circles/new" class="nav-link text-dark p-0 line-height-2  text-fz-18px">サークルをつくる</a></li>
        <li class="nav-item p-3"><a href="{{ route('profile.show', ['id' => $profile->id]) }}" class="nav-link text-dark p-0 line-height-2  text-fz-18px">マイプロフィール</a></li>
        <li class="nav-item p-3"><a href="/etcetera?word=サークルアカウント管理" class="nav-link text-dark p-0 line-height-2  text-fz-18px">サークル・アカウント管理</a></li>
        <li class="nav-item p-3"><a href="/profile/edit" class="nav-link text-dark p-0 line-height-2  text-fz-18px">プロフィール設定</a></li>
        <li class="nav-item p-3"><a href="/etcetera?word=お問い合わせ・ご要望" class="nav-link text-dark p-0 line-height-2  text-fz-18px">お問い合わせ・ご要望</a></li>
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