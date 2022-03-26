<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>리스팅</title>
</head>
<body>
    <button onclick="location.href='{{ route('write') }}'">글 작성</button>
    <table>
        <thead>
            <tr>
                <th>번호</th>
                <th>게시글 제목</th>
                <th>작성 날짜</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post_cnt - $loop->index }}</td>
                <td>
                    <a href="{{ route('detail', ['bid' => $post->bid]) }}">{{ $post->title }}</a>
                </td>
                <td>{{ $post->reg_time }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>