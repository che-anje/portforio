@extends('layouts.app')

@section('edit-button')
    <a href="javascript:history.back()" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
    
    
@endsection
@section('content')
<form action="/image_upload" method="post" enctype="multipart/form-data">
    <!-- アップロードフォームの作成 -->
    
    
    <img id="circle_img" src="/storage/CircleImages/Camera.png" alt class="card-img-top card-img-top--list_bgwhite mb-0 w-100" style="max-height:100px; max-width:100px">
    
    <input type="file" name="image">
    {{ csrf_field() }}
    <input id="upfile" type="submit" value="アップロード">
</form>

@endsection