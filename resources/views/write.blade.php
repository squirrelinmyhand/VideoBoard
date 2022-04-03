@extends('layout.MainLayout')
@section('TabTitle', '게시판')

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

@section('content')
{{-- Quill --}}
<link href="{{ asset('external/quill/quill.snow.css') }}" rel="stylesheet">
<script src='{{ asset('external/quill/quill.js') }}'></script>

<link href="{{ asset('css/write.css') }}" rel="stylesheet">
<script src='{{ asset('js/form.js') }}'></script>
<div class="oneBoard">
    <div>
        <h3>게시글 작성</h3>
    </div>
    <form id="BoardForm" action={{ route($route) }} method="POST" enctype="multipart/form-data">
        @csrf
        <div class="writeBox">
            <div class="writeContent">
                <label for="title" class="one-line-label">제목</label>
                <div class="writeInput">
                    <input type="text" name="title" id="title" placeholder="제목을 입력해주세요" value='{{ $title }}'>
                </div>
            </div>
            <br>
            <div class="writeContent">
                <div id="editor" class="QuillEditor"></div>
                {{-- <textarea name="content" id="content" cols="30" rows="10" placeholder="본문을 입력해주세요">{{ $content }}</textarea> --}}
            </div>
            <div class="writeContent">
                <label for="file">첨부파일</label>
                <input type="file" name="attach" id="file">
            </div>
            <input type="hidden" name="bid" value='{{ $bid }}'>
            <input type="button" id='submitForm' value="{{ $btnValue }}">
        </div>    
    </form>
</div>
<script>
    
</script>
@endsection