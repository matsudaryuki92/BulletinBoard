@extends('layouts.auth')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('title')
<div>
    <div>
        <h2>簡単掲示板</h2>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div>
        <form action="/find" method="get">
            <!-- <input type="text" name="keyword"> -->
             <button type="submit" id="search" class="post__admin--btn">検索</button>
        </form>
    </div>
    <div>
        <form action="/logout" method="post">
            @csrf
            <button class="post__admin--btn">ログアウト</button>
        </form>
    </div>
</div>
    <div>
        <h3>投稿一覧</h3>
       @if($posts->isEmpty())
       <p>投稿がありません</p>
       @else
           @foreach($posts as $post)
            <div>
                <form action="update" method="post">
                    @csrf
                    @method('PATCH')
                    <div>＠{{ $post['name'] }} at:{{ $post->created_at->format('Y-m-d H:i') }}</div>
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
                     <div>
                        カテゴリ:
                         @if ($post['category_id'] == 1)
                            Comedy
                        @elseif ($post['category_id'] == 2)
                            food
                        @else
                            economy
                        @endif
                    </div>
                    <div><textarea name="content" id="content">{{ $post['content'] }}</textarea></div>
                    <input type="hidden" name="id" value="{{ $post['id'] }}">                
                    <button type="submit" class="button-form">更新</button>
                </form>
                <form action="/delete" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $post['id'] }}">
                    <button type="submit" class="button-form">削除</button>
                </form>
            </div>
            @endforeach
        @endif
    </div>
        {{ $posts->links() }}
@endsection