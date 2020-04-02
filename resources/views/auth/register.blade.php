@extends('layouts.app')

@section('content')
<hr class="m-0">

<div class="container col-md-8 col-lg-6">
    <h1 class="h5--18px text-center mt-3 mb-3">新規ユーザー登録</h1>
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2">メールアドレスで登録する</p>
</div>
<div class="col-md-6 col-lg-6 p-0 container">
    <form class="mb-4" id="new_user" method="POST" action="{{ route('register') }}" accept-charset="UTF-8">
        @csrf
        <input type="hidden" name="authenticity_token" value="TSFaCIy40j3lniqREkjSeJTcuZIm2lJP8Fzg0ZSRZH+4a3YcWQaDYVBa3eZ/DQuxEZ7raryP1kzFez8z2AKJcg==" />
        <input id="invite_activation_key" name="user[invite_activation_key]" type="hidden" value="" />

        <!-- メールアドレス -->
        <input autofocus="autofocus" id="email" type="text" name="email" placeholder="メールアドレス" 
        class="form-control mb-0 rounded-0 border-0 pt-4_5 pb-4_5 @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <hr class="m-0">

        <!-- パスワード -->
        <input autocomplete="off" id="password" type="password" name="password" placeholder="パスワード"
        class="form-control mb-0 rounded-0 border-0 pt-4_5 pb-4_5 @error('password') is-invalid @enderror" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <hr class="m-0">

        <!-- パスワード再入力 -->
        <input autocomplete="off" id="password-confirm" type="password" name="password_confirmation" placeholder="パスワード(再入力)"
        class="form-control mb-2 rounded-0 border-0 pt-4_5 pb-4_5" required autocomplete="new-password">

        <!-- 利用規約・プライバシーポリシー -->
        <div class="container-slim">
            <p class="text-fz-14px text-black-50 pt-1 mb-2">
                <a href="/rules" class="link--green" target="_blank">利用規約</a>
                と<a href="/privacypolicy" class="link--green" target="_blank">プライバシーポリシー</a>を確認
            </p>
        </div>

        <!-- 次へ -->
        <button type="submit" name="commit" class="btn btn-primary btn-primary--grad 
        mx-auto mb-1 text-fw-bold">{{ __('同意して次へ') }}</button>
    </form>
</div>
<div class="container col-md-8 col-lg-6">
    <hr class="mb-3_5">
    <a href="{{ route('login') }}" class="text-center link--green d-block text-fz-14px mb-2 text-fw-bold">ユーザーの方はこちら（ログイン）</a>
    <a href="/users/confirmation/new" class="text-center link--green d-block text-fz-14px pb-5 text-fw-bold">確認メールの再送信はこちら</a>
</div>
@endsection
