<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>게시글 작성</title>
</head>
<body>
    @php
        $route = "store";
        $title = null;
        $content = null;
        $bid = 0;
        $btnValue = "등록";
    @endphp
    
    @if(isset($post))
        @php
            $route = "update";
            $title = $post->title;
            $content = $post->content;
            $bid = $post->bid;
            $btnValue = "수정";
        @endphp
    @endif

    <form action="{{ route($route) }}" method="POST">
        @csrf
        <label for="title">제목</label>
        <input type="text" name="title" id="title" placeholder="제목을 입력해주세요" value='{{ $title }}'>
        <br>
        <label for="content">본문</label>
        <textarea name="content" id="content" cols="30" rows="10" placeholder="본문을 입력해주세요">{{ $content }}</textarea>
        <input type="hidden" name="bid" value='{{ $bid }}'>
        <input type="submit" value="{{ $btnValue }}">
    </form>
    
</body>
</html>