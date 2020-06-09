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
            <li class="nav-item p-3"><a href="#" class="nav-link text-dark p-0 line-height-2  text-fz-18px">イベントを作る</a></li>
            <li class="nav-item p-3"><a href="#" class="nav-link text-dark p-0 line-height-2  text-fz-18px">イベント管理</a></li>
            <li class="nav-item p-3"><a href="/message" class="nav-link text-dark p-0 line-height-2  text-fz-18px">メッセージ</a></li>
            <li class="nav-item p-3"><a href="#" class="nav-link text-dark p-0 line-height-2  text-fz-18px">アルバム</a></li>
            <li class="nav-item p-3"><a href="/circle//members" class="nav-link text-dark p-0 line-height-2  text-fz-18px">メンバー</a></li>
            <li class="nav-item p-3"><a href="#" class="nav-link text-dark p-0 line-height-2  text-fz-18px">ブログ・ノート</a></li>
            <li class="nav-item p-3"><a href="#" class="nav-link text-dark p-0 line-height-2  text-fz-18px">招待用QRコード</a></li>
            <li class="nav-item p-3"><a href="#" class="nav-link text-dark p-0 line-height-2  text-fz-18px">報告する </a></li>
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
            <li class="nav-item p-3"><a href="#" class="nav-link text-dark p-0 line-height-2  text-fz-18px">月会費サークルへの変更</a></li>
            <li class="nav-item p-3"><a href="#" class="nav-link text-dark p-0 line-height-2  text-fz-18px">サークル売り上げ管理</a></li>
            <li class="nav-item p-3"><a href="#" class="nav-link text-dark p-0 line-height-2 text-fz-18px">決済代行売上リスト</a></li>
            <li class="nav-item p-3"><a href="#" class="nav-link text-dark p-0 line-height-2 text-fz-18px">メンバーを招待</a></li>
            <li class="nav-item p-3"><a href="#" class="nav-link text-dark p-0 line-height-2 text-fz-18px">クオリティステータス</a></li>
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
<div class="container col-md-8 col-lg-6">
<h6 class="h6--list-title text-fz-14px text-black-50">サークルプラン</h6>
</div>
<div class="bg-white mb-3_5 shadow-sm">
    <div class="container col-md-8 col-lg-6 p-0">
        <ul class="nav flex-column">
            <li class="nav-item p-3"><a href="#" class="nav-link text-dark p-0 line-height-2  text-fz-18px">有料プランのおすすめ</a></li>
        </ul>
        <!-- <a href="" class="d-block text-dark mb-0 pt-3_5 pb-3_5">通報する</a> -->
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