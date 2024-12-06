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
        <form action="/thanks" method="post">
            @csrf
            <div>
                <label for="name">名前:</label>
                <input type="text" name="name" id="name" value="{{ $posts['name'] }}" readonly>
            </div>
            <div>
                <label for="content">投稿内容:</label><br>
                <textarea name="content" id="content" readonly>{{ $posts['content'] }}</textarea>
            </div>
            <div>
                <input type="submit" value="投稿">
            </div>
        </form>
    </div>
</body>
</html>