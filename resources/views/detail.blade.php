<!DOCTYPE html>
<html>
<head>
    <title>게시글 페이지</title>
</head>
<body>
    <h1>글 상세페이지</h1>
    <div>
 
        {{ $detail->title }}
    </div>
    <div>
 
        {{ $detail->content }}
    </div>
 
    <div>
        
        <a href="/posts/{{ $detail }}/edit">수정하기</a>
    </div>
 
</body>
</html>
