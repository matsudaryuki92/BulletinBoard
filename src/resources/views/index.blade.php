<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>簡単掲示板</title>
</head>
<body>
    <div>
        <a href="/"><h2>簡単掲示板</h2></a>
    </div>
    <div>
        <form action="/confirm" method="post">
            @csrf
            <div>
                <label for="name">名前:</label>
                <input type="text" name="name" id="name" value="{{ session('posts')['name'] ?? old('name') }}">
            </div>
            <div>
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div>
                性別:
                <label for="man">男性</label>
                <input type="radio" name="gender" value="0" id="man">
                <label for="woman">女性</label>
                <input type="radio" name="gender" value="1" id="woman">
                <label for="other">その他</label>
                <input type="radio" name="gender" value="2" id="other">
            </div>
            <div>
                @error('gender')
                {{ $message }}
                @enderror
            </div>
            <div>
                <label for="content">投稿内容</label><br>
                <textarea name="content" id="content" value="{{ session('posts')['content'] ?? old('content') }}"></textarea>
            </div>
            <div>
                @error('content')
                {{ $message }}
                @enderror
            </div>
            <div>
                <input type="submit" value="投稿">
            </div>
        </form>
    </div>
    <div>
        <form action="/find" method="get">
            <!-- <input type="text" name="keyword"> -->
             <label for="search">検索したい方はこちらをクリック</label>
            <input type="submit" value="検索" id="search">
        </form>
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
</body>
</html>