@extends('layouts.app')

@section('edit-button')
    <a href="javascript:history.back()" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
    @if(Auth::user()->id === $my_profile->user_id)
    <a href="/profile/edit" class="position-absolute position--headerright
     text-black-20 text-fz-14px">
        編集
    </a>
    @endif
@endsection

@section('content')
@if (session('flash_message'))
<div class="modal-view" style="position: relative; z-index: 10001;">
  <div class="modal-view-fade-in">
    <div class="modal-view-overAll">
      <div class="modal-view-overlay">
      </div>
      <div class="modal-view-dialog">
        <div class="modal-view-content">
          <div class="modal-view-header" style="position: relative; z-index: 10001;">
            <p style="margin: 0px 15px 6px">
              <strong>お知らせ</strong>
            </p>
          </div>
          <div class="modal-view-body">
            <p>{{ session('flash_message') }}</p>
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
<div class="shadow-sm mb-4 bg-white pt-3_5 pb-3 h-100">
    <div class="container col-md-8 col-lg-6">
        <div class="profile-img mr-auto ml-auto mb-4">
        @if($my_profile->user_image)
            <img class="rounded-circle w-100" src="/storage/UserImages/{{ $my_profile->user_image }}" style="height: 160px; object-fit: cover;" />
        @else
            <img class="rounded-circle w-100" src="/storage/UserImages/no_image.jpeg" />
        @endif
        </div>
        <div class="d-flex justify-content-center">
            <h4 class="text-fw-bold text-center mb-2 mr-2">{{$my_profile->familyName}}</h4>
            <h4 class="text-fw-bold text-center mb-2">{{$my_profile->firstName}}</h4>
        </div>
        <div class="text-center">
            <p class="d-inline-block text-fw-bold link--green mr-2">{{$my_profile->name}}</p>
            <p class="d-inline-block mr-1_5">{{ $age }}歳</p>
            <p class="d-inline-block">{{ $gender }}</p>
        </div>
        <div class="mb-3 text-center">
        </div>
        <p><p>{{$my_profile->introduction}}</p></p>
    </div>
</div>

<div class="container col-md-8 col-lg-6">
    <h6 class="h6--list-title text-fz-14px text-black-50">参加サークル</h6>
</div>
@if(!empty($circles[0]))
<div class="bg-white h-100 mb-3_5 shadow-sm">
    <div class="container col-md-8 col-lg-6">
        <ul class="scrollable-list list-group list-group--event" style="max-height:650px;">
          @foreach($circles as $circle)
            <li class="list-group-item list-group--item-event border-bottom-0 border-top-0 pt-3 pr-0 pl-0">
                <a class="hov--default" href="{{ route('circle.show', [ $circle->id ]) }}">
                    <div class="row align-items-center">
                        <div class="col-6">
                        <img class="card-img-top w-100 card-img-top--list_profileevent" src="/storage/CircleImages/{{ $circle->image }}">
                        </div>
                        <div class="col pl-0 position-relative">
                          @if($circle->admin_user_id == $my_profile->user_id)
                            <p class="btn-sm text-fz-xs bg-orange text-white mb-0 float-right">管理者</p>
                          @endif
                            <h6 class="h6--list-title position-relative mb-2 profile-event__title line-2">{{ $circle->name }}</h6>
                            <div class="row no-gutters profile-circle">
                                <i class="fas fa-map-marker-alt mr-3 d-flex" style="color: mediumorchid;"><p>{{ $circle->prefecture->name }}</p></i>
                                <i class="fas fa-user-friends mr-3 d-flex" style="color: mediumorchid;"><p>{{ $circle->count }}</p></i>
                            </div>
                        </div>
                    </div>
                </a> 
            </li>
          @endforeach
        </ul>
    </div>
</div>
@else
<div class="bg-white h-100 shadow-sm">
  <div class="container col-md-8 col-lg-6">
    <li class="list-group-item list-group--item-event border-bottom-0 border-top-0 pt-3 pr-0 pl-0">
      <div class="row align-items-center col-8 mx-auto">
        <p class="mb-0 line-1 position-relative  font-weight-bold mx-auto ">
          参加サークルはありません
        </p>
      </div>
    </li>
  </div>
</div>
@endif
@endsection