@extends('layouts.app')

@section('edit-button')
    <a href="javascript:history.back()" class="position-absolute position--backbtn text-black-20 text-fz-18px">
        <i class="fas fa-chevron-left"></i>
    </a>
    @parent
    @if(Auth::user()->id === $circle->admin_user_id)
    <a href="{{ route('my_circle.menu', [$circle->id]) }}" class="position-absolute position--headerright
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
          {{ $circle->genres[0]->name }}
        </a>
      </li>
      <li class="pl-0 breadcrumb-item breadcrumb-item--pattern text-fz-14px">
        <a
          href="/search/akita/346" class="nav-link--gray"
        >
          {{ $circle->prefecture->name }}
        </a>
      </li>
    <li class="pl-0 breadcrumb-item breadcrumb-item--pattern text-fz-14px">
      <a href="" class="nav-link--gray">{{ $circle->name }}</a>
    </li>
  </ul>
</nav>
<div class="bg-white">
  <div class="container col-md-8 col-lg-6 pt-3">
    <div class="row">
      <div class="col-6">
        <p class="mb-0" style="font-weight: bold;font-size:13px;">
          <a href="" style="color: #2292a4;">&lt;&nbsp;「{{ $circle->category->name }}」一覧へ戻る</a>
        </p>
      </div>
      <div class="col-6">
        <p class="mb-0" style="font-weight: bold;font-size:13px;">
          <a href="" style="color: #2292a4;">&lt;&nbsp;「{{ $circle->prefecture->name }}の{{ $circle->genres[0]->name }}サークル」一覧へ戻る</a>
        </p>
      </div>
    </div>
  </div>
  <div class="container col-md-8 col-lg-6">
    <h1 style="font-size:18px;font-weight: bold;" class="m-0 pb-3 pt-3">【{{ $circle->prefecture->name }}】{{ $circle->genres[0]->name }}サークル</h1>
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
        class="w-100 event-img">
    @else
        <img
        src="/storage/UserImages/no_image.jpeg"
        onerror="this.src='/images/ja2/img_noimage.gif'"
        alt=""
        class="w-100 event-img">
    @endif
    </figure>
  </div>
  </div>

<div class="shadow-sm mb-3 bg-white pt-3 pb-3">
  <div class="container col-md-8 col-lg-6 h-100">
    <div class="scrollable-list mb-2">
      @foreach($circle->genres as $genre)
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
      <p class="twitter-share-btn d-flex justify-content-end">
        <a href="https://twitter.com/share?url=https%3A%2F%2Ftunagate.com%2Fcircle%2F34196&related=tunagate&hashtags=つなげーと&text=A - サークルで趣味やスポーツを楽しもう！ つなげーと" rel="nofollow" target="_blank"><i class="fa fa-twitter twitter-icon" style="font-size:14px;">&nbsp;&nbsp;ツイート</i></a>
      </p>
    </div>
    <div class="row no-gutters">
      <i class="fas fa-user-friends mr-3 d-flex">
        <p class="mb-2 icon icon-member mr-3 ml-2">
          {{ $circle->count }}
          <span class="text-fz-small">人</span>
        </p>
      </i>
      <i class="fas fa-map-marker-alt mr-2 d-flex">
        <p class="mb-2 icon icon-area ml-2">
          {{ $circle->prefecture->name }}
        </p>
      </i>
    </div>
    <hr class="mb-4 mt-0">
    <div class="grad-wrap">
      <div class="content-txt grad-item">
        <p class="description" style="font-size:16px;">{{ $circle->introduction }}</p>
      </div>
      <p class="description-show grad-trigger" style="color:#2292a4;cursor:pointer"></p>
    </div>
    <div class="card mb-4">
      <table class="table mb-2_5">
        <tbody>
          <tr>
            <td class="border-0 pt-1_5 pb-0 text-fz-14px pr-0 pl-3 w-20" style="white-space: nowrap">活動日：</td>
            <td class="border-0 pt-1_5 pb-0 text-fz-14px pl-1">{{ $circle->activityDay }}</td>
          </tr>
          <tr>
            <td class="border-0 pt-1_5 pb-0 text-fz-14px pr-0 pl-3 w-20" style="white-space: nowrap">年齢層：</td>
            <td class="border-0 pt-1_5 pb-0 text-fz-14px pl-1">
              @if($circle->ageGroup)
                {{ \App\Models\Circle::AGEGROUP[$circle->ageGroup] }}
              @endif
            </td>
          </tr>
          <tr>
            <td class="border-0 pt-2 pb-0 text-fz-14px pr-0 pl-3 w-20">その他費用：</td>
            <td class="border-0 pt-2 pb-0 text-fz-14px pl-1">{{ $circle->cost }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<section class="bg-white shadow-sm mb-4 pt-4 pb-3">
  <div class="container col-md-8 col-lg-6">
    <h2 class="h2 h2--extend -member2">メンバー<span class="text-fz-14px">({{ $circle->count }}人)</span></h2>
  </div>
  <hr class="m-0">
  <div class="container col-md-8 col-lg-6">
    <ul class="mb-3_5 list-unstyled">
    @foreach($members as $member) 
      @if($circle->admin_user_id == $member->id)
      <li>
        <div class="row align-items-start pt-3 pr-3 pl-3 pb-0">
          <div class="col-2 pl-0 pr-2">
          <img src="/storage/UserImages/{{ $member->profile->user_image }}" alt="" class="member-icon_48px rounded-circle">
          </div>
          <div class="row col border-bottom pb-2 align-items-start cricle-member-name">
          <div class="col pl-0">
              <p class="btn btn-outline-red  btn-sm--admin mr-2 d-inline-block text-center align-middle mb-2" style="pointer-events: none;">
                管理人</p>
            <a href="{{ route('profile.show', [ $member->profile->id ]) }}" style="text-decoration: none;">
                <p class="mb-0 text-fz-green text-fz-14px line-1">{{ $member->profile->name }}</p>
            </a>
          </div>
          <div class="col-7 p-0">
              <p class="card-text--ellipsis text-fz-14px text-black-50 mb-0" style="line-height: 1.71;">{{ $member->profile->introduction }}</p>
          </div>
          </div>
        </div>
      </li>
      @else
      <li>
        <div class="row align-items-start pt-3 pr-3 pl-3 pb-0">
          <div class="col-2 pl-0 pr-2">
            <img src="/storage/UserImages/{{ $member->profile->user_image }}" alt="" class="member-icon_48px rounded-circle">
          </div>
          <div class="row col border-bottom pb-2 align-items-center cricle-member-name">
            <div class="col pl-0">
              <a href="{{ route('profile.show', [ $member->profile->id ]) }}" style="text-decoration: none;">
                  <p class="mb-0 text-fz-green text-fz-14px line-1">{{ $member->profile->name }}</p>
              </a>
            </div>
            <div class="col-7 p-0">
              <p class="card-text--ellipsis text-fz-14px text-black-50 mb-0" style="line-height: 1.71;">{{ $member->profile->introduction }}</p>
            </div>
          </div>
        </div>
      </li>
      @endif
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
          <img class="card-img-top card-img-top--list"
          src="https://image.tunagate.com/circles/main_images/000/026/935/medium/A66AE58D-FAD6-4FB1-9953-312380AE9DB6.jpeg?1570981816">
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
        <a href="/circle/{{ $category->id }}/{{ $my_prefecture->id }}" class="display-block">
          <div class="card text-white text-center rounded border-0 ">
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
              <img src="/image/slide1.jpg" class="picture card-img" style="max-width: 350px; max-height: 138px; height: 30vw; object-fit: cover;">
              <div class="card-img-overlay--black">
              </div>
              </div>
              
            </a>
          </div>
          <div class="mb-2 pl-1 pr-1 ">
            <a  href="https://tunagate.com/article/tunagate-patia01?=top0214patia"
              class="display-block"
              target=&quot;_blank&quot;
              onClick="gtag('event', '', {'event_category': '','event_label': '/'});">
              <div class="text-white text-center rounded border-0">
              <img src="/image/slide2.jpg" class="picture card-img" style="max-width: 350px; max-height: 138px; height: 30vw; object-fit: cover;">
              <div class="card-img-overlay--black">
              </div>
              </div>
              
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- メンバー申請・フォロー -->
@if($approval!=2)
<section>
  <nav class="fixed-bottom" style="padding-bottom: 85px;">
    <div class="container col-md-8 col-lg-6">
      <div class="d-flex justify-content-around" style="margin-bottom:24px">
        @if($circle->request_required==0)
        <a id="apply_btn" class="btn btn-primary--grad text-white mr-2" data-toggle="modal" data-target="#application-modal" data-approval="{{ $approval }}">メンバー申請</a>
        @else
        <a id="apply_btn" class="btn btn-primary--grad text-white mr-2" data-toggle="modal" data-target="#application-modal" data-approval="{{ $approval }}">メンバーになる</a>
        @endif
        <a href="" class="btn btn-primary--grad btn-primary--grad--outline w-40">フォロー</a>
      </div>
    </div>
  </nav>

  <a  href="javascript:void(0);" class="circle-pref" style="color: black;"
  data-toggle="modal" data-target="#myAreaModal">
      主な活動地域を選択
  </a>
  <!-- モーダル -->
  <div class="modal fade " id="application-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog bg-gray h-" role="document">
      <div class="modal-content bg-gray border-0 h-100">
        <div class="modal-body card bg-gray h-100">
          <div class="bg-gray d-flex align-items-center">
            <button type="button" class="close pl-0 pr-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="font-size:30px;">&times;</span>
            </button>
            @if($circle->request_required==0)
              <h6 class="text-fw-bold text-center m-0 mx-auto align-middle" id="exampleModalLabel">メンバー申請</h6>
            @else
              <h6 class="text-fw-bold text-center m-0 mx-auto align-middle" id="exampleModalLabel">メンバーになる</h6>
            @endif
          </div>
          <form action="/circle_user/apply" class="create_circle" id="store_message" enctype="multipart/form-data"
          accept-charset="UTF-8" method="post" name="apply">
          {{ csrf_field() }}
          <textarea name="msg" id="application" class="border-0 rounded mt-3 mb-3 w-100" cols="30" rows="10"></textarea>
          <div class="align-items-center">
            <a href="javascript:apply.submit()" class="btn btn-primary--grad text-white mx-auto">メンバー申請を送信</a>
          </div>
          <input type="hidden" name="circle_id" value="{{ $circle->id }}" class="circle_id">
          <input type="hidden" name="user_id" value="{{ Auth::id() }}" class="user_id">
          <input type="hidden" name="msg_type" value="msg" class="msg_type">
          <input type="hidden" name="board_id" value="{{ $board->id }}" class="board_id">
          </form>
        </div>
      </div>
    </div>
</div>
</section>
@endif
<script>

$(window).on('load', function() {
  //必須項目をひとつずつチェック
  var approval = $('#apply_btn').attr('data-approval');
  //全て埋まっていたら
  if (approval == 1) {
    //送信ボタンを閉じる
    $('#apply_btn').addClass('disabled');
  }
  
});


</script>
@endsection