<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>簡単掲示板</title>
</head>
<body>
    <h2>簡単掲示板：ログイン</h2>

    <div>
        <form action="/login" method="post">
            @csrf
            <div>
                メールアドレス：
                <input type="email" name="email">
            </div>
            <div>
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div>
                パスワード：
                <input type="password" name="password">
            </div>
            <div>
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <input type="submit" value="ログイン">
        </form>
        <form action="/register">
            <button type="submit">新規登録</button>
        </form>
    </div>
</body>
</html>