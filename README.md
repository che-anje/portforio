# CIRCLE APP
====

# 概要
"CIRCLE APP"は自由にサークルを作って同じ趣味の人と繋がるイベントポータルサイトです。

# 制作背景
社会人になると会社の同僚以外で新たな友人を作りづらく、学生時代の友人は予定が合わず会えないことが多い。共通の趣味や休みの合う人たちと繋がれるアプリが欲しいと思い作成しました。

# 仕様・使い方
### ① 誰でも簡単にサークルを作れます
ログイン後、サークル作成へ進む から作成できます。
ジャンルを３つまで選択し、必須項目を埋めたら「作成する」で作成完了。<br>
<br>
<img src="./README_IMAGES/createCircle.gif" width="400px">

### ② サークルを探す
地域、カテゴリー、ジャンル、キーワードでの検索が可能です。<br>
<br>
<img src="./README_IMAGES/search_circle.gif" width="400px">

### ③ メンバー申請する
申請後、サークル管理者に参加メッセージが送信されます。
承認されるとサークルのグループチャットに参加できます。<br>
<br>
<img src="./README_IMAGES/apply_circle.gif" width="400px">

### ④ サークルのグループチャットで打ち合わせる
チャット内で話し合う。<br>
<br>
<img src="./README_IMAGES/message.gif" width="400px">

### ⑤ レスポンシブデザイン対応
スマートフォン、タブレットでも気軽にご利用いただけます。

# 本番環境のURL
https://suketto.herokuapp.com

# 機能一覧
- ユーザー機能
    - 新規登録、ログイン、ログアウト機能
    - プロフィール作成、編集機能
    - プロフィール画像はS3に保管
- サークル機能
    - サークル作成、編集、削除機能
    - メンバー申請、承認機能
    - サークル画像はS3に保管
    - ソート機能(地域、カテゴリー、ジャンル、キーワード検索)
    - ランキング機能(毎日0時に自動集計、自動更新)
- チャット機能
    - 参加したサークル内でグループチャットができます。
    - 参加申請後、サークル管理者と個人チャットができます。

# 言語・環境
- PHP 7.4.3
- Laravel Framework 6.18.3
- MySQL  Ver 8.0.19
- JavaScript
- Jquery
- AWS(S3)

# データベース設計
<br>
<img src="./README_IMAGES/ER.jpeg" >

## usersテーブル
|Column|Type|Options|
|------|----|-------|
|email|string|null: false|
|password|string|null: false|
### アソシエーション
- has_one :profile , dependent: :destroy
- has_many :emailresets
- belongs_to_many :circle
- has_one :circle
- has_many :message
- belongs_to_many :board
- has_many :point_log

## profileテーブル
|Column|Type|Options|
|------|----|-------|
|familyName|string|null: false|
|firstName|string|null: false|
|name|string|null: false|
|introduction|string|null: false|
|gender|int|null: false|
|prefectureOfInterest|int|null: false|
|cityOfInterest|int|null: false|
|searchSettingByEmail|int|null: false|
|birthdate_1i|int|null: false|
|birthdate_2i|intg|null: false|
|birthdate_3i|int|null: false|
|user_id|int|null: false|
|user_image|string|null: true|

### アソシエーション
- belongs_to :user
- blongs_to :prefecture
- belongs_to :city

## circleテーブル

## boardテーブル

## messageテーブル

## prefectureテーブル

## cityテーブル

## categoryテーブル

## genreテーブル

## point_logテーブル

## circle_rankingテーブル

## email_resetテーブル

# その他



