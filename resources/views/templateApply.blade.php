<p class='mb-0'>《システムから送信》</p><br>      
<p class='mb-0'>{{$circle->name}} 管理人さんへ、サークルプロフィールページからサークル参加リクエストが届いています。</p><br>        
<p class='mb-0'>管理人さんが下記のURLをクリックすると{{$user->profile->familyName }}{{ $user->profile->firstName }}さんのAAへの参加を承認します。</p>
<p class='mb-0'>URL</p>
<a class='mb-0' href='/circle_user/{{ $circle->id }}/{{ $user->id }}'>{{url('/circle_user/'.$circle->id.'/'.$user->id)}}</a><br>
<p class='mb-0'>{{ $user->profile->familyName }} {{ $user->profile->firstName }}さんの自己紹介</p>
<p class='mb-0'>---------</p><br>
<p class='mb-0'>{{ $text }}</p><br>
<p class='mb-0'>{{ $user->profile->familyName }}{{ $user->profile->firstName }}さんのプロフィール</p>
<a class='mb-0' href='/profile/show/{{ $user->profile->id }}'>{{url('/profile/show/'.$user->profile->id)}}</a>