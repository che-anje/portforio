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

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a href="#create_circle_form01" class="nav-link active d-none" data-toggle="tab">タブ1</a>
  </li>
  <li class="nav-item">
    <a href="#create_circle_form02" class="nav-link d-none" data-toggle="tab">タブ2</a>
  </li>
  <li class="nav-item">
    <a href="#create_circle_form03" class="nav-link d-none" data-toggle="tab">タブ3</a>
  </li>
</ul>

<form class="edit_circle" id="create_circle" enctype="multipart/form-data" 
    action="{{ route('circle.edit', [ $circle->id ]) }}" accept-charset="UTF-8" method="post">
    {{ csrf_field() }}
<!-- 1 -->
<div class="tab-content">
    <div id="create_circle_form01" class="tab-pane active">
        <div style="padding-bottom: 168px;">
            <div class="container col-md-8 col-lg-6">
                <ol class="list-unstyled list-makecircle d-flex text-center justify-content-center mt-3">
                    <li class="list-makecircleitem active text-fz-small" value="1">
                        ジャンル選択
                    </li>
                    <li class="list-makecircleitem text-fz-small" value="2">
                        基本情報
                    </li>
                    <li class="list-makecircleitem text-fz-small" value="3">
                        設定
                    </li>
                </ol>
                <p class="text-fz-14px text-fw-bold text-black-50 mb-1 mt-3 d-inline-block">
                    コンテンツクオリティガイドライン
                </p>
                <div id>
                    <div class="consor-pointer">
                        <a class="ml-2" style="color: rgb(0, 123, 255); font-size: 14px;">
                        ガイドラインをチェックする</a>
                    </div>
                </div>
                <p class="text-fz-14px text-fz-bold text-black-50 mb-2 mt-3 d-inline-block">
                    サークルのジャンル
                </p>
                <p class="message-required d-inline-block mb-2">必須</p>
                <p class="text-fz-small mb-2">３つまで選択することができます。</p>
            </div>
            <div class="bg-white">
                <div class="container col-md-8 col-lg-6 pl-0 pr-0">
                    <div>
                        <div id="genreHiddenTag"></div>
                        <div class="accordion" id="accordionExample">
                        @foreach($categories as $category)
                            <div class="card border-top-0 border-right-0 border-left-0 border-bottom rounded-0">
                                <div class="card-header bg-white p-3" id="#heading{{ $category->id }}">
                                    <a  class="p-0 nav-link link--arrow line-height-2 cursor-pointer d-flex align-items-center" data-toggle="collapse" 
                                    data-target="#collapse{{ $category->id }}" aria-expanded="false" aria-controls="collapse{{ $category->id }}">
                                        {{ $category->name }}
                                        <i class="fas fa-chevron-right align-items-center" style="position: absolute; right: 0;"></i>
                                    </a>
                                </div>
                            </div>
                            <div id="collapse{{ $category->id }}" class="collapse" aria-labelledby="#heading{{ $category->id }}"
                            data-parent="#accordionExample">
                                <div class="card-body p-0">
                                    <ul class="nav flex-column genres" name="genres" data-url="/getCircleGenres/{{ $circle->id }}">
                                        @foreach($category->genres as $genre)
                                        <li class="nav-item p-3 border-bottom">
                                            <label class="d-flex justify-content-between align-items-center mb-0 position-relative">
                                                <p class="p-0 line-height-2 pl-3 mb-0">{{ $genre->name }}</p>
                                                <input id="checkbox__genre" type="checkbox" name="genre_record" class="d-none checkbox__input checkbox__genre" value="{{ $genre->id }}"  
                                                @if(in_array($genre->id, $circle->checked_genres)) checked @endif >
                                                <span class="checkbox__lg"></span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed-bottom" style="padding-bottom:90px;">
            <div class="container col-md-8 col-lg-6">
                <div class="d-flex justify-content-around">
                    <button type="button" class="btn btn-primary--grad text-white 
                    mr-2 mb-2 next">次へ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 2 -->
    <div id="create_circle_form02" class="tab-pane">
        <div clas="pt-3 min-vh-100" style="padding-bottom: 128px;">
            <div class="container col-md-8 col-lg-6">
                <ol class="list-unstyled list-makecircle d-flex text-center justify-content-center mt-3">
                    <li class="list-makecircleitem  text-fz-small" value="1">
                        ジャンル選択
                    </li>
                    <li class="list-makecircleitem active text-fz-small" value="2">
                        基本情報
                    </li>
                    <li class="list-makecircleitem text-fz-small" value="3">
                        設定
                    </li>
                </ol>
                <div class="mt-3 mb-2">
                    <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 
                    d-inline-block">メイン写真</p>
                    <p class="message-required d-inline-block mb-2">必須</p>
                    <label for="" class="card card--makecircle m-auto border-0 d-flex justify-content-center
                    align-items-center hov--default p-3_5">
                        <div>
                            <a onClick="$('#upfile').click()">
                            @if($circle->image)
                                <img id="circle_img" src="/storage/CircleImages/{{ $circle->image }}" alt class="card-img-top card-img-top--list_bgwhite mb-0 w-100">
                            @else
                                <img id="circle_img" src="/storage/CircleImages/Camera.png" alt class="card-img-top card-img-top--list_bgwhite mb-0 w-100">
                            @endif
                            </a>
                            <input type="file" accept="image/png, image/jpeg, image/gif" 
                            name="image" id="upfile" style="display: none;" class="required">
                        </div>
                    </label>
                </div>
                <!-- サークル名 -->
                <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">
                    サークル名
                </p>
                <p class="message-required d-inline-block mb-2">必須</p>
            </div>
            <div class="shadow-sm mb-0 bg-white">
                <div class="container col-md-8 col-lg-6 p-3_5">
                    <input name="name" id="name" type="text" class="p-0 w-100 textarea--eventreport required" 
                    placeholder="サークル名を入力（例：サッカー好き集まれ）" value="{{ $circle->name }}" >
                </div>
            </div>
            <!-- 紹介文 -->
            <div class="container col-md-8 col-lg-6">
                <p class="text-fz text-fw-bold text-black-50 mb-2 mt-3 
                d-inline-block">サークルの説明</p>
                <p class="message-required d-inline-block mb-2">必須</p>
            </div>
            <div class="shadow-sm mb-0 bg-white pt-3 pb-2">
                <div class="container col-md-8 col-lg-6">
                    <textarea name="introduction" id="introduction" type="text" cols="5" rows="6" class="p-0 w-100 textarea--eventreport required" 
                    placeholder="何をするサークルか記載しましょう。サークル設立の思いなども記載しましょう。（例：みんなで楽しく登山をしたいと思ってサークルを設立しました。主に日帰り登山をしようと思っています。高尾山や鍋割山などに行こうと思っています。" >{{ $circle->introduction }}</textarea>
                </div>
            </div>
            <!-- 活動場所 都道府県 -->
            <div class="container col-md-8 col-lg-6">
                <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3 d-inline-block">
                    主な活動場所
                </p>
                <p class="message-required d-inline-block mb-2">必須</p>
            </div>
            <div class="shadow-sm mb-2_5 bg-white">
                <div class="container col-md-8 col-lg-6 p-3_5">
                    <ul class="p-0 m-0">
                        <div>
                            <div id>
                                <div class="cursor-pointer">
                                    <p class="nav-link link--arrow p-0 mb-0">
                                        
                                        <a  href="javascript:void(0);" class="circle-pref" style="color: black;"
                                        data-toggle="modal" data-target="#myAreaModal">
                                        @if($circle->prefecture_id)
                                            {{ $prefectures[$circle->prefecture_id-1]->name }}
                                        @else
                                            主な活動地域を選択
                                        @endif
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
                <!-- モーダル -->
                <div class="modal fade" id="myAreaModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-gray d-flex align-items-center">
                                <button type="button" class="close pl-0 pr-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                <h6 class="text-fw-bold text-center m-0 mx-auto align-middle" id="exampleModalLabel">地域を選択してください</h6>
                            </div>
                            
                            <div class="modal-body card bg-white h-100">
                                <ul class="nav flex-column modal-circle-pref">
                                    @foreach($prefectures as $prefecture)
                                        <li class="border-bottom nav-item p-3">
                                            <input type="radio" name="prefecture_id" id="{{ $prefecture->name }}" 
                                            class="d-none checkbox__input checkbox__area" value="{{ $prefecture->id }}" 
                                            @if($prefecture->id == $circle->prefecture_id) checked @endif>
                                            <label class="d-flex justify-content-between align-items-center 
                                            mb-0 position-relative" for="{{ $prefecture->name }}">
                                            <span class="p-0 line-height-2 pl-3 mb-0">{{ $prefecture->name }}</span>
                                            <span class="checkbox__lg checkbox__noborder"></span>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            <div class="modal-footer">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 詳細な活動場所 -->
            <div class="container col-md-8 col-lg-6">
                <p class="text-fz-small text-black-50 mb-2">より詳細な場所があれば入力してください</p>
            </div>
            <div class="shadow-sm mb-0 bg-white">
                <div class="container col-md-8 col-lg-6 p-3_5">
                    <input name="detailedArea" id="detailedArea" class="p-0 w-100 textarea--eventreport"
                    placeholder="詳細な場所（例：山田１丁目 味の素スタジアム" value="{{ $circle->detailedArea }}">
                </div>
            </div>
            <!-- 年齢層 -->
            <div class="container col-md-8 col-lg-6">
                <p class="text-fz-14px text-fw-bold text-black-50 mb-2_5 mt-3 
                d-inline-block">募集する年齢層</p>
            </div>
            <div class="shadow-sm mb-0 bg-white">
                <div class="container col-md-8 col-lg-6 p-3_5">
                    <ul class="p-0 m-0">
                        <div>
                            <div>
                                <div class="cursor-pointer">
                                    <p class="nav-link link--arrow p-0 mb-0">
                                        <a  href="#" class="circle-ageGroup" data-toggle="modal" style="color: black;"
                                        data-target="#ageModal">
                                        @if($circle->ageGroup)
                                            {{ \App\Models\Circle::AGEGROUP[$circle->ageGroup] }}
                                        @else
                                            指定しない
                                        @endif
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
                <!-- モーダル -->
                <div class="modal fade" id="ageModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-gray d-flex align-items-center">
                                <button type="button" class="close pl-0 pr-0" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                <h6 class="text-fw-bold text-center m-0 mx-auto align-middle" id="exampleModalLabel">募集する年齢層を選択してください</h6>
                            </div>
                            
                            <div class="modal-body card bg-white h-100">
                                <ul class="nav flex-column modal-circle-ageGroup">
                                    @foreach(\App\Models\Circle::AGEGROUP as $key => $val)
                                    <li class="border-bottom nav-item p-3">
                                        <input type="radio" name="ageGroup" id="{{ $val }}" data-url=""
                                        class="d-none checkbox__input checkbox__ageGroup" value="{{ $key }}"
                                        @if($key == $circle->ageGroup) checked @endif>
                                        <label class="d-flex justify-content-between align-items-center 
                                        mb-0 position-relative" for="{{ $val }}">
                                        <span class="p-0 line-height-2 pl-3 mb-0">{{ $val }}</span>
                                        <span class="checkbox__lg checkbox__noborder"></span>
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 活動日時 -->
            <div class="container col-md-8 col-lg-6">
                <p class="text-fz-14px text-fw-bold text-black-50 mb-0 mt-2 
                d-inline-block">活動予定日時</p>
                <p class="text-fz-small text-black-50 mb-2_5">目安でご記入ください</p>
            </div>
            <div class="shadow-sm mb-0 bg-white">
                <div class="container col-md-8 col-lg-6 p-3_5">
                    <input name="activityDay" id="activityDay" class="p-0 w-100 textarea--eventreport"
                    placeholder="指定しない" value="{{ $circle->activityDay }}">
                </div>
            </div>
            <!-- 費用 -->
            <div class="container col-md-8 col-lg-6">
                <p class="text-fz-14px text-fw-bold text-black-50 mb-2_5 mt-3 
                d-inline-block">費用</p>
            </div>
            <div class="shadow-sm mb-0 bg-white">
                <div class="container col-md-8 col-lg-6 p-3_5">
                    <input name="cost" id="cost" class="p-0 w-100 textarea--eventreport"
                    placeholder="無料" value="{{ $circle->cost }}">
                </div>
            </div>
        </div>
        <div class="fixed-bottom" style="padding-bottom:90px;">
            <div class="container col-md-8 col-lg-6 d-flex justify-content-around">
                <div class="d-flex justify-content-around">
                    <button type="button"  class="nav-link mr-2 btn btn-primary--grad btn-primary--grad--outline
                     w-20 mb-2 previous">戻る</button>
                    <button type="button" class="nav-link btn btn-primary--grad text-white 
                    mr-2 mb-2 next">次へ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 3 -->
    <div id="create_circle_form03" class="tab-pane">
        <div clas="pt-3 min-vh-100" style="padding-bottom: 128px;">
            <div class="container col-md-8 col-lg-6">
                <ol class="list-unstyled list-makecircle d-flex text-center justify-content-center mt-3">
                    <li class="list-makecircleitem text-fz-small" value="1">
                        ジャンル選択
                    </li>
                    <li class="list-makecircleitem text-fz-small" value="2">
                        基本情報
                    </li>
                    <li class="list-makecircleitem active text-fz-small" value="3">
                        設定
                    </li>
                </ol>
                <p class="text-fz-14px text-fw-bold text-black-50 mb-2_5 mt-3">
                    メンバー募集
                </p>
            </div>
            <!-- 募集状況 -->
            <div class="shadow-sm mb-2 bg-white">
                <div class="container col-md-8 col-lg-6 p-3_5">
                    <select name="recruit_status" id="recruit_status" class="p-0 w-100 textarea--eventreport custom-select 
                    custom-select--makecircle" placeholder="メンバー募集">
                        <option value="0" @if($circle->recruit_status==0) selected @endif>募集中</option>
                        <option value="1" @if($circle->recruit_status==1) selected @endif>募集中止</option>
                    </select>
                </div>
            </div>
            <!-- 承認の要否 -->
            <div class="container col-md-8 col-lg-6">
                <p class="text-fz-14px text-fw-bold text-black-50 mb-2_5 mt-3">
                    サークル参加時の承認
                </p>
            </div>
            <div class="shadow-sm mb-2 bg-white">
                <div class="container col-md-8 col-lg-6 p-3_5">
                    <select name="request_required" id="request_required" class="p-0 w-100 textarea--eventreport custom-select 
                    custom-select--makecircle" placeholder="メンバーによるイベント作成の許可を選択">
                        <option value="0" @if($circle->request_required==0) selected @endif>必要（サークル参加時の承認が必要）</option>
                        <option value="1" @if($circle->request_required==1) selected @endif>不要（サークル参加時の承認が不要）</option>
                    </select>
                </div>
            </div>
            <div class="container col-md-8 col-lg-6">
                <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3">
                    自己紹介テンプレート
                </p>
            </div>
            <div class="shadow-sm mb-0 bg-white pt-3 pb-3">
                <div class="container col-md-8 col-lg-6">
                    <textarea name="description_template" id="description_template" cols="5" rows="5" class="p-0 w-100 textarea--eventreport"
                    placeholder="参加時の教えてもらいたいことを記載 例）年齢とスポーツ歴を書いてください。">{{ $circle->description_template }}</textarea>
                </div>
            </div>
            <div class="container col-md-8 col-lg-6">
                <p class="text-fz-14px text-fw-bold text-black-50 mb-2 mt-3">
                    サークルの公開非公開
                </p>
            </div>
            <div class="shadow-sm mb-3 bg-white">
                <div class="container col-md-8 col-lg-6 p-3_5">
                    <select name="private_status" id="private_status" class="p-0 w-100 textarea--eventreport custom-select 
                    custom-select--makecircle" placeholder="サークルの公開・非公開を選択">
                        <option value="0" @if($circle->private_status==0) selected @endif>公開</option>
                        <option value="1" @if($circle->private_status==1) selected @endif>非公開</option>
                    </select>
                </div>
            </div>
        </div>
        </form>
        <div class="fixed-bottom" style="padding-bottom:90px;">
            <div class="container col-md-8 col-lg-6">
                <div class="d-flex justify-content-between">
                    <button type="button" class="w-20 mr-2 btn btn-primary--grad 
                    btn-primary--grad--outline mb-2 previous">戻る</button>
                    <button type="button" class="w-40 mr-2 btn btn-primary--grad btn-primary--grad--outline
                    mb-2" id="is_draft" value="true">下書き</button>
                    <button type="submit" id="is_draft submit" class="w-40 mr-2 btn btn-primary--grad text-white
                    mb-2 send" value="false">作成する</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
  $('.send').prop("disabled", !($('.checkbox__genre:checked').length > 0 && $('.checkbox__area:checked').length > 0));
  //必須項目のチェック
  function requiredCheck () {
    let flag = true;
    //必須項目をひとつずつチェック
    $('form input:required').each(function(e) {
        //もし必須項目が空なら
        if ($('form input:required').eq(e).val() === "") {
            flag = false;
        }
    });
    $('form textarea:required').each(function(e) {
      //もし必須項目が空なら
      if ($('form textarea:required').eq(e).val() === "") {
          flag = false;
      }
    });
    //全て埋まっていたら
    if (flag && $('.checkbox__genre:checked').length > 0 && $('.checkbox__area:checked').length > 0) {
        //送信ボタンを復活
        $('.send').prop("disabled", false);
    }
    else {
        //送信ボタンを閉じる
        $('.send').prop("disabled", true);
    }
  }
  //入力欄の操作時
  $(".required").change(function (e) {
    $(e.target).prop('required', true);
    requiredCheck();
  });
  $(".checkbox__genre,.checkbox__area").change(function () {
    requiredCheck();
  });
});
</script>
@endsection
