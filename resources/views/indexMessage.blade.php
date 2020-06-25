@extends('layouts.app')

@section('edit-button')
    <a href="javascript:history.back()" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
    
    
@endsection
@section('content')
@if(session()->has('message'))
<div class="modal-view" id="sampleModal" style="position: relative; z-index: 10001;">
    <div class="modal-view-fade-in">
        <div class="modal-view-overAll">
            <div class="modal-view-overlay">
            </div>
            <div class="modal-view-dialog">
                <div class="modal-view-content">
                    <div class="modal-view-header" style="position: relative; z-index: 10001;">
                    </div>
                    <div class="modal-view-body">
                        <p class="mt-3">{{ session('message') }}</p>
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
<div class="h-main100vh">
    <div class="container col-md-8 col-lg-6">
        <h6 class="h6--list-title text-fz-14px text-black-50 pt-2">CIRCLE MESSAGES</h6>
    </div>
    <div class="bg-white h-100 mb-2">
        <div class="container col-md-8 col-lg-6 h-100">
            <ul class="list-unstyled mb-0">
            @if(!empty($c_boards[0]))
                @foreach($c_boards as $c_board)
                <li >
                    <a href="/message/board/{{ $c_board->id }}" class="hov--default">
                        <div class="row justify-content-around align-items-center pt-3 pb-3 border-bottom" >
                            <div class="col-2 pr-1">
                                <img src="{{ $c_board->circle->image_path }}" alt="" class="rounded-circle member-icon_48px">
                            </div>
                            <div class="col-8 pl-3 pr-2 board_info">
                                <p class="mb-1 line-1 position-relative mr-4">
                                    <span class="badge badge-light">{{ $c_board->circle->name }}</span>
                                </p>
                                <span class="position-absolute position--messagenum">（{{ $c_board->users->count() }}）</span>
                                <p class="text-fz-14px text-black-20 mb-0 line-2">{!! strip_tags($c_board->last_msg) !!}</p>
                            </div>
                            <div class="col-2 p-0 align-self-start">
                                <p class="text-fz-small text-black-20 mb-0 text-center">{{ $c_board->last_date }}</p>
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
                                メッセージはありません
                            </p>
                        </div>
                    </div>
                </li>
            @endif
            </ul>
        </div>
    </div>

    <div class="container col-md-8 col-lg-6">
        <h6 class="h6--list-title text-fz-14px text-black-50">DIRECT MESSAGES</h6>
    </div>
    <div class="bg-white h-100 mb-2">
        <div class="container col-md-8 col-lg-6 h-100">
            <ul class="list-unstyled mb-0">
                @if(!empty($u_boards[0]))
                    @foreach($u_boards as $u_board)
                    <li>
                        <a href="/message/board/{{ $u_board->id }}" class="hov--default">
                            <div class="row justify-content-around align-items-center pt-3 pb-3 border-bottom">
                                <div class="col-2 pr-1">
                                    @if($u_board->otherUser->profile->user_image)
                                    <img src="{{ $u_board->otherUser->image_path }}" alt="" class="rounded-circle member-icon_48px">
                                    @else
                                    <img src="{{ Illuminate\Support\Facades\Storage::disk('s3')->url('UserImages/no_image.jpeg') }}" alt="" class="rounded-circle member-icon_48px">
                                    @endif
                                </div>
                                <div class="col-8 pl-3 pr-2">
                                    <p class="mb-1 line-1 position-relative mr-4" style="overflow:scroll;">
                                        <span class="badge badge-light">{{ $u_board->circle->name }}</span>
                                    </p>
                                    <span class="position-absolute position--messagenum">（{{ $u_board->users->count() }}）</span>
                                    <p class="text-fz-14px text-black-20 mb-0 line-2">{{ $u_board->otherUser->profile->familyName }}{{ $u_board->otherUser->profile->firstName }}</p>
                                </div>
                                <div class="col-2 p-0 align-self-start">
                                    <p class="text-fz-small text-black-20 mb-0 text-center">{{ $u_board->last_date }}</p>
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
                                    メッセージはありません
                                </p>
                            </div>
                        </div>
                    </li>
                @endif
                
            </ul>
        </div>
    </div>
</div>
<script>

</script>
@endsection