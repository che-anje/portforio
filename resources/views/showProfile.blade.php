@extends('layouts.app')

@section('edit-button')
    <a href="" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
    <a href="/profile/edit" class="position-absolute position--headerright
     text-black-20 text-fz-14px">編集</a>
@endsection

@section('content')
<div class="shadow-sm mb-4 bg-white pt-3_5 pb-3 h-100">
    <div class="container col-md-8 col-lg-6">
        <div class="profile-img mr-auto ml-auto mb-4">
          <img class="rounded-circle w-100" src="https://image.tunagate.com/users/avatars/000/117/176/medium/3ECA8997-413A-447D-A5A4-57547CD8B346.jpeg?1584270278" />
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
<div class="bg-white h-100 mb-3_5 shadow-sm">
    <div class="container col-md-8 col-lg-6">
        <ul class="list-group list-group--event ">
            <li class="list-group-item list-group--item-event border-bottom-0 border-top-0 pt-3 pr-0 pl-0">
                <a class="hov--default" href="/circle/34196">
                    <div class="row align-items-center">
                        <div class="col-6">
                        <img class="card-img-top w-100 card-img-top--list_profileevent" src="https://image.tunagate.com/circles/main_images/000/034/196/medium/70E7600A-D2A8-4E2E-B9F8-75A54476229F.jpeg?1583924940">
                        </div>
                        <div class="col pl-0 position-relative">
                            <p class="btn-sm text-fz-xs bg-orange text-white mb-0 float-right">管理者</p>
                            <h6 class="h6--list-title position-relative mb-2 profile-event__title line-2">A</h6>
                            <div class="row no-gutters profile-circle">
                                <i class="fas fa-map-marker-alt mr-3 d-flex"><p>秋田県</p></i>
                                <i class="fas fa-user-friends mr-3 d-flex"><p>2</p></i>
                            </div>
                        </div>
                    </div>
                </a> 
            </li>
        </ul>
    </div>
</div>

@endsection