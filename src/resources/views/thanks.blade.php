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
            <p>投稿出来ました！</p>
            <div>
                <input type="submit" value="戻る">
            </div>
        </form>
    </div>
</body>
</html>