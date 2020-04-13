@extends('layouts.app')

@section('content')
<div class="container col-md-8 col-lg-6">
    <h1 class="text-center font-weight-bold pt-3" style="font-size: 20px;">プロフィール登録</h1>

<form action="" class="edit_user" id="edit_user" enctype="multipart/form-data" 
accept-charset="UTF-8" method="post">
<input type="hidden" name="_method" value="put" />
</form>
</div>
@endsection