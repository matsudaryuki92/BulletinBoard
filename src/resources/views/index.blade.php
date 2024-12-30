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
        <form action="/" method="post">
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
                性別
                <label for="man">男性:</label>
                <input type="radio" name="gender" value="0" id="man">
                <label for="woman">女性:</label>
                <input type="radio" name="gender" value="1" id="woman">
                <label for="other">その他:</label>
                <input type="radio" name="gender" value="2" id="other">
            </div>
            <div>
                @error('gender')
                {{ $message }}
                @enderror
            </div>
            <!-- カテゴリの選択機能 -->
            <div>
                <label for="category_select">カテゴリ:</label>
                <select name="category_id" id="category_select">
                    <option value="" disabled selected style="display:none;">選択してください</option>
                    <option value="1">comedey</option>
                    <option value="2">food</option>
                    <option value="3">economy</option>
                </select>
            </div>
            <div>
                @error('category_id')
                {{ $message }}
                @enderror
            </div>
            <div>
                <label for="content">投稿内容</label><br>
                <textarea name="content" id="content" value="{{ session('posts')['content'] ?? old('content') }}">{{ session('posts')['content'] ?? old('content') }}</textarea>
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
</body>
</html>