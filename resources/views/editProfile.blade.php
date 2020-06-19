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

<div class="container col-md-8 col-lg-6">
    <h1 class="text-center font-weight-bold pt-3" style="font-size: 20px;">
    プロフィール登録
    </h1>
    <form class="edit_user" id="edit_user" enctype="multipart/form-data" 
    action="{{ route('profile.edit', ['id' => $my_profile->user_id]) }}" accept-charset="UTF-8" method="post">
    {{ csrf_field() }}
        <input type="hidden" name="_method" value="post" />
        <input type="hidden" name="authenticity_token" value="" />
        <div className="container col-md-8 col-lg-6">
            <div class="mt-3 mb-2">
                <a class="card card--makecircle m-auto border-0 d-flex 
                justify-content-center align-items-center hov--default p-3_5" onClick="$('#upfile').click()">
                @if($my_profile->user_image)
                    <img id=user_img class="card-img-top card-img-top--list_bgwhite mb-0 w-100" 
                    src="/storage/UserImages/{{ $my_profile->user_image }}" />
                @else
                    <img id=user_img class="card-img-top card-img-top--list_bgwhite mb-0 w-100" 
                    src="/storage/UserImages/no_image.jpeg" />
                @endif
                </a>
                <input style="display:none;" id="upfile" type="file" name="user_image" />
            </div>
        </div>
        <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">お名前</p>
        <p class="message-required d-inline-block mb-2">必須</p>
</div>
<div class="shadow-sm mb-2_5 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <div class="row">
            <!-- 姓 -->
            <div class="col-6">
                <div class="field mb-3">
                    <input autofocus="autofocus" class="textarea--eventreport" id="familyname" 
                    placeholder="姓" type="text" value="{{ $my_profile->familyName }}" name="familyName" />
                </div>
                <p id="familyname-success" class="small mb-0" style="display: none; color: #72c02c;">
                    <i class="fa fa-check" aria-hidden="true"></i> OK
                </p>
                <p id="familyname-error" class="small text-danger mb-0" style="display: none;">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 姓が未入力です。記入してください。
                </p>
            </div>
            <!-- 名 -->
            <div class="col-6">
                <div class="field mb-3">
                    <input autofocus="autofocus" class="textarea--eventreport" id="firstname" 
                    placeholder="名" type="text" value="{{ $my_profile->firstName }}" name="firstName" />
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
<p class="container col-md-8 col-lg-6 small g-color-gray-dark-v4 g-mt-5">
    <i class="fa fa-question-circle" aria-hidden="true">
    </i> 姓と名は本名をご記入ください。つなげーと会員で同一のサークルやイベントに参加した人同士や、メッセージを交換した人に公開されます。
</p>
<!-- ユーザーネーム -->
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">ユーザーネーム</p>
    <p class="message-required d-inline-block mb-2 ml-1">必須</p>
</div>
<div class="shadow-sm mb-0 bg-white">
    <div class=" container col-md-8 col-lg-6 p-3_5">
        <input autofocus="autofocus" class="textarea--eventreport" id="" 
        placeholder="＠ユーザーネームを記載" type="text" value="{{ $my_profile->name }}" name="name" />
    </div>
</div>
<p class="container col-md-8 col-lg-6 small mb-0" style="display: none; color: #72c02c;">
    <i class="fa fa-check" aria-hidden="true"></i> ユーザーネームは有効です。
</p>
<p class="container col-md-8 col-lg-6 small red mb-0" style="display: none;">
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 入力いただいたユーザーネームは利用できません（他のユーザーと同一のもの、
    「.（ドット）」「#（シャープ）」「半角全角スペース」を含むもの、数字のみは登録できません）。別のユーザーネームに変更してください。
</p>
<!-- 性別 -->
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">性別</p>
    <p class="message-required d-inline-block mb-2">必須</p>
</div>
<div class="shadow-sm mb-2_5 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <select class="d-block w-100" selected="selected" style="border: none;background-color: #fff;height: 24px;"
         name="gender" id="gender">
        @foreach(\App\Models\Profile::GENDER as $key => $val)
            <option value="{{ $key }}" 
                {{ $key == old('gender', $my_profile->gender) ? 'selected' : '' }}>
                {{ $val }}
            </option>
        @endforeach
        </select>
    </div>
</div>
<p id="gender-success" class="small container col-md-8 col-lg-6" style="display: none; color: #72c02c;">
    <i class="fa fa-check" aria-hidden="true"></i> OK
</p>
<!-- 生年月日 -->
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mt-3 mb-2 d-inline-block">生年月日</p>
    <p class="message-required d-inline-block mb-0">必須</p>
</div>
<div class="shadow-sm mb-2_5 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <select id="birthdate_1i" name="birthdate_1i" class="form-control birthdate_1i" 
        style="width: 30%; display: inline-block;border: none;background-color: #fff;">
        @foreach(\App\Models\Profile::BIRTHDATE_1I as $key => $val)
            <option value="{{ $key }}"  
                {{ $val == old('birthdate_1i', $my_profile->birthdate_1i) ? 'selected' : '' }}>
                {{ $val }}
            </option>
        @endforeach
        </select>/
        <select id="birthdate_2i" name="birthdate_2i" class="form-control birthdate_2i" 
        style="width: 30%; display: inline-block;border: none;background-color: #fff;">
        @foreach(\App\Models\Profile::BIRTHDATE_2I as $key => $val)
            <option value="{{ $key }}"  
                {{ $val == old('birthdate_2i', $my_profile->birthdate_2i) ? 'selected' : '' }}>
                {{ $val }}
            </option>
        @endforeach
        </select>/
        <select id="birthdate_3i" name="birthdate_3i" class="form-control birthdate_3i"
        style="width: 30%; display: inline-block;border: none;background-color: #fff;">
        @foreach(\App\Models\Profile::BIRTHDATE_3I as $key => $val)
            <option value="{{ $key }}"  
                {{ $val == old('birthdate_3i', $my_profile->birthdate_3i) ? 'selected' : '' }}>
                {{ $val }}
            </option>
        @endforeach
        </select>
    </div>
</div>
<!-- 興味のある地域 -->
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">興味のある地域</p>
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
<!-- メールアドレス -->
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">メールアドレス</p>
    <p class="message-required d-inline-block mb-2">必須</p>
</div>
<div class="shadow-sm mb-2_5 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <input autofocus="autofocus" class="textarea--eventreport" placeholder="emailを入力してください。" 
        style="width: 100%;" type="email" value="{{ $user->email }}" name="email" id="email" />
    </div>
</div>
<p class="container col-md-8 col-lg-6 small g-color-gray-dark-v4 g-mt-10">
    <i class="fa fa-question-circle" aria-hidden="true"></i> 
    メールアドレスを変更すると確認メールが送られます。そのメールの確認URLをクリックして変更が完了します。受信が可能な状態にしてください。
</p>
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">メールアドレスで検索を許可する</p>
    <p class="message-required d-inline-block mb-2">必須</p>
</div>
<!-- メールアドレス検索設定 -->
<div class="shadow-sm mb-2_5 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <select class="d-block w-100" style="border: none;background-color: #fff;height: 24px;"
            name="searchSettingByEmail" id="searchSettingByEmail">
            @foreach(\App\Models\Profile::SEARCHSETTINGBYEMAIL as $key => $val)
                <option value="{{ $key }}" 
                    {{ $key == old('searchSettingByEmail', $my_profile->searchSettingByEmail) ? 'selected' : '' }}>
                    {{ $val }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<p class="container col-md-8 col-lg-6 small g-color-gray-dark-v4">
    <i class="fa fa-question-circle" aria-hidden="true"></i> 
    メールアドレスを知っている人があなたのことを検索できるようにします
</p>
<!-- 変更パスワード -->
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">
        変更するパスワード
    </p>
</div>
<div class="shadow-sm mb-0 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <input autofocus="autofocus" class="textarea--eventreport" 
        type="password" name="password" id="password" />
    </div>
</div>
<p class="container col-md-8 col-lg-6 small g-color-gray-dark-v4">
    <i class="fa fa-question-circle" aria-hidden="true"></i> 
    パスワードを変更しない場合、空欄のままでOKです
</p>
<!-- 確認パスワード -->
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">変更するパスワード（確認）</p>
</div>
<div class="shadow-sm mb-0 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <input autofocus="autofocus" class="textarea--eventreport" 
        type="password" name="password_confirmation" id="password_confirmation" />
    </div>
</div>
<p class="container col-md-8 col-lg-6 small g-color-gray-dark-v4">
    <i class="fa fa-question-circle" aria-hidden="true"></i> 
    パスワードを変更しない場合、空欄のままでOKです
</p>
<!-- クレジットカード 余裕があれば
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">
        クレジットカード
    </p>
</div>
<p class="container col-md-8 col-lg-6">
    <a href="/users/payjp" style="font-size: 14px;">クレジットカードを登録する</a>
</p>
-->

<!-- 紹介文 -->
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">紹介文</p>
    <p class="message-required d-inline-block mb-0">必須</p>
</div>
<div class="shadow-sm mb-0 bg-white pt-3 pb-2">
    <div class=" container col-md-8 col-lg-6">
        <textarea autofocus="autofocus" class="p-0 w-100 textarea--eventreport" 
        cols="5" rows="6" name="introduction" id="introduction">{{ $my_profile->introduction }}
        </textarea>
    </div>
</div>
<!--snsアカウントのところ 余裕あれば
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">
        SNSアカウント
    </p>
</div>
<div class="shadow-sm mb-0 bg-white">
    <div class=" container col-md-8 col-lg-6 p-3_5">
        <div>
            <i class="fa fa-facebook-official mr-2" aria-hidden="true"></i>
            <span style="font-size: 10px;">https://www.facebook.com/</span>
            <input class="p-0 d-inline-block form-control" style="width: 150px;" 
            type="text" value="" name="user[facebook_url]" id="user_facebook_url" />
        </div>
        <div class="mt-2">
            <i class="fa fa-twitter-square mr-2" aria-hidden="true"></i>
            <span style="font-size: 10px;">https://twitter.com/</span>
            <input class="p-0 d-inline-block form-control" style="width: 150px;" 
            type="text" value="" name="user[twitter_url]" id="user_twitter_url" />
        </div>
        <div class="mt-2">
            <i class="fa fa-instagram mr-2" aria-hidden="true"></i>
            <span style="font-size: 10px;">https://twitter.com/</span>
            <input class="p-0 d-inline-block form-control" style="width: 150px;" 
            type="text" value="" name="user[instagram_url]" id="user_instagram_url" />
        </div>
    </div>
</div>
-->

<!-- 登録ボタン -->
<div class="container col-md-8 col-lg-6 mt-4">
    <input type="submit" name="commit" value="登録" id="user-edit-btn-submit" 
    class="mx-auto btn btn-primary--grad text-white mb-0 btn-block" data-disable-with="登録" />
</div>
</form>
@endsection