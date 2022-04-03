@extends('layout.MainLayout')
@section('TabTitle', '게시판')

@section('content')
<div>
    <div class="oneBoard">
        <table class="table">
            <thead>
                <tr>
                    <th>번호</th>
                    <th>게시글 제목</th>
                    <th>작성자</th>
                    <th>조회수</th>
                    <th>댓글</th>
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
                    <td>미정</td>
                    <td>10</td>
                    <td>0</td>
                    <td>{{ $post->reg_time }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <div>
                <div>
                    <form action="">
                        <input type="text" name="searchText" value="" placeholder="검색어를 입력해주세요">
                    </form>
                </div>
                <div>
                    <select name="" id="">
                        <option value="">조회수</option>
                        <option value="">작성날짜</option>
                        <option value="">추천</option>
                    </select>
                    <button onclick="location.href='{{ route('write') }}'">글 작성</button>
                </div>
            </div>
        </div>
        <div class="contentFooter">
            {{ $posts->links() }}
            
        </div>
    </div>
</div>
@endsection