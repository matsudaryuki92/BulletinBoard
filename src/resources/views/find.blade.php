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
        <h3>検索画面</h3>
        <form action="/search" method="post">
            @csrf
            <div>
                <label for="name">名前:</label>
                <input type="text" name="keyword" value="{{ $keyword }}">
                <input type="submit" value="検索">
            </div>
        </form>
    </div>
    @if(@isset($posts))
        @foreach($posts as $post)
        <div>
            <h3>検索内容</h3>
            <div>
                ＠{{ $post->name }} at:{{ $post->created_at->format('Y-m-d H:i') }}
            </div>
            <div>
                性別:
                @if ($posts['gender'] == 0)
                男性
                @elseif ($posts['gender'] == 1)
                女性
                @else
                その他
                @endif
            </div>
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
</body>
</html>