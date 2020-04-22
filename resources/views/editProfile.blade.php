@extends('layouts.app')

@section('edit-button')
    <a href="/profile/show" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
@endsection

@section('content')
<div class="container col-md-8 col-lg-6">
    <h1 class="text-center font-weight-bold pt-3" style="font-size: 20px;">
    プロフィール登録
    </h1>
    <form class="edit_user" id="edit_user" enctype="multipart/form-data" 
    action="/users" accept-charset="UTF-8" method="post">
        <input type="hidden" name="_method" value="put" />
        <input type="hidden" name="authenticity_token" value="" />
        <div className="container col-md-8 col-lg-6">
            <div class="mt-3 mb-2">
                <a id="img_field" class="card card--makecircle m-auto border-0 d-flex 
                justify-content-center align-items-center hov--default p-3_5" onClick="$('#upfile').click()">
                <img class="card-img-top card-img-top--list_bgwhite mb-0 w-100" 
                src="" />
                </a>
                <input style="display:none;" id="upfile" type="file" name="user[avatar]" />
            </div>
        </div>
        <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">お名前</p>
        <p class="message-required d-inline-block mb-2">必須</p>
</div>
<div class="shadow-sm mb-2_5 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <div class="row">
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
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">ユーザーネーム</p>
    <p class="message-required d-inline-block mb-2 ml-1">必須</p>
</div>
<div class="shadow-sm mb-0 bg-white">
    <div class=" container col-md-8 col-lg-6 p-3_5">
        <input autofocus="autofocus" class="textarea--eventreport" id="tunagate_id" 
        placeholder="＠ユーザーネームを記載" type="text" value="{{ $my_profile->name }}" name="name" />
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
<div class="shadow-sm mb-2_5 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <select class="d-block w-100" selected="selected" style="border: none;background-color: #fff;height: 24px;"
         name="gender" id="gender">
            <option selected="selected" value="1">男性</option>
            <option value="2">女性</option>
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
<div class="shadow-sm mb-2_5 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <select id="birthdate_1i" name="birthdate_1i" class="form-control" 
        style="width: 30%; display: inline-block;border: none;background-color: #fff;">
            <option value="1930">1930</option>
            <option value="1931">1931</option>
            <option value="1932">1932</option>
            <option value="1933">1933</option>
            <option value="1934">1934</option>
            <option value="1935">1935</option>
            <option value="1936">1936</option>
            <option value="1937">1937</option>
            <option value="1938">1938</option>
            <option value="1939">1939</option>
            <option value="1940">1940</option>
            <option value="1941">1941</option>
            <option value="1942">1942</option>
            <option value="1943">1943</option>
            <option value="1944">1944</option>
            <option value="1945">1945</option>
            <option value="1946">1946</option>
            <option value="1947">1947</option>
            <option value="1948">1948</option>
            <option value="1949">1949</option>
            <option value="1950">1950</option>
            <option value="1951">1951</option>
            <option value="1952">1952</option>
            <option value="1953">1953</option>
            <option value="1954">1954</option>
            <option value="1955">1955</option>
            <option value="1956">1956</option>
            <option value="1957">1957</option>
            <option value="1958">1958</option>
            <option value="1959">1959</option>
            <option value="1960">1960</option>
            <option value="1961">1961</option>
            <option value="1962">1962</option>
            <option value="1963">1963</option>
            <option value="1964">1964</option>
            <option value="1965">1965</option>
            <option value="1966">1966</option>
            <option value="1967">1967</option>
            <option value="1968">1968</option>
            <option value="1969">1969</option>
            <option value="1970">1970</option>
            <option value="1971">1971</option>
            <option value="1972">1972</option>
            <option value="1973">1973</option>
            <option value="1974">1974</option>
            <option value="1975">1975</option>
            <option value="1976">1976</option>
            <option value="1977">1977</option>
            <option value="1978">1978</option>
            <option value="1979">1979</option>
            <option value="1980">1980</option>
            <option value="1981">1981</option>
            <option value="1982">1982</option>
            <option value="1983">1983</option>
            <option value="1984">1984</option>
            <option value="1985">1985</option>
            <option value="1986">1986</option>
            <option value="1987">1987</option>
            <option value="1988">1988</option>
            <option value="1989">1989</option>
            <option value="1990">1990</option>
            <option value="1991">1991</option>
            <option value="1992">1992</option>
            <option value="1993">1993</option>
            <option value="1994">1994</option>
            <option value="1995">1995</option>
            <option value="1996" selected="selected">1996</option>
            <option value="1997">1997</option>
            <option value="1998">1998</option>
            <option value="1999">1999</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
        </select>/
        <select id="birthdate_2i" name="birthdate_2i" class="form-control" 
        style="width: 30%; display: inline-block;border: none;background-color: #fff;">
            <option value="1">1</option>
            <option value="2" selected="selected">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>/
        <select id="birthdate_3i" name="birthdate_3i" class="form-control" 
        style="width: 30%; display: inline-block;border: none;background-color: #fff;">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25" selected="selected">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
        </select>
    </div>
</div>
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
                            <option value="">都道府県を選択</option>
                        @foreach($prefectures as $prefecture)
                            <option value="{{ $prefecture->id }}" data-url="{{ route('cities.get', [ $prefecture->id ]) }}" 
                            @if(old('prefectureOfInterest') == $prefecture->id) selected="selected" @endif >
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
                            <option value="">選択してください</option>
                        
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
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
    メールアドレスを変更すると確認メールが送られます。そのメールの確認URLをクリックして変更が完了します。@tunagate.comからの受信が可能な状態にしてください。
</p>
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">メールアドレスで検索を許可する</p>
    <p class="message-required d-inline-block mb-2">必須</p>
</div>
<div class="shadow-sm mb-2_5 bg-white">
    <div class="container col-md-8 col-lg-6 p-3_5">
        <select class="d-block w-100" selected="selected" style="border: none;background-color: #fff;height: 24px;"
            name="searchSettingByEmail" id="searchSettingByEmail">
            <option value="1">許可する</option>
            <option selected="selected" value="2">許可しない</option>
        </select>
    </div>
</div>
<p class="container col-md-8 col-lg-6 small g-color-gray-dark-v4">
    <i class="fa fa-question-circle" aria-hidden="true"></i> 
    メールアドレスを知っている人があなたのことを検索できるようにします
</p>
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
<div class="container col-md-8 col-lg-6">
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">紹介文</p>
</div>
<div class="shadow-sm mb-0 bg-white pt-3 pb-2">
    <div class=" container col-md-8 col-lg-6">
        <textarea autofocus="autofocus" class="p-0 w-100 textarea--eventreport" 
        cols="5" rows="6" name="introduction" id="introduction">
            {{ $my_profile->introduction }}
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
<div class="container col-md-8 col-lg-6 mt-4">
    <input type="submit" name="commit" value="登録" id="user-edit-btn-submit" 
    class="mx-auto btn btn-primary--grad text-white mb-3 btn-block" data-disable-with="登録" />
</div>
</form>
@endsection