@extends('layouts.header')

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
<div class="container col-md-8 col-lg-6">
    <h1 class="text-center font-weight-bold pt-3" style="font-size: 20px;">プロフィール登録</h1>
    <form action="{{ route('profile.create')}}" class="edit_user" id="edit_user" enctype="multipart/form-data" 
    accept-charset="UTF-8" method="POST">
    @csrf
        <input type="hidden" name="_method" value="POST" />
        <input type="hidden" name="authenticity_token" value="" />
        <input type="hidden" name="user_id" value="{{ $user_id }}" />
        <div className="container col-md-8 col-lg-6">
            <div class="mt-3 mb-2">
            </div>
        </div>
        <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">お名前</p>
        <p class="message-required d-inline-block mb-2">必須</p>
    
</div>
<!-- 姓・名 -->
<div class="shadow-sm mb-2_5 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <div class="row">
            <div class="col-6">
                <div class="field mb-3">
                    <input autofocus="autofocus" class="textarea--eventreport" value="{{ old('familyName') }}"
                    id="familyname" placeholder="姓" type="text" name="familyName" />
                </div>
                <p id="familyname-success" class="small mb-0" style="display: none; color: #72c02c;">
                    <i class="fa fa-check" aria-hidden="true"></i> OK
                </p>
                <p id="familyname-error" class="small text-danger mb-0" style="display: none;">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 姓が未入力です。記入してください。
                </p>
            </div>
            <div class="col-6">
                <div class="field mb-3">
                    <input autofocus="autofocus" class="textarea--eventreport" value="{{ old('firstName') }}"
                    id="firstname" placeholder="名" type="text" name="firstName" />
                </div>
                <p id="firstname-success" class="small mb-0" style="display: none; color: #72c02c;">
                    <i class="fa fa-check" aria-hidden="true"></i> OK
                </p>
                <p id="firstname-error" class="small text-danger mb-0" style="display: none;">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 名が未入力です。記入してください。
                </p>
            </div>
        </div>
    </div>
</div>
<p class="container col-md-8 col-lg-6 small g-color-gray-dark-v4 g-mt-5"><i class="fa fa-question-circle" aria-hidden="true"></i> 姓と名は本名をご記入ください。つなげーと会員で同一のサークルやイベントに参加した人同士や、メッセージを交換した人に公開されます。</p>
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">ユーザーネーム</p>
    <p class="message-required d-inline-block mb-2 ml-1">必須</p>
</div>
<!-- ユーザーネーム -->
<div class="shadow-sm mb-0 bg-white">
    <div class=" container col-md-8 col-lg-6 p-3_5">
      <input autofocus="autofocus" class="textarea--eventreport" id="name" value="{{ old('name') }}"
      placeholder="＠ユーザーネームを記載" type="text" value="{{ old('name') }}" name="name" />
    </div>
</div>
<p id="tunagate-id-success" class="container col-md-8 col-lg-6 small mb-0" style="display: none; color: #72c02c;">
    <i class="fa fa-check" aria-hidden="true"></i> ユーザーネームは有効です。
</p>
<p id="tunagate-id-error" class="container col-md-8 col-lg-6 small red mb-0" style="display: none;">
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 入力いただいたユーザーネームは利用できません（他のユーザーと同一のもの、
    「.（ドット）」「#（シャープ）」「半角全角スペース」を含むもの、数字のみは登録できません）。別のユーザーネームに変更してください。
</p>
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">性別</p>
    <p class="message-required d-inline-block mb-2">必須</p>
</div>
<!-- 性別 -->
<div class="shadow-sm mb-2_5 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <select class="d-block w-100" selected="selected" style="border: none;background-color: #fff;height: 24px;" 
        name="gender" id="gender">
        @foreach(\App\Models\Profile::GENDER as $key => $val)
            <option value="{{ $key }}" 
                {{ $key == old('gender') ? 'selected' : '' }}>
                {{ $val }}
            </option>
        @endforeach
        </select>
    </div>
</div>
<p id="gender-success" class="small container col-md-8 col-lg-6" style="display: none; color: #72c02c;">
    <i class="fa fa-check" aria-hidden="true"></i> OK
</p>
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mt-3 mb-2 d-inline-block">生年月日</p>
    <p class="message-required d-inline-block mb-0">必須</p>
</div>
<!-- 生年月日 -->
<div class="shadow-sm mb-2_5 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <select id="birthdate_1i" name="birthdate_1i" class="form-control birthdate_1i" 
        style="width: 30%; display: inline-block;border: none;background-color: #fff;">
        @foreach(\App\Models\Profile::BIRTHDATE_1I as $key => $val)
            <option value="{{ $key }}"  
                {{ $val == old('birthdate_1i') ? 'selected' : '' }}>
                {{ $val }}
            </option>
        @endforeach
        </select>/
        <select id="birthdate_2i" name="birthdate_2i" class="form-control birthdate_2i" 
        style="width: 30%; display: inline-block;border: none;background-color: #fff;">
        @foreach(\App\Models\Profile::BIRTHDATE_2I as $key => $val)
            <option value="{{ $key }}"  
                {{ $val == old('birthdate_2i') ? 'selected' : '' }}>
                {{ $val }}
            </option>
        @endforeach
        </select>/
        <select id="birthdate_3i" name="birthdate_3i" class="form-control birthdate_3i" 
        style="width: 30%; display: inline-block;border: none;background-color: #fff;">
        @foreach(\App\Models\Profile::BIRTHDATE_3I as $key => $val)
            <option value="{{ $key }}"  
                {{ $val == old('birthdate_3i') ? 'selected' : '' }}>
                {{ $val }}
            </option>
        @endforeach
        </select>
    </div>
</div>
<!-- 興味のある地域 -->
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">興味のある地域</p>
    <p class="message-required d-inline-block mb-0">必須</p>
</div>
<div class="shadow-sm mb-2_5 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <div class="row">
            <div class="col-6">
                <div class="field">
                    <select class="textarea--eventreport prefectureOfInterest" style="border: none;background-color: #fff;height: 24px;" 
                    name="prefectureOfInterest" id="prefectureOfInterest">
                            <option value="48">都道府県を選択</option>
                        @foreach($prefectures as $prefecture)
                            <option value="{{ $prefecture->id }}" data-url="{{ route('cities.get', [ $prefecture->id ]) }}" 
                                {{ $prefecture->id == old('prefectureOfInterest', 
                                    $my_profile->prefectureOfInterest) ? 'selected' : '' }}>
                                {{ $prefecture->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="field">
                    <select class="textarea--eventreport cityOfInterest" style="border: none;background-color: #fff;height: 24px;" 
                    name="cityOfInterest" id="cityOfInterest">
                        <option value="0">選択してください</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}"  
                                {{ $city->id == old('cityOfInterest', 
                                    $my_profile->cityOfInterest) ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">
    紹介文</p>
    <p class="message-required d-inline-block mb-0">必須</p>
</div>
<!-- 紹介文 -->
<div class="shadow-sm mb-0 bg-white pt-3 pb-2">
    <div class=" container col-md-8 col-lg-6">
      <textarea autofocus="autofocus" class="p-0 w-100 textarea--eventreport" cols="5" rows="6" 
      name="introduction" id="user_introduction" value="{{ old('introduction') }}"></textarea>
    </div>
</div>
<div class="container col-md-8 col-lg-6 mt-4">
    <input type="submit" name="commit" value="登録" id="user-edit-btn-submit" 
    class="mx-auto btn btn-primary--grad text-white mb-3 btn-block" data-disable-with="登録" />
</div>
</form>

@endsection