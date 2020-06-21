@extends('layouts.app')

@section('edit-button')
    <a href="javascript:history.back()" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
    
@endsection


@section('content')
<div class="bg-gray">
    <div class="container d-flex col-md-8 col-lg-6 justify-content-center" style="max-width: 350px; max-height: 138px; height: 30vw;">
        <h1 class="text-center justify-content-center align-self-center">{{ $word }}のページ(作成中)</h1>
    </div>
</div>
@endsection