@extends('layouts.no-footer')

@section('edit-button')
    <a href="javascript:history.back()" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif
<form class="edit_user" id="edit_user" enctype="multipart/form-data" 
    action="{{ route('category.edit') }}" accept-charset="UTF-8" method="post">
    {{ csrf_field() }}
    <div className="container col-md-8 col-lg-6">
        <div class="mt-3 mb-2">
            <a class="card card--makecircle m-auto border-0 d-flex 
            justify-content-center align-items-center hov--default p-3_5" onClick="$('#upfile').click()">
            
                <img id=category_img class="card-img-top card-img-top--list_bgwhite mb-0 w-100" 
                src="{{ Illuminate\Support\Facades\Storage::disk('s3')->url('UserImages/no_image.jpeg') }}" />
            
            </a>
            <input style="display:none;" id="upfile" type="file" name="category_image" />
        </div>
    </div>
    <div class="container col-md-8 col-lg-6 mt-4">
        <input type="submit" name="commit" value="登録" id="user-edit-btn-submit" 
        class="mx-auto btn btn-primary--grad text-white mb-0 btn-block" data-disable-with="登録" />
    </div>
    
</form>
@endsection