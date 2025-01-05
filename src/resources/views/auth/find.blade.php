@extends('layouts.auth')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('title')
    <div>
        <h2>簡単掲示板</h2>
    </div>
@endsection

@section('content')
    <div>
        <form action="/search" method="post">
            @csrf
            <div>
                <label for="name">名前:</label>
                <input type="text" name="keyword" value="{{ $keyword }}">
                <button type="submit" class="btn-gradient-radius">検索</button>
            </div>
        </form>
    </div>
    <button type="submit"><a href="/admin">HOME</a></button>
    @if(@isset($posts))
        @foreach($posts as $post)
        <div>
            <h3>検索内容</h3>
            <div>
                ＠{{ $post->name }} at:{{ $post->created_at->format('Y-m-d H:i') }}
            </div>
            <div>
                性別:
                @if ($post['gender'] == 0)
                男性
                @elseif ($post['gender'] == 1)
                女性
                @else
                その他
                @endif
            </div>
                カテゴリ:
                @if ($post['category_id'] == 1)
                comedy
                @elseif ($post['category_id'] == 2)
                food
                @else
                economy
                @endif
            <div>
                :{{ $post->content }}
            </div>
        </div>
        @endforeach
    @else
        @if(!empty($keyword))
            <p>該当する投稿はありません</p> 
        @endif
    @endif
@endsection