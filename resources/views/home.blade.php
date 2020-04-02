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
                
                <a  href="javascript:void(0);" class="text-black-50 col-auto mb-0" style="font-size: .875rem;" data-toggle="modal" data-target="#myAreaModal">
                    自分の地域を設定する
                </a>
                <div class="modal fade" id="myAreaModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>
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
        <a href="{{ route('register') }}" class="btn btn-primary btn-primary--grad 
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
            <div class="col-12 mb-2">
                <h2 class="h2 h2--extend mt-4 mb-3">
                    "今日のイチオシ情報"
                </h2>
                <div class="row pl-0 info-slide slider" style="justify-content: center; align-items: center;">
                    <div class="mb-2 pl-1 pr-1">
                        <a  href="https://tunagate.com/article/tunagate-patia01?=top0214patia"
                            class="display-block"
                            target=&quot;_blank&quot;
                            onClick="gtag('event', '', {'event_category': '','event_label': '/'});">
                            <div class="text-white text-center rounded border-0">
                            <img src="image/slide1.jpg" class="picture card-img" style="max-width: 350px; max-height: 138px; height: 30vw; object-fit: cover;">
                            <div class="card-img-overlay--black">
                            </div>
                            </div>
                            <script style="display: none;">
                                gtag('event', '', {'event_category': '','event_label': '/'});
                            </script>
                        </a>
                    </div>
                    <div class="mb-2 pl-1 pr-1 ">
                        <a  href="https://tunagate.com/article/tunagate-patia01?=top0214patia"
                            class="display-block"
                            target=&quot;_blank&quot;
                            onClick="gtag('event', '', {'event_category': '','event_label': '/'});">
                            <div class="text-white text-center rounded border-0">
                            <img src="image/slide2.jpg" class="picture card-img" style="max-width: 350px; max-height: 138px; height: 30vw; object-fit: cover;">
                            <div class="card-img-overlay--black">
                            </div>
                            </div>
                            <script style="display: none;">
                                gtag('event', '', {'event_category': '','event_label': '/'});
                            </script>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
.info-slide .slick-dots {
  position: absolute;
  bottom: -20px;
  display: block;
  width: 100%;
  padding: 0;
  margin: 0;
  list-style: none;
  text-align: center;
}

.info-slide .slick-dots li button:before {
  color: gray;
  opacity: 0.7;
}

.info-slide .slick-dots li.slick-active button:before {
  color: black;
  opacity: 1;
}
</style>

<!-- 人気のサークルから探す -->
<section class="bg-white shadow-sm mb-3 pt-4 pb-3">
    <div class="container col-md-8 col-lg-6">
        <h2 class="h2 h2--extend -crown">「人気順」からサークルを探す</h2>
        <ul class="scrollable-list pl-0 ib-list d-flex">
            <li class="d-inline-block mr-2">
                <a href="" class="card card--circle hov--default border-0">
                    <h4 class="mb-2 line-1" style="font-size: 13px; font-weight: bold;">バドミントンサークルバドミントンサークル</h4>
                    <img src="image/slide5.jpg" class="card-img-top card-img-top--list">
                    <div class="card-body card-body--narrow border 
                    rounded-bottom border-top-0 pb-4">
                        <div class="d-flex scrollable-list">
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル１</p>
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル２</p>
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル３</p>
                        </div>
                        <div class="row no-gutters">
                            <i class="fas fa-map-marker-alt mr-2"><p>地域(県)</p></i>
                            <i class="fas fa-map-marker-alt mr-2"><p>人数</p></i>
                        </div>
                        <p class="card-text card-text--ellipsis mb-2">
                            紹介文・・・バドミントンサークルです。創立１００周年の伝統あるサークルです。
                        </p>
                        <p class="text-black-20 text-fz-small mb-0 card-bottommeta card-text--ellipsis_1">
                            サークル名
                        </p>
                    </div>
                </a>
            </li>
            <li class="d-inline-block mr-2">
                <a href="" class="card card--circle hov--default border-0">
                    <h4 class="mb-2 line-1" style="font-size: 13px; font-weight: bold;">野球サークル</h4>
                    <img src="image/slide6.jpg" class="card-img-top card-img-top--list">
                    <div class="card-body card-body--narrow border 
                    rounded-bottom border-top-0 pb-4">
                        <div class="d-flex scrollable-list">
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル１</p>
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル２</p>
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル３</p>
                        </div>
                        <div class="row no-gutters">
                            <i class="fas fa-map-marker-alt mr-2"><p>地域(県)</p></i>
                            <i class="fas fa-map-marker-alt mr-2"><p>人数</p></i>
                        </div>
                        <p class="card-text card-text--ellipsis mb-2">
                            野球サークルです。素人から甲子園経験者までさまざまなメンバーが和気藹々と練習しています。
                        </p>
                        <p class="text-black-20 text-fz-small mb-0 card-bottommeta card-text--ellipsis_1">
                            サークル名
                        </p>
                    </div>
                </a>
            </li>
            <li class="d-inline-block mr-2">
                <a href="" class="card card--circle hov--default border-0">
                    <h4 class="mb-2 line-1" style="font-size: 13px; font-weight: bold;">飲み会サークル</h4>
                    <img src="image/slide4.jpg" class="card-img-top card-img-top--list">
                    <div class="card-body card-body--narrow border 
                    rounded-bottom border-top-0 pb-4">
                        <div class="d-flex scrollable-list">
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル１</p>
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル２</p>
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル３</p>
                        </div>
                        <div class="row no-gutters">
                            <i class="fas fa-map-marker-alt mr-2"><p>地域(県)</p></i>
                            <i class="fas fa-map-marker-alt mr-2"><p>人数</p></i>
                        </div>
                        <p class="card-text card-text--ellipsis mb-2">
                            毎週金曜日飲み会を開催しています。お酒の飲めない人も気軽に参加してください。
                        </p>
                        <p class="text-black-20 text-fz-small mb-0 card-bottommeta card-text--ellipsis_1">
                            サークル名
                        </p>
                    </div>
                </a>
            </li>
        </ul>
        <p class="text-center mb-0"><a href="" class="btn btn-outline-info w-100 
        text-fw-bold mb-2" style="font-size: 15px;">「人気順」のサークルをもっと見る</a></p>
    </div>
</section>

<!-- 新着のサークルから探す -->
<section class="bg-white shadow-sm mb-3 pt-4 pb-3">
    <div class="container col-md-8 col-lg-6">
        <h2 class="h2 h2--extend -new">「新着順」からサークルを探す</h2>
        <ul class="scrollable-list pl-0 ib-list d-flex">
            <li class="d-inline-block mr-2">
                <a href="" class="card card--circle hov--default border-0">
                    <h4 class="mb-2 line-1" style="font-size: 13px; font-weight: bold;">バドミントンサークルバドミントンサークル</h4>
                    <img src="image/slide5.jpg" class="card-img-top card-img-top--list">
                    <div class="card-body card-body--narrow border 
                    rounded-bottom border-top-0 pb-4">
                        <div class="d-flex scrollable-list">
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル１</p>
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル２</p>
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル３</p>
                        </div>
                        <div class="row no-gutters">
                            <i class="fas fa-map-marker-alt mr-2"><p>地域(県)</p></i>
                            <i class="fas fa-map-marker-alt mr-2"><p>人数</p></i>
                        </div>
                        <p class="card-text card-text--ellipsis mb-2">
                            紹介文・・・バドミントンサークルです。創立１００周年の伝統あるサークルです。
                        </p>
                        <p class="text-black-20 text-fz-small mb-0 card-bottommeta card-text--ellipsis_1">
                            サークル名
                        </p>
                    </div>
                </a>
            </li>
            <li class="d-inline-block mr-2">
                <a href="" class="card card--circle hov--default border-0">
                    <h4 class="mb-2 line-1" style="font-size: 13px; font-weight: bold;">野球サークル</h4>
                    <img src="image/slide6.jpg" class="card-img-top card-img-top--list">
                    <div class="card-body card-body--narrow border 
                    rounded-bottom border-top-0 pb-4">
                        <div class="d-flex scrollable-list">
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル１</p>
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル２</p>
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル３</p>
                        </div>
                        <div class="row no-gutters">
                            <i class="fas fa-map-marker-alt mr-2"><p>地域(県)</p></i>
                            <i class="fas fa-map-marker-alt mr-2"><p>人数</p></i>
                        </div>
                        <p class="card-text card-text--ellipsis mb-2">
                            野球サークルです。素人から甲子園経験者までさまざまなメンバーが和気藹々と練習しています。
                        </p>
                        <p class="text-black-20 text-fz-small mb-0 card-bottommeta card-text--ellipsis_1">
                            サークル名
                        </p>
                    </div>
                </a>
            </li>
            <li class="d-inline-block mr-2">
                <a href="" class="card card--circle hov--default border-0">
                    <h4 class="mb-2 line-1" style="font-size: 13px; font-weight: bold;">飲み会サークル</h4>
                    <img src="image/slide4.jpg" class="card-img-top card-img-top--list">
                    <div class="card-body card-body--narrow border 
                    rounded-bottom border-top-0 pb-4">
                        <div class="d-flex scrollable-list">
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル１</p>
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル２</p>
                            <p class="btn btn-outline-primary btn-outline-blue 
                            btn-sm btn-sm--expand mr-2">ジャンル３</p>
                        </div>
                        <div class="row no-gutters">
                            <i class="fas fa-map-marker-alt mr-2"><p>地域(県)</p></i>
                            <i class="fas fa-map-marker-alt mr-2"><p>人数</p></i>
                        </div>
                        <p class="card-text card-text--ellipsis mb-2">
                            毎週金曜日飲み会を開催しています。お酒の飲めない人も気軽に参加してください。
                        </p>
                        <p class="text-black-20 text-fz-small mb-0 card-bottommeta card-text--ellipsis_1">
                            サークル名
                        </p>
                    </div>
                </a>
            </li>
        </ul>
        <p class="text-center mb-0"><a href="" class="btn btn-outline-info w-100 
        text-fw-bold mb-2" style="font-size: 15px;">「新着順」のサークルをもっと見る</a></p>
    </div>
</section>

<!-- サークルを作る -->
<section class="bg-white shadow-sm mb-3 pt-4 pb-3">
    <div class="container col-md-8 col-lg-6">
        <h2 class="h2 h2--extend -plus mb-2">サークルを作ろう！</h2>
        <p class="text-black-50">つなげーとで募集〜運営まで完結できます！</p>
        <div class="text-center mb-4">
            <h5 class="h5--18px"><span class="number-circle">1</span>サークルで仲間を集めよう！！</h5>
            <p class="text-center pl-2">趣味・興味・関心のあることで仲間を集められる！</p>
            <h5 class="h5--18px"><span class="number-circle">2</span>イベントを主催して楽しもう！</h5>
            <p class="text-center pl-2">イベントを行うことで更に仲間を増やせる！！</p>
            <h5 class="h5--18px"><span class="number-circle">3</span>サークル運営費を獲得しよう！</h5>
            <p class="text-center pl-2">みんなが集まるイベントを企画して収益を上げよう！</p>
        </div>
        <a href="" class="btn btn-primary btn-primary--grad 
        mx-auto text-fw-bold line-height-2_45"><span class="text-fz-24px 
        position-relative">+</span>サークルを作る</a>
    </div>
</section>

@endsection
