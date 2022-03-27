@extends('layout.MainLayout')
@section('TabTitle', '게시판')

@section('content')
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
        @foreach($posts as $key => $post)
        <tr>
            <td>{{ $key + $posts->firstItem() }}</td>
            <td>
                <a href="{{ route('detail', ['bid' => $post->bid]) }}">{{ $post->title }}</a>
            </td>
            <td>{{ $post->reg_time }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $posts->links() }}
@endsection