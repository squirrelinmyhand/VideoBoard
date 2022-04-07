@extends('layout.MainLayout')
@section('TabTitle', '게시판')

@section('content')
<link href="{{ asset('css/board.css') }}" rel="stylesheet">
<div>
    <div class="oneBoard">
        <div class=titleBox>
            <div class=boardTitle>
                <span>{{ $detail->date }}</span>
                <h1>{{ $detail->title }}</h1>
            </div>
            
                
            </div>
        </div>
        <div>
            <span>본문</span>
            {!! $detail->content !!}
        </div>
        <div>
            @foreach ($detail->files as $file)
                <p>첨부파일</p>
                @if(!is_null($file->fileExt))
                    @php
                        $file->fileName .=  "." . $file->fileExt;
                    @endphp
                @endif
                {{-- <a href="#" onclick="file_download({!! $file->aid !!})">{!! $file->fileName !!}</a> --}}
                <a href="{{ route('download', ['bid' => $file->bid, 'aid' => $file->aid]) }}">{!! $file->fileName !!}</a>
                
            @endforeach
            
        </div>
    
        <div>
            <a href="{{ route('rewrite', ['bid' => $detail->bid]) }}">수정하기</a>
            <a href="{{ route('delete', ['bid' => $detail->bid]) }}">삭제하기</a>
        </div>
    </div>
</div>
@endsection