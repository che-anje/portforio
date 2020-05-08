<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('')}}" class="edit_user" id="edit_user" enctype="multipart/form-data" 
    accept-charset="UTF-8" method="POST">
        @for($i = 1; $i < 20; $i++)
        {{ $i }}
            <p style="margin: 0em !important;">名前
            &emsp;&emsp;<input type="text" class="name" name="name">
            </p>
            <p style="margin: 0 0 1em 0 !important;">カテゴリ
                <input type="int" class="category_id" name="category_id" />
            </p>
        @endfor
        <input type="submit" name="commit" value="登録" id="user-edit-btn-submit" 
        class="mx-auto btn btn-primary--grad text-white mb-3 btn-block" data-disable-with="登録" />
</body>
</html>