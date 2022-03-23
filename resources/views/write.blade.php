<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>게시글 작성</title>
</head>
<body>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <label for="title">제목</label>
        <input type="text" name="title" id="title" placeholder="제목을 입력해주세요">
        <br>
        <label for="content">본문</label>
        <textarea name="content" id="content" cols="30" rows="10" placeholder="본문을 입력해주세요"></textarea>
        <input type="submit" value="등록">
    </form>
    
</body>
</html>