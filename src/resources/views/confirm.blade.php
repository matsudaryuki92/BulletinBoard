<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>簡単掲示板</title>
</head>
<body>
    <div>
        <h2>簡単掲示板</h2>
    </div>
    <div>
        <h3>投稿内容確認</h3>
        <form action="/confirm" method="post">
            @csrf
            <div>
                名前:
                {{ session('name') }}
                <input type="hidden" name="name" value="{{ session('name') }}" >
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
                <input type="hidden" name="gender" value="{{ session('gender') }}">
            </div>
            <div>
                カテゴリ:
                @if (session('category_id') == 1)
                comedy
                @elseif (session('category_id') == 2)
                food
                @else
                economy
                @endif
                <input type="hidden" name="category_id" value="{{ session('category_id') }}">
            </div>
            <div>
                投稿内容:
                {{ session('content') }}
                <input type="hidden" name="content" value="{{ session('content') }}">
            </div>
            <input type="submit" value="投稿">
        </form>
            <div>
                <form action="/confirm/fix" method="post">
                    @csrf
                    <input type="hidden" name="name" value="{{ session('name') }}" >
                    <input type="hidden" name="gender" value="{{ session('gender') }}" >
                    <input type="hidden" name="category_id" value="{{ session('category_id') }}">
                    <input type="hidden" name="content" value="{{ session('content') }}" >
                    <input type="submit" value="編集">
                </form>                    
            </div>       
        </div>
</body>
</html>