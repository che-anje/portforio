@extends('layouts.app')

@section('content')
<hr class="m-0">

<div class="container col-md-8 col-lg-6">
    <h1 class="h5--18px text-center mt-3 mb-3">ログイン</h1>
    <p class="text-fz-14px text-fw-bold text-black-50 mb-2">メールアドレスでログイン</p>
</div>
<div class="col-md-6 col-lg-6 p-0 container mb-3">
    <form class="mb-1" id="new_user" method="POST" action="{{ route('login') }}" accept-charset="UTF-8">
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
        <!-- ログインする -->
        <button type="submit" name="commit" class="btn btn-primary btn-primary--grad 
        mx-auto mb-2 mt-3 text-fw-bold">{{ __('ログインする') }}</button>
    </form>
    <hr class="m-0">
    <form class="mb-1" id="new_user" method="POST" action="{{ route('login') }}" accept-charset="UTF-8">
        @csrf
        <input type="hidden" name="authenticity_token" value="TSFaCIy40j3lniqREkjSeJTcuZIm2lJP8Fzg0ZSRZH+4a3YcWQaDYVBa3eZ/DQuxEZ7raryP1kzFez8z2AKJcg==" />
        <input id="invite_activation_key" name="user[invite_activation_key]" type="hidden" value="" />
        <!-- メールアドレス -->
        <input autofocus="autofocus" id="email" type="hidden" name="email" placeholder="メールアドレス" 
        class="form-control mb-0 rounded-0 border-0 pt-4_5 pb-4_5 @error('email') is-invalid @enderror" value="guest@desu" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <!-- パスワード -->
        <input autocomplete="off" id="password" type="hidden" name="password" placeholder="パスワード" value="guestdesu"
        class="form-control mb-0 rounded-0 border-0 pt-4_5 pb-4_5 @error('password') is-invalid @enderror" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <!-- ログインする -->
        <div class="position-relative">
        <button  type="submit" name="commit" class="btn btn-primary btn-primary--grad 
        mx-auto mb-1 mt-2 text-fw-bold suzuki position-relative">{{ __('ゲストユーザーでログイン') }}</button>
        <p class="fukidashi">既存ユーザー：鈴木一郎でログインできます。<br><span style="font-size: 0.7rem;">※プロフィールは編集できません</span></p>
        </div>
    </form>
</div>
<div class="container col-md-8 col-lg-6 pb-2">
    <a href="{{ route('register') }}" class="text-center link--green d-block text-fz-14px mb-2 text-fw-bold">初めての方はこちら（新規会員登録）</a>
</div>
    
@endsection
