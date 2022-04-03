@extends('layout.MainLayout')
@section('TabTitle', '게시판')

@section('content')
<div>
    <div class="oneBoard">
        <h1>글 상세페이지</h1>
        <div>
            <span>제목</span>
            {{ $detail->title }}
        </div>
        <div>
            <span>본문</span>
            {!! $detail->content !!}
        </div>
    
        <div>
            <a href="{{ route('rewrite', ['bid' => $detail->bid]) }}">수정하기</a>
            <a href="{{ route('delete', ['bid' => $detail->bid]) }}">삭제하기</a>
        </div>
    </div>
</div>
@endsection