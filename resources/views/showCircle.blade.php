@extends('layouts.app')

@section('edit-button')
    <a href="javascript:history.back()" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
    @if(Auth::user()->id === $circle->admin_user_id)
    <a href="{{ route('circle.menu', [$circle->id]) }}" class="position-absolute position--headerright
     text-black-20 text-fz-18px">
        <i class="fa fa-bars"></i>
    </a>
    @endif
@endsection


@section('content')
<nav aria-label="breadcrumb" class="bg-gray">
  <ul class="mb-0 rounded-0 scrollable-list breadcrumb--scroll pt-1 pb-1 container col-md-8 col-lg-6">
    <li class="breadcrumb-item breadcrumb-item--pattern text-fz-14px"><a href="/" class="nav-link--gray">TOP</a></li>
        <li class="pl-0 breadcrumb-item breadcrumb-item--pattern text-fz-14px">
          <a href="/sportsactivity" class="nav-link--gray">
            体をうごかす
          </a>
        </li>
      <li class="pl-0 breadcrumb-item breadcrumb-item--pattern text-fz-14px">
        <a href="/search/all/346" class="nav-link--gray">
          スキー
        </a>
      </li>
      <li class="pl-0 breadcrumb-item breadcrumb-item--pattern text-fz-14px">
        <a
          href="/search/akita/346" class="nav-link--gray"
        >
          秋田県
        </a>
      </li>
    <li class="pl-0 breadcrumb-item breadcrumb-item--pattern text-fz-14px">
      <a href="" class="nav-link--gray">A</a>
    </li>
  </ul>
</nav>
  <div class="bg-white">
    <div class="container col-md-8 col-lg-6 pt-3">
    <div class="row">
        <div class="col-6">
            <p class="mb-0" style="font-weight: bold;font-size:13px;"><a href="/sportsactivity/akita">&lt;&nbsp;「体をうごかす」一覧へ戻る</a></p>
        </div>
        <div class="col-6">
            <p class="mb-0" style="font-weight: bold;font-size:13px;"><a href="/search/akita/346">&lt;&nbsp;「秋田県のスキーサークル」一覧へ戻る</a></p>
        </div>
    </div>
    </div>
<div class="container col-md-8 col-lg-6">
  <h1 style="font-size:18px;font-weight: bold;" class="m-0 pb-3 pt-3">【{{ $circle_pref->name }}】{{ $genres[0]->name }}サークル</h1>
</div>
    <div class="event-img-wrap container col-md-8 col-lg-6 pl-0 pr-0">
          <div  style="position: relative;">
            <div id="toast-premium-plan" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false" style="position: absolute; top: 8px; left: 8px; z-index: 1;">
              <div class="toast-header">
                <strong class="mr-auto">有料プランのおすすめ</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="toast-body">
                集客の悩みをまるっと解決！
                メンバー募集を加速させましょう！<br><br>
                <a href="https://tunagate.com/circle/payment/ready/34196?md=2019">有料プランについて詳しく見る</a>
              </div>
            </div>
          </div>
          <script>
            $(function() {
              $('#toast-premium-plan').toast('show');
            });
          </script>

        <figure class="position-relative m-0">
        @if($circle->image)
            <img
            src="/storage/CircleImages/{{ $circle->image }}"
            onerror="this.src='/images/ja2/img_noimage.gif'"
            alt=""
            class="w-100 event-img"
            >
        @else
            <img
            src="/storage/UserImages/no_image.jpeg"
            onerror="this.src='/images/ja2/img_noimage.gif'"
            alt=""
            class="w-100 event-img"
            >
        @endif
        </figure>
    </div>
  </div>

  <div class="shadow-sm mb-3 bg-white pt-3 pb-3">
    <div class="container col-md-8 col-lg-6 h-100">
        <div class="scrollable-list mb-2">
            @foreach($genres as $genre)
            <a href="/search/akita/346">
              <p class="btn btn-outline-primary btn-outline-blue btn-sm btn-sm--expand mr-2 d-inline-block mb-0">
                {{ $genre->name }}
              </p>
            </a>
            @endforeach
        </div>
        <h2 id="circle-name" class="h5--20px mb-1">
          {{ $circle->name }}
        </h2>
        <div class="d-flex justify-content-end">
          <p class="twitter-share-btn d-flex justify-content-end"><a href="https://twitter.com/share?url=https%3A%2F%2Ftunagate.com%2Fcircle%2F34196&related=tunagate&hashtags=つなげーと&text=A - サークルで趣味やスポーツを楽しもう！ つなげーと" rel="nofollow" target="_blank"><i class="fa fa-twitter twitter-icon" style="font-size:14px;">&nbsp;&nbsp;ツイート</i></a></p>
        </div>

      <div class="row no-gutters">
        <p class="mb-2 icon icon-member mr-3">
          2
          <span class="text-fz-small">人</span>
        </p>
          <p class="mb-2 icon icon-area">
            {{ $circle_pref->name }}
          </p>
      </div>
      <hr class="mb-4 mt-0">
        <p class="description line-3" style="font-size:16px;">{{ $circle->name }}</p>
        <p><a class="description-show" style="color:#2292a4;cursor:pointer">もっと読む…</a></p>
        <p><a class="description-delete link--green" style="display:none;color:#2292a4;cursor:pointer">閉じる</a></p>
      <div class="card mb-4">
        <table class="table mb-2_5">
          <tbody>
            <tr>
              <td class="border-0 pt-1_5 pb-0 text-fz-14px pr-0 pl-3 w-20" style="white-space: nowrap">活動日：</td>
              <td class="border-0 pt-1_5 pb-0 text-fz-14px pl-1">
                
                
              </td>
            </tr>
            <tr>
                <td class="border-0 pt-1_5 pb-0 text-fz-14px pr-0 pl-3 w-20" style="white-space: nowrap">年齢層：</td>
                <td class="border-0 pt-1_5 pb-0 text-fz-14px pl-1"></td>
            </tr>
            <tr>
              <td class="border-0 pt-2 pb-0 text-fz-14px pr-0 pl-3 w-20">その他費用：</td>
              <td class="border-0 pt-2 pb-0 text-fz-14px pl-1"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

      


  <section class="bg-white shadow-sm mb-4 pt-4 pb-3">
    <div class="container col-md-8 col-lg-6">
      <h2 class="h2 h2--extend -member2">メンバー<span class="text-fz-14px">(2人)</span></h2>
    </div>
    <hr class="m-0">
    <div class="container col-md-8 col-lg-6">
        <ul class="mb-3_5 list-unstyled">
        @foreach($members as $member) 
            <li>
            <div class="row align-items-start pt-3 pr-3 pl-3 pb-0">
                <div class="col-2 pl-0 pr-2">
                <img src="/storage/UserImages/{{ $member->user_image }}" alt="" class="member-icon_48px rounded-circle">
                </div>
                <div class="row col border-bottom pb-2 align-items-start cricle-member-name">
                <div class="col pl-0"><img src="/aseets2019/img/circle/icon_admin.svg" alt="" class="mb-2">
                <a href="/member/profile/@anje" style="text-decoration: none;">
                    <p class="mb-0 text-fz-green text-fz-14px line-1">{{ $member->name }}</p>
                </a>
                </div>
                <div class="col-7 p-0">
                    <p class="card-text--ellipsis text-fz-14px text-black-50 mb-0" style="line-height: 1.71;">{{ $member->introduction }}</p>
                </div>
                </div>
            </div>
            </li>
        @endforeach
        </ul>
      <p class="text-center mb-0"><a href="/circle/34196/members" class="link--next text-black-20">メンバーをもっと見る</a></p>
      </div>
  </section>

    <section class="bg-white shadow-sm mb-3 pt-4 pb-3">
      <div class="container col-md-8 col-lg-6">
        <h2 class="h2 h2--extend -crown">あなたへのおすすめサークル</h2>
        <ul class="scrollable-list pl-0 ib-list d-flex">
            <li class="d-inline-block mr-2">
  <a class="card card--circle hov--default border-0" href="/circle/26935">
    <h4 class="mb-2 line-1" style="font-size: 13px;font-weight: bold;">スポーツ全般サークル</h4>
    <img
      class="card-img-top card-img-top--list"
      src="https://image.tunagate.com/circles/main_images/000/026/935/medium/A66AE58D-FAD6-4FB1-9953-312380AE9DB6.jpeg?1570981816"
    >
    <div class="card-body card-body--narrow border rounded-bottom border-top-0 pb-4 ">
      <div class="d-flex scrollable-list">
          <p class="btn btn-outline-primary btn-outline-blue btn-sm btn-sm--expand mr-2">スポーツ全般</p>
          <p class="btn btn-outline-primary btn-outline-blue btn-sm btn-sm--expand mr-2">スノーボード</p>
          <p class="btn btn-outline-primary btn-outline-blue btn-sm btn-sm--expand mr-2">スキー</p>
      </div>
      <div class="row no-gutters">
        <p class="mb-0 icon icon-area mr-2">
          愛知県
        </p>
        <p class="mb-0 icon icon-member">
          5人以下
        </p>
      </div>
      <p class="card-text card-text--ellipsis mb-2">夏も終わり…
冬に近づいてきましたね^_^
今のうちから…笑

雪山行きたい、初心者から上級者もみんなでワイワイ乗り合わせでいきましょう！！

主にカレンダー通り土日祝、名古屋市内から岐阜県や長野県のスキー場に向かいます^_^

行けるようでしたら、帰りの温泉や、飲み会、鍋パなどげきたら最高ですね^_^

ここを機会に雪山仲間増えたら楽しいと思いますので、気軽に声かけて下さい！

宜しくお願い致します(^O^)</p>
      <p class="text-black-20 text-fz-small mb-0 card-bottommeta card-text--ellipsis_1 ">スキー&amp;スノーボード GO GO</p>
    </div>
  </a>
</li>
        </ul>
      </div>
    </section>

    <div data-react-class="redux/components/circle/circle_join_request_form" data-react-props="{&quot;circle&quot;:{&quot;id&quot;:34196}}" data-hydrate="t"><div data-reactroot=""><div id=""><div id=""><div class="cursor-pointer"><button type="button" class="mx-auto btn btn-primary--grad btn-primary--grad--outline mb-4">サークルに問い合わせる</button></div></div></div></div></div>


  <!-- 興味のあることから探す -->
<section class="bg-white mb-3 pt-4 pb-3">
  <div class="container col-md-8 col-lg-6">
    <h2 class="h2 h2--extend">「興味・趣味」からサークルを探す</h2>


    <div class="row pl-2 pr-2">
        @foreach($categories as $category)
        <div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-2 pl-1 pr-1">
            <a href="" class="display-block">
                <div class="card text-white text-center 
                rounded border-0 ">
                @if($category->image)
                    <img class="picture card-img" src="/storage/CategoryImages/{{ $category->image }}" style="height: 90px">
                @else
                    <img class="picture card-img" src="/storage/UserImages/no_image.jpeg" style="height: 90px; filter:brightness(10%);">
                @endif
                    <div class="card-img-overlay card-img-overlay--black" style="height: 90px;">
                        <h3 class="card-title card-title--extend mb-0">{{ $category->name }}<br>
                        <span class="text-fz-small">サークルを探す</span></h3>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
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
</section>


<!-- tunagariのスペース -->
  <section class="bg-pickup container col-md-8 col-lg-6 mb-2 pt-2 pb-4">
    <p class="text-center mt-2"><span class="badge badge-pill badge-danger p-2 pl-4 pr-4 text-fz-14px" style="letter-spacing: 0.5em;">注目の新サービス</span></p>
    <p class="text-white text-center text-fz-small mb-1">オンラインなのにコーディネーターが同伴！？</p>
    <h2 class="text-white text-center text-fz-20px text-fw-bold mt-1 mb-1">「Zoom」を使って<br>新しい友達と出会おう！</h2>
    <p class="text-white text-fz-14px mt-2 mb-1 text-center">
      つなげーとが提案する新しい「安心」な出会いの形
    </p>
    <ul class="list-group list-group--event">
      <li class="list-group-item border-top-0 mt-3 pl-1 pr-1">
  <a class="hov--default display-block" href="/tunagari/events/95495">
    <div class="row pl-1 pr-1">
      <img class="object-fit-cover w-100 rounded col-4 pr-0" src="https://image.tunagate.com/events/main_images/000/095/495/medium/%E3%81%A4%E3%81%AA%E3%81%8B%E3%82%99%E3%82%8A.png?1589965211" alt="【早朝開催マスクOK/23-36歳限定】出勤前にサクッと友達マッチングに参加しよう！！" onerror="this.src='/images/ja2/img_noimage.gif'">
      <div class="col-8">
        <p class="text-fw-bold text-danger text-fz-20px mt-1 mb-1">絶賛募集中！</p>
        <p class="text-fw-bold mb-1 text-fz-14px">5/30(土) 08:00〜08:00</p>
        <p class="text-fw-bold mb-1 d-none d-lg-block">【早朝開催マスクOK/23-36歳限定】出勤前にサクッと友達マッチングに参加しよう！！</p>
      </div>
    </div>
    <p class="text-fw-bold mt-2 mb-2 pl-2 pr-2 d-lg-none">【早朝開催マスクOK/23-36歳限定】出勤前にサクッと友達マッチングに参加しよう！！</p>
    <table class="table table-sm mt-0 text-center text-fw-bold text-fz-14px" style="table-layout: fixed; color: #777;">
      <tbody>
        <tr style="border-top: 0;">
            <td colspan="3" style="background-color:#f69679" class="text-white">女性</td>
            <td colspan="3">
                募集中
            </td>
            <td colspan="3" style="background-color:#8490c8" class="text-white">男性</td>
            <td colspan="3">
                募集中
            </td>
        </tr>
        <tr>
            <td colspan="3" style="color:#f69679">年齢条件</td>
            <td colspan="3" class="pr-0 pl-0">23〜36歳</td>
            <td colspan="3" style="color:#8490c8">年齢条件</td>
            <td colspan="3" class="pr-0 pl-0">25〜37歳</td>
        </tr>
        <tr>
            <td colspan="3" style="color:#f69679">参加費</td>
            <td colspan="3">400円</td>
            <td colspan="3" style="color:#8490c8">参加費</td>
            <td colspan="3">600円</td>
        </tr>
        <tr>
          <td colspan="5">イベント形式</td>
          <td colspan="7">１対１の男女マッチング</td>
        </tr>
        <tr>
          <td colspan="5">所要時間</td>
          <td colspan="7"></td>
        </tr>
        <tr>
          <td colspan="5">参加条件</td>
          <td colspan="7">全国</td>
        </tr>
      </tbody>
    </table>
    <p class="list-group--item-event__anchor mt-2 mb-0">詳細を見る</p>
  </a>
</li>
    </ul>
    <p class="text-center mb-0 mt-4 special-events-show"><a href="/tunagari/events" class="btn btn-outline-info w-100 text-fw-bold mb-2" style="font-size: 15px; color: #fff; border-color: #fff;">他の日程をもっと見る</a></p>
    <p class="text-center mb-0 mt-2 special-events-show"><a href="/tunagari" class="btn btn-info w-100 text-fw-bold mb-0" style="font-size: 15px; color: #fff; border-color: #fff;">新サービスの説明</a></p>
  </section>

<!-- つなげーとランチ会のスペース -->

<div class="container col-md-8 col-lg-6 pl-0 pr-0 pt-3">
    <div class="header-info">
    <div class="container col-md-8 col-lg-6">
      <p id="header-top-info" class="header-info-text line-1"><a href="https://tunagate.com/article/corona" style="color: #fff; text-decoration: underline;" target="_blank">新型コロナウイルスをはじめとする感染予防および拡散防止について</a><br>
    </div>
  </div>
</div>

<style>
.tunagate-featured .slick-dots {
  position: absolute;
  bottom: -20px;
  display: block;
  width: 100%;
  padding: 0;
  margin: 0;
  list-style: none;
  text-align: center;
}

.tunagate-featured .slick-dots li button:before {
  color: gray;
  opacity: 0.7;
}

.tunagate-featured .slick-dots li.slick-active button:before {
  color: black;
  opacity: 1;
}
</style>

<script>
  $(function() {
    $('#keyword-submit-btn').on('click', function() {
      var pref_key = $('#keyword-text').data('pref')
      var keyword = $('#keyword-text').val();
      if (keyword == '' && pref_key == '') {
        window.location.href = `/search/all`;
      } else if (keyword == '' && pref_key != '') {
        window.location.href = `/search/${pref_key}`;
      } else if (keyword != '' && pref_key == '') {
        window.location.href = `/search?keyword=${keyword}`;
      } else if (keyword != '' && pref_key != '') {
        window.location.href = `/search/${pref_key}?&keyword=${keyword}`;
      }
    });

    $('#keyword-text').keypress(function(e) {
      if (e.which == 13) {
        $('#keyword-submit-btn').click();
      }
    })

    $('.tunagate-featured').slick({
      autoplay: true,
      autoplaySpeed: 2500,
      speed: 800,
      arrows: false,
      slidesToShow: 2,
      slidesToScroll: 1,
      dots: true,
      responsive: [
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '20%',
          }
        }
      ]
    });
  });
</script>
@endsection