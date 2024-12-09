<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>簡単掲示板</title>
</head>
<body>
    <div>
        <h2><a href="/">簡単掲示板</a></h2>
    </div>
    <div>
        <h3>投稿内容確認</h3>
        <form action="/thanks" method="post">
            @csrf
            <div>
                名前:
                {{ session('name') }}
                <input type="hidden" name="name" value="{{ $posts['name'] }}" >
            </div>
            <div>
                性別:
                @if (session('gender') == 0)
                男性
                @elseif (session('gender') == 1)
                女性
                @else
                その他
                @endif
                <input type="hidden" name="gender" value="{{ $posts['gender'] }}">
            </div>
            <div>
                投稿内容:
                {{ session('content') }}
                <input type="hidden" name="content" value="{{ $posts['content'] }}">
            </div>
            <div>
                <a href="/"><button type="submit">編集</button></a>
                <input type="submit" value="投稿">
            </div>
        </form>
    </div>
</body>
</html>