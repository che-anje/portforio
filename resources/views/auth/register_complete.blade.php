@extends('layouts.app')

@section('content')
<div class="bg-white shadow-sm mb-4">
    <div class="top-mv top-mv--home pb-4_5 pt-4_5 container col-md-8 col-lg-6">
      <h1 class="mv-copy text-center h4 mb-4"><span class="text-fz-14px">＼10,022サークル／</span><br>掲載数日本一！<br>
      サークル募集サイト</h1>
        <a href="/users/edit" class="btn btn-primary btn-primary--grad mx-auto mb-1 text-fw-bold">
        <span style="font-size: 12px;">メールをチェックしたら</span>&nbsp;次へ
      </a>
      <p class="text-center text-fz-14px mb-4 text-white mt-4"><a href="/users/confirmation/new" class="text-white">確認メールの再送信はこちら</a></p>
    </div>
</div>
@endsection