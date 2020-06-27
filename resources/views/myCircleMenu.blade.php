@extends('layouts.app')

@section('edit-button')
    <a href="javascript:history.back()" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
    
    
@endsection
@section('content')
<div class="container col-md-8 col-lg-6">
    <h6 class="h6--list-title text-fz-14px text-black-50 pt-3_5">{{ $circle->name }}サークルメニュー</h6>
</div>
<div class="bg-white mb-3_5 shadow-sm">
    <div class="container col-md-8 col-lg-6 p-0">
        <ul class="nav flex-column">
            <li class="nav-item p-3"><a href="{{ route('circle.show', [ $circle->id ]) }}" class="nav-link text-dark p-0 line-height-2  text-fz-18px">ホーム</a></li>
            <li class="nav-item p-3"><a href="/message/board/{{ $circle->board->id }}" class="nav-link text-dark p-0 line-height-2  text-fz-18px">メッセージ</a></li>
            <li class="nav-item p-3"><a href="/circle//members" class="nav-link text-dark p-0 line-height-2  text-fz-18px">メンバー</a></li>
        </ul>
    </div>
</div>
<div class="container col-md-8 col-lg-6">
    <h6 class="h6--list-title text-fz-14px text-black-50">管理人メニュー</h6>
</div>
<div class="bg-white mb-3_5 shadow-sm">
    <div class="container col-md-8 col-lg-6 p-0">
        <ul class="nav flex-column">
            <li class="nav-item p-3"><a href="/circle/{{ $circle->id }}/edit" class="nav-link text-dark p-0 line-height-2  text-fz-18px">サークルの編集</a></li>
            <li class="nav-item p-3"><a href="#" class="nav-link text-dark p-0 line-height-2 text-fz-18px">メンバーを招待</a></li>
            <li class="nav-item p-3">
                <form action="{{ route('circle.delete', [ $circle->id ]) }}" id="form_{{ $circle->id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                    <a class="nav-link text-dark p-0 line-height-2 text-fz-18px circle-delete" data-id="{{ $circle->id }}" onclick="deletePost(this);" href="#" >サークルの削除</a>
                </form>
            </li>
        </ul>
    </div>
</div>
<script>
function deletePost(e) {
    'use strict';

    if (confirm('本当に削除していいですか?')) {
    document.getElementById('form_' + e.dataset.id).submit();
    }
} 
</script>
@endsection