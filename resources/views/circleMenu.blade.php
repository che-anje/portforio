@extends('layouts.app')

@section('edit-button')
    <a href="javascript:history.back()" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
    
    
@endsection
@section('content')
<div class="container col-md-8 col-lg-6">
    <h6 class="h6--list-title text-fz-14px text-black-50 pt-3_5">メニュー</h6>
</div>
<div class="bg-white mb-0 shadow-sm">
    <div class="container col-md-8 col-lg-6 p-0">
        <ul class="nav flex-column">
            <li class="nav-item p-3"><a href="{{ route('circle.show', [ $circle->id ]) }}" class="nav-link text-dark p-0 line-height-2  text-fz-18px">{{ $circle->name }}サークル</a></li>
        </ul>
    </div>
</div>
@endsection