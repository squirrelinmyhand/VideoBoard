<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>리스팅</title>
</head>
<body>
    @foreach($posts as $post)
        <a href="/detail/{{ $post->bid }}">
            <li class="border-4 border-gray-500 px-2 py-2 mt-4">タイトル : {{ $post->title }} <small class="float-right">created_at {{ $post->reg_time}}</small><br>
            内容 : {{ $post ->content }} </li>
        </a>             
    @endforeach
</body>
</html>