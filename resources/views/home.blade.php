@extends('layouts.app')

@section('content')

<div class="bg-white">
<ul id="carouselTopIndicators" class="carousel slide container col-md-8 col-lg-6 p-0 mb-0" 
data-ride="carousel" data-interval="4000" data-touch="true">
    <div class="carousel-inner">
        <li class="carousel-item active">
            <div class="adjust-box adjust-box-2x1 d-block w-100" style="width: 100%;">
                <div class="adjust-box-inner top-black-opacity"
                    style="background-image: url('image/slide1.jpg');
                    background-size: cover;
                    background-position: center center;
                    background-repeat: no-repeat;
                    background-color: #f1f1f1;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    ">
                    <p class="text-center h4 text-white" style="font-size: .875rem;">＼20,805サークル／ 掲載数日本一！</p>
                    <p class="mv-copy text-center h4 ">仲間を見つけて趣味を楽しもう！</p>
                </div>
            </div>
        </li>
        

        

        <li class="carousel-item">
            <div class="adjust-box adjust-box-2x1 d-block w-100" style="width: 100%;">
                <div class="adjust-box-inner top-black-opacity"
                    style="background-image: url('image/slide2.jpg');
                    background-size: cover;
                    background-position: center center;
                    background-repeat: no-repeat;
                    background-color: #f1f1f1;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    ">
                    <p class="text-center h4 text-white" style="font-size: .875rem;">＼20,805サークル／ 掲載数日本一！</p>
                    <p class="mv-copy text-center h4 ">仲間を見つけて趣味を楽しもう！</p>
                </div>
            </div>
        </li>
        <ol class="carousel-indicators">
        <li data-target="#carouselTopIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselTopIndicators" data-slide-to="1"></li>
        </ol>
        
        <a class="carousel-control-prev" href="#carouselTopIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselTopIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>

    </div>
</ul>
</div>
<div class="">
    <div class="cursor-pointer">
        <div class="search-box bg-gray p-3 container col-md-8 col-lg-6">
            <div class="row align-items-center justify-content-between 
            line-height-1 cursor-pointer">
                <p class="text-black-50 col-auto mb-0" style="font-size: .875rem;">
                    自分の地域を設定する
                </p>
                <p class="text-black-80 text-reset col-auto mb-0 icon icon-area icon-area-gray">
                <select name="pref">
                    <option value="" slected="selected">選択してください</option>
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                </select>
                </p>
            </div>
        </div>
    </div>    
</div>
<!-- 新規登録・ログイン -->
<section class="bg-white shadow-sm mb-3 pb-3">
    <div class="container col-md-8 col-lg-6">
        <h1 class="mv-copy-black h4 bg-white pt-3 pb-0 mb-0">
            <span style="font-size: .875rem;">\20,842サークル/</span>
            "&nbsp;&nbsp;&nbsp;掲載数日本一！"<br>
            "趣味のサークル探しと仲間づくりのサイト"
        </h1>
        <a href="{{ route('register') }}" class="btn btn-primary btn-primary-grad 
        mx-auto mb-1 text-fw-bold mt-3">新規登録・ログイン</a>
    </div>
</section>
<!-- 興味のあることから探す -->
<section class="bg-white shadow-sm mb-3 pt-4 pb-3">
    <div class="container col-md-8 col-lg-6">
        <h2 class="h2 h2--extend">
            "「興味・趣味からサークルを探す"
        </h2>
        <section class="pb-3">
            <div class="position-relative">
                <div class="row">
                    <div class="col-9 pr-0">
                        <input class="form-control mb-2 pl-5" 
                        type="text" placeholder="キーワードを入力" 
                        id="keyword-text" data-pref="">
                        <div class="input-icon position-absolute pl-3">
                            <i class="fas fa-search" style="font-size: 18px;"></i>
                        </div>
                    </div>
                    <div class="col-3 pl-2">
                        <button type="submit" class="btn btn-warning btn-warning--grad" 
                        id="keyword-submit-btn" style="width: 100%;">
                        検索</button>
                    </div>
                </div>
            </div>
        </section>
        <div class="row pl-2 pr-2">
            <div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-2 pl-1 pr-1">
                <a href="" class="display-block">
                    <div class="card text-white text-center 
                    rounded border-0">
                        <img src="image/slide1.jpg" class="picture card-img" 
                        style="height: 90px">
                        <div class="card-img-overlay card-img-overlay--black" style="height: 90px;">
                            <h3 class="card-title card-title--extend mb-0">体をうごかす<br><span class="text-fz-small">サークルを探す</span></h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-2 pl-1 pr-1">
                <a href="" class="display-block">
                    <div class="card text-white text-center 
                    rounded border-0">
                        <img src="image/slide1.jpg" class="picture card-img" 
                        style="height: 90px">
                        <div class="card-img-overlay card-img-overlay--black" style="height: 90px;">
                            <h3 class="card-title card-title--extend mb-0">みんなで学ぶ<br><span class="text-fz-small">サークルを探す</span></h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-2 pl-1 pr-1">
                <a href="" class="display-block">
                    <div class="card text-white text-center 
                    rounded border-0">
                        <img src="image/slide1.jpg" class="picture card-img" 
                        style="height: 90px">
                        <div class="card-img-overlay card-img-overlay--black" style="height: 90px;">
                            <h3 class="card-title card-title--extend mb-0">みんなで行く<br><span class="text-fz-small">サークルを探す</span></h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-2 pl-1 pr-1">
                <a href="" class="display-block">
                    <div class="card text-white text-center 
                    rounded border-0">
                        <img src="image/slide1.jpg" class="picture card-img" 
                        style="height: 90px">
                        <div class="card-img-overlay card-img-overlay--black" style="height: 90px;">
                            <h3 class="card-title card-title--extend mb-0">みんなで食べる<br><span class="text-fz-small">サークルを探す</span></h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-2 pl-1 pr-1">
                <a href="" class="display-block">
                    <div class="card text-white text-center 
                    rounded border-0">
                        <img src="image/slide1.jpg" class="picture card-img" 
                        style="height: 90px">
                        <div class="card-img-overlay card-img-overlay--black" style="height: 90px;">
                            <h3 class="card-title card-title--extend mb-0">みんなで創る<br><span class="text-fz-small">サークルを探す</span></h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-2 pl-1 pr-1">
                <a href="" class="display-block">
                    <div class="card text-white text-center 
                    rounded border-0">
                        <img src="image/slide1.jpg" class="picture card-img" 
                        style="height: 90px">
                        <div class="card-img-overlay card-img-overlay--black" style="height: 90px;">
                            <h3 class="card-title card-title--extend mb-0">みんなで遊ぶ<br><span class="text-fz-small">サークルを探す</span></h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-2 pl-1 pr-1">
                <a href="" class="display-block">
                    <div class="card text-white text-center 
                        rounded border-0">
                        <img src="image/slide1.jpg" class="picture card-img" 
                        style="height: 90px">
                        <div class="card-img-overlay card-img-overlay--black" style="height: 90px;">
                            <h3 class="card-title card-title--extend mb-0">20代・30代男女で楽しむ<br><span class="text-fz-small">サークルを探す</span></h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-2 pl-1 pr-1">
                <a href="" class="display-block">
                    <div class="card text-white text-center 
                        rounded border-0">
                        <img src="image/slide1.jpg" class="picture card-img" 
                        style="height: 90px">
                        <div class="card-img-overlay card-img-overlay--black" style="height: 90px;">
                            <h3 class="card-title card-title--extend mb-0">大人の友達探し<br><span class="text-fz-small">サークルを探す</span></h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-2 pl-1 pr-1">
                <a href="" class="display-block">
                    <div class="card text-white text-center 
                        rounded border-0">
                        <img src="image/slide1.jpg" class="picture card-img" 
                        style="height: 90px">
                        <div class="card-img-overlay card-img-overlay--black" style="height: 90px;">
                            <h3 class="card-title card-title--extend mb-0">みんなで語る<br><span class="text-fz-small">サークルを探す</span></h3>
                        </div>
                    </div>
                </a>
            </div>
            
        </div>
    </div>
</section>

@endsection
